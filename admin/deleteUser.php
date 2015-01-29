<html>
</body>
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/config.php");

        $sql = "DELETE FROM EMASTER WHERE EMPID=".$_GET['EMPID']."";
        mysql_query($sql);
	header("Location:adminpanel.php");
?>
<?php echo 'User deleted successfully<br>  <a href="/admin/adminpanel.php">Click here to go back to admin page</a> ' ?>
</body>
</html>
