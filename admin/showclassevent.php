<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

if($_POST['btnSave']!='')
{
	$studName = $_POST['txtname'];
	$studContact = $_POST['txtcontact'];
	$studEmail = $_POST['txtemail'];
	$teacherId  = $_POST['hiddenteacher'];
	
	echo $sql = "INSERT INTO SMASTER ( SNAME, SPHONE, SEMAIL,  SCID ) VALUES ('".$studName."','".$studContact."','".$studEmail."','".$teacherId."' )";
	mysql_query($sql);
}

$sqlList			=	"SELECT a.CEVNAME, a.SDATE, a.EDATE, a.DTIME, a.CEVDETAILS, b.EMPNAME, c.CNAME FROM CEVENT a, EMASTER b, CMASTER c  WHERE a.EMPID=".$_GET['tid']." and b.EMPID=".$_GET['tid']." and b.CID=c.CID and a.STATUS='Active'";
$resList			=	mysql_query($sqlList) or die(mysql_error());
$totalList			= 	mysql_num_rows($resList);
?>
<?php include "header.php"; ?>  
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

<script>
function att(str, str1, str2) {
    if (str == "") {
        document.getElementById(str2).innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(str2).innerHTML = xmlhttp.responseText;
            }
        }
	var queryString = "?studentid=" + str ;
	 queryString +=  "&status=" + str1;
	xmlhttp.open ("GET", "attstatus.php" + 
                              queryString, true);
        xmlhttp.send();
    }
}
</script>


<div id="menu">
	<ul>
		<li><a href="addstudent.php?tid=<?php echo $_GET['tid']?>"><b>Add Student</b></a></li>
		<li><a href="addclassevent.php?tid=<?php echo $_GET['tid']?>"><b>Add Event</b></a></li>
		<li><a href="#" class="active"><b>Class Events</b></a></li>
		<li><a href="studentListing.php?tid=<?php echo $_GET['tid']?>"><b>Student Attendance</b></a></li>
		<li><a href="stdattreport.php?tid=<?php echo $_GET['tid']?>"><b>Attendance Report</b></a></li>
		<li><a href="/index.php?logout"><b>Logout</b></a></li>
	</ul>
<div class="clr"></div>
</div>  
	<table width="980px" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #999999;font-family:Courier;">
		<tr>
			<td align="left" valign="top">
				<table width="958px" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
					<tr>
						<td height="20" align="right">&nbsp;</td>
					</tr>
					<tr>
						<td height="40" style="padding-left:10px;">
									<?php 
									if($totalList > 0)	
									{	
									$i=1;
									while($rowList=mysql_fetch_assoc($resList))
									{
									?>
							<table width="958px" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
								<tr><td>&nbsp;</td></tr>
									<tr>
										<td align="left" width="600"><font color="red"><b><i><?php echo $rowList['CEVNAME']; ?></i></b></font></td>
										<td align="right"><font color="gray" size="1">Start Date: <?php echo $rowList['SDATE']; ?></font></td>
								        	<td align="right"><font color="gray" size="1">End Date: <?php echo $rowList['EDATE']; ?></font></td>
									</tr>
								<tr><td>&nbsp;</td></tr>
									<tr>
										<td colspan="3"><font color="gray" size="1"><i>Event Details </i></font><br></td>
									</tr>
								<tr><td>&nbsp;</td></tr>
									<tr>
										<td><?php echo $rowList['CEVDETAILS']; ?></td>
									</tr>
                                        				<tr>
                                                				<td height="20" align="right">&nbsp;</td>
                                        				</tr>
									<tr>
										<td colspan="3" align="left"><font color="gray" size="1"><i>Class Room:&nbsp;<?php echo $rowList['CNAME']; ?></i></font></td>
									</tr>
									<tr>
										<td colspan="3" align="right"><font color="gray" size="1"><i>Add by:&nbsp;<?php echo $rowList['EMPNAME']; ?></i></font></td>
									</tr>
								<div style="background:#9aba4b;font-size: 0.5px;">&nbsp;</div>
							</table>
								<?php } 
								} 
								else 
								{ 
								?>
								<tr>
									<td height="5" colspan="5" align="center">No Records Found.</td>
								</tr>
								<?php	} ?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<div style="background:#9aba4b;font-size: 10px;color:#9aba4b">_</div>
</body>
</html>
