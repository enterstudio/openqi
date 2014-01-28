

/* project */

angular.module('openqi.project', [
    'ui.router'
])
    .config(function config($stateProvider) {
        $stateProvider.state('project', {
            url: '/project',
            views: {
                'main': {
                    controller: 'ProjectCtrl',
                    templateUrl: 'project/project.tpl.html'
                }
            },
            data: {pageTitle: 'Projects'}
        }).state('project.item', {
            url: '/project/item',
            views: {
                'main@': {
                    controller: 'ProjectCtrl',
                    templateUrl: 'project/project.item.tpl.html'
                }
            }
        });
    })

    .controller('ProjectCtrl', function ProjectController($scope, $state, $q, API, CombineFactory) {

        // check login
        $scope.$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams) {
            if (!$scope.authentication.loggedIn) {
                $state.go('login');
            }
            else {
                // get all projects
                var projects = API.get({type: 'project'});
                $q.all(projects).then(function(data) {
                    $scope.projects = CombineFactory.projects(data);
                });
            }
        });



        $scope.addComment = function(message) {
            var comment = {
                'message': message,
                'user': {
                    'ID': $scope.authentication.user.ID
                }
            };
            $scope.comments.push(comment);
        };
    })

    ;