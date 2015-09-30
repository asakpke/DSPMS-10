<?php include("session_start.php"); ?>

<?php include("tutor_authenticate.php"); ?>


<?php
// form submited code
if(isset($_POST['name']))
{
	if($_POST['name'] == '')
	{
		$_SESSION['msg'] = 'Please enter project name.';
		header('Location: tutor_mge_project_new.php');
		exit;
	}
	
	include('db_connection.php');

	//echo '<br />Breaked 1<br />';
	//break;
	//echo '<br />Breaked 2<br />';
	//exit;

  
	$sql = 'INSERT INTO project VALUES ( ' . $_SESSION['tutor_id'] . ', ' . 
		($_POST['supervisor_id'] == '' ? 'NULL' : $_POST['supervisor_id']) . ', ' . 
		($_POST['student_id']  == '' ? 'NULL' : $_POST['student_id']) . ", NULL , '" . 
		$_POST['name'] . "', '" . 
		$_POST['start_date'] . "', '" . $_POST['first_review_date'] . "', '" . 
		$_POST['second_review_date'] . "', '" . $_POST['submission_date'] . 
		"', NULL, NULL, NULL, NULL, NULL, NULL, NULL);"; 

	//echo '<br />sql = ' . $sql . '<br />';
	//exit;

	if(!mysql_query($sql))
	{
		if(mysql_errno() == 1062) // rec exists
		{
			//print 'Record already exists for "' . $_REQUEST['txtFullName'] . '"';
			$_SESSION['msg'] = 'Record already exists with name: ' . $_POST['name'];
		}
		else
		{
			$_SESSION['msg'] = mysql_errno() . '<br />Error: ' . mysql_error();
		}
	} // if(!mysql_query($sql))
	else
	{
		$_SESSION['msg'] =  $_POST['name'] . "'s record created successfully.";
	}

	header('Location: tutor_mge_project_main.php');		
	exit;

	//mysql_close($con);
	//echo "<br>end";
}

?>

<?php include("top.php"); ?>


<?php include("tutor_submenu.php"); ?>

<div id="contenttext">

<div style="padding:10px">
<span class="titletext">New Project</span> </div>

<div class="bodytext" style="padding:12px;" align="justify">
<strong>New Project</strong>
<p>Here we will add new Project.</p>

<script type="text/javascript" language="javascript" src="js/cal2.js"></script>
<table align="center" border="1">
<form action="tutor_mge_project_new.php" method="post" name="frm">
<tr><td>Supervisor:</td>
<td><select name="supervisor_id">
<option value="">------------------------------</option>
<?php
include('db_connection.php');

$sql = 'SELECT * FROM supervisor ORDER BY name;';
$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
{
	echo '<option value="' . $row['supervisor_id'] . '">' . $row['name'] . '</option>';
}
?>
</select></td></tr>
<tr><td>Student:	</td>
<td><select name="student_id">
<option value="">------------------------------</option>
<?php
include('db_connection.php');

$sql = 'SELECT * FROM student ORDER BY name;';
$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
{
	echo '<option value="' . $row['student_id'] . '">' . $row['name'] . '</option>';
}
?>
</select></td></tr>
<tr><td>Name:</td><td><input type="text" name="name" /></td></tr>
<tr><td>Start Date:</td><td>
	<input type="text" name="start_date" title="Format: yyyy-mm-dd" />
	<a href="javascript:showCal('start_date')" title="Click here to select date">
	<img src="images/calender.jpg" width="22" height="21" border="0" /></a>
</td></tr>
<tr><td>First Review Date:</td><td>
	<input type="text" name="first_review_date" title="Format: yyyy-mm-dd" />
	<a href="javascript:showCal('first_review_date')" title="Click here to select date">
	<img src="images/calender.jpg" width="22" height="21" border="0" /></a>
</td></tr>
<tr><td>Second Review Date:</td><td>
	<input type="text" name="second_review_date" title="Format: yyyy-mm-dd" />
	<a href="javascript:showCal('second_review_date')" title="Click here to select date">
	<img src="images/calender.jpg" width="22" height="21" border="0" /></a>
</td></tr>
<tr><td>Submission Date:</td><td>
	<input type="text" name="submission_date" title="Format: yyyy-mm-dd" />
	<a href="javascript:showCal('submission_date')" title="Click here to select date">
	<img src="images/calender.jpg" width="22" height="21" border="0" /></a>
</td></tr>
<tr><td align="center"> <input type="button" value="Back" onclick="location.href = 'tutor_mge_project_main.php';"/>  
</td><td align="center" />
	<input type="submit" value="Create" />
	<input type="reset" />
</td></tr>
</form>
</table>

</div>
</div>

<?php include("bottom.php"); ?>
