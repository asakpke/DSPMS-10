<?php
if($_SESSION['tutor_id'] != 0)
{ 
	?>
	<div id="submenu">
	<div align="right" class="smallgraytext" style="padding:9px;">
	<span class="smallredtext">Tutor: </span>
	<a href="tutor_mge_project_main.php">Manage Project</a> | 
	<a href="tutor_edit.php?tutor_id=<?php echo $_SESSION['tutor_id'];?>">Edit</a> | 
	<a href="tutor_logout.php">Logout</a>
	</div>
	</div>
	<?php
}
?>

<?php include("msg.php"); ?>

