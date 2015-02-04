<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");
	
$sqlList			=	"SELECT a.CEVNAME, a.SDATE, a.EDATE, a.DTIME, a.CEVDETAILS, a.TYPE, a.STATUS, b.EMPNAME, c.CNAME FROM CEVENT a, EMASTER b, CMASTER c  WHERE a.EMPID=".$_GET['tid']." and b.EMPID=".$_GET['tid']." and b.CID=c.CID";
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
<div style="background:#9aba4b;font-size: 4px;">&nbsp;</div>
<div id="menu">
	<ul>
		<li><a href="addstudent.php?tid=<?php echo $_GET['tid']?>"><b>Add Student</b></a></li>
		<li><a href="addclassevent.php?tid=<?php echo $_GET['tid']?>"><b>Add Event</b></a></li>
		<li><a href="#" class="active"><b>Events</b></a></li>
		<li><a href="studentListing.php?tid=<?php echo $_GET['tid']?>"><b>Student Attendance</b></a></li>
		<li><a href="stdattreport.php?tid=<?php echo $_GET['tid']?>"><b>Attendance Report</b></a></li>
		<li><a href="/index.php?logout"><b>Logout</b></a></li>
	</ul>
<div class="clr"></div>
</div>  
	<table width="100%" border="0" height="100%" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #999999;font-family:Courier;">
		<tr>
			<td align="left" valign="top">
				<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
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
							<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
								<tr><td>&nbsp;</td></tr>
									<tr>
										<td align="left" width="600"><font color="#e79527" size="4" font-family="tahoma"><b><i><?php echo $rowList['CEVNAME']; ?></i></b></font></td>
										<td align="right"><font color="#27bce7" size="3" font-family="tahoma">Start <?php echo $rowList['SDATE']; ?>&nbsp;|&nbsp;End <?php echo $rowList['EDATE']; ?></font></td>
									</tr>
								<tr><td>&nbsp;</td></tr>
									<tr>
										<td colspan="3"><font color="gray" size="2" font-family="tahoma"><i>Event Details </i></font><br></td>
									</tr>
								<tr><td>&nbsp;</td></tr>
									<tr>
										<td><?php echo $rowList['CEVDETAILS']; ?></td>
									</tr>
                                        				<tr>
                                                				<td height="20" align="right">&nbsp;</td>
                                        				</tr>
									<tr>
										<td colspan="3" align="left"><font color="gray" size="2" font-family="tahoma"><i>This event is for <?php if(!$rowList['TYPE']){ echo $rowList['CNAME'];}else{ echo $rowList['TYPE'];} ?></i></font></td>
									</tr>
									<tr>
										<td colspan="3" align="right"><font color="gray" size="2" font-family="tahoma" ><i>Event added by <?php echo $rowList['EMPNAME']; ?></i></font></td>
									</tr>
									<tr>
										<td colspan="3" align="left"><font color="gray" size="2" font-family="tahoma"><i>This is <?php echo $rowList['STATUS'] ?> event</i></font></td>
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
<div style="background:#9aba4b;font-size: 4px;">&nbsp;</div>
</body>
</html>
