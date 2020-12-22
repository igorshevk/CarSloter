<?php
include("common/config.php");
if(isset($_GET['uid']))
{
$uid=$_GET['uid'];
$query=$conn->prepare("update tbl_users set u_status='1' where u_id='$uid'");
$result=$query->execute();
$_SESSION['VERIFY_MSG']='Account has been validated';
echo "<script>window.location.href='login.php' </script>"; 
} else
{
	echo "<script>window.location.href='index.php' </script>"; 
}

?>