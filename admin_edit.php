<?php include("session_start.php"); ?>

<?php include("admin_authenticate.php"); ?>

<?php

// form submited code
if(isset($_POST['admin_id']))
{	
	include('db_connection.php');
  
	$sql = "UPDATE admin SET " . 
		"   login = '" . $_POST['login'] . 
		"', password = '" . $_POST['password'] . 
		"', name = '" . $_POST['name'] . 
		"' WHERE admin_id = " . $_POST['admin_id'] . " LIMIT 1;"; 

	//echo '<br />sql = ' . $sql . '<br />';
	//exit;

	if(!mysqli_query($sql))
	{
		if(mysqli_errno() == 1062) // rec exists
		{
			//print 'Record already exists for "' . $_REQUEST['txtFullName'] . '"';
			$_SESSION['msg'] = 'Record already exists with this login: ' . $_POST['login'];
		}
		else
		{
			$_SESSION['msg'] = mysqli_errno() . '<br />Error: ' . mysqli_error();
		}
	} // if(!mysqli_query($sql))
	else
	{
		$_SESSION['msg'] =  'Record updated successfully.';
	}

	$_GET['admin_id'] = $_POST['admin_id'];

	//mysqli_close($con);
	//echo "<br>end";
}


// else code
if(isset($_GET['admin_id']))
{
	include('db_connection.php');
  
	$sql = 'SELECT * FROM admin WHERE admin_id = ' . $_GET['admin_id'];
	$result = mysqli_query($sql);

	//echo '<br />sql = ' . $sql . '<br />';
	//exit;

	$row = mysqli_fetch_array($result);

	//mysqli_close($con);
	//echo "<br>end";
}

?>

<?php include("top.php"); ?>

<?php include("admin_submenu.php"); ?>

<div id="contenttext">

<div style="padding:10px">
<span class="titletext">Edit Admin</span> </div>

<div class="bodytext" style="padding:12px;" align="justify">
<strong>Edit Admin</strong>
<p>Here we will edit Admin.</p>

<table align="center" border="1">
<form action="admin_edit.php" method="post">
<tr>
	<td><strong>Admin ID:</strong>		</td>
	<td>
		<?php echo $row['admin_id'];?> &nbsp;
		<input type="hidden" name="admin_id" value="<?php echo $row['admin_id'];?>"  />
	</td>
</tr>
<tr><td><strong>Login:</strong>		</td><td><input type="text" name="login" value="<?php echo $row['login'];?>" /> 		</td></tr>
<tr><td><strong>Password:</strong>	</td><td><input type="password" name="password" value="<?php echo $row['password'];?>" />	</td></tr>
<tr><td><strong>Name:</strong>		</td><td><input type="text" name="name" value="<?php echo $row['name'];?>" />	</td></tr>
<tr><td align="center">
	<input type="button" value="Back" onclick="location.href = 'admin_main.php';"/> 
</td><td align="center" />
	<input type="submit" value="Update" />
	<input type="reset" />
</td></tr>
</form>
</table>

</div>
</div>

<?php include("bottom.php"); ?>
