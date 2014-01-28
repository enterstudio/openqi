<?php

// allow access control
header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

$db = new PDO('mysql:host=localhost;dbname=openqi;charset=utf8', 'openqi', 'socks'); //
$t = array();
$t["u"] = array("name" => "user", "keys" => null, "joins" => array("pu" => &$t["pu"], "p" => &$t["p"], "pa" => &$t["pa"], "a" => &$t["a"], "u" => &$t["u"], "g" => &$t["g"]), "m2m" => false, "plural" => "users");
$t["g"] = array("name" => "group", "keys" => null, "joins" => array("u" => &$t["u"]), "m2m" => false, "plural" => "groups");
$t["p"] = array("name" => "project", "keys" => null, "joins" => array("pu" => &$t["pu"], "p" => &$t["p"], "pa" => &$t["pa"], "a" => &$t["a"]), "m2m" => false, "plural" => "projects");
$t["a"] = array("name" => "area", "keys" => null, "joins" => array("pu" => &$t["pu"], "u" => &$t["p"], "pa" => &$t["pa"], "a" => &$t["a"]), "m2m" => false, "plural" => "areas");
$t["pu"] = array("name" => "projectarea", "keys" => array("p","u"), "joins" => array("p" => &$t["p"], "u" => &$t["u"]), "m2m" => true, "plural" => "projectusers");
$t["pa"] = array("name" => "projectbudget", "keys" => array("p","a"), "joins" => array("p" => &$t["p"], "a" => &$t["a"]), "m2m" => true, "plural" => "projectareas");

$types = array();
$types["user"] = "u";
$types["group"] = "g";
$types["project"] = "p";
$types["area"] = "a";
$types["projectarea"] = "pa";
$types["projectuser"] = "pu";

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

function query($statement, $args=array(), $newID=false) {
	global $db;

	$queryResult = array("stmt"=>null,"newID"=>null);
	if($statement == "")
		return false;
	$s = "";

	$boundargs=array();
	try {
		$statements = explode(";",$statement);
		foreach($statements as $s) {
			if($s == "") continue;
			$boundargs=array();
			$nameParams=array();

			if($newID && startsWith("CALL",$s))
				$s = str_replace(":ID","@ID",$s);
			
			$stmt = $db->prepare($s);

			$queryResult["return"] = null;

			if(is_array($args)) {
				//prefill everything with null
				preg_match_all('/:\w+/', $s,$namedParams);
				$boundargs = array_fill_keys($namedParams[0],null);

				//make as many duplicate entries as necessary
				foreach($args as $k => $v) {
					$x = $k;
					$i = 1;
					while(array_key_exists($x,$boundargs) !== false) {
						$boundargs[$x] = $v;
						$x = (($i==1) ? $x.$i : substr_replace($x, $i, -1));
						$i++;
					}
				}

				if(sizeof($boundargs) > 0) {
					$stmt->execute($boundargs);
				}
				else
					$stmt->execute();	
			}
			else
				$stmt->execute();	

			$queryResult["return"] = true;

			if($newID) {
				$out = $stmt->fetchAll(PDO::FETCH_ASSOC);
				if($out) {
					$queryResult["return"] = $out[0]["ID"];
				}
			}
			$queryResult["stmt"] = $stmt;
		}
	} catch(PDOException $ex) {
	    $queryResult["stmt"] = null;
	    $queryResult["return"] = false;
	}
	return (object)$queryResult;
}

function displayError($str) {
	//header("HTTP/1.0 404 Not Found");
	
	echo $str;
}

function logthis($msg) {
	
}

function startsWith($haystack, $needle)
{
    return $needle === "" || strpos($haystack, $needle) === 0;
}
function endsWith($haystack, $needle)
{
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}

function in_array_r($array, $field, $find){
    foreach($array as $item){
        if($item[$field] == $find) return true;
    }
    return false;
}

function search_array_r($array, $field, $find){
    foreach($array as $item){
        if(strtolower($item[$field]) == strtolower($find)) return $item;
    }
    return null;
}

function writeToXml(XMLWriter $xml, $data){
	if(!is_array($data))
		return;
    foreach($data as $key => $value){
		if(is_array($value)){
			if(is_numeric($key)){
				$keys = array_keys($value);
				$key = $keys[0];
				$xml->startElement($key);
		 		writeToXml($xml, $value[$key]);
		 		$xml->endElement();	
			}
			else
			{
				$xml->startElement($key);
		 		writeToXml($xml, $value);
		 		$xml->endElement();	
			}
		continue;
		}
		$xml->writeElement($key, $value);
      }
  }

function respondAs($app,$data,$format,$includeHeader=true) {
	if(strtolower($format) == "xml") {
		$app->response()->header("Content-Type","text/xml");
		$xml = new XmlWriter();
  		$xml->openMemory();
  		$xml->startDocument("1.0", "UTF-8");
  		$xml->startElement("response");

  		writeToXml($xml,$data);
  		$xml->endElement();
  		return $xml->outputMemory(true);
	}
	else {
		$app->response()->header("Content-Type","application/json");
		return json_encode(array("response"=>$data));
	}
}

$qryLibrary = array();


