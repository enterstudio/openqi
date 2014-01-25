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
    'openqi.dashboard',
    'openqi.project'

])

    .config(function myAppConfig($stateProvider, $urlRouterProvider, $locationProvider, growlProvider, $httpProvider) {
        
        // $urlRouter
        $urlRouterProvider.otherwise('/dashboard'); // default page
        
        // growl
        growlProvider.globalTimeToLive(5000);
    })

    .controller('AppCtrl', function AppCtrl($scope) {
        
        // handle page title
        $scope.$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams) {
            
            // main title
            if (angular.isDefined(toState.data.pageTitle)) {
                $scope.pageTitle = toState.data.pageTitle;
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
        
    })

    ;