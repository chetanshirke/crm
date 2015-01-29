<?php

error_reporting(0);

$dbHost = "localhost";  //database host name
$dbName = "seips-intranet"; //database name
$dbUser = "root"; //database name
$dbPass = "redalert"; //database access password for above user



$urlpath="http://".$_SERVER['HTTP_HOST']."";

$rootpath=$_SERVER['DOCUMENT_ROOT']."/";

require_once($rootpath."classes/db.class.php");

$db = new Database();

require_once($rootpath."includes/functions.php");

?>
