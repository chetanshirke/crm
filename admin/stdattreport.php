<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

$sqlList                        =       "SELECT SID, SNAME, STATUS FROM SMASTER WHERE SCID=".$_GET['tid']." ORDER BY SNAME ASC";
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

<div id="menu">
        <ul>
                <li><a href="addstudent.php?tid=<?php echo $_GET['tid']?>"><b>Add Student</b></a></li>
                <li><a href="addclassevent.php?tid=<?php echo $_GET['tid']?>"><b>Add Event</b></a></li>
                <li><a href="showclassevent.php?tid=<?php echo $_GET['tid']?>"><b>Show Events</b></a></li>
                <li><a href="studentListing.php?tid=<?php echo $_GET['tid']?>"><b>Student Attendance</b></a></li>
                <li><a href="#" class="active"><b>Attendance Report</b></a></li>
                <li><a href="/index.php?logout"><b>Logout</b></a></li>
        </ul>
<div class="clr"></div>
</div>
<table width="980px" border="0" align="center" cellpadding="0" cellspacing="0" height="300px;" style="border:1px solid #999999;font-family:Courier;">
        <tr>
                <td align="left" valign="top">
                        <table width="958px" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                        <tr>
                                                <td height="20" align="right">&nbsp;</td>
                                        </tr>
                                <tr>
                                        <td height="40" style="padding-left:10px;">
                                                <table width="958px" align="center" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                                        <tr class="rowHead" style="border:1px solid #999999;">
								<form action="stdattsql.php?tid=<?php echo $_GET['tid']?>" method="post">
                                                                <td height="5">&nbsp;Select start date</td>
                                                                <td height="5">&nbsp;Select end date</td>
                                                                <td height="5">&nbsp;Select Student</td>
                                                                <td height="5">&nbsp;Status</td>
                                                                <td height="5">&nbsp;Action</td>
							</tr>
							<tr style="border:1px solid #999999;">
  								<td align="center" height="5"><input type="date" name="txtsdate" id="sdatepicker"></td>
  								<td align="center" height="5"><input type="date" name="txtedate" id="edatepicker"></td>
								<td align="center" height="5">
                                                                <select name="txtsid" id="txtsid" >
                                                                <option value="" selected>Select Student</option>
                                                        		<?php
                                                        		if($totalList > 0)
                                                        		{
                                                                	while($rowList=mysql_fetch_assoc($resList))
                                                                	{
                                                        		?>
                                                                <option value=<?php echo $rowList['SID']; ?>><?php echo $rowList['SNAME']; ?></option>
                                                        		<?php }
                                                        		}
                                                        		else
                                                        		{
                                                        		?>
                                                        <tr>
                                                                <td height="5" colspan="5" align="center">No Records Found.</td>
                                                        </tr>
                                                        <?php   } ?>
								</td>
                                                                </select>
                                                                </td>
								<td align="center" height="5">
								<select name="txtstatus" id="txtstatus" >
                                                                <option value="Present" selected>Present</option>
                                                                <option value="Absent">Absent</option>
                                                                </select>
								<td align="center" height="5"><input type="submit" name="btnView" id="btnView" value="Submit" style="cursor:pointer"></td>
								</form>
                                                        </tr>
                                                </table>
                                        </td>
                                </tr>
                        </table>
                </td>
        </tr>
                <tr><td height="10">&nbsp;</td></tr>
        </table>
<div style="background:#9aba4b;font-size: 10px;color:#9aba4b">_</div>
</body>
</html>

