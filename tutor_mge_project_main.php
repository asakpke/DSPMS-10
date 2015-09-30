<?php include("session_start.php"); ?>

<?php include("tutor_authenticate.php"); ?>

<?php include("top.php"); ?>

<?php include("tutor_submenu.php"); ?>

<div id="contenttext">

<div style="padding:10px">
<span class="titletext">Manage Project</span> </div>

<div class="bodytext" style="padding:12px;" align="justify">
<strong>Manage Project</strong>
<p>Here you can manage (add new, edit, delete) Project(s).</p>

<script type="text/javascript" src="js/delAll.js" >
</script>
<script type="text/javascript">
<!--
function checkAll(field)
{
for (i = 0; i < field.length; i++)
	field[i].checked = true ;
}
//-->
</script>
<style type="text/css">
<!--
.style1 {color: #CCCCFF}
-->
</style>

<script language="JavaScript">
<!--
function over(id,color)
{	
	document.getElementById(id).style.backgroundColor = color;
}

function out(id,color)
{	
	document.getElementById(id).style.backgroundColor = color;
}
//-->
</script>

<form name="frmSearch" onSubmit="JavaScript: location.href = 'tutor_mge_project_main.php?name=' + frmSearch.txtName.value; return false;">
  <table align="center" style="background:#CCCCFF">
    <tr>
      <td>&nbsp; Name:</td>
      <td><input type="text" name="txtName" size="35" /></td>
      <td><input type="submit" value="Find" title="Click to search. With empty text, it will return all records."  /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<form id="frm"  name="frm" method="post" action="tutor_mge_project_del_sel.php" onSubmit="return DeleteAll()" >
  <table align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCFF">
    <tr>
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>
	<div align="center">
	  <a href="tutor_mge_project_new.php" title="Add New Record"><img src="images/b_edit.png" border="0" /></a>
          <input name="image" type="image" title="Delete selected records" src="images/b_drop.png" />
        </div>
      </td>
    </tr>
    <tr>
      <th id="ab"> &nbsp;  
		<a href="javascript:selectAll();" title='Click to select/de-select all records'>C</a>
        <hr /></th>
      <th> &nbsp; Project ID &nbsp;
        <hr /></th>
      <th> &nbsp; Name &nbsp;        
      <hr /></th>
      <th> &nbsp; Supervisor &nbsp;
        <hr /></th>
      <th> &nbsp; Student &nbsp;
        <hr /></th>
      <th> &nbsp; Action &nbsp;
        <hr /></th>
    </tr>
<?php
include('db_connection.php');
if(isset($_GET['name']) && $_GET['name'] != '')
{

	$sql = 'SELECT project_id, pj.name pj_name, sp.name sp_name, st.name st_name ' . 
		'FROM (project pj ' . 
		'LEFT JOIN supervisor sp ON pj.supervisor_id = sp.supervisor_id) ' . 
		'LEFT JOIN student st    ON pj.student_id    = st.student_id ' . 
		'WHERE pj.tutor_id = ' . $_SESSION['tutor_id'] . 
		" AND (pj.name LIKE '%" . $_GET['name'] . 
		"%' OR sp.name LIKE '%" . $_GET['name'] . 
		"%' OR st.name LIKE '%" . $_GET['name'] . "%') ORDER BY project_id DESC;";

}
else
{

	$sql = 'SELECT project_id, pj.name pj_name, sp.name sp_name, st.name st_name ' . 
		'FROM (project pj ' .  
		'LEFT JOIN supervisor sp ON pj.supervisor_id = sp.supervisor_id) ' . 
		'LEFT JOIN student st    ON pj.student_id    = st.student_id ' . 
		'WHERE pj.tutor_id = ' . $_SESSION['tutor_id'] . ' ORDER BY project_id DESC;'; 

}

//echo "<br />sql = $sql<br />";
//exit;

$result = mysql_query($sql);

if(mysql_num_rows($result) == 0)
	print '<tr><td colspan="5" align="center"> &nbsp; No record found &nbsp; </td></tr>';
else
{
	$count = 0;
	while($row = mysql_fetch_array($result))
	{
		$count++;
		?>
		<tr id="row<?php echo $count; ?>" onmouseover="over(this.id,'lightgreen')" onmouseout="out(this.id,'#CCCCFF')">
			<td><input type="checkbox" name="project_ids[]" value="<?php echo $row['project_id'] ?>"> &nbsp; </td>
			<td align="center"><?php echo $row['project_id'] ?> &nbsp; </td>
			<td align="center"><?php echo $row['pj_name'] ?> &nbsp; </td>
			<td><?php echo $row['sp_name'] ?> &nbsp; </td>
			<td><?php echo $row['st_name'] ?> &nbsp; </td>
			<td>
				<input type="image" onClick="JavaScript: location.href = 'tutor_mge_project_show.php?project_id=' + this.value; return false;" src="images/b_browse.png" title="Browse record" value="<?php echo $row['project_id'] ?>" />
        			<input type="image" onClick="JavaScript: location.href = 'tutor_mge_project_edit.php?project_id=' + this.value; return false;" src="images/b_edit.png" title="Edit record" value="<?php echo $row['project_id'] ?>" />
				<input type="image" onClick="JavaScript: res = confirm('Are you sure to delete this contact'); if(res != 0) location.href = 'tutor_mge_project_del.php?project_id=' + this.value; return false;" src="images/b_drop.png" title="Delete record" value="<?php echo $row['project_id'] ?>" />
				&nbsp;
			</td>
		</tr>
		<?php
	} // while($row = mysql_fetch_array($result)) // if($row)		
} // if(mysql_num_rows($result) == 0)
?>
    <tr>
      <td><hr /></td>
      <td><hr /></td>
      <td><hr /></td>
      <td><hr /></td>
      <td><hr /></td>
      <td><hr /></td>
    </tr>
  </table>
</form>


</div>
</div>

<?php include("bottom.php"); ?>

