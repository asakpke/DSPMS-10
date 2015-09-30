<?php include("session_start.php"); ?>

<?php include("admin_authenticate.php"); ?>

<?php
//echo 'count(tutor_ids) = ' . count($_POST['tutor_ids']) . '<br />';
//exit;

if(count($_POST['tutor_ids']) == 0)
{
	$_SESSION['msg'] = 'At least select one record to delete';
	header("location: admin_mge_tutor_main.php");
	exit();
}

include('db_connection.php');

$tutor_ids_count = count($_POST['tutor_ids']);

$_SESSION['msg'] = '';

for($v=0; $v < $tutor_ids_count; $v++)
{
	//echo 'chkUserIDs[' . $v . '] = ' . $_REQUEST['chkUserIDs'][$v] . '<br />';
	
	//$sql = "DELETE FROM contacts WHERE contactID=" . $_REQUEST['chkContactIDs'][$v] . ";";
	$sql = 'DELETE FROM tutor WHERE tutor_id = ' . $_POST['tutor_ids'][$v] . ' LIMIT 1;';
	
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

header('Location: admin_mge_tutor_main.php');
exit;
?>
