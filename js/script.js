var myApp=angular.module("myApp",['angularUtils.directives.dirPagination']);

myApp.controller("myController",function($scope,$http){
	
    $scope.clickedUser={};
    
    ReadIt(); // load all information first
                                                                                                                                                                                                                                                
    function ReadIt() {
        $http.get("php/ReadIt.php")
        .then(function successCallback(response) {
          // Store response data
            $scope.users = response.data;
            }),function errorCallback(response) {
            console.log(response);
        };
    }
    //dropdown values of edit modal
    $http({
       method: 'get',
       url: 'php/dropmenu.php'
     }).then(function successCallback(response) {
       // Store response data
         $scope.names = response.data;
     });

     //when Add new button                                                                                                                 
     $scope.getinsert=function(){
     //get all info page
     window.location = "index.php";
     }

    $scope.selectUser=function(user){
    	console.log(user);
    	$scope.clickedUser=user;
    };

     $scope.DeleteIt = function(item) {
        $http.post("php/DeleteIt.php", { id: item }).
        then(function successCallback(response) {
            ReadIt(); //refresh all information
        }),function errorCallback(response) {
            console.log(response);
        };
    }
   
    //when click save button after editting
    $scope.UpdateIt=function(id,name,email,mblno,sub_name){
    console.log($scope.clickedUser);  
    console.log("sub_name"+sub_name);
     $http.post("php/UpdateIt.php",
      { id: id, 
        name: name,
        email: email,
        mblno: mblno,
        sub_name: sub_name,
      }).then(function successCallback(response) {
       // Store response data
         ReadIt();
            console.log(response);
     }),function errorCallback(response) {
            console.log(response);
        };
}

  //when click delete button
    $scope.deleteUser=function(){
    	$scope.users.splice($scope.users.indexOf($scope.clickedUser),1);//splice method return removed item

    };

    //for search box
    $scope.fetchData=function(){
         $http({
          method:"POST",
          url:"php/fetch.php",
          data:{search_query:$scope.search_query}
         }).then(function successCallback(response){
            $scope.users=response.data;
         });
    }

});
