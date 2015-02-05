<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

if($_POST['btnSave']!='')
{
	$teacherId  = $_POST['hiddenteacher'];
	$name = $_POST['txtname'];
	$start = $_POST['txtsdate'];
	$end = $_POST['txtedate'];
	$details = $_POST['txtdetails'];
	$type = $_POST['txttype'];
	$status = $_POST['txtstatus'];
        
        $details = mysql_real_escape_string($details);	
	$sql = "INSERT INTO CEVENT ( EMPID, CEVNAME, SDATE, EDATE, CEVDETAILS, TYPE, STATUS ) VALUES ( '".$teacherId."', '".$name."','".$start."','".$end."','".$details."', '".$type."', '".$status."' )";
	mysql_query($sql);
}

$sqlList                        =       "SELECT CID, CNAME FROM CMASTER ORDER BY CNAME ASC";
$resList                        =       mysql_query($sqlList) or die(mysql_error());
$totalList                      =       mysql_num_rows($resList);

?>
<?php include "header.php"; ?>  

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$(document).ready(
  function () {
    $( "#sdatepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
    });
  }
);

$(document).ready(
  function () {
    $( "#edatepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
    });
  }
);
</script>


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

</script>
<div style="background:#9aba4b;font-size: 4px;">&nbsp;</div>
<div id="menu">
	<ul>
		<li><a href="addstudent.php?tid=<?php echo $_GET['tid']?>"><b>Add Student</b></a></li>
		<li><a href="#" class="active"><b>Add Event</b></a></li>
		<li><a href="showclassevent.php?tid=<?php echo $_GET['tid']?>"><b>Events</b></a></li>
		<li><a href="studentListing.php?tid=<?php echo $_GET['tid']?>"><b>Student Attendance</b></a></li>
		<li><a href="stdattreport.php?tid=<?php echo $_GET['tid']?>"><b>Attendance Report</b></a></li>
		<li><a href="/index.php?logout"><b>Logout</b></a></li>
	</ul>
<div class="clr"></div>
</div>  
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" height="300px;" style="border:1px solid #999999;font-family:Courier;">
		<tr>
			<td align="left" valign="top">
				<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
					<tr>
						<td height="20" align="right">&nbsp;</td>
					</tr>
					<tr>
						<td height="40" style="padding-left:10px;">
                                                <form name="frm" action="" method="post">
                                                <table width="99%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #999999;padding:5px;display:">
                                                        <tr>
                                                                <td width="170px" style="height:30px">Event Title:</td>
                                                                <td>
                                                                        <input type="text" name="txtname" id="txtname" value="" style="width:230px">
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td width="170px" style="height:30px">Event Start date:</td>
                                                                <td height="5"><input type="date" name="txtsdate" id="sdatepicker"></td>
                                                        </tr>
                                                        <tr>
                                                        </tr>
                                                        <tr>
								<td width="170px" style="height:30px">Event End date:</td>
                                                                <td height="5"><input type="date" name="txtedate" id="edatepicker"></td>
                                                        </tr>
                                                        <tr>
								<td width="170px" style="height:30px">Event Details:</td>
								<td><textarea rows="4" cols="50" name="txtdetails" id="txtdetails"></textarea></td>
                                                        </tr>
                                                        <tr>
								<td width="170px" style="height:30px">Event Status:</td>
                                                                <td style="height:30px">
                                                                 Active<input type="radio" name="txtstatus" value="active" checked> Inactive<input type="radio" name="txtstatus" value="inactive">
                                                                </td>
                                                        </tr>
                                                        <tr>
								<td width="170px" style="height:30px">Event For:</td>
                                                                <td width="200px" style="height:30px">
                                                                <select name="txttype" id="txttype" >
                                                                <option value="" selected>school</option>
                                                                        <?php
                                                                        if($totalList > 0)
                                                                        {
                                                                        while($rowList=mysql_fetch_assoc($resList))
                                                                        {
                                                                        ?>
                                                                <option value=<?php echo $rowList['CNAME']; ?>><?php echo $rowList['CNAME']; ?></option>
                                                                        <?php }
                                                                        }
                                                                        else
                                                                        {
                                                                        ?>
                                                        <?php   } ?>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>
                                                                        <input type="hidden" name="hiddenteacher" id="hiddenteacher" value="<?php echo $_GET['tid']?>" style="width:230px">
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
				</table>
			</td>
		</tr>
  		<tr><td height="10">&nbsp;</td></tr>	
	</table>
<div style="background:#9aba4b;font-size: 4px;">&nbsp;</div>
</body>
</html>
