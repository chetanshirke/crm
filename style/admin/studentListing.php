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



<script language="javascript" type="text/javascript">
<!-- 
//Browser Support Code
function ajaxFunction(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.
 ajaxRequest.onreadystatechange = function(){
   if(ajaxRequest.readyState == 4){
      var ajaxDisplay = document.getElementById('ajaxDiv');
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
   }
 }
 // Now get the value from user and pass it to
 // server script.
 var studentid = document.getElementById('studentid').value;
 var status = document.getElementById('status').value;

 var queryString = "?studentid=" + studentid ;
 queryString +=  "&status=" + status;
 ajaxRequest.open("GET", "attstatus.php" + 
                              queryString, true);
 ajaxRequest.send(null); 
}
//-->
</script>


<div id="menu">
	<ul>
		<li><a href="#" class="active"><b>Student Listing</b></a></li>
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
					<td height="40" style="padding-left:10px;"><input type="button" name="btnAdd" id="btnAdd" value="Add New"></td>
				</tr>
				<tr>
					<td height="40" style="padding-left:10px;">
						<form name="frm" action="" method="post">
						<table width="580px" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #999999;padding:5px;display:">
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
								<td></td>
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
				<tr>
					<td height="20" align="right">&nbsp;</td>
				</tr>
				<tr>
					<td height="40" style="padding-left:10px;">
						<table width="680px" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
							<tr class="rowHead" style="border:1px solid #999999;">
								<td height="5" width="50px" align="center">Sr.No</td>
								<td height="5">&nbsp;Student Name</td>
								<td height="5" align="center">Status</td>
								<td height="5" align="center">Action</td>
								<td height="5" align="center">Notifications</td>
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
								<td height="5" width="230px" align="center" style="height:30px">
								<form name='myForm'>
								<input type="hidden" id="studentid" name="studentid" value='<?php echo $rowList['SID']; ?>'>
								<select id='status'>
								<option value="Present">Present</option>
								<option value="Absent">Absent</option>
								<input type='button' onclick='ajaxFunction()' value='Mark'/>
								</select>
								</form>
								<td height="5" align="center"><div id='ajaxDiv'></div></td>
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
				<tr>
					<td height="20" align="right">
						<form name="frmReport" action="reporting.php" method="post">
							<input type="hidden" name="txtCard" id="txtCard" value="">
						</form>
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
