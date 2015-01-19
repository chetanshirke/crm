<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

$sqlList			=	"select a.EMPID, a.EMPNAME, a.EMPPASS, a.EMPPHONE, a.EMPEMAIL, a.STATUS, a.is_admin, b.CNAME FROM EMASTER a, CMASTER b where a.CID = b.CID and a.is_admin!=1 ORDER BY EMPID ASC";
$resList			=	mysql_query($sqlList) or die(mysql_error());
$totalList			= 	mysql_num_rows($resList);

?>
<?php include "header.php";   	?>  

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
		<li><a href="#" class="active"><b>Teacher Details</b></a></li>
		<li><a href="index.php?logout"><b>Logout</b></a></li>
	</ul>
<div class="clr"></div>
</div>  
<div id="content" align="center">
<table width="980px" border="0" align="center" cellpadding="0" cellspacing="0" height="300px;" style="border:1px solid #999999;font-family:Courier;">
				<tr>
					<td height="40" style="padding-left:10px;">
						<table width="680px" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
							<tr class="rowHead" style="border:1px solid #999999;">
								<td height="5" width="50px" align="center">Sr.No</td>
								<td height="5">&nbsp;User Name</td>
								<td height="5">&nbsp;User Status</td>
								<td height="5">&nbsp;Class Room</td>
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
								<td height="5">&nbsp;<?php echo $rowList['EMPNAME']; ?></td>
								<td height="5">&nbsp;<?php echo $rowList['STATUS']; ?></td>
								<td height="5">&nbsp;<?php echo $rowList['CNAME']; ?></td>
								<td height="5" width="230px" align="center" style="height:30px">
									<input type="button" name="btnView" id="btnView" value="Veiw Student List" style="cursor:pointer" onclick="javascript:location.href='studentListing.php?tid=<?php echo $rowList['EMPID']; ?>'">
						                        <input type="button" name="btnDel" id="btnDel" value="Delete" style="cursor:pointer" onclick="javascript:location.href='deleteUser.php?EMPID=<?php echo $rowList['EMPID']; ?>'">
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

    </tr>
</table>
</div>
<?php //include "footer.php";	?>
</body>
</html>
