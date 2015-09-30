<?php
//echo '<br />session_start.php';
//echo '<br />isset session = ' . isset($_SESSION);
//echo '<br />admin_login = ' . $_SESSION['admin_login'];

if(!isset($_SESSION))
{
	session_start();
}

if(!isset($_SESSION['admin_id']))
{
	$_SESSION['admin_id'] = 0;
}

if(!isset($_SESSION['msg']))
{
	$_SESSION['msg'] = '';
}

if(!isset($_SESSION['tutor_id']))
{
	$_SESSION['tutor_id'] = 0;
}

if(!isset($_SESSION['supervisor_id']))
{
	$_SESSION['supervisor_id'] = 0;
}

if(!isset($_SESSION['student_id']))
{
	$_SESSION['student_id'] = 0;
}

 
?>

