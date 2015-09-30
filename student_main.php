<?php include("session_start.php"); ?>

<?php
//session_start();
//echo '<br />student_main.php';
//echo '<br />isset session = ' . isset($_SESSION);
//echo '<br />student_login = ' . $_SESSION['student_login'];
//exit;
?> 

<?php include("student_authenticate.php"); ?>

<?php include("top.php"); ?>

<?php include("student_submenu.php"); ?>

<div id="contenttext">

<div style="padding:10px">
<span class="titletext">Student Main Page</span> </div>

<div class="bodytext" style="padding:12px;" align="justify">
<strong>Welcome Student!</strong>
<p>This is Student's main page.</p>
</div>
</div>

<?php include("bottom.php"); ?>
