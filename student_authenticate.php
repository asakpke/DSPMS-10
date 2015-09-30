<?php include("session_start.php"); ?>

<?php
if($_SESSION['student_id'] == 0)
{
	$_SESSION['msg'] = "You are not authorized to view this page before login."; 
	header("location: student_login.php");
	exit();
}
?>
