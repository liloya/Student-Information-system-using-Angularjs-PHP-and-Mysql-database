<!DOCTYPE html>
<html>
<head>
	<title>Student Information Management System</title>
	<!--css links-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/angular.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/sweetalert.min.js"></script>
	<script src="css/sweetalert.css"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ang.js"></script>
</head>
<body ng-app="myApp" ng-controller="myController">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset=md-1">
				<div class="row">
					<!--left part-->
					<div class="col-md-5 form-left">
						<img src="img/arrow.png" class="invert">
						<h3>Welcome!</h3>
						<p>All Students Information</p>
						<button type="button" ng-click="allinfo()" class="btn btn-primary">Get All Info</button>
					</div>
					<!--right part-->

					<div class="col-md-7 form-right">
						
						<h2>Add Details</h2>
					<form name="myForm" novalidate>
						<div class="insert-form" >
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter name" ng-pattern="/^[a-zA-Z]*$/" name="nam" ng-model="nam" required>
								<span style="color: red;" ng-show="myForm.nam.$dirty&&myForm.nam.$invalid">
					                <span style="color:red;" ng-show="myForm.nam.$error.required"><p>Name is required</p></span>
				                </span>
							</div>
							<p style="color: red;" ng-show="myForm.nam.$error.pattern||myForm.nam.required">please enter a valid name</p>
							<div class="form-group">
								<input type="email" name="email" ng-model="email" class="form-control" placeholder="Enter email" ng-pattern="/^\w.+@[a-z_-]+?\.[a-z]{2,3}$/" required >
								<span style="color:red;" ng-show="myForm.email.$dirty&&myForm.email.$invalid">
					               <span style="color: red;" ng-show="myForm.email.$error.required">
						           <p>Email is required</p>
					               </span>
				                </span>
							</div>
							<p style="color:red;" ng-show="myForm.email.$error.pattern||myForm.email.required
			                ">please enter a valid email address</p>
							<div class="form-group">
								<input type="phone number" ng-pattern="/^[0-9]*$/" name="mblno" ng-model="mblno" class="form-control" placeholder="Enter contact" required>
								<span style="color: red;" ng-show="myForm.mblno.$dirty&&myForm.mblno.$invalid">
					                <span style="color: red;" ng-show="myForm.mblno.$error.required"><p>phone number is required</p></span>
				                </span>
							</div>
							<p style="color: red;" ng-show="myForm.mblno.required||myForm.mblno.$error.pattern">please enter only digit</p>
							<div class="form-group">
								<select class="form-control dropdn" name="dropvalue" ng-model="dropvalue">
									<option value="" hidden>Choose your subject
									</option>
									<!--dropdown value fetch from database-->
									<option value="{{dropvalue.sub_name}}" ng-repeat="dropvalue in names">{{dropvalue.sub_name}}</option>>

								</select>
							</div>
							<input type="submit" value="Submit" name="submit" class="btn btn-primary" ng-disabled="myForm.$pristine" ng-click="submit()">
						</div>
					</form>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>

</body>
</html>

