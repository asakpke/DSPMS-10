<?php include("session_start.php"); ?>

<?php
if($_SESSION['supervisor_id'] == 0)
{
	$_SESSION['msg'] = "You are not authorized to view this page before login."; 
	header("location: supervisor_login.php");
	exit();
}
?>
