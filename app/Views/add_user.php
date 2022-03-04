<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter 4 Add User With Validation Demo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <style>
    .container {
      max-width: 500px;
    }
    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>
<body>
  <div class="container mt-5" ng-app="myapp" ng-controller="formcontroller">
    <form method="post" id="add_create" name="add_create" ng-submit="insertData()">
    <!--<form method="post" id="add_create" name="add_create" action="<?php /*site_url('/submit-form')*/ ?>">-->
      <label class="text-success" ng-show="successInsert">{{successInsert}}</label>
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" ng-model="insert.name" >
        <span class="text-danger" ng-show="errorName">{{errorName}}</span>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" ng-model="insert.email">
        <span class="text-danger" ng-show="errorEmail">{{errorEmail}}</span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Update Data</button>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    var application = angular.module("myapp", []);
      application.controller("formcontroller", function($scope, $http){
      $scope.insert = {};
      $scope.insertData = function(){
        $http({
        method:"POST",
        url:"/submit-form",
        data:$scope.insert,
        headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
        }).success(function(data){
        if(data.error)
        {
          $scope.errorName = data.error.name;
          $scope.errorEmail = data.error.email;
          $scope.successInsert = null;
        }
        else
        {
          $scope.insert = null;
          $scope.errorName = null;
          $scope.errorEmail = null;
          $scope.successInsert = data.message;
        }
        });
      }
      });
    /*if ($("#add_create").length > 0) {
      $("#add_create").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          email: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
        },
      })
    }*/
  </script>
</body>
</html>