<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

        $sdate = $_POST['txtsdate'];
        $edate = $_POST['txtedate'];
        $sid = $_POST['txtsid'];
        $status = $_POST['txtstatus'];
        $sname = $_POST['sname'];


        $sql                         	=       "SELECT DTIME, STATUS FROM SATT WHERE DTIME BETWEEN '".$sdate."' and '".$edate."' and SID='".$sid."' and STATUS='".$status."'";
        $resList                        =       mysql_query($sql) or die(mysql_error());
        $totalList                      =       mysql_num_rows($resList);

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
<div id="menu">
        <ul>
                <li><a href="addstudent.php?tid=<?php echo $_GET['tid']?>"><b>Add New Student</b></a></li>
		<li><a href="studentListing.php?tid=<?php echo $_GET['tid']?>"><b>Student Attendance</b></a></li>
                <li><a href="stdattreport.php?tid=<?php echo $_GET['tid']?>" class="active"><b>Attendance Report</b></a></li>
                <li><a href="index.php?logout"><b>Logout</b></a></li>
        </ul>
<div class="clr"></div>
</div>
<table width="980px" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                                        <tr class="rowHead" style="border:1px solid #999999;background-color:white;">
								<td>&nbsp;Student Name : &nbsp;<?php echo $_GET['sname']?></td>
								<td>&nbsp;From Date : &nbsp;<?php echo $sdate?> &nbsp; To Date : <?php echo $edate?></td>
								<td>&nbsp;Total <?php echo $status?> Days : &nbsp;<?php echo $totalList ?></td>
                                                        </tr>
                                                        <tr class="rowHead" style="border:1px solid #999999;">
                                                                <td height="5">&nbsp;Sr No</td>
                                                                <td height="5">&nbsp;Date</td>
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
                                                                <td height="5">&nbsp;<?php echo $rowList['DTIME']; ?></td>
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
<div style="background:#9aba4b;font-size: 10px;color:#9aba4b">_</div>
<button onclick="myFunction()">Print Attendance Report</button>
</body>
</html>
