

/* dashboard */

angular.module('openqi.dashboard', [
    'ui.router'
])
    .config(function config($stateProvider) {
        $stateProvider.state('dashboard', {
            url: '/dashboard',
            views: {
                'main': {
                    controller: 'DashboardCtrl',
                    templateUrl: 'dashboard/dashboard.tpl.html'
                }
            },
            data: {pageTitle: 'Dashboard'}
        });
    })

    .controller('DashboardCtrl', function DashboardController($scope, $state, $q, API, CombineFactory) {

		// check login
		$scope.$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams) {
			if (!$scope.authentication.loggedIn) {
				$state.go('login');
			}
			else {
				// get all projects
				var myProjects = API.get({type: 'project', filter: 'user', filterID: $scope.authentication.user.ID});
				var localProjects = API.get({type: 'project', filter: 'area', filterID: $scope.authentication.user.area.ID});
				$q.all([myProjects, localProjects]).then(function(data) {
					$scope.myProjects = CombineFactory.projects(data[0]);
					$scope.localProjects = CombineFactory.projects(data[1]);
				});
			}
		});

    })

	;