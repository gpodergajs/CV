<?php
	session_start();
	
	$_SESSION['login_index'] = null;
	$_SESSION['login_role'] = null;
	$_SESSION['login_time'] = null;
	
	header("Location: ../../../secure/sleep.php");
	exit;
?>