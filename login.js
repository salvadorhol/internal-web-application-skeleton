'use strick';

angular.module('loginApp', [
	'ngRoute'
])
.config(['$routeProvider', '$logProvider', function($routeProvider, $logProvider){
	$logProvider.debugEnabled(true);

	$routeProvider
		.when('/', {
			templateUrl: 'temps/lander/login.html',
			controller: 'LoginController'
		})

		.when('/register', {
			templateUrl: 'temps/lander/register.html',
			controller: 'RegisterController'
		})

		$routeProvider.otherwise({redirectTo: '/register'})
}])
.controller('LoginController', ['$scope', '$http', '$log', '$location', function($scope, $http, $log, $location){
	
	//disable form default submit (refreshing)
	$scope.connect = function(){
		$log.debug("logining in");

			$('#login').submit(function(){
		return false;
	})

		$http.post('core/engine.php?method=route', {class:"Login", function:"login", data: $scope.user})
			.success(function(data){
				$scope.result = data;
				
				//we are logged in if
				if(data == '"Successfully logged in!"'){
					window.location.href = "index.php"
				}
			})
	}

}])
.controller('RegisterController', ['$scope', '$http', '$location', '$log', function($scope, $http, $location, $log){
	
	$scope.reg = function(){
		$log.debug("reg");
		$http.post('/core/engine.php?method=route', {class:"Register", function:"register", data: $scope.user})
			.success(function(data){
				$log.debug("Result:" + data);

				if(data == '"duplicate"') $scope.result = "Account already exist. Did you forget your password?";
				else if(data == 0) $scope.result ="Registered. Return to login.";
			})
	}
}])
