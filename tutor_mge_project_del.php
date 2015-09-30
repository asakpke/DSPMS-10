<?php include("session_start.php"); ?>

<?php include("tutor_authenticate.php"); ?>

<?php
// form submited code
if(isset($_GET['project_id']))
{
	include('db_connection.php');
  

	$sql = 'DELETE FROM project WHERE project_id = ' . $_GET['project_id'] . ' LIMIT 1;';

	//echo "<br />$sql<br /> ";
	//exit;

	if (!mysql_query($sql))
	{
		$_SESSION['msg'] = mysql_errno() . '<br />Error: ' . mysql_error();
		header('Location: tutor_mge_project_main.php');
		exit;
	}
	else
	{
		$_SESSION['msg'] = 'Record deleted successfully.';
		header('Location: tutor_mge_project_main.php');
		exit;
	}
}
?>
