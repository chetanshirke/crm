<?php

error_reporting(0);

$dbHost = "localhost";  //database host name
$dbName = "attendance"; //database name
$dbUser = ""; //database name
$dbPass = ""; //database access password for above user


$dbHost = "localhost";  //database host name
$dbName = "attendance"; //database name
$dbUser = "root"; //database name
$dbPass = ""; //database access password for above user

$urlpath="http://".$_SERVER['HTTP_HOST']."/Attend/";

$rootpath=$_SERVER['DOCUMENT_ROOT']."Attend/";

require_once($rootpath."classes/db.class.php");

$db = new Database();

require_once($rootpath."includes/functions.php");


?>