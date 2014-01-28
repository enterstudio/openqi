angular.module('openqi', [
    
    /* build system */
    'templates-app',
    'templates-common',

    /* main modules */
    'ui.router',
    'ui.route',

    /* angular modules */
    'ngAnimate',

    /* other modules */
    'angular-growl',
    'api.openqi',
    
    /* app specific */
    'openqi.login',
    'openqi.dashboard',
    'openqi.project'

])

    .config(function myAppConfig($stateProvider, $urlRouterProvider, $locationProvider, growlProvider, $httpProvider) {
        
        // $urlRouter
        $urlRouterProvider.otherwise('/dashboard'); // default page
        
        // growl
        growlProvider.globalTimeToLive(5000);
    })

    .controller('AppCtrl', function AppCtrl($scope, $state) {

        $scope.authentication = {
            'loggedIn': true,
            'prompt': false,
            'user': {
                'ID': 1,
                'area': {
                    'ID': 1
                }
            }
        };
        
        // handle page title
        $scope.$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams) {
            
            // main title
            if (angular.isDefined(toState.data.pageTitle)) {
                $scope.pageTitle = toState.data.pageTitle;
            }

            if ($scope.authentication.loggedIn && toState.name == 'login') {
                $state.go('dashboard');
            }

        });

        // main menu
        $scope.mainMenuItems = [
            {
                'name': 'Dashboard',
                'url': '/dashboard'
            },
            {
                'name': 'Projects',
                'url': '/project'
            }
        ];

        // account menu
        $scope.accountMenuItems = [
            {
                'name': 'Profile',
                'url': ''
            },
            {
                'name': 'My Drafts',
                'url': ''
            },
            {
                'name': 'My Projects',
                'url': ''
            }
        ];

        $scope.notifications = [
            {
                'name': 'added a comment to your project',
                'user': {
                    'ID': 2,
                    'name': 'Dr Jo Carter'
                }
            },
            {
                'name': 'viewed your project',
                'user': {
                    'ID': 3,
                    'name': 'Ron Seal'
                }
            },
            {
                'name': 'accepted your project',
                'user': {
                    'ID': 5,
                    'name': 'Dr Garth Speel'
                }
            }
        ];

        $scope.comments = [
        ];

        // project
        $scope.project = {
            'current': {
                'item': {}
            }
        };

        $scope.goToItem = function(item) {
            item.users = [{'ID': 4, 'name': 'Tester'}, {'ID': 3, 'name': 'Tester'}, {'ID': 2, 'name': 'Tester'}];
            $scope.project.current.item = item;

            console.debug(item);
            $state.go('project.item');
        };
    })
    
    .factory('CombineFactory', function() {
        return {
            projects: function(array) {
                var uniqueProjects = [];
                var uniqueItems = [];
                angular.forEach(array, function(item) {
                    angular.forEach(array, function(subItem) {
                        item.users = [];
                        if (subItem.ID == item.ID) {
                            item.users.push(subItem.user);
                        }
                    });
                    if (uniqueProjects.indexOf(item.ID) == -1) {
                        uniqueProjects.push(item.ID);
                        uniqueItems.push(item);
                    }
                });
                return uniqueItems;
            }
        };
    })
    ;