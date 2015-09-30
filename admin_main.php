<?php include("session_start.php"); ?>

<?php
//session_start();
//echo '<br />admin_main.php';
//echo '<br />isset session = ' . isset($_SESSION);
//echo '<br />admin_login = ' . $_SESSION['admin_login'];
//exit;
?> 

<?php include("admin_authenticate.php"); ?>

<?php include("top.php"); ?>

<?php include("admin_submenu.php"); ?>

<div id="contenttext">

<div style="padding:10px">
<span class="titletext">Admin Main Page</span> </div>

<div class="bodytext" style="padding:12px;" align="justify">
<strong>Welcome Admin!</strong>
<p>This is admin's main page.</p>
</div>
</div>

<?php include("bottom.php"); ?>
