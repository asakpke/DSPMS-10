<?php
$con = mysqli_connect('localhost','root','','dspms');
if (!$con)
{
	die('<br />Could not connect: ' . mysqli_error());
}

// some code
//echo '<br />con = ' . $con; 
// $result = mysqli_select_db('dspms', $con);
// if(!$result)
// {
// 	die('<br />Could not select DB: ' . mysqli_error());
// }
