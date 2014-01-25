

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
        });
    })

    .controller('ProjectCtrl', function ProjectController($scope, $state, $q, API) {

        // get all projects
        var projects = API.get({type: 'project'});
        $q.all(projects).then(function(data) {
            $scope.projects = data;
        });

    })

    ;