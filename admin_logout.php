<?php include("session_start.php"); ?>

<?php
$_SESSION['admin_id'] = 0;
$_SESSION['msg'] = 'You are successfully logout from the system.';

header('Location: admin_login.php');
exit;
?>
