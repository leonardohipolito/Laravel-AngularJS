/**
* app Module
*
* Description
*/
angular.module('app', ['ngRoute','angular-oauth2','ngMessages'])
.config(['$routeProvider','OAuthProvider', function ($routeProvider,OAuthProvider) {
	OAuthProvider.configure({
		baseUrl:'http://192.168.1.110:8000',
		clientId:'app',
		clientSecret:'app',
		grantPath: '/oauth/access_token',
		options: {
        	secure: false
    	}
	});
	$routeProvider.when('/login',{
		templateUrl:'build/views/login.html',
		controller: 'LoginCtrl'
	})
	.when('/home',{
		templateUrl:'build/views/login.html',
		controller: 'HomeController'
	});
}])
.controller('LoginCtrl', ['$scope','$location','OAuth', function ($scope,$location,OAuth,$) {
	console.log('teste');
	$scope.user = {
		username:'',
		password:''
	};
	$scope.login = function(){
		console.log($scope.user);
		console.log(OAuth.isAuthenticated());
		OAuth.getAccessToken($scope.user).then(function(){
			$location.path('home');
		},function(){
			alert('login invalaido');
		});
	};
}])
.run(['$rootScope', '$window', 'OAuth', function($rootScope, $window, OAuth) {
    $rootScope.$on('oauth:error', function(event, rejection) {
      // Ignore `invalid_grant` error - should be catched on `LoginController`.
      if ('invalid_grant' === rejection.data.error) {
        return;
      }

      // Refresh token when a `invalid_token` error occurs.
      if ('invalid_token' === rejection.data.error) {
        return OAuth.getRefreshToken();
      }

      // Redirect to `/login` with the `error_reason`.
      console.log(rejection.data.error);
      // return $window.location.href = '/login?error_reason=' + rejection.data.error;
    });
  }]);