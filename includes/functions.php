<?php

function accountLogin($username, $password)
{
	$sql = "SELECT uid, name, username, password, is_admin FROM useradmin WHERE username='$username' AND password='$password'";
	$resultLogin 	= mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($resultLogin))
	{
		$rsLogin	= mysql_fetch_assoc($resultLogin);
		$today=date('Y-m-d');
		
		$accountuserid		= $rsLogin['uid'];
		$accountusername	= $rsLogin['name'];
		if($rsLogin['is_admin']==1)
		header("Location:teacherListing.php");
		else
		header("Location:studentListing.php?tid=".$accountuserid);
		exit;
	}
	else
	{
		$errMsg	= "Please enter correct Login and Password.<br> Both Login and Password are case sensitive !!!";
		header("admin/index.php?err");
		exit;
	}
	
}
?>