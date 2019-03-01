
var app = angular.module('myApp', []);

app.controller('myController', ['$scope', '$http', function ($scope, $http) {
 $http({
  method: 'get',
  url: 'php/dropmenu.php'
 }).then(function successCallback(response) {
  // Store response data
  $scope.names = response.data;
 });

$scope.submit=function(){

	//console.log('Dropvalue'+$scope.dropvalue);
	$http.post(
		"php/insert.php",
		{'name':$scope.nam,
		 'email':$scope.email,
		 'mblno':$scope.mblno,
		 'sub_name':$scope.dropvalue,
		}).then(function successCallback(response){
			sweetAlert("Data Complete","Insert Complete Form","success");
			console.log(response);
		})
		,function errorCallback(response){
			sweetAlert("OOPs!","Something went wrong","error");
			console.log(response);
		};
}

$scope.allinfo=function(){
	//get all info page
	//link php file
	window.location = "get_detail.php";
 }

}]);

