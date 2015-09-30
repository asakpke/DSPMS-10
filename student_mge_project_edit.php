<?php include("session_start.php"); ?>

<?php include("student_authenticate.php"); ?>

<?php
// form submited code
if(isset($_POST['project_id']))
{
	include('db_connection.php');
	////////////////////////////
	// NOT COMPLETED - START //
	///////////////////////////
	$sql = 'UPDATE project SET ';

	//1
	if($_FILES['terms_of_reference']['error'] == 0) // 0 = no error
	{
		$strFile = 'terms_of_reference_' . $_POST['project_id'] . strstr($_FILES['terms_of_reference']['name'], '.');
		move_uploaded_file($_FILES['terms_of_reference']['tmp_name'], 'upload/' . $strFile);
		$sql = $sql . " terms_of_reference = '" . $strFile . "'";
	} 
	elseif($_FILES['terms_of_reference']['error'] != 4) // 4 means, no file uploaded
		die('<br />Error: ' . $_FILES['terms_of_reference']['error'] . '<br />');

	//2
	if($_FILES['project_schedule']['error'] == 0) // 0 = no error
	{
		$strFile = 'project_schedule_' . $_POST['project_id'] . strstr($_FILES['project_schedule']['name'], '.');
		move_uploaded_file($_FILES['project_schedule']['tmp_name'], 'upload/' . $strFile);
		if($sql != 'UPDATE project SET ')
			$sql = $sql . ', ';
		$sql = $sql . " project_schedule  = '" . $strFile . "'";
	} 
	elseif($_FILES['project_schedule']['error'] != 4) // 4 means, no file uploaded
		die('<br />Error: ' . $_FILES['project_schedule']['error'] . '<br />');

	//3
	if($_FILES['gantt_chart']['error'] == 0) // 0 = no error
	{
		$strFile = 'gantt_chart_' . $_POST['project_id'] . strstr($_FILES['gantt_chart']['name'], '.');
		move_uploaded_file($_FILES['gantt_chart']['tmp_name'], 'upload/' . $strFile);
		if($sql != 'UPDATE project SET ')
			$sql = $sql . ', ';
		$sql = $sql . " gantt_chart = '" . $strFile . "'";
	} 
	elseif($_FILES['gantt_chart']['error'] != 4) // 4 means, no file uploaded
		die('<br />Error: ' . $_FILES['gantt_chart']['error'] . '<br />');

	//4
	if($_FILES['project_log']['error'] == 0) // 0 = no error
	{
		$strFile = 'project_log_' . $_POST['project_id'] . strstr($_FILES['project_log']['name'], '.');
		move_uploaded_file($_FILES['project_log']['tmp_name'], 'upload/' . $strFile);
		if($sql != 'UPDATE project SET ')
			$sql = $sql . ', ';
		$sql = $sql . " project_log = '" . $strFile . "'";
	} 
	elseif($_FILES['project_log']['error'] != 4) // 4 means, no file uploaded
		die('<br />Error: ' . $_FILES['project_log']['error'] . '<br />');

	//5
	if($_FILES['research_chapter']['error'] == 0) // 0 = no error
	{
		$strFile = 'research_chapter_' . $_POST['project_id'] . strstr($_FILES['research_chapter']['name'], '.');
		move_uploaded_file($_FILES['research_chapter']['tmp_name'], 'upload/' . $strFile);
		if($sql != 'UPDATE project SET ')
			$sql = $sql . ', ';
		$sql = $sql . " research_chapter = '" . $strFile . "'";
	} 
	elseif($_FILES['research_chapter']['error'] != 4) // 4 means, no file uploaded
		die('<br />Error: ' . $_FILES['research_chapter']['error'] . '<br />');

	//6
	if($_FILES['dissertation_table_of_content']['error'] == 0) // 0 = no error
	{
		$strFile = 'dissertation_table_of_content_' . $_POST['project_id'] . strstr($_FILES['dissertation_table_of_content']['name'], '.');
		move_uploaded_file($_FILES['dissertation_table_of_content']['tmp_name'], 'upload/' . $strFile);
		if($sql != 'UPDATE project SET ')
			$sql = $sql . ', ';
		$sql = $sql . " dissertation_table_of_content = '" . $strFile . "'";
	} 
	elseif($_FILES['dissertation_table_of_content']['error'] != 4) // 4 means, no file uploaded
		die('<br />Error: ' . $_FILES['dissertation_table_of_content']['error'] . '<br />');

	//7
	if($_FILES['dissertation']['error'] == 0) // 0 = no error
	{
		$strFile = 'dissertation_' . $_POST['project_id'] . strstr($_FILES['dissertation']['name'], '.');
		move_uploaded_file($_FILES['dissertation']['tmp_name'], 'upload/' . $strFile);
		if($sql != 'UPDATE project SET ')
			$sql = $sql . ', ';
		$sql = $sql . " dissertation = '" . $strFile . "'";
	} 
	elseif($_FILES['dissertation']['error'] != 4) // 4 means, no file uploaded
		die('<br />Error: ' . $_FILES['dissertation']['error'] . '<br />');


	if($sql != 'UPDATE project SET ')
	{
		$sql = $sql . ' WHERE project_id = ' . $_POST['project_id'] . ' LIMIT 1;'; 

		//echo '<br />sql = ' . $sql . '<br />';

		if(!mysql_query($sql))
		{
			if(mysql_errno() == 1062) // rec exists
			{
				//print 'Record already exists for "' . $_REQUEST['txtFullName'] . '"';
				$_SESSION['msg'] = 'Record already exists';
			}
			else
			{
				$_SESSION['msg'] = '<br />' . mysql_errno() . '<br />Error: ' . mysql_error() . '<br />';
			}
		} // if(!mysql_query($sql))
		else
		{
			$_SESSION['msg'] =  'Record updated successfully.';
		}
	} // if($sql != 'UPDATE project SET ')
	else
		$_SESSION['msg'] =  'You have not uploaded any file.';

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
		'WHERE project_id = ' . $_GET['project_id'] . ' AND pj.student_id = ' . $_SESSION['student_id'] . ';'; 

	//echo '<br />sql = ' . $sql . '<br />';
	//exit;

	$result = mysql_query($sql);

	$row = mysql_fetch_array($result);

	//echo date('Y-m-d');
	//echo '<br />' . generateRandomString() . '<br />';
	if($row['submission_date'] < date('Y-m-d'))
	{
		echo '<br />Your date passed<br />';
		$_SESSION['msg'] = 'Your submission date is passed!';
		header('Location: student_mge_project_main.php');
		exit;

	}
	//else
		//echo '<br />Your have date<br />';
}
?>

