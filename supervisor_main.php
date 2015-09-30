<?php include("session_start.php"); ?>

<?php
//session_start();
//echo '<br />supervisor_main.php';
//echo '<br />isset session = ' . isset($_SESSION);
//echo '<br />supervisor_login = ' . $_SESSION['supervisor_login'];
//exit;
?> 

<?php include("supervisor_authenticate.php"); ?>

<?php include("top.php"); ?>

<?php include("supervisor_submenu.php"); ?>

<div id="contenttext">

<div style="padding:10px">
<span class="titletext">Supervisor Main Page</span> </div>

<div class="bodytext" style="padding:12px;" align="justify">
<strong>Welcome Supervisor!</strong>
<p>This is Supervisor's main page.</p>
</div>
</div>

<?php include("bottom.php"); ?>
