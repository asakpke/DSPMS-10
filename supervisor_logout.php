<?php include("session_start.php"); ?>

<?php
$_SESSION['supervisor_id'] = 0;
$_SESSION['msg'] = 'You are successfully logout from the system.';

header('Location: supervisor_login.php');
exit;
?>
