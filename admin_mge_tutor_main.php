<?php include("session_start.php"); ?>

<?php include("admin_authenticate.php"); ?>

<?php include("top.php"); ?>

<?php include("admin_submenu.php"); ?>

<div id="contenttext">

<div style="padding:10px">
<span class="titletext">Manage Tutor</span> </div>

<div class="bodytext" style="padding:12px;" align="justify">
<strong>Manage Tutor</strong>
<p>Here you can manage (add new, edit, delete) tutor(s).</p>

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

<form name="frmSearch" onSubmit="JavaScript: location.href = 'admin_mge_tutor_main.php?name=' + frmSearch.txtName.value; return false;">
  <table align="center" style="background:#CCCCFF">
    <tr>
      <td>&nbsp; Name:</td>
      <td><input type="text" name="txtName" /></td>
      <td><input type="submit" value="Find" title="Click to search. With empty text, it will return all records."  /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<form id="frm"  name="frm" method="post" action="admin_mge_tutor_del_sel.php" onSubmit="return DeleteAll()" >
  <table align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCFF">
    <tr>
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>
	<div align="center">
	  <a href="admin_mge_tutor_new.php" title="Add New Record"><img src="images/b_edit.png" border="0" /></a>
          <input name="image" type="image" title="Delete selected records" src="images/b_drop.png" />
        </div>
      </td>
    </tr>
    <tr>
      <th id="ab"> &nbsp;  
		<a href="javascript:selectAll();" title='Click to select/de-select all records'>C</a>
        <hr /></th>
      <th> &nbsp; Tutor ID &nbsp;
        <hr /></th>
      <th> &nbsp; Login &nbsp;
        <hr /></th>
      <th> &nbsp; Name &nbsp;
        <hr /></th>
      <th> &nbsp; Action &nbsp;
        <hr /></th>
    </tr>
<?php
include('db_connection.php');
if(isset($_GET['name']))
{
	$sql = "SELECT * FROM tutor WHERE login LIKE '%" . $_GET['name'] . "%' OR name LIKE '%" . $_GET['name'] . "%' ;";
}
else
{
	$sql = 'SELECT * FROM tutor;';
}

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
			<td><input type="checkbox" name="tutor_ids[]" value="<?php echo $row['tutor_id'] ?>"> &nbsp; </td>
			<td align="center"><?php echo $row['tutor_id'] ?> &nbsp; </td>
			<td><?php echo $row['login'] ?> &nbsp; </td>
			<td><?php echo $row['name'] ?> &nbsp; </td>
			<td>
				<input type="image" onClick="JavaScript: location.href = 'admin_mge_tutor_show.php?tutor_id=' + this.value; return false;" src="images/b_browse.png" title="Browse record" value="<?php echo $row['tutor_id'] ?>" />
        			<input type="image" onClick="JavaScript: location.href = 'admin_mge_tutor_edit.php?tutor_id=' + this.value; return false;" src="images/b_edit.png" title="Edit record" value="<?php echo $row['tutor_id'] ?>" />
				<input type="image" onClick="JavaScript: res = confirm('Are you sure to delete this contact'); if(res != 0) location.href = 'admin_mge_tutor_del.php?tutor_id=' + this.value; return false;" src="images/b_drop.png" title="Delete record" value="<?php echo $row['tutor_id'] ?>" />
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
    </tr>
  </table>
</form>


</div>
</div>

<?php include("bottom.php"); ?>

