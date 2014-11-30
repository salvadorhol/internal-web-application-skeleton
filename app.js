'use strict';

angular.module('myApp', [
	'ngRoute',
	'ui.bootstrap'
])
.run(['$rootScope', '$log', '$http', function($rootScope, $log, $http){
	$log.debug("Hello");

	$http.post('core/engine.php?method=route', {class:'Login', function:'getSession', data: null})
		.success(function(data){
			$log.debug(data);
			$rootScope.user = data;
		})

}])

.config(['$routeProvider', '$logProvider', function($routeProvider, $logProvider){
	$logProvider.debugEnabled(true);

	$routeProvider
		.when('/home', {
			templateUrl: 'temps/main.html',
			controller: 'HomeController'
		})

		.when('/example', {
			templateUrl: 'temps/dummyReport/example.html',
			controller: 'ExampleController'
		})

		$routeProvider.otherwise({redirectTo: '/home'})
}])

//this is use for any controlling you need to do in the nav bar
.controller('NavController', ['$scope', '$http', '$log', function($scope, $http, $log){
	$log.debug('nav loaded');

	$scope.logout = function(){
		$http.post('core/engine.php?method=route', {class:'Login', function:'Logout', data: null})
			.success(function(data){
				$log.debug(data);
				window.location.replace("login.php");
			})
	}
}])

.controller('HomeController', ['$scope', '$log', function($scope, $log){
	$log.debug('HomeController');

}])

.controller('ExampleController', ['$scope', '$rootScope', '$log', function($scope, $rootScope, $log){
	$log.debug('DummyReport');

	//make sure to do this to get user session from php to javascript
	$scope.user = $rootScope.user;

	//we should always check the user

}])