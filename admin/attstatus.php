<?php
include_once($_SERVER['DOCUMENT_ROOT']."Attend/includes/config.php");

$studentid = $_GET['studentid'];
$status = $_GET['status'];
	// Escape User Input to help prevent SQL Injection
$studentid = mysql_real_escape_string($studentid);
$status = mysql_real_escape_string($status);
	//build query
$query = "INSERT INTO Attendance (studentid, date, status) VALUES ('$studentid','15','$status') ON DUPLICATE KEY UPDATE status = '$status'";
	//Execute query
$qry_result = mysql_query($query) or die(mysql_error());

echo "$status Marked";
?>
