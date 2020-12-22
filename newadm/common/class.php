<?php
function protect_admin()
{
	if(empty($_SESSION['ADM_ID']) || $_SESSION['ADM_TYPE'] != 1)
	{
		echo "<script>window.location.href='login.php'</script>";
	}
}
function protect_agent()
{
	if(empty($_SESSION['ADM_ID']))
	{
		echo "<script>window.location.href='login.php'</script>";
	}
}
date_default_timezone_set("America/New_York");
?>