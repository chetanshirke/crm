<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

if($_POST["txtUserName"]!='')
{

        $username       =       $_POST['txtUserName'];
        $password               =       $_POST['txtPassword'];
        accountLogin($username, $password);
}

$sqlList                        =       "SELECT a.CEVNAME, a.SDATE, a.EDATE, a.DTIME, a.CEVDETAILS, a.TYPE, b.EMPNAME, c.CNAME FROM CEVENT a, EMASTER b, CMASTER c  WHERE a.EMPID=b.EMPID and b.CID=c.CID and a.STATUS='Active' ORDER BY a.SDATE ASC";
$resList                        =       mysql_query($sqlList) or die(mysql_error());
$totalList                      =       mysql_num_rows($resList);

?>
<?php include "header.php";     ?>
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

<div id="content" align="center">
<div class="clr"></div>
<div style="background:#9aba4b;font-size: 4px;">&nbsp;</div>
</div>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #999999;font-family:Courier;">


        <table class="login" width="100%">
                <tr>
                        <td style="height: 10px;"/>
                </tr>
                        <tr>
                                <td align="center">
                                        <form action="" id="frmLogin" name="frmLogin" method="post">
                                        <input type="hidden" value="set" name="hide"/>
                                        <table class="login-tab">

                                                <tbody><tr>
                                                        <td><font color="Gray"> Username :</font></td>

                                                        <td><input type="text" id="txtUserName" class="inputusername" name="txtUserName"/></td>
                                                </tr>
                                                <tr>
                                                        <td> <font color="Gray"> Password :</font></td>
                                                        <td><input type="password" id="txtPassword" class="inputpassword" name="txtPassword"/></td>
                                                </tr>
                                                <tr>
                                                        <td>
                                                        </td>
                                                        <td style="text-align: left;">
                                                        <input type="submit" class="loginButton" value="Submit" id="btnLogin" name="btnLogin"/>
                                                        </td>
                                                </tr>
                                                <tr><td></td>
                                        </tbody></table>
                                        </form>
                                </td>
                        </tr>
                </tbody></table>
             <table align="center"><tr><td><font color="red">&nbsp;<?php echo $_GET['err']; ?></font></td></tr></table>
	</table>

                <tr>
		<td align="left" valign="top">
                                <table width="99%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
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
                                                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                                                <tr><td>&nbsp;</td></tr>
                                                                        <tr>
                                                                                <td align="left" width="600"><font color="#e79527" size="4" font-family="tahoma"><b><i><?php echo $rowList['CEVNAME']; ?></i></b></font></td>
										<td align="right"><font color="#27bce7" size="3" font-family="tahoma">Start <?php echo $rowList['SDATE']; ?>&nbsp;|&nbsp;End <?php echo $rowList['EDATE']; ?></font></td>
                                                                        </tr>
                                                                <tr><td height="2">&nbsp;</td></tr>
                                                                        <tr>
                                                                                <td colspan="3"><font color="gray" size="2" font-family="tahoma"><i>Event Details </i></font><br></td>
                                                                        </tr>
                                                                <tr><td height="2">&nbsp;</td></tr>
                                                                        <tr>
                                                                                <td colspan="3"><?php echo $rowList['CEVDETAILS']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td height="10" align="right">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td colspan="3" align="left"><font color="gray" size="2" font-family="tahoma"><i>This event is for <?php if(!$rowList['TYPE']){ echo $rowList['CNAME'];}else{ echo $rowList['TYPE'];} ?></i></font></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td colspan="3" align="right"><font color="gray" size="2" font-family="tahoma"><i>Event added by <?php echo $rowList['EMPNAME']; ?></i></font></td>
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
                                                                <?php   } ?>
                                                </td>
                                        </tr>
                                </table>
	</table>
</table>
<div style="background:#9aba4b;font-size: 4px;">&nbsp;</div>
</div>
</body>
</html>
