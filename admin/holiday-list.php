<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

$HDATE = $_POST['datepicker'];
echo $HDATE;

//$sqlList                        =       "SELECT SID, SNAME, STATUS FROM SMASTER WHERE SCID=".$_GET['tid']." ORDER BY SNAME ASC";
//$resList                        =       mysql_query($sqlList) or die(mysql_error());
//$totalList                      =       mysql_num_rows($resList);


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

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>   
$(function() {
    $( "#datepicker" ).datepicker();
});
</script>

<div id="menu">
        <ul>
                <li><a href="addstudent.php?tid=<?php echo $_GET['tid']?>"><b>Add New Student</b></a></li>
                <li><a href="#" class="active"><b>Student Attendance</b></a></li>
                <li><a href="/index.php?logout"><b>Logout</b></a></li>
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
                                                <td align="right" valign="top">
							<form>
							<p>Calendar: <input type="text" id="datepicker" /></p>
							<input type="submit" id="submit" value="submit" >
							</form>
						</td>
                                        </tr>
                                <tr>
                                        <td height="20" align="right">&nbsp;</td>
                                </tr>
                                <tr>



                                </tr>
                        </table>
                </td>
        </tr>

</table>
</div>
</body>
</html>

