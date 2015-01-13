<?php
include_once($_SERVER['DOCUMENT_ROOT']."Attend/includes/config.php");

if($_POST['btnSave']!='')
{
	$name = $_POST['txtname'];
	$classroom  = $_POST['txtclassroom'];
	$username = $_POST['txtusername'];
	$password = $_POST['txtpassword'];
	$dateadded = date("Y-m-d H:i:s");
	$sql = "INSERT INTO useradmin (name, username, password, classroom, datecreated) VALUES ('".$name."','".$username."','".$password."','".$classroom."','".$dateadded."')";
	mysql_query($sql);
}

$sqlList			=	"SELECT uid, name, username, classroom FROM useradmin WHERE is_admin!=1 ORDER BY name ASC";
$resList			=	mysql_query($sqlList) or die(mysql_error());
$totalList			= 	mysql_num_rows($resList);


?>
<?php include "header.php";   	?>  
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
<script language="javascript">
function submitCard(card)
{
	document.getElementById('txtCard').value = card;
	document.frmReport.submit();
}
</script>
<div id="menu">
	<ul>
		<li><a href="#" class="active"><b>Teacher Listing</b></a></li>
		<li><a href="index.php?logout"><b>Logout</b></a></li>
	</ul>
<div class="clr"></div>
</div>  
<div id="content" align="center">
<table width="980px" border="0" align="center" cellpadding="0" cellspacing="0" height="300px;" style="border:1px solid #999999;font-family:Courier;">
	<tr>
		<td height="10">&nbsp;</td>
 	</tr> 
	<tr>
		<td align="left" valign="top" height="30px" style="padding-left:10px;border-bottom:1px solid #999999;"><b><u>Welcome - Admin</u></b></td>
	</tr>
	<tr>
		<td align="left" valign="top">
			<table width="580px" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
				<tr>
					<td height="40" style="padding-left:10px;"><input type="button" name="btnAdd" id="btnAdd" value="Add New"></td>
				</tr>
				<tr>
					<td height="40" style="padding-left:10px;">
						<form name="frm" action="" method="post">
						<table width="580px" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #999999;padding:5px;display:">
							<tr>
								<td width="120px" style="height:30px">Name:</td>
								<td>
									<input type="text" name="txtname" id="txtname" value="" style="width:230px">
								</td>
							</tr>
							<tr>
								<td width="120px" style="height:30px">Class Room:</td>
								<td>
									<input type="text" name="txtclassroom" id="txtclassroom" value="" style="width:230px">
								</td>
							</tr>
							<tr>
								<td style="height:30px">User Name:</td>
								<td>
									<input type="text" name="txtusername" id="txtusername" value="" style="width:230px">
								</td>
							</tr>
							<tr>
								<td style="height:30px">Password:</td>
								<td>
									<input type="text" name="txtpassword" id="txtpassword" value="" style="width:230px">
								</td>
							</tr>
							<tr>
								<td></td>
								<td align="left" style="height:40px">
									<input type="submit" name="btnSave" id="btnSave" value="Save">
								</td>
							</tr>
						</table>
						</form>
					</td>
				</tr>
				<tr>
					<td height="20" align="right">&nbsp;</td>
				</tr>
				<tr>
					<td height="40" style="padding-left:10px;">
						<table width="680px" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
							<tr class="rowHead" style="border:1px solid #999999;">
								<td height="5" width="50px" align="center">Sr.No</td>
								<td height="5">&nbsp;Teacher Name</td>
								<td height="5">&nbsp;Login User Name</td>
								<td height="5">&nbsp;Class Room</td>
								<td height="5" align="center">Action</td>
							</tr>
							<?php 
							if($totalList > 0)	
							{	
								$i=1;
								while($rowList=mysql_fetch_assoc($resList))
								{
							?>
							<tr style="border:1px solid #999999;">
								<td height="5" align="center"><?php echo $i++; ?>.</td>
								<td height="5">&nbsp;<?php echo $rowList['name']; ?></td>
								<td height="5">&nbsp;<?php echo $rowList['username']; ?></td>
								<td height="5">&nbsp;<?php echo $rowList['classroom']; ?></td>
								<td height="5" width="230px" align="center" style="height:30px">
									<input type="button" name="btnView" id="btnView" value="Veiw Student List" style="cursor:pointer" onclick="javascript:location.href='studentListing.php?tid=<?php echo $rowList['uid']; ?>'">
						                        <input type="button" name="btnDel" id="btnDel" value="Delete" style="cursor:pointer" onclick="'test<?php echo 'test'; ?>'">
							</td>
							</tr>
							<?php } 
							} 
							else 
							{ 
							?>
							<tr>
								<td height="5" colspan="5" align="center">No Records Found.</td>
							</tr>
							<?php	} ?>
						</table>
					</td>
				</tr>
				<tr>
					<td height="20" align="right">
						<form name="frmReport" action="reporting.php" method="post">
							<input type="hidden" name="txtCard" id="txtCard" value="">
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	
</table>
</div>
<?php //include "footer.php";	?>
</body>
</html>
