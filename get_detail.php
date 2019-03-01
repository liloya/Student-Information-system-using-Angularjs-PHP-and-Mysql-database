<!DOCTYPE html>
<html>
<head>
  <title>students detail information</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.minn.css">
  <link rel="stylesheet" type="text/css" href="css/get_detail.css">
  <script src="js/angular.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <script src="css/sweetalert.css"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/dirPagination.js"></script>
</head>
<body ng-app="myApp" ng-controller="myController">
<div class="container">
<hr>
    <button type="button" ng-click="getinsert()" class=" btn btn-info btn-lg pull-right">Add New</button>
    <h2>All Students Information</h2>
    <span class="clearfix"></span>
    <!--A clearfix is a way for an element to automatically clear its child elements, so that you don't need to add additional markup. It's generally used in float layouts where elements are floated to be stacked horizontally. The clearfix is a way to combat(juddho) the zero-height container problem for floated elements.-->
    <hr>
    <!--create table-->
    <!--search box-->
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon">Search</span>
        <!-- The .input-group-addon class attaches an icon or help text next to the input field-->
        <input type="text" name="search_query" ng-model="search_query"
        placeholder="search by Students details" ng-keyup="fetchData()" class="form-control" />
        <!--The "ng-keyup" directive tells AngularJS what to do when the keyboard is used on the specific HTML element.-->
      </div>
      
    </div>

    <table class="table table-striped table-bordered">
      <thead>
        <th>SL.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Subject</th>
        <th>Action</th>
      </thead>
      <tbody ng-init="ReadIt();">
        <tr dir-paginate="user in users|itemsPerPage:10">
          <td>{{user.id}}</td>
          <td>{{user.name}}</td>
          <td>{{user.email}}</td>
          <td>{{user.mblno}}</td>
          <td>{{user.sub_name}}</td>
          <td>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myEditModal" ng-click="selectUser(user)">Edit</button>
          
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myDeleteModal" ng-click="DeleteIt(user.id);">Delete</button>
          </td>
        </tr>
      </tbody>
      
    </table>
    <div align="right">
    <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true" >
    </dir-pagination-controls>
   </div>

  </div>
  
<!--edit modal-->

<div class="modal fade" id="myEditModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">update information</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" name="myForm" role="form">
             <div class="form-group">
               <label class="control-label col-sm-2" for="name">Name</label>
               <div class="col-sm-10">
                 <input type="text" ng-model="clickedUser.name" class="form-control" id="name" placeholder="Enter Name">
               </div>
             </div>
              <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email</label>
              <div class="col-sm-10"> 
                 <input type="email" ng-model="clickedUser.email" class="form-control" id="email" placeholder="Enter email"
                 name="email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/">
              </div>
            </div>
           <p style="color:red;" 
            ng-show="myForm.email.$error.pattern||myForm.email.required
             ">please enter a valid emial address</p>

             <div class="form-group">
               <label class="control-label col-sm-2" for="mblno">Contact</label>
               <div class="col-sm-10">
                 <input type="text" ng-model="clickedUser.mblno" class="form-control" id="mblno" placeholder="Enter phone number">
               </div>
             </div>
             <div class="form-group">
               <label class="control-label col-sm-2" for="mblno">Subject</label>
               <div class="col-sm-10">
                 <select class="form-control dropdn" name="dropvalue" ng-model="clickedUser.sub_name">
                  <option value="" hidden>{{clickedUser.sub_name}}
                  </option>
                  <!--dropdown value fetch from database-->
                  <option value="{{dropvalue.sub_name}}" ng-repeat="dropvalue in names">{{dropvalue.sub_name}}</option>>

                </select>
               </div>
             </div>                   
             <div class="form-group"> 
              <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" ng-click="UpdateIt(clickedUser.id,clickedUser.name,clickedUser.email,clickedUser.mblno,clickedUser.sub_name);" class="btn btn-default" data-dismiss="modal">Save</button>
              </div>
             </div>
           </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!--delete modal-->

  <div class="modal fade" id="myDeleteModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you sure?</h4>
        </div>
        <div class="modal-body">
          <strong style="color: red;">
            you are going to delete. All information...
          </strong>
        </div>
        <div class="modal-footer">
          <button type="button" ng-click="deleteUser()" class="btn btn-default" data-dismiss="modal">Yes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
      
    </div>
  </div>

</body>
</html>
