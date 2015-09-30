<?php
$con = mysql_connect('localhost','root','mysql');
if (!$con)
{
	die('<br />Could not connect: ' . mysql_error());
}

// some code
//echo '<br />con = ' . $con; 
$result = mysql_select_db('dspms', $con);
if(!$result)
{
	die('<br />Could not select DB: ' . mysql_error());
}
?>
