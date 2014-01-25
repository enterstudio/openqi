angular.module('templates-app', ['dashboard/dashboard.tpl.html', 'project/configure/openqi.project.configure.tpl.html', 'project/project.tpl.html']);

angular.module("dashboard/dashboard.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("dashboard/dashboard.tpl.html",
    "\n" +
    "\n" +
    "<div class=\"col-md-12\">\n" +
    "	<div class=\"panel panel-default\">\n" +
    "		<div class=\"panel-body\">\n" +
    "			<p>Dashboard tester</p>\n" +
    "		</div>\n" +
    "	</div>\n" +
    "</div>");
}]);

angular.module("project/configure/openqi.project.configure.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("project/configure/openqi.project.configure.tpl.html",
    "");
}]);

angular.module("project/project.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("project/project.tpl.html",
    "\n" +
    "\n" +
    "<div class=\"col-md-12\">\n" +
    "	<div class=\"panel panel-default\">\n" +
    "		<div class=\"panel-heading\">All Projects</div>	\n" +
    "		<div class=\"panel-body\">\n" +
    "			<div class=\"row\">\n" +
    "				<div class=\"col-sm-12 col-md-3\">\n" +
    "					<input type=\"text\" class=\"form-control\" placeholder=\"Search...\" ng-model=\"filter.query\">\n" +
    "				</div>\n" +
    "				<div class=\"add-item-panel col-sm-12 col-md-9\">\n" +
    "					<a class=\"btn btn-success pull-right\" title=\"Add\" ui-sref=\"project.add\" href=\"#/add\">Add new Project</a>\n" +
    "				</div>\n" +
    "			</div>\n" +
    "		</div>\n" +
    "\n" +
    "		<ul class=\"item-list list-group\">\n" +
    "			<li \n" +
    "				ng-repeat=\"item in projects | filter: filter.query\"\n" +
    "				class=\"list-group-item\">\n" +
    "					<span ng-if=\"item.title\">{{item.title}}</span>\n" +
    "					<span class=\"item-menu pull-right visible-xs\">\n" +
    "						<a class=\"btn btn-xs btn-warning\" title=\"Edit\" ng-click=\"selectItem(item)\" ui-sref=\"project.edit\" href=\"#/edit\"><i class=\"fa fa-pencil\"></i></a>\n" +
    "						<a class=\"btn btn-xs btn-danger\" title=\"Delete\" ng-click=\"selectItem(item)\" ui-sref=\"project.delete\" href=\"#/delete\"><i class=\"fa fa-trash-o\"></i></a>\n" +
    "					</span>\n" +
    "			</li>\n" +
    "		</ul>\n" +
    "	</div>\n" +
    "</div>\n" +
    "\n" +
    "\n" +
    "");
}]);
