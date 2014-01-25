

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

    .controller('DashboardCtrl', function DashboardController($scope, $state, $q, API) {



    })

    ;