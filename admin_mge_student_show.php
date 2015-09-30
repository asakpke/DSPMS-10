<?php include("session_start.php"); ?>

<?php include("admin_authenticate.php"); ?>

<?php
// form submited code
if(isset($_GET['student_id']))
{
	include('db_connection.php');
  
	$sql = 'SELECT project_id, pj.name pj_name, sp.name sp_name, st.name st_name,  ' . 
		'FROM (project pj ' .  
		'LEFT JOIN supervisor sp ON pj.supervisor_id = sp.supervisor_id) ' . 
		'LEFT JOIN student st    ON pj.student_id    = st.student_id ' . 
		'WHERE pj.tutor_id = ' . $_SESSION['tutor_id'] . ';'; 

	$result = mysql_query($sql);

	//echo '<br />sql = ' . $sql . '<br />';
	//exit;

	$row = mysql_fetch_array($result);

	//mysql_close($con);
	//echo "<br>end";
}

?>

<?php include("top.php"); ?>

<?php include("admin_submenu.php"); ?>

<div id="contenttext">

<div style="padding:10px">
<span class="titletext">Student Record</span> </div>

<div class="bodytext" style="padding:12px;" align="justify">
<strong>Student Record</strong>
<p>Here we can see a Student record.</p>

<table align="center" border="1">
<!-- <form action="admin_mge_student_new.php" method="post"> -->
<tr><td><strong>student ID:</strong>		</td><td><?php echo $row['student_id'];?> &nbsp; 		</td></tr>
<tr><td><strong>Login:</strong>		</td><td><?php echo $row['login'];?> &nbsp; 		</td></tr>
<tr><td><strong>Password:</strong>	</td><td><?php echo $row['password'];?> &nbsp; 	</td></tr>
<tr><td><strong>Name:</strong>		</td><td><?php echo $row['name'];?> &nbsp; 	</td></tr>

<tr><td align="center"> <input type="button" value="Back" onclick="location.href = 'admin_mge_student_main.php';" /> 
</td><td align="center" />
<!--
	<input type="submit" value="Create" />
	<input type="reset" />
-->
	&nbsp;
</td></tr>
<!-- </form> -->
</table>

</div>
</div>

<?php include("bottom.php"); ?>
