<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

$id = $_GET['q'];
$result = mysql_real_escape_string($id);

$query = "SELECT CID, CNAME FROM CMASTER WHERE CNAME='$result'";
$resList = mysql_query($query) or die(mysql_error());
$totalList = mysql_num_rows($resList);

if($totalList > 0)
{
while($rowList=mysql_fetch_assoc($resList))
	{
echo $rowList['CID'] ;
 	}
}
?>
