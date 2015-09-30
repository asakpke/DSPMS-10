<?php include("session_start.php"); ?>

<?php
$_SESSION['student_id'] = 0;
$_SESSION['msg'] = 'You are successfully logout from the system.';

header('Location: student_login.php');
exit;
?>
