<?php include("session_start.php"); ?>

<?php include("admin_authenticate.php"); ?>

<?php
// form submited code
if(isset($_GET['tutor_id']))
{
	include('db_connection.php');
  

	$sql = 'DELETE FROM tutor WHERE tutor_id = ' . $_GET['tutor_id'] . ' LIMIT 1;';

	//echo "<br />$sql<br /> ";
	//exit;

	if (!mysql_query($sql))
	{
		$_SESSION['msg'] = mysql_errno() . '<br />Error: ' . mysql_error();
		header('Location: admin_mge_tutor_main.php');
		exit;
	}
	else
	{
		$_SESSION['msg'] = 'Record deleted successfully.';
		header('Location: admin_mge_tutor_main.php');
		exit;
	}
}
?>
