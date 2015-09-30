<?php
if($_SESSION['supervisor_id'] != 0)
{ 
	?>
	<div id="submenu">
	<div align="right" class="smallgraytext" style="padding:9px;">
	<span class="smallredtext">Supervisor: </span>
	<a href="supervisor_mge_project_main.php">Manage Project</a> | 
	<a href="supervisor_edit.php?supervisor_id=<?php echo $_SESSION['supervisor_id'];?>">Edit</a> | 
	<a href="supervisor_logout.php">Logout</a>
	</div>
	</div>
	<?php
}
?>

<?php include("msg.php"); ?>

