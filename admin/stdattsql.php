<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

        $sdate = $_POST['txtsdate'];
        $edate = $_POST['txtedate'];
        $sid = $_POST['txtsid'];
        $status = $_POST['txtstatus'];


        $sql                         	=       "SELECT DTIME, STATUS FROM SATT WHERE DTIME BETWEEN '".$sdate."' and '".$edate."' and SID='".$sid."' and STATUS='".$status."' ORDER BY DTIME DESC";
        $resList                        =       mysql_query($sql) or die(mysql_error());
        $totalList                      =       mysql_num_rows($resList);

	$sqlsid				=	"SELECT SNAME FROM SMASTER WHERE SID='".$sid."'";
	$result                         =       mysql_query($sqlsid) or die(mysql_error());
	$total			 	= 	mysql_num_rows($result);
?>

<?php include "header.php"; ?>

<script>
function myFunction() {
    window.print();
}
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
<div style="background:#9aba4b;font-size: 4px;">&nbsp;</div>
<div id="menu">
        <ul>
                <li><a href="addstudent.php?tid=<?php echo $_GET['tid']?>"><b>Add Student</b></a></li>
                <li><a href="addclassevent.php?tid=<?php echo $_GET['tid']?>"><b>Add Event</b></a></li>
                <li><a href="showclassevent.php?tid=<?php echo $_GET['tid']?>"><b>Events</b></a></li>
		<li><a href="studentListing.php?tid=<?php echo $_GET['tid']?>"><b>Student Attendance</b></a></li>
                <li><a href="stdattreport.php?tid=<?php echo $_GET['tid']?>" class="active"><b>Attendance Report</b></a></li>
                <li><a href="/index.php?logout"><b>Logout</b></a></li>
        </ul>
<div class="clr"></div>
</div>
<div style="font-size: 10px;">&nbsp;</div>
	<table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" style="border:0px solid #999999;font-family:Courier;" >
		<tr class="rowHead" style="border:1px solid #999999;">

                                                        <?php
                                                        if($total > 0)
                                                        {
								while($List=mysql_fetch_assoc($result))
                                                                {
                                                        ?>
								<td>&nbsp;Student Name : &nbsp;<?php echo $List['SNAME']; ?></td>
                                                        <?php }
                                                        }
                                                        else
                                                        {
                                                        ?>
                                                                <td>No Records Found.</td>
                                                        <?php   } ?>
								<td width=300>&nbsp;From Date : &nbsp;<?php echo $sdate?> &nbsp; To Date : <?php echo $edate?></td>
								<td>&nbsp;Total <?php echo $status?> Days : &nbsp;<?php echo $totalList ?></td>
                                                        </tr>
                                                        <tr class="rowHead" style="border:1px solid #999999;">
                                                                <td height="5" align="center">&nbsp;Date</td>
                                                                <td height="5" align="center">&nbsp;Day</td>
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
                                                                <td height="5" align="center">&nbsp;<?php echo $rowList['DTIME']; ?></td>
                                                                <td height="5" align="center">&nbsp;<?php $date = $rowList['DTIME'];
								$sepparator = '-';
								$parts = explode($sepparator, $date);
								$dayForDate = date("l", mktime(0, 0, 0, $parts[1], $parts[2], $parts[0]));
								echo $dayForDate;
 								?></td>
                                                                <td height="5" align="center">&nbsp;<?php echo $rowList['STATUS']; ?></td>
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
<div style="font-size: 10px;">&nbsp;</div>
<div align="center"><button onclick="myFunction()"><font size="2">Print Attendance Report</font></button></div>
<div style="font-size: 10px;">&nbsp;</div>
<div style="background:#9aba4b;font-size: 4px;">&nbsp;</div>
</body>
</html>