/* project */
$qryLibrary["project_get"] = 		array(
									"SQL"		=>	"SELECT p.ID, p.title, p.aims, p.outcomes, p.accepted, p.population, p.populationsize, p.methodtype, p.datastart, p.dataend, p.startdate, p.enddate, p.auditleadID, a.ID as 'areaID', a.name as 'areaname', u.ID as 'userID', u.email as 'useremail', CONCAT(u.firstname,' ',u.lastname) as 'username', g.ID as 'groupID', g.name as 'groupname' from project p left outer join projectarea pa on(p.ID = pa.projectID) left outer join area a on(pa.areaID = a.ID) left outer join projectuser pu on(p.ID = pu.projectID) left outer join `user` u on(pu.userID = u.ID) left outer join `group` g on(g.ID = u.groupID)",
									"params"	=>	array(),
									"public"	=>	true
								);
$qryLibrary["project_getbyuser"] = array(
									"SQL"		=>	"SELECT p.ID, p.title, p.aims, p.outcomes, p.accepted, p.population, p.populationsize, p.methodtype, p.datastart, p.dataend, p.startdate, p.enddate, p.auditleadID, a.ID as 'areaID', a.name as 'areaname', u.ID as 'userID', u.email as 'useremail', CONCAT(u.firstname,' ',u.lastname) as 'username', g.ID as 'groupID', g.name as 'groupname' from project p left outer join projectarea pa on(p.ID = pa.projectID) left outer join area a on(pa.areaID = a.ID) left outer join projectuser pu on(p.ID = pu.projectID) left outer join `user` u on(pu.userID = u.ID) left outer join `group` g on(g.ID = u.groupID) WHERE u.ID = :userID",
									"params"	=>	array("ID"=>array("Type"=>"int","ParamType"=>"url")),
									"public"	=>	true
								);
$qryLibrary["project_getbyarea"] = array(
									"SQL"		=>	"SELECT p.ID, p.title, p.aims, p.outcomes, p.accepted, p.population, p.populationsize, p.methodtype, p.datastart, p.dataend, p.startdate, p.enddate, p.auditleadID, a.ID as 'areaID', a.name as 'areaname', u.ID as 'userID', u.email as 'useremail', CONCAT(u.firstname,' ',u.lastname) as 'username', g.ID as 'groupID', g.name as 'groupname' from project p left outer join projectarea pa on(p.ID = pa.projectID) left outer join area a on(pa.areaID = a.ID) left outer join projectuser pu on(p.ID = pu.projectID) left outer join `user` u on(pu.userID = u.ID) left outer join `group` g on(g.ID = u.groupID) WHERE a.ID = :areaID",
									"params"	=>	array("ID"=>array("Type"=>"int","ParamType"=>"url")),
									"public"	=>	true
								);
$qryLibrary["project_add"] = 		array(
									"SQL"		=>	"INSERT INTO project SET title = :title, aims = :aims, outcomes = :outcomes, accepted = 0, population = :population, populationsize = :popultionsize, methodtype = :methodtype, datastart = :datastart, dataend = :dataend, startdate = :startdate, enddate = :enddate, auditleadID = :auditleadID; SELECT LAST_INSERT_ID() as ID",
									"params"	=>	array("name"=>array("Type"=>"string","ParamType"=>""),	"categoryID"=>array("Type"=>"int","ParamType"=>"")),
									"public"	=>	true
								);

/* area */

$qryLibrary["area_get"] = 	array(
									"SQL"		=>	"SELECT a.ID, a.name from area a",
									"params"	=>	array(),
									"public"	=>	true
								);

/* group */

$qryLibrary["group_get"] = 	array(
									"SQL"		=>	"SELECT g.ID, g.name from `group` g",
									"params"	=>	array(),
									"public"	=>	true
								);


/* users */

$qryLibrary["user_get"] = 	array(
									"SQL"		=>	"SELECT u.ID, u.email, CONCAT(u.firstname,' ',u.lastname) as 'name', u.password, a.ID as 'areaID', a.name as 'areaname', g.ID as 'groupID', g.name as 'groupname' from `user` u left outer join `group` g on(g.ID = u.groupID) left outer join area a on(a.ID = u.areaID)",
									"params"	=>	array(),
									"public"	=>	true
								);
$qryLibrary["user_add"] = 	array(
									"SQL"		=>	"INSERT INTO user SET email = :email, externalID = :externalID; SELECT LAST_INSERT_ID() as ID",
									"params"	=>	array("email"=>array("Type"=>"string","ParamType"=>""),	"externalID"=>array("Type"=>"string","ParamType"=>"")),
									"public"	=>	true
								);
$qryLibrary["user_edit"] = 	array(
									"SQL"		=>	"UPDATE user SET email = :email, externalID = :externalID, Deleted = 0 WHERE ID = :ID",
									"params"	=>	array("ID"=>array("Type"=>"int","ParamType"=>"url"), "email"=>array("Type"=>"string","ParamType"=>""), "externalID"=>array("Type"=>"string","ParamType"=>"")),
									"public"	=>	true
								);
$qryLibrary["user_delete"] = 	array(
									"SQL"		=>	"UPDATE user set Deleted = 1 where ID = :ID",
									"params"	=>	array("ID"=>array("Type"=>"int","ParamType"=>"url")),
									"public"	=>	true
								);