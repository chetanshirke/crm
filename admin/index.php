<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

if($_POST["txtUserName"]!='')
{
	
	$username	=	$_POST['txtUserName'];
	$password		=	$_POST['txtPassword'];
	accountLogin($username, $password);
}

?>
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
							<td><font color="white"> Username :</font></td>
							
							<td><input type="text" id="txtUserName" class="inputusername" name="txtUserName"/></td>
						</tr>
						<tr>
							<td> <font color="white"> Password :</font></td>
							<td><input type="password" id="txtPassword" class="inputpassword" name="txtPassword"/></td>
						</tr>
						<tr>
							<td>
							</td>
							<td style="text-align: left;">
							<input type="submit" class="loginButton" value="Submit" id="btnLogin" name="btnLogin"/>
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
