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

$sqlList			=	"SELECT SID, SNAME, STATUS FROM SMASTER WHERE SCID=".$_GET['tid']." ORDER BY SNAME ASC";
//SELECT a.SID, a.SNAME, b.SID, b.STATUS FROM SMASTER a, SATT b where a.SID = b.SID;
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
function att(str, str1) {
    if (str == "") {
        document.getElementById("attout").innerHTML = "";
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
                document.getElementById("attout").innerHTML = xmlhttp.responseText;
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
		<li><a href="addstudent.php?tid=<?php echo $_GET['tid']?>"><b>Add New Student</b></a></li>
		<li><a href="#" class="active"><b>Student Attendance</b></a></li>
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
		<td align="left" valign="top">
			<table width="580px" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
					<tr>
						<td align="right" valign="top">Status:<div id="attout">Status</div></td>
					</tr>
				<tr>
					<td height="20" align="right">&nbsp;</td>
				</tr>
				<tr>
					<td height="40" style="padding-left:10px;">
						<table width="680px" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
							<tr class="rowHead" style="border:1px solid #999999;">
								<td height="5" width="50px" align="center">Sr.No</td>
								<td height="5">&nbsp;Student Name</td>
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
								<td height="5">&nbsp;<?php echo $rowList['SNAME']; ?></td>
								<td height="5" width="230px" align="center" style="height:30px">
								<select id="attstatus" onchange="att(this.value, this.options[this.selectedIndex].text)">
								<option value="" selected>Mark Attendance</option>
								<option value="<?php echo $rowList['SID']; ?>">Present</option>
								<option value="<?php echo $rowList['SID']; ?>">Absent</option>
								</select>
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
			</table>
		</td>
	</tr>
	
</table>
</div>
<?php //include "footer.php";	?>
</body>
</html>
