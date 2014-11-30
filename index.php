<?php
include_once("core/session.php");

//if $_SESSION email not found, then user never logged in, redirect them to login.php
if(!isset($_SESSION['email'])) header('Location: login.php#/');

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" ng-app="myApp" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" ng-app="myApp" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" ng-app="myApp" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" ng-app="myApp" class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Application Title</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="lib/mycss/default.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
  <!--top-nav-->
  <nav class="navbar navbar-default banner" role="navigation" style="margin-bottom: 0px">
    <div class="container-fluid">
      <div class="navbar-header">
        <div class="container">
          <h1>Application Name</h1>
        </div>
      </div>
    </div>
  </nav>
  <!--nav-->
  <nav class="navbar navbar-inverse banner" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collpsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="collapse navbar-collapse" ng-controller="NavController">
      <ul class="nav navbar-nav">
        <li><a href="#">Home</a></li>
        <li><a href="#example">Example</a></li>
        <li><a href="#about">About</a></li>
      </ul>
      <div class="navbar-form navbar-right">
        <?php echo $_SESSION['email']; ?>
        <a style="cursor: pointer; cursor: hand;" ng-click="logout()"><span class="glyphicon glyphicon-user"></span> Logout</a>
      </div>
    </div>
  </nav>

  <!-- <div class="row s-nav" style="margin-bottom: 10px">
    <div class="col-sm-2 s-clickable">
      <center><span class="glyphicon glyphicon-home"></span><br><a href="#home">Home</a></center>
    </div>
    <div class="col-sm-2 s-clickable">
      <center><span class="glyphicon glyphicon-signal"></span><br>Stats</center>
    </div>
  </div>
 -->
  <div class="container">
    <!--page swapping and shit-->
    <div ng-view></div>
  </div>


<script src="lib/js/jquery.min.js"></script> 
<script src="lib/bootstrap/js/bootstrap.min.js"></script>

<!--angulars-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular-animate.js"></script>
<script src="lib/js/angularui.min.js"></script>
<script src="https://code.angularjs.org/1.2.25/angular-route.min.js"></script>
<script src="app.js"></script>
</body>
</html>
