<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

if($_POST['btnSave']!='')
{
	$name = $_POST['txtname'];
	$pass = $_POST['txtpass'];
	$contact = $_POST['txtcontact'];
	$email = $_POST['txtemail'];
	$class = $_POST['txtclass'];
	$status = $_POST['txtstatus'];

	$sql = "INSERT INTO EMASTER (EMPNAME, EMPPASS, EMPPHONE, EMPEMAIL, CID, STATUS) VALUES ('".$name."','".$pass."','".$contact."','".$email."','".$class."','".$status."')";
	mysql_query($sql);
}

$sqlList                        =       "SELECT CNAME, CID from CMASTER";
$resList                        =       mysql_query($sqlList) or die(mysql_error());
$totalList                      =       mysql_num_rows($resList);

$sql   	                        =       "SELECT * from EMASTER ORDER BY EMPID ASC";
$result                         =       mysql_query($sql) or die(mysql_error());
$total	                        =       mysql_num_rows($result);
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
<div id="menu">
	<ul>
		<li><a href="/admin/teacherListing.php" class="active"><b>Teachers Details</b></a></li>
		<li><a href="/index.php?logout"><b>Logout</b></a></li>
	</ul>
<div class="outer">
<div class="clr"></div>
</div>  
<div id="content" align="center">
<table width="980px" border="0" align="center" cellpadding="0" cellspacing="0" height="300px;" style="border:1px solid #999999;font-family:Courier;">
	<tr>
		<td align="left" valign="top" height="20px" style="padding-left:10px;border-bottom:1px solid #999999;">Welcome to seips intranet - you loged in as Admin</td>
	</tr>
	<tr><td height="10">&nbsp;Add Teachers details here</td></tr> 
	<tr>
		<td align="left" valign="top">
			<table width="580px" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
				<tr>
					<td height="40" style="padding-left:10px;">
						<form name="frm" action="" method="post">
						<table width="580px" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #999999;padding:5px;display:">
							<tr>
								<td width="120px" style="height:30px">User Name:</td>
								<td>
									<input type="text" name="txtname" id="txtname" value="" style="width:230px">
								</td>
							</tr>
							<tr>
								<td width="120px" style="height:30px">Password:</td>
								<td>
									<input type="text" name="txtpass" id="txtpass" value="" style="width:230px">
								</td>
							</tr>
							<tr>
								<td style="height:30px">Contact No:</td>
								<td>
									<input type="text" name="txtcontact" id="txtcontact" value="" style="width:230px">
								</td>
							</tr>
							<tr>
								<td style="height:30px">Email:</td>
								<td>
									<input type="text" name="txtemail" id="txtemail" value="" style="width:230px">
								</td>
							</tr>
  							<tr>
                                                                <td style="height:30px">ClassRoom:</td>
                                                                <td height="5">
								<select name= "txtclass" id="txtclass" >
							<?php
                                                        if($totalList > 0)
                                                        {
                                                                $i=1;
                                                                while($rowList=mysql_fetch_assoc($resList))
                                                                {
                                                        ?>
                                                                <option value=<?php echo $rowList['CID']; ?>><?php echo $rowList['CNAME']; ?></option>
							<?php  }; } ?>
                                                                </select>
                                                                </td>
							</tr>
							<tr>
								<td width="200px" style="height:30px">
								 Active<input type="radio" name="txtstatus" value="active" checked> Inactive<input type="radio" name="txtstatus" value="inactive">
                                				</td>
                                                        </tr>
							<tr>
								<td></td>
								<td align="right" style="height:20px">
									<input type="submit" name="btnSave" id="btnSave" value="Save">
								</td>
							</tr>
						</table>
						</form>
                                                <td height="40" style="padding-left:10px;">

					</td>
				</tr>
                                                        <table width="958px" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                                                <tr class="rowHead" style="border:1px solid #999999;">
                                                                        <td height="5" align="center">Employe ID</td>
                                                                        <td height="5">&nbsp;Employe Name</td>
                                                                        <td height="5" align="center"> Employe Class ID</td>
                                                                        <td height="5" align="center">Notifications</td>
                                                                </tr>
                                                                        <?php
                                                                        if($total > 0)
                                                                        {
                                                                        while($rowList=mysql_fetch_assoc($result))
                                                                        {
                                                                        ?>
                                                                <tr style="border:1px solid #999999;">
                                                                        <td height="5">&nbsp;<?php echo $rowList['EMPID']; ?></td>
                                                                        <td height="5">&nbsp;<?php echo $rowList['EMPNAME']; ?></td>
                                                                        <td height="5">&nbsp;<?php echo $rowList['CID']; ?></td>
									<td><input type="button" name="btnDel" id="btnDel" value="Delete" style="cursor:pointer" onclick="javascript:location.href='deleteUser.php?EMPID=<?php echo $rowList['EMPID']; ?>'"></td>
                                                                </tr>
                                                                <?php }
                                                                }
                                                                else
                                                                {
                                                                ?>
                                                                <tr>
                                                                        <td height="5" colspan="5" align="center">No Records Found.</td>
                                                                </tr>
                                                                <?php   } ?>
                                                        </table>
				<tr>
					<td height="20" align="right">&nbsp;</td>
				</tr>

</table>
</div>
<?php //include "footer.php";	?>
</body>
</html>
