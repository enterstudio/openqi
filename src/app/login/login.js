

/* login --- FOR DEMO PURPOSES -- NOT SECURE (at all) */

angular.module('openqi.login', [
    'ui.router'
])
    .config(function config($stateProvider) {
        $stateProvider.state('login', {
            url: '/login',
            views: {
                'main': {
                    controller: 'LoginCtrl',
                    templateUrl: 'login/login.tpl.html'
                }
            },
            data: {pageTitle: 'Login'}
        });
    })

    .controller('LoginCtrl', function LoginController($scope, $state, $q, API) {

		// get all users
        var users = API.get({type: 'user'});
        $q.all(users).then(function(data) {
            $scope.users = data;
        });

        // login button
        $scope.login = function(email, password) {
            if (angular.isDefined(email) && angular.isDefined(password)) {
                angular.forEach($scope.users, function(user){
                    if (user.email == email && user.password == password) {
                        $scope.authentication.loggedIn = true;
                        $scope.authentication.user = user;
                    }
                });

                if ($scope.authentication.loggedIn) {
                    $state.go('dashboard');
                }
                else {
                    $scope.authentication.prompt = true;
                }
            }
            else {
                $scope.authentication.prompt = true;
            }
        };


    })

    ;