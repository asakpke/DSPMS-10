<?php include("session_start.php"); ?>

<?php include("tutor_authenticate.php"); ?>

<?php
//echo '<br />START<br />';
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

	$row = mysql_fetch_array($result);

	//mysql_close($con);
	//echo "<br>end";
}
?>

<?php include("top.php"); ?>


<?php include("tutor_submenu.php"); ?>

<div id="contenttext">

<div style="padding:10px">
<span class="titletext">Project Record</span> </div>

<div class="bodytext" style="padding:12px;" align="justify">
<strong>Project Record</strong>
<p>Here we can see a Project record.</p>

<table align="center" border="1">
<tr><td>Supervisor:</td><td><?php echo $row['sp_name'];?> &nbsp;</td></tr>
<tr><td>Student:</td><td><?php echo $row['st_name'];?> &nbsp;</td></tr>
<tr><td>Project ID:</td><td><?php echo $row['project_id'];?> &nbsp;</td></tr>
<tr><td>Name:</td><td><?php echo $row['name'];?> &nbsp;</td></tr>
<tr><td>Start Date:</td><td><?php echo $row['start_date'];?> &nbsp;</td></tr>
<tr><td>First Review Date:</td><td><?php echo $row['first_review_date'];?> &nbsp;</td></tr>
<tr><td>Second Review Date:</td><td><?php echo $row['second_review_date'];?> &nbsp;</td></tr>
<tr><td>Submission Date:</td><td><?php echo $row['submission_date'];?> &nbsp;</td></tr>
<tr><td>Terms of Reference:</td><td><a href="upload/<?php echo $row['terms_of_reference'];?>"><?php echo $row['terms_of_reference'];?></a> &nbsp;</td></tr>
<tr><td>Project Schedule:</td><td><a href="upload/<?php echo $row['project_schedule'];?>"><?php echo $row['project_schedule'];?></a> &nbsp;</td></tr>
<tr><td>Gantt Chart:</td><td><a href="upload/<?php echo $row['gantt_chart'];?>"><?php echo $row['gantt_chart'];?></a> &nbsp;</td></tr>
<tr><td>Project Log:</td><td><a href="upload/<?php echo $row['project_log'];?>"><?php echo $row['project_log'];?></a> &nbsp;</td></tr>
<tr><td>Research Chapter:</td><td><a href="upload/<?php echo $row['research_chapter'];?>"><?php echo $row['research_chapter'];?></a> &nbsp;</td></tr>
<tr><td>Dissertation Table of Content:</td><td><a href="upload/<?php echo $row['dissertation_table_of_content'];?>"><?php echo $row['dissertation_table_of_content'];?></a> &nbsp;</td></tr>
<tr><td>Dissertation:</td><td><a href="upload/<?php echo $row['dissertation'];?>"><?php echo $row['dissertation'];?></a> &nbsp;</td></tr>
<tr><td align="center"> <input type="button" value="Back" onclick="location.href = 'tutor_mge_project_main.php';"/></td><td align="center" />&nbsp;</td></tr>
</table>

</div>
</div>

<?php include("bottom.php"); ?>
