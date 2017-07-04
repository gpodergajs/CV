<?php
session_start();

$now = time();

if (!isset($_SESSION ['login_index'])) {
	#Če je spremenljivka nastavjena, potem pojdi v spanje, če ne, pojdi v login
	if(isset($_SESSION['login_user'])){
		header ( 'Location: sleep.php' );
		exit;
	}else{
		header ( 'Location: ../login.php' );
		exit;
	}
}else if($now > $_SESSION['login_time'] + (30 * 60)) {
	if($_SESSION['logout_onTime'] == 1){
		
		#Samo, če ima nastavljeno, da lahko po potečeni seji pojde v spanje..
		$_SESSION['login_index'] = null;
		$_SESSION['login_role'] = null;
		$_SESSION['login_time'] = null;

		header ( 'Location: sleep.php' );
	}else{
		session_destroy();
		header ( 'Location: ../login.php' );
		exit;
	}
}else if ($now < $_SESSION['login_time'] + (30 * 60)) {
	session_regenerate_id(true);
	$_SESSION['login_time'] = $now;
}

?>