<?php
if($_SESSION['student_id'] != 0)
{ 
	?>
	<div id="submenu">
	<div align="right" class="smallgraytext" style="padding:9px;">
	<span class="smallredtext">Student: </span>
	<a href="student_mge_project_main.php">Manage Project</a> | 
	<a href="student_edit.php?student_id=<?php echo $_SESSION['student_id'];?>">Edit</a> | 
	<a href="student_logout.php">Logout</a>
	</div>
	</div>
	<?php
}
?>

<?php include("msg.php"); ?>

