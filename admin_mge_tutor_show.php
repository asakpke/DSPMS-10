<?php include("session_start.php"); ?>

<?php include("admin_authenticate.php"); ?>

<?php
// form submited code
if(isset($_GET['tutor_id']))
{
	include('db_connection.php');
  
	$sql = 'SELECT * FROM tutor WHERE tutor_id = ' . $_GET['tutor_id'];
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
<span class="titletext">Tutor Record</span> </div>

<div class="bodytext" style="padding:12px;" align="justify">
<strong>Tutor Record</strong>
<p>Here we can see a tutor record.</p>

<table align="center" border="1">
<!-- <form action="admin_mge_tutor_new.php" method="post"> -->
<tr><td><strong>Tutor ID:</strong>		</td><td><?php echo $row['tutor_id'];?> &nbsp; 		</td></tr>
<tr><td><strong>Login:</strong>		</td><td><?php echo $row['login'];?> &nbsp; 		</td></tr>
<tr><td><strong>Password:</strong>	</td><td><?php echo $row['password'];?> &nbsp; 	</td></tr>
<tr><td><strong>Name:</strong>		</td><td><?php echo $row['name'];?> &nbsp; 	</td></tr>

<tr><td align="center"> <input type="button" value="Back" onclick="location.href = 'admin_mge_tutor_main.php';" /> 
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
