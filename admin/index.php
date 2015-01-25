<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

if($_POST["txtUserName"]!='')
{
	
	$username	=	$_POST['txtUserName'];
	$password		=	$_POST['txtPassword'];
	accountLogin($username, $password);
}

?>

<div class="outer">
 <div id="mainarea">
 <div id="mainarea">
<div class="dot2"></div>
<div id="main" align="center" style="padding-top:150px">
<?php include "header.php";     ?>
<style>
.rowHead
{
        font-family:Arial, Helvetica, sans-serif;
        font-size:13px;
        font-weight:bold;
        background-color:#CCCCCC;
        height:30px;
}
.active
{
        font-weight:bold;
        background-color:#6699CC;
}
</style>
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
							<td><font color="Gray"> Username :</font></td>
							
							<td><input type="text" id="txtUserName" class="inputusername" name="txtUserName"/></td>
						</tr>
						<tr>
							<td> <font color="Gray"> Password :</font></td>
							<td><input type="password" id="txtPassword" class="inputpassword" name="txtPassword"/></td>
						</tr>
						<tr>
							<td>
							</td>
							<td style="text-align: left;">
							<input type="submit" class="loginButton" value="Submit" id="btnLogin" name="btnLogin"/>
							</td>
						</tr>
						<tr><td></td>
					</tbody></table>
					</form>
				</td>
			</tr>
		</tbody></table>
		<div style="background:#9aba4b;font-size: 10px;color:#9aba4b">_</div>
		  
	</div>
</div>
</body>
</html>
