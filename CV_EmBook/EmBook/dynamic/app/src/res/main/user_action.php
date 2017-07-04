<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/res/support/serializer.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Options.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Notification.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Comment.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/User.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Preferences.php';

$data_roombook = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/data_preferences.inc.php');

$Preferences = unserialize($data_roombook);

if(isset($_POST['submit'])){
	
	switch($_POST['submit']){
		
		case 'options':
			
			$Preferences->table_user[$_SESSION['login_index']]->set_new_options(new Options($_POST['login_onTime'], $_POST['image_bg'] , 0));
			
			#Prav tako ponastavimo spremenljivke v seji, da se shranijo že takoj po spremembi
			$_SESSION['logout_onTime'] = $Preferences->get_user_options('logout_onTime', $_SESSION['login_index']);
			$_SESSION['image_bg_path'] = $Preferences->get_user_options('image_bg_path', $_SESSION['login_index']);
			$_SESSION['file_css_path'] = $Preferences->get_user_options('file_css_path', $_SESSION['login_index']);		
			
			#Save the file
			serialize_object($Preferences);
			
			header("Location: settings.php?ote=stg&dgr=0");
			exit;			
			break;
		default:
			header("Location: settings.php");
			exit;
			break;
		
		
	}

}