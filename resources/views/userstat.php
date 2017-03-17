<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
 
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <!-- Place inside the <head> of your HTML -->
 
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
 
 });
</script>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
 
</head>
<body>
 <script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
    $http.get("http://localhost/laravel-lecture/public/userstat")
    .then(function(response) {
	 $scope.go = function() {
        $scope.userStat = response.data;
		 document.getElementById('data2').style.display ="none";
		 document.getElementById('data1').style.display ="block";
		}
		  
    });
	$http.get("http://localhost/laravel-lecture/public/userstat2")
    .then(function(response) {
	 $scope.go2 = function() {
        $scope.userStat2 = response.data;
		 document.getElementById('data1').style.display ="none";
		 document.getElementById('data2').style.display ="block";
		}	 

    });
	 $http.get("http://localhost/laravel-lecture/public/userstat")
    .then(function(response) {
	 $scope.show = function() {
        $scope.userStat2 = response.data;
		 document.getElementById('data1').style.display ="block";
		 document.getElementById('data2').style.display ="block";
		}	 

    });
});

</script>
<?php $strss = "dddd"; ?>
 
<div id="datacont" ng-app="myApp" ng-controller="myCtrl"> 
<?php
$str = <<<'DATA'

   DATA 1: {{userStat}} 
   

DATA
;
?>
<?php
$str2 = <<<'DATA'

   DATA 2: {{userStat2}}

DATA
;
?>
 <p id="data1" style="color: red;"> <?php echo $str; ?></p>
 <p  id="data2" style="color: red;"> <?php echo $str2; ?></p>
<button  id="ss" ng-click="go()">Video Playtime</button>
<button  id="dd" ng-click="go2()">Lesson Time</button>
 <button  id="dd" ng-click="show()">SHOW ALL</button>
</div>

  
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
