

/*------------------------------------*\
   OpenQI API
\*------------------------------------*/

angular.module('api.openqi', [
    'ngResource'
])

	.factory('API', function ($resource, $q, ErrorHandlingFactory) {
		var API = $resource('http://api.openqi/api/:type/:user/:userID/:ID', 
			{type: '@type', userID: '@userID', ID: '@ID', user: '@user'},
			{
				'get': {method: 'GET'},
				'add': {method: 'POST'},
				'update': {method: 'PUT'},
				'delete': {method: 'DELETE'}
			}
		);

		return {
			get: function(properties) {
				var deferred = $q.defer();
				API.get({}, properties, 
					function success (value, responseHeader) {
						if (angular.isDefined(value.response) && angular.isDefined(value.response.status)) {
							if (value.response.status != 'OK') {
								ErrorHandlingFactory.soft(value);
							} 
							else {
								deferred.resolve(value.response.data);
							}
						}
						else {
							ErrorHandlingFactory.hard(value.response);
							deferred.reject(value.response);
						}
					},
					function error (httpResponse) {
						ErrorHandlingFactory.hard(httpResponse);
						deferred.reject(httpResponse);
					}
				);
				return deferred.promise;
			},
			add: function(properties, obj) {
			},
			update: function(properties) {
			},
			delete: function(properties) {
			}
		};
	})

	.factory('ErrorHandlingFactory', function(growl) {
		var databaseMessage = 'There has been a problem contacting the database. Please refresh and try again. If this problem continues, please contact support.';

		return {
			hard: function(reason) {
				console.error('api.inteiro error: ', reason);
				growl.addErrorMessage(databaseMessage, {ttl: 10000});
			},
			soft: function(value) {
				console.debug('api.inteiro soft error: ', value.response.status, value.response.message);
				growl.addErrorMessage(databaseMessage, {ttl: 10000});		
			}
		};
	})

	;