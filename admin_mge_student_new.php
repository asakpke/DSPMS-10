<?php include("session_start.php"); ?>

<?php include("admin_authenticate.php"); ?>


<?php
// form submited code
if(isset($_POST['login']) && isset($_POST['password']))
{
	if($_POST['login'] == '' || $_POST['password'] == '')
	{
		$_SESSION['msg'] = 'Please enter login/password.';
		header('Location: admin_mge_student_new.php');
		exit;
	}
	
	include('db_connection.php');

	//echo '<br />Breaked 1<br />';
	//break;
	//echo '<br />Breaked 2<br />';
	//exit;

  
	$sql = "INSERT INTO student VALUES ( NULL , '";
	$sql = $sql . $_POST['login'] . "', '" . $_POST['password'] . "', '" . $_POST['name'] . "');"; 

	//echo '<br />sql = ' . $sql . '<br />';

	if(!mysql_query($sql))
	{
		if(mysql_errno() == 1062) // rec exists
		{
			//print 'Record already exists for "' . $_REQUEST['txtFullName'] . '"';
			$_SESSION['msg'] = 'Record already exists with this login: ' . $_POST['login'];
		}
		else
		{
			$_SESSION['msg'] = mysql_errno() . '<br />Error: ' . mysql_error();
		}
	} // if(!mysql_query($sql))
	else
	{
		$_SESSION['msg'] =  $_POST['login'] . "'s record created successfully.";
	}

	header('Location: admin_mge_student_main.php');		
	exit;

	//mysql_close($con);
	//echo "<br>end";
}

?>

<?php include("top.php"); ?>

<?php include("admin_submenu.php"); ?>

<div id="contenttext">

<div style="padding:10px">
<span class="titletext">New Student</span> </div>

<div class="bodytext" style="padding:12px;" align="justify">
<strong>New Student</strong>
<p>Here we will add new Student.</p>

<table align="center" border="1">
<form action="admin_mge_student_new.php" method="post">
<tr><td>Login:		</td><td><input type="text" 		name="login" />		</td></tr>
<tr><td>Password:	</td><td><input type="password"			name="password" />	</td></tr>
<tr><td>Name:		</td><td><input type="text" 		name="name" />	</td></tr>
<tr><td align="center"> <input type="button" value="Back" onclick="location.href = 'admin_mge_student_main.php';"/>  
</td><td align="center" />
	<input type="submit" value="Create" />
	<input type="reset" />
</td></tr>
</form>
</table>

</div>
</div>

<?php include("bottom.php"); ?>
