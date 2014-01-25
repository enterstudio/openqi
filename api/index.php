<?php
ob_start();
include("include.php");
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

/*  
GET :type - Returns a list of objects of the :type 
*/
$app->get('/api/:type', function($type) use ($app) {
	$response = array("status"=>"OK");
	echo respondAs($app, getAllByType($app,$type,$response),  $app->request->get('format'));
});

/* 
GET :type/:id - Returns a specific object of :type
*/
$app->get('/api/:type/:id', function($type,$id) use ($app) {
	$response = array("status"=>"OK");
	echo respondAs($app, getTypeByID($app,$type,$id,$response), $app->request->get('format'));
});

/* 
GET :type/user/:user - Returns a list of objects of the :type for a particular :user
*/
$app->get('/api/projects/user/:userID', function($type,$userID) use ($app) {
	$response = array("status"=>"OK");
	echo respondAs($app, getTypeByUser($app,$type,$userID,$response), $app->request->get('format'));
});

/* 
POST :type - Creates a new object of :type
*/
$app->post('/api/:type', function($type) use ($app) { 
	$response = array("status"=>"OK");
	echo respondAs($app, addType($app, $type, $response), $app->request->get('format'));
});

/* 
PUT :type - Edits an object of :type
*/
$app->put('/api/:type', function($type) use ($app) {
	$response = array("status"=>"OK");
	echo respondAs($app, editType($app, $type, $response), $app->request->get('format'));
});

/* 
DELETE :type:id - Deletes a specific object
*/
$app->delete('/api/:type/:id', function($type,$id) use ($app) {
	$response = array("status"=>"OK");
	echo respondAs($app, deleteType($app, $type, $id, $response), $app->request->get('format'));
});

function getAllByType($app,$type,$response) {
	global $qryLibrary;
	global $t;
	global $types;
	$request = $app->request();
	
	if(array_key_exists($type."_get", $qryLibrary)) {
		$result = query($qryLibrary[$type."_get"]["SQL"], null);

		if($result->return && $result->stmt) {
			if(isset($t[$types[$type]])) {
				$response['data'] = array();
				$rows = $result->stmt->fetchAll();

				foreach($rows as $e) {
					$row = organiseData($e,$type);
					array_push($response['data'], $row);
				}	
			}
		}
		else {
			$response["status"] = "Error";
			$response["message"] = "Unable to retrieve data";
		}
	}
	else {
		$response["status"] = "Error";
		$response["message"] = "Invalid API call";
	}

	return $response;
}

function getTypeByID($app,$type,$id,$response) {
	global $qryLibrary;
	global $t;
	global $types;

	if(array_key_exists($type."getbyID", $qryLibrary)) {
		$result = query($qryLibrary[$type."_getbyID"]["SQL"], array(":ID"=>$id));

		if($result->return && $result->stmt) {
			if(isset($t[$types[$type]])) {
				$response['data'] = array();
				$rows = $result->stmt->fetchAll();

				foreach($rows as $e) {
					$row = organiseData($e,$type);
					array_push($response['data'], $row);
				}	
			}
		}
		else {
			$response["status"] = "Error";
			$response["message"] = "Failed to retrieve data";
		}
	}
	else {
		$response["status"] = "Error";
		$response["message"] = "Invalid API call";
	}

	return $response;
}

function getTypeByUser($app,$type,$user,$response) {
	global $qryLibrary;
	global $t;
	global $types;

	if(array_key_exists($type."_getbyuser", $qryLibrary)) {
		$result = query($qryLibrary[$type."_getbyuser"]["SQL"], array(":userID"=>$user));

		if($result->return && $result->stmt) {
			if(isset($t[$types[$type]])) {
				$response['data'] = array();
				$rows = $result->stmt->fetchAll();

				foreach($rows as $e) {
					$row = organiseData($e,$type);
					array_push($response['data'], $row);
				}	
			}
		}
		else {
			$response["status"] = "Error";
			$response["message"] = "Failed to retrieve data";
		}
	}
	else {
		$response["status"] = "Error";
		$response["message"] = "Invalid API call";
	}

	return $response;
}

function addType($app,$type,$response) {
	global $qryLibrary;

	$log = $app->getLog();

	if(array_key_exists($type."_add", $qryLibrary)) {
		$data = $app->request()->post();

		if($data) {
			foreach($data as $k => $v) {
				if($k=="_METHOD") continue;
				unset($data[$k]);
				$data[":".$k] = $v;	
			} 	
		}

		$result = query($qryLibrary[$type."_add"]["SQL"], $data, true);

		if($result->return) {
			$response["message"] = "Successfully added ".$type." (".$result->return.")";
			$response = getTypeByID($app,$type,$result->return,$response);
		} else {
			$response["status"] = "Error";
			$response["message"] = "Failed to add ".$type;
			logthis(json_encode($data));
		}
	}
	else {
		$response["status"] = "Error";
		$response["message"] = "Invalid API call";
	}

	return $response;
}

function editType($app,$type,$response) {
	global $qryLibrary;

	$log = $app->getLog();

	if(array_key_exists($type."_edit", $qryLibrary)) {
		$data = $app->request()->post();

		if($data) {
			foreach($data as $k => $v) {
				if($k=="_METHOD") continue;
				unset($data[$k]);
				$data[":".$k] = $v;	
			} 	
		}

		$result = query($qryLibrary[$type."_edit"]["SQL"], $data, false);

		if($result->return) {
			$response["message"] = "Successfully updated ".$type." (".$data[":ID"].")";
			$response = getTypeByID($app,$type,$data[":ID"],$response);
		} else {
			$response["status"] = "Error";
			$response["message"] = "Failed to update ".$type;
		}
	}
	else {
		$response["status"] = "Error";
		$response["message"] = "Invalid API call";
	}

	return $response;
}


function deleteType($app,$type,$id,$response) {
	global $qryLibrary;
	$request = $app->request();
	$log = $app->getLog();

	$response = array("status"=>"Error");

	if(!isset($id)) {
		$response["message"] = "Failed to pass ID of ".$type." to delete";
	}
	else {
		$result = query($qryLibrary[$type."_delete"]["SQL"], array(":ID"=>$id));
		if($result) {
			$response["status"] = "OK";
			$response["message"] = "Successfully deleted ".$type;
		}
		else
			$response["message"] = "Failed to delete ".$type;
	}

	return $response;
}


function organiseData($data,$type) {
	global $types;

	$row = array();
	$datakeys = array_keys($data);

	foreach($datakeys as $k) {
		$obj = "";

		if(is_numeric($k))
			continue;

		foreach (array_keys($types) as $t) {
			if(startsWith($k,$t)) {
				$obj = $t;
				break;
			}
		}
		
		if($obj != "") {
			if(!array_key_exists($obj, $row)) {
				$row[$obj] = array();
			}
			$newKey = str_replace($obj, "", $k);
			$row[$obj][$newKey] = $data[$k];
		}
		else {
			$row[$k] = $data[$k];
		}
			
	}
	return $row;
}

$app->run();

?>