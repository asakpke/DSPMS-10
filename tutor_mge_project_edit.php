<?php include("session_start.php"); ?>

<?php include("tutor_authenticate.php"); ?>


<?php
// form submited code
if(isset($_POST['project_id']))
{
	include('db_connection.php');

	//echo '<br />Breaked 1<br />';
	//break;
	//echo '<br />Breaked 2<br />';
	//exit;

  
	$sql = 'UPDATE project SET ' . 
		'  supervisor_id = ' . ($_POST['supervisor_id'] == '' ? 'NULL' : $_POST['supervisor_id']) . 
		', student_id = ' . ($_POST['student_id']  == '' ? 'NULL' : $_POST['student_id']) . 
		", name = '" . $_POST['name'] .
		"', start_date = '" . $_POST['start_date'] . 
		"', first_review_date = '" . $_POST['first_review_date'] . 
		"', second_review_date = '" . $_POST['second_review_date'] . 
		"', submission_date = '" . $_POST['submission_date'] . 
		"' WHERE project_id = " . $_POST['project_id'] . ' LIMIT 1;'; 

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
		$_SESSION['msg'] =  $_POST['name'] . "'s record updated successfully.";
	}

	$_GET['project_id'] = $_POST['project_id'];

	//mysql_close($con);
	//echo "<br>end";
}

// form submited code
if(isset($_GET['project_id']))
{
	include('db_connection.php');
  
	$sql = 'SELECT sp.name sp_name, st.name st_name, pj.*  ' . 
		'FROM (project pj ' .  
		'LEFT JOIN supervisor sp ON pj.supervisor_id = sp.supervisor_id) ' . 
		'LEFT JOIN student st    ON pj.student_id    = st.student_id ' . 
		'WHERE project_id = ' . $_GET['project_id'] . ' AND pj.tutor_id = ' . $_SESSION['tutor_id'] . ';'; 

	//echo '<br />sql = ' . $sql . '<br />';
	//exit;

	$result = mysql_query($sql);

	$row_project = mysql_fetch_array($result);

	//mysql_close($con);
	//echo "<br>end";
}
?>

<?php include("top.php"); ?>


<?php include("tutor_submenu.php"); ?>

<div id="contenttext">

<div style="padding:10px">
<span class="titletext">Edit Project</span> </div>

<div class="bodytext" style="padding:12px;" align="justify">
<strong>Edit Project</strong>
<p>Here we will edit Project.</p>

<script type="text/javascript" language="javascript" src="js/cal2.js"></script>
<table align="center" border="1">
<form action="tutor_mge_project_edit.php" method="post" name="frm">
<tr><td>Supervisor:</td>
<td><input type="hidden" name="project_id" value="<?php echo $row_project['project_id'];?>" /><select name="supervisor_id">
<option value="">------------------------------</option>
<?php
include('db_connection.php');

$sql = 'SELECT * FROM supervisor ORDER BY name;';
$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
{
	
	if($row['supervisor_id'] == $row_project['supervisor_id'])
		echo '<option value="' . $row_project['supervisor_id'] . '" selected="selected">' . $row_project['sp_name'] . '</option>';
	else
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
	if($row['student_id'] == $row_project['student_id'])
		echo '<option value="' . $row_project['student_id'] . '" selected="selected">' . $row_project['st_name'] . '</option>';
	else
	echo '<option value="' . $row['student_id'] . '">' . $row['name'] . '</option>';
}
?>
</select></td></tr>
<tr><td>Name:</td><td><input type="text" name="name" value="<?php echo $row_project['name'];?>" /></td></tr>
<tr><td>Start Date:</td><td>
	<input type="text" name="start_date" value="<?php echo $row_project['start_date'];?>" title="Format: yyyy-mm-dd" />
	<a href="javascript:showCal('start_date')" title="Click here to select date">
	<img src="images/calender.jpg" width="22" height="21" border="0" /></a>
</td></tr>
<tr><td>First Review Date:</td><td>
	<input type="text" name="first_review_date" value="<?php echo $row_project['first_review_date'];?>" title="Format: yyyy-mm-dd" />
	<a href="javascript:showCal('first_review_date')" title="Click here to select date">
	<img src="images/calender.jpg" width="22" height="21" border="0" /></a>
</td></tr>
<tr><td>Second Review Date:</td><td>
	<input type="text" name="second_review_date" value="<?php echo $row_project['second_review_date'];?>" title="Format: yyyy-mm-dd" />
	<a href="javascript:showCal('second_review_date')" title="Click here to select date">
	<img src="images/calender.jpg" width="22" height="21" border="0" /></a>
</td></tr>
<tr><td>Submission Date:</td><td>
	<input type="text" name="submission_date" value="<?php echo $row_project['submission_date'];?>" title="Format: yyyy-mm-dd" />
	<a href="javascript:showCal('submission_date')" title="Click here to select date">
	<img src="images/calender.jpg" width="22" height="21" border="0" /></a>
</td></tr>
<tr><td align="center"> <input type="button" value="Back" onclick="location.href = 'tutor_mge_project_main.php';"/>  
</td><td align="center" />
	<input type="submit" value="Update" />
	<input type="reset" />
</td></tr>
</form>
</table>

</div>
</div>

<?php include("bottom.php"); ?>
