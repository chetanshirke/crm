<?php

function accountLogin($username, $password)
{
	$sql = "SELECT EMPID, EMPNAME, is_admin FROM EMASTER WHERE EMPNAME='$username' AND EMPPASS='$password'";
	$resultLogin 	= mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($resultLogin))
	{
		$rsLogin	= mysql_fetch_assoc($resultLogin);
		$today=date('Y-m-d');
		
		$accountuserid		= $rsLogin['EMPID'];
		$accountusername	= $rsLogin['EMPNAME'];
		if($rsLogin['is_admin']==1)
		header("Location:adminpanel.php");
		else
		header("Location:studentListing.php?tid=".$accountuserid);
		exit;
	}
	else
	{
		$errMsg	= "Login Failed. Please enter correct Login and Password.";
                header("Location:index.php?err=".$errMsg);
		exit;
	}
	
}


function loginid($user)
{
	header("Location:addstudent.php?tid=".$user);
}

?>
