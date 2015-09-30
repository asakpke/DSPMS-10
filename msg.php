<?php
//echo '<br />isset($_SESSION) = ' . isset($_SESSION) . ' = ' . $_SESSION . '<br />';
//echo '<br />isset($_SESSION[msg]) = ' . isset($_SESSION['msg']) . ' = ' . $_SESSION['msg'] . '<br />';
//echo '<br />isset($_SESSION[admin_login]) = ' . isset($_SESSION['admin_login']) . ' = ' . $_SESSION['admin_login'] . '<br />';

if($_SESSION['msg'] != '')
{
	echo '<span class="smallredtext">'. $_SESSION['msg'] . '</span>';
	$_SESSION['msg'] = '';
}
?>
