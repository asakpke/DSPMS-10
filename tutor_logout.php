<?php include("session_start.php"); ?>

<?php
$_SESSION['tutor_id'] = 0;
$_SESSION['msg'] = 'You are successfully logout from the system.';

header('Location: tutor_login.php');
exit;
?>
