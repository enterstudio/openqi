angular.module('templates-app', ['dashboard/dashboard.tpl.html', 'login/login.tpl.html', 'project/configure/openqi.project.configure.tpl.html', 'project/project.item.tpl.html', 'project/project.tpl.html']);

angular.module("dashboard/dashboard.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("dashboard/dashboard.tpl.html",
    "\n" +
    "<div class=\"row\">\n" +
    "	<div class=\"col-md-4\">\n" +
    "		<div class=\"panel panel-default\">\n" +
    "			<div class=\"panel-body\">\n" +
    "				<label><i class=\"fa fa-user\"></i> My Projects</label>\n" +
    "			</div>\n" +
    "			<ul class=\"item-list list-group\">\n" +
    "				<li \n" +
    "					ng-click=\"goToItem(item)\"\n" +
    "					ng-repeat=\"item in myProjects\"\n" +
    "					class=\"list-group-item\">\n" +
    "						<span ng-if=\"item.title\">{{item.title}}</span>\n" +
    "				</li>\n" +
    "			</ul>\n" +
    "		</div>\n" +
    "	</div>\n" +
    "	<div class=\"col-md-4\">\n" +
    "		<div class=\"panel panel-default\">\n" +
    "			<div class=\"panel-body\">\n" +
    "				<label><i class=\"fa fa-users\"></i> Local Projects</label>\n" +
    "			</div>\n" +
    "			<ul class=\"item-list list-group\">\n" +
    "				<li \n" +
    "					ng-click=\"goToItem(item)\"\n" +
    "					ng-repeat=\"item in localProjects\"\n" +
    "					class=\"list-group-item\">\n" +
    "						<span ng-if=\"item.title\">{{item.title}}</span>\n" +
    "				</li>\n" +
    "			</ul>\n" +
    "		</div>\n" +
    "	</div>\n" +
    "	<div class=\"col-md-4\">\n" +
    "		<div class=\"panel panel-default\">\n" +
    "			<div class=\"panel-body\">\n" +
    "				<label>Notifications</label>\n" +
    "				<small ng-hide=\"notifications.length > 0\">No notifications at the moment.</small>\n" +
    "				<div class=\"notify-count pull-right\">{{notifications.length}}</div>\n" +
    "				<ul class=\"list-unstyled notifications\">\n" +
    "					<li ng-repeat=\"notification in notifications\"><span class=\"pull-left\"><img alt=\"\" ng-src=\"assets/images/user{{notification.user.ID}}.jpeg\"></span> <strong>{{notification.user.name}}</strong> {{notification.name}}</li>\n" +
    "				</ul>\n" +
    "			</div>\n" +
    "		</div>\n" +
    "	</div>\n" +
    "</div>");
}]);

angular.module("login/login.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("login/login.tpl.html",
    "\n" +
    "\n" +
    "<div class=\"login col-md-4 col-md-offset-4\">\n" +
    "	<div class=\"panel panel-default\">\n" +
    "	<div class=\"panel-heading\">Login</div>\n" +
    "		<div class=\"panel-body\">\n" +
    "			<div class=\"alert alert-danger\" ng-if=\"authentication.prompt\">\n" +
    "				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
    "				<strong>Username or password not recognised!</strong> Please try again.\n" +
    "			</div>\n" +
    "\n" +
    "			<form role=\"form\" name=\"loginForm\" class=\"form-horizontal\">\n" +
    "				<div class=\"form-group\">\n" +
    "					<label class=\"control-label col-md-2\">Email:</label>\n" +
    "					<div class=\"col-md-8\">\n" +
    "						<input type=\"email\" ng-model=\"email\" required=\"required\" maxlength=\"70\" class=\"form-control\">\n" +
    "					</div>\n" +
    "				</div>\n" +
    "				<div class=\"form-group\">\n" +
    "					<label class=\"control-label col-md-2\">Password:</label>\n" +
    "					<div class=\"col-md-8\">\n" +
    "						<input type=\"password\" ng-model=\"password\" required=\"required\" maxlength=\"70\" class=\"form-control\">\n" +
    "					</div>\n" +
    "				</div>\n" +
    "			</form>\n" +
    "		</div>\n" +
    "		<div class=\"panel-footer\">\n" +
    "			<button type=\"submit\" class=\"btn btn-success\" ng-disabled=\"loginForm.$invalid\" ng-click=\"login(email, password)\">Login</button>\n" +
    "		</div>\n" +
    "	</div>\n" +
    "</div>");
}]);

