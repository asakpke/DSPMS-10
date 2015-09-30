<?php
if($_SESSION['admin_id'] != 0)
{ 
	?>
	<div id="submenu">
	<div align="right" class="smallgraytext" style="padding:9px;">
	<span class="smallredtext">Admin: </span>
	<a href="admin_mge_tutor_main.php">Manage Tutor</a> | 
	<a href="admin_mge_supervisor_main.php">Manage Supervisor</a> | 
	<a href="admin_mge_student_main.php">Manage Student</a> | 
	<a href="admin_edit.php?admin_id=<?php echo $_SESSION['admin_id'];?>">Edit</a> | 
	<a href="admin_logout.php">Logout</a>
	</div>
	</div>
	<?php
}
?>

<?php include("msg.php"); ?>