<?php include("top.php"); ?>


<?php include("student_submenu.php"); ?>

<div id="contenttext">

<div style="padding:10px">
<span class="titletext">Edit Project</span> </div>

<div class="bodytext" style="padding:12px;" align="justify">
<strong>Edit Project</strong>
<p>Here we will edit Project.</p>

<table align="center" border="1">
<form action="student_mge_project_edit.php" method="post" name="frm" enctype="multipart/form-data">
<tr>
	<td>Terms of Reference:</td>
	<td>
		<input type="hidden" name="project_id" value="<?php echo $row['project_id'];?>" />
		<input type="file" name="terms_of_reference" />
		<a href="upload/<?php echo $row['terms_of_reference'];?>" title="Click to view existing  file">
			<?php echo (($row['terms_of_reference'] == '') ? '' : 'View');?>
		</a>
	</td>
</tr>
<tr>
	<td>Project Schedule:</td>
	<td>
		<input type="file" name="project_schedule" />
		<a href="upload/<?php echo $row['project_schedule'];?>" title="Click to view existing  file">
			<?php echo (($row['project_schedule'] == '') ? '' : 'View');?>
		</a>
	</td>
</tr>
<tr>
	<td>Gantt Chart:</td>
	<td>
		<input type="file" name="gantt_chart" />
		<a href="upload/<?php echo $row['gantt_chart'];?>" title="Click to view existing  file">
			<?php echo (($row['gantt_chart'] == '') ? '' : 'View');?>
		</a>
	</td>
</tr>
<tr>
	<td>Project Log:</td>
	<td>
		<input type="file" name="project_log" />
		<a href="upload/<?php echo $row['project_log'];?>" title="Click to view existing  file">
			<?php echo (($row['project_log'] == '') ? '' : 'View');?>
		</a>
	</td>
</tr>
<tr>
	<td>research_chapter:</td>
	<td>
		<input type="file" name="research_chapter" />
		<a href="upload/<?php echo $row['research_chapter'];?>" title="Click to view existing  file">
			<?php echo (($row['research_chapter'] == '') ? '' : 'View');?>
		</a>
	</td>
</tr>
<tr>
	<td>Dissertation Table of Content:</td>
	<td>
		<input type="file" name="dissertation_table_of_content" />
		<a href="upload/<?php echo $row['dissertation_table_of_content'];?>" title="Click to view existing  file">
			<?php echo (($row['dissertation_table_of_content'] == '') ? '' : 'View');?>
		</a>
	</td>
</tr>
<tr>
	<td>Dissertation:</td>
	<td>
		<input type="file" name="dissertation" />
		<a href="upload/<?php echo $row['dissertation'];?>" title="Click to view existing  file">
			<?php echo (($row['dissertation'] == '') ? '' : 'View');?>
		</a>
	</td>
</tr>

<tr><td align="center"> <input type="button" value="Back" onclick="location.href = 'student_mge_project_main.php';"/>  
</td><td align="center" />
	<input type="submit" value="Update" />
	<input type="reset" />
</td></tr>
</form>
</table>

</div>
</div>

<?php include("bottom.php"); ?>
