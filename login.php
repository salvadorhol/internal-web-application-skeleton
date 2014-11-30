<?php 
include_once("core/session.php");

//if session already existing, then redirect to index.php
if(isset($_SESSION['email'])) header('Location: index.php#/');

?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" ng-app="myApp" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" ng-app="myApp" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" ng-app="myApp" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" ng-app="loginApp" class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Application Name</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="lib/mycss/default.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body class="primary">
  <div class="container">
    <div class="header">
      <h3 class="text-muted">Application Name</h3>
    </div>
    <hr>
    <div class="jumbotron" style="max-width: 458px; margin: 0 auto 0 auto">
      <div ng-view></div>
    </div>
  </div>

<script src="lib/js/jquery.min.js"></script> 
<script src="lib/bootstrap/js/bootstrap.min.js"></script>

<!--angulars-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular-animate.js"></script>
<script src="lib/js/angularui.min.js"></script>
<script src="https://code.angularjs.org/1.2.25/angular-route.min.js"></script>
<script src="login.js"></script>
</body>
</html>
