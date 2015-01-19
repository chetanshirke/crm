<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

$status = $_GET['status'];
$status = mysql_real_escape_string($status);

$query = "SELECT CID, CNAME FROM CMASTER WHERE CNAME='$status'";
$resList = mysql_query($query) or die(mysql_error());
$totalList = mysql_num_rows($resList);

if($totalList > 0)
{
while($rowList=mysql_fetch_assoc($resList))
	{
echo "'".$rowList['CNAME']."'"." Selected" ;
 	}
}
?>