angular.module("project/configure/openqi.project.configure.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("project/configure/openqi.project.configure.tpl.html",
    "");
}]);

angular.module("project/project.item.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("project/project.item.tpl.html",
    "\n" +
    "<div class=\"col-md-3\">\n" +
    "	<div class=\"panel panel-default\">\n" +
    "		<div class=\"panel-heading\">Active Contributers</div>\n" +
    "		<div class=\"panel-body\">\n" +
    "			<div ng-hide=\"project.current.item.users.length > 0\">No active contributers.</div>\n" +
    "			<ul class=\"list-unstyled project-users\" ng-if=\"project.current.item.users.length > 0\">\n" +
    "				<li ng-repeat=\"user in project.current.item.users\" title=\"{{user.name}}\">\n" +
    "					<img alt=\"\" ng-src=\"assets/images/user{{user.ID}}.jpeg\">\n" +
    "				</li>\n" +
    "			</ul>\n" +
    "		</div>\n" +
    "	</div>\n" +
    "</div>\n" +
    "\n" +
    "\n" +
    "<div class=\"col-md-6\">\n" +
    "	<div class=\"panel panel-default\">\n" +
    "		<div class=\"panel-body\">\n" +
    "			<h2>{{project.current.item.title}}</h2>\n" +
    "	\n" +
    "			<h3>1. General</h3>\n" +
    "			<hr>\n" +
    "			<h4>1.1. Aims</h4>\n" +
    "			<p>{{project.current.item.aims}}</p>\n" +
    "			<br>\n" +
    "			<h4>1.2. Outcomes</h4>\n" +
    "			<p>{{project.current.item.outcomes}}</p>\n" +
    "\n" +
    "			<h3>2. Method</h3>\n" +
    "			<hr>\n" +
    "			<h4>2.1. Method Type</h4>\n" +
    "			<p>{{project.current.item.methodtype}}</p>\n" +
    "			<br>	\n" +
    "			<h4>2.2. Population</h4>\n" +
    "			<p>{{project.current.item.population}}</p>\n" +
    "\n" +
    "			<h4>2.3. Population Size</h4>\n" +
    "			<p>{{project.current.item.populationsize}}</p>\n" +
    "			<br>\n" +
    "			<h4>2.4. Data Collection Start</h4>\n" +
    "			<p>{{project.current.item.datastart}}</p>\n" +
    "			<br>\n" +
    "			<h4>2.5. Data Collection End</h4>\n" +
    "			<p>{{project.current.item.dataend}}</p>\n" +
    "\n" +
    "			<br/>\n" +
    "			<br/>\n" +
    "			<small>Proposed start date: {{project.current.item.startdate}}</small>\n" +
    "			<small>Audit Lead: {{project.current.item.user.name}}</small>\n" +
    "\n" +
    "		</div>\n" +
    "	</div>\n" +
    "</div>\n" +
    "<div class=\"col-md-3\">\n" +
    "	<div class=\"panel panel-default\">\n" +
    "		<div class=\"panel-heading\">Comments</div>\n" +
    "		<div class=\"panel-body\" ng-hide=\"comments.length > 0\">No comments at the moment.</div>\n" +
    "		<ul class=\"item-list list-group\">\n" +
    "				<li \n" +
    "					ng-repeat=\"comment in comments\"\n" +
    "					class=\"list-group-item comments\">\n" +
    "						<span><img alt=\"\" ng-src=\"assets/images/user{{comment.user.ID}}.jpeg\"></span></span> {{comment.message}}\n" +
    "				</li>\n" +
    "			</ul>\n" +
    "		<div class=\"panel-footer\">\n" +
    "			<div class=\"input-group\">\n" +
    "		      <input type=\"text\" class=\"form-control\" ng-model=\"message\">\n" +
    "		      <span class=\"input-group-btn\">\n" +
    "		      	<button type=\"button\" class=\"btn btn-primary\" ng-click=\"addComment(message); message = '';\" ng-disabled=\"!message.length\">Add comment</button>\n" +
    "		      </span>\n" +
    "		    </div><!-- /input-group -->\n" +
    "		</div>\n" +
    "	</div>\n" +
    "</div>");
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
    "				ng-click=\"goToItem(item)\"\n" +
    "				ng-repeat=\"item in projects | filter: filter.query\"\n" +
    "				class=\"list-group-item\">\n" +
    "					<span ng-if=\"item.title\">{{item.title}}</span>\n" +
    "			</li>\n" +
    "		</ul>\n" +
    "	</div>\n" +
    "</div>\n" +
    "\n" +
    "\n" +
    "");
}]);
