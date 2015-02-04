<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

if($_POST['btnSave']!='')
{
	$studName = $_POST['txtname'];
	$studContact = $_POST['txtcontact'];
	$studEmail = $_POST['txtemail'];
	$studstatus = $_POST['txtstatus'];
	$teacherId  = $_POST['hiddenteacher'];
	
	$sql = "INSERT INTO SMASTER ( SNAME, SPHONE, SEMAIL, SCID, STATUS ) VALUES ('".$studName."','".$studContact."','".$studEmail."','".$teacherId."','".$studstatus."' )";
	mysql_query($sql);
}

$sqlList                        =       "SELECT SID, SNAME, STATUS FROM SMASTER WHERE SCID=".$_GET['tid']." ORDER BY SNAME ASC";
$resList                        =       mysql_query($sqlList) or die(mysql_error());
$totalList                      =       mysql_num_rows($resList);

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

<div style="background:#9aba4b;font-size: 4px;">&nbsp;</div>
<div id="menu">
	<ul>
		<li><a href="#" class="active"><b>Add Student</b></a></li>
                <li><a href="addclassevent.php?tid=<?php echo $_GET['tid']?>"><b>Add Event</b></a></li>
                <li><a href="showclassevent.php?tid=<?php echo $_GET['tid']?>"><b>Events</b></a></li>
		<li><a href="studentListing.php?tid=<?php echo $_GET['tid']?>"><b>Student Attendance</b></a></li>
		<li><a href="stdattreport.php?tid=<?php echo $_GET['tid']?>"><b>Attendance Report</b></a></li>
		<li><a href="/index.php?logout"><b>Logout</b></a></li>
	</ul>

<div class="clr"></div>
</div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" height="300px;" style="border:1px solid #999999;font-family:Courier;">
	<tr>
		<td height="10">&nbsp;</td>
 	</tr> 
	<tr>
		<td align="left" valign="top">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
				<tr>
					<td height="40" style="padding-left:10px;">
						<form name="frm" action="" method="post">
						<table width="99%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #999999;padding:5px;display:">
							<tr>
								<td width="170px" style="height:30px">Student Name:</td>
								<td>
									<input type="text" name="txtname" id="txtname" value="" style="width:230px">
								</td>
							</tr>
							<tr>
                                                                <td width="170px" style="height:30px">Student Contact:</td>
                                                                <td>
                                                                        <input type="text" name="txtcontact" id="txtcontact" value="null" style="width:230px">
                                                                </td>
							</tr>
							<tr>
                                                                <td width="170px" style="height:30px">Student Email:</td>
                                                                <td>
                                                                        <input type="text" name="txtemail" id="txtemail" value="null" style="width:230px">
                                                                </td>
							</tr>
                                                        <tr>
                                                                <td width="200px" style="height:30px">
                                                                 Active<input type="radio" name="txtstatus" value="active" checked> Inactive<input type="radio" name="txtstatus" value="inactive">
                                                                </td>
                                                        </tr>
							<tr>
								<td>
									<input type="hidden" name="hiddenteacher" id="hiddenteacher" value="<?php echo $_GET['tid']?>" style="width:230px">
								</td>
							</tr>
							<tr>
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
			</table>
		        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                <tr>
                                        <td height="20" align="left">&nbsp;Student List</td>
                                </tr>
                                <tr>
                                        <td height="40" style="padding-left:10px;">
                                                <table width="99%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                                        <tr class="rowHead" style="border:1px solid #999999;">
                                                                <td height="5" width="50px" align="center">Sr.No</td>
                                                                <td height="5">&nbsp;Student Name</td>
                                                                <td height="5" align="center">Status</td>
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
                                                                <td height="5">&nbsp;<?php echo $rowList['SNAME']; ?></td>
                                                                <td height="5">&nbsp;<?php echo $rowList['STATUS']; ?></td>
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
					</td>
				</tr>
			</table>
		</td>
	</tr>
<tr><td height="10">&nbsp;</td></tr>
</table>
<div style="background:#9aba4b;font-size: 4px;">&nbsp;</div>
</body>
</html>
