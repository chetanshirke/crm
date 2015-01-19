<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

$adate = date("Y-m-d");
$studentid = $_GET['studentid'];
$status = $_GET['status'];
	// Escape User Input to help prevent SQL Injection
$studentid = mysql_real_escape_string($studentid);
$status = mysql_real_escape_string($status);
	//build query


$query = "SELECT * FROM SATT WHERE DTIME = '$adate' and SID = '$studentid'";
$qry_result = mysql_query($query) or die(mysql_error());

if(mysql_num_rows($qry_result))
{
	$query = "UPDATE SATT SET DTIME = '$adate', STATUS = '$status' WHERE SID = '$studentid' and DTIME = '$adate'";
	$qry_result = mysql_query($query) or die(mysql_error());
	echo "$status Updated";
        }
        else
        {
	$query = "INSERT INTO SATT ( SID, DTIME, STATUS ) VALUES ('$studentid','$adate','$status')";
	$qry_result = mysql_query($query) or die(mysql_error());
	echo "$status Marked";
}
?>
