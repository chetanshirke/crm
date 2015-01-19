<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

if($_POST["txtUserName"]!='')
{
	
	$username	=	$_POST['txtUserName'];
	$password		=	$_POST['txtPassword'];
	accountLogin($username, $password);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Marketing Business</title>
<link href="../style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="outer">
        <?php include "../header.php"; ?>
        <div id="mainarea">
        <div id="mainarea">
                <?php include "../leftmenu.php"; ?>
                <div id="right-nav">
<div class="heading">Welcome to our website!</div>
	<div class="dot2"></div>
	<div id="main" align="center" style="padding-top:150px">
	<table class="login">
		<tr>
			<td style="height: 10px;"/>
		</tr>
			<tr>
				<td align="center">
					<form action="" id="frmLogin" name="frmLogin" method="post">
					<input type="hidden" value="set" name="hide"/>
					<table class="login-tab">
						
						<tbody><tr>
							<td>Username :</td>
							
							<td><input type="text" id="txtUserName" class="inputusername" name="txtUserName"/></td>
						</tr>
						<tr>
							<td>Password :</td>
							<td><input type="password" id="txtPassword" class="inputpassword" name="txtPassword"/></td>
						</tr>
						<tr>
							<td>
							</td>
							
							<td style="text-align: left;">
							<input type="submit" class="loginButton" value="" id="btnLogin" name="btnLogin"/>

							
							</td>
						</tr>
					</tbody></table>
					</form>
				</td>
			</tr>
		</tbody></table>
		  
	</div>
</div>
</body>
</html>
