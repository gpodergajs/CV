<?php
session_start();

if(isset($_SESSION['login_index'])){
	header("Location: secure/index.php");
	exit;	
}

if (isset($_POST['submit'])) {
	if (empty($_POST['password']) || empty($_POST['email'])) {
		
		header("Location: ".$_POST['submit']."?ote=inp&dgr=0");
		exit;
	}else{
		
		require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/res/support/serializer.php';
		require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Options.php';
		require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Notification.php';
		require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Comment.php';
		require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/User.php';
		require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Preferences.php';
	
		$data_roombook = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/data_preferences.inc.php');
		
		$Preferences = unserialize($data_roombook);
		
		$validation = $Preferences->validate_user($_POST['email']);
		
		if($validation == 0){
			
			header("Location: ".$_POST['submit']."?ote=inp&dgr=1");
			exit;
		}else if($Preferences->verify_user($_POST['password']) == 0){
			require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/res/support/serializer.php';
			
			$Preferences->add(new Notification('log2', 0), $Preferences->get_user_index($_POST['email']));
			serialize_object($Preferences);
			
			header("Location: ".$_POST['submit']."?ote=inp&dgr=1");
			exit;
		}else{
			
			require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/res/support/serializer.php';
			
// 			if(file_exists($_SERVER['DOCUMENT_ROOT'].'/app/src/temp/create.php')){
// 				unlink($_SERVER['DOCUMENT_ROOT'].'/app/src/temp/create.php');
// 			}
			
			$_SESSION['login_index'] = $Preferences->get_user_index($_POST['email']);
			$_SESSION['login_role'] = $Preferences->get_user_role($_POST['email']);
			$_SESSION['login_user'] = $Preferences->get_user_name($_POST['email']);
			$_SESSION['login_time'] = time();
					
			$Preferences->add(new Notification('log1', 0), $_SESSION['login_index']);
			
			$_SESSION['notification_count'] = $Preferences->get_user_notification_count($_SESSION['login_index']);
			$_SESSION['logout_onTime'] = $Preferences->get_user_options('logout_onTime', $_SESSION['login_index']);
			$_SESSION['image_bg_path'] = $Preferences->get_user_options('image_bg_path', $_SESSION['login_index']);
			$_SESSION['file_css_path'] = $Preferences->get_user_options('file_css_path', $_SESSION['login_index']);
			
			serialize_object($Preferences);
			
			if($_POST['submit'] == 'sleep.php'){
				header("Location: index.php");
			}else{
				header("Location: secure/index.php");
			}
			exit;
		}
	}
}else{

}

?>
