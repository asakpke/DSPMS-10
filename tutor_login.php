<?php include("session_start.php"); ?>

<?php
if($_SESSION['tutor_id'] != 0)
{
	header('Location: tutor_main.php');    
	exit();
}
 
//echo '<br />START';
//exit;

//ob_start();
//echo 'isset = ' . isset($_POST['login']);
if(isset($_POST['login']) && isset($_POST['password']))
{
	//echo '<br />login = ' . $_POST['login'];
	//echo '<br />password = ' . $_POST['password'];

	include('db_connection.php');
  
	//$result = mysql_query("SELECT * FROM tutor HERE login =", $con);

	$sql = "SELECT * FROM tutor WHERE login='" . $_POST['login'] . "' AND password='" . $_POST['password'] . "';";
	//echo '<br />sql = ' . $sql;
	//exit;
	$result = mysql_query($sql);

	//if(!$result)
	//{
		//die('<br />Could not query DB: ' . mysql_error());
	//}

	$num_rows = mysql_num_rows($result);

	if($num_rows)
	{
		//echo '<br />login ok';
		//exit;

		$row = mysql_fetch_array($result);

		$_SESSION['tutor_id'] = $row['tutor_id'];
		$_SESSION['msg'] = 'You are login successfully.';

		//echo '<br />tutor_login = ' . $_SESSION['tutor_login'];
		//exit;

		header('Location: tutor_main.php');
		exit;
	} 
	else
	{
		//echo '<br />login not';
		//exit;

		$_SESSION['tutor_id'] = 0;
		$_SESSION['msg'] = 'Invalid Login/Password';
	} 
} 
?>

<?php include('top.php'); ?>

<?php include('tutor_submenu.php'); ?>

<div id="contenttext">

<div style="padding:10px">
<span class="titletext">Tutor Login</span> </div>

<div class="bodytext" style="padding:12px;" align="justify">
<strong>Tutor login here.</strong>
<form action="tutor_login.php" method="post">
	<div>Login: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="login" /></div>
	<div>Password: <input type="password" name="password" /></div>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	<input type="submit" value="Login" /><input type="reset" /></p>
</form>
</div>
</div>

<?php include('bottom.php'); ?>

