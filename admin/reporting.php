<?php
include_once($_SERVER['DOCUMENT_ROOT']."TrackMe/includes/config.php");

$cur_date = date("d M Y");
$totalLog=0;
if($_POST['txtCard']!='')
{
	$now = date('Y-m-d H:i:s');
	if($_POST['interval']!='')
	$interval_condition = " AND DATE_SUB(NOW(), INTERVAL ".$_POST['interval'].") < logDatetime GROUP BY SUBSTRING(logDatetime,1,10) ORDER BY logDatetime DESC";
	else
	$interval_condition = " AND SUBSTRING(logDatetime,1,10) = SUBSTRING('$now',1,10)";
	//$sql = "SELECT name, email FROM users WHERE DATE_SUB(NOW(), INTERVAL 1 DAY) < lastModified"
	
	$table = strtolower($_POST['txtCard']);
	$sqlLog			=	"SELECT MAX(logDatetime) inTime, MIN(logDatetime) outTime FROM $table WHERE 1".$interval_condition;
	$resLog			=	mysql_query($sqlLog) or die(mysql_error());

}
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
		<li><a href="usercardListing.php"><b>Card Listing</b></a></li>
		<li><a href="reporting.php" class="active"><b>Reports</b></a></li>
	</ul>
<div class="clr"></div>
</div>  
<div id="content" align="center">
<table width="980px" border="0" align="center" cellpadding="0" cellspacing="0" height="300px;" style="border:1px solid #999999;font-family:Courier;">
	<tr>
		<td height="10">&nbsp;</td>
 	</tr> 
	<tr>
		<td align="left" valign="top" height="30px" style="padding-left:10px;border-bottom:1px solid #999999;"><b><u>Card Details - Report - <?php echo $cur_date;?></u></b></td>
	</tr>
	<tr>
		<td align="left" valign="top">
			<form name="frm" action="" method="post">
			<table width="580px" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
				<tr>
					<td height="40" style="padding-left:10px;"><b><u>Card Number:<?php echo $table; ?></u></b></td>
					<td align="right">
						Select Interval:&nbsp;<select id="interval" name="interval" onchange="javascript:document.frm.submit();">
							<option value="" <?php if($_POST['interval']=='') { ?> selected="selected" <?php } ?>>Today</option>
							<option value="2 DAY" <?php if($_POST['interval']=='2 DAY') { ?> selected="selected" <?php } ?>>Last 2 Days</option>
							<option value="1 WEEK" <?php if($_POST['interval']=='1 WEEK') { ?> selected="selected" <?php } ?>>Last Week</option>
							<option value="2 WEEK" <?php if($_POST['interval']=='2 WEEK') { ?> selected="selected" <?php } ?>>Last 2 Weeks</option>
							<option value="4 WEEK" <?php if($_POST['interval']=='4 WEEK') { ?> selected="selected" <?php } ?>>Last 4 Weeks</option>
							<option value="1 MONTH" <?php if($_POST['interval']=='1 MONTH') { ?> selected="selected" <?php } ?>>Last Month</option>
						</select>
						<input type="hidden" name="txtCard" id="txtCard" value="<?php echo $_POST['txtCard']; ?>">
						&nbsp;
					</td>
				</tr>
				<tr>
					<td height="40" colspan="2" style="padding-left:10px;">
						<table width="580px" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
							<tr class="rowHead" style="border:1px solid #999999;">
								<td height="5" width="50px" align="center">Sr.No</td>
								<td height="5">&nbsp;In Time</td>
								<td height="5">&nbsp;Out Time</td>
							</tr>
							<?php 
							$i=1;
							while($rowLog=mysql_fetch_assoc($resLog))
							{
								if($rowLog['inTime']!='')	
								{
							?>
							<tr style="border:1px solid #999999;">
								<td height="5" align="center"><?php echo $i++; ?>.</td>
								<td height="5">&nbsp;<?php echo $rowLog['inTime']; ?></td>
								<td height="5">&nbsp;<?php echo $rowLog['outTime']; ?></td>
							</tr>
							<?php } 
								else 
								{ 
								?>
								<tr>
									<td height="5" colspan="4" align="center">No Records Found.</td>
								</tr>
							<?php	} 
							}	?>
						</table>
					</td>
				</tr>
				<tr>
					<td height="20" colspan="2" align="right">&nbsp;</td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
	
</table>
</div>
<?php include "footer.php";	?>
</body>
</html>
