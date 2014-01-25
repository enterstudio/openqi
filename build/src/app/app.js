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
    
    /* app specific */
    

])

    .config(function myAppConfig($stateProvider, $urlRouterProvider, $locationProvider, growlProvider, $httpProvider) {
        
        // $urlRouter
        $urlRouterProvider.otherwise('/'); // default page
        //$locationProvider.html5Mode(true);
        
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
        
    })

    ;