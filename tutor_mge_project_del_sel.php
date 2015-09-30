<?php include("session_start.php"); ?>

<?php include("tutor_authenticate.php"); ?>

<?php
//echo 'count(project_ids) = ' . count($_POST['project_ids']) . '<br />';
//exit;

if(count($_POST['project_ids']) == 0)
{
	$_SESSION['msg'] = 'At least select one record to delete';
	header("location: tutor_mge_project_main.php");
	exit();
}

include('db_connection.php');

$project_ids_count = count($_POST['project_ids']);

$_SESSION['msg'] = '';

for($v=0; $v < $project_ids_count; $v++)
{
	//echo 'chkUserIDs[' . $v . '] = ' . $_REQUEST['chkUserIDs'][$v] . '<br />';
	
	//$sql = "DELETE FROM contacts WHERE contactID=" . $_REQUEST['chkContactIDs'][$v] . ";";
	$sql = 'DELETE FROM project WHERE project_id = ' . $_POST['project_ids'][$v] . ' LIMIT 1;';
	
	//echo "<br>$sql<br>";

	if (!mysql_query($sql))
	{
		$_SESSION['msg'] = $_SESSION['msg'] . mysql_errno() . '<br />Error: ' . mysql_error() . '<br /><br />';
	}

} // for($v=0; $v < $chkUserIDs_count; $v++)

if($_SESSION['msg'] == '')
{
	$_SESSION['msg'] = 'Records deleted successfully.';
}

header('Location: tutor_mge_project_main.php');
exit;
?>
