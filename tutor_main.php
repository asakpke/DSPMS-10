<?php include("session_start.php"); ?>

<?php
//session_start();
//echo '<br />tutor_main.php';
//echo '<br />isset session = ' . isset($_SESSION);
//echo '<br />tutor_login = ' . $_SESSION['tutor_login'];
//exit;
?> 

<?php include("tutor_authenticate.php"); ?>

<?php include("top.php"); ?>

<?php include("tutor_submenu.php"); ?>

<div id="contenttext">

<div style="padding:10px">
<span class="titletext">Tutor Main Page</span> </div>

<div class="bodytext" style="padding:12px;" align="justify">
<strong>Welcome Tutor!</strong>
<p>This is Tutor's main page.</p>
</div>
</div>

<?php include("bottom.php"); ?>
