<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/res/support/serializer.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Options.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Notification.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Comment.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/User.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Preferences.php';
	
	$data_roombook = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/data_preferences.inc.php');
	
	$Preferences = unserialize($data_roombook);
	
	$_SESSION['notification_count'] = $Preferences->get_user_notification_count($_SESSION['login_index']);
	
	if(isset($_POST['submit'])){
		
		switch($_POST['submit']){
		
			case 'check_all':

				foreach($Preferences->table_user[$_SESSION['login_index']]->table_notifications as $Notification){
					if(empty($Notification->is_noticed)){
						$Notification->is_noticed = 1;
					}
				}
				
				#Save the file
				serialize_object($Preferences);
				
				$_SESSION['notification_count'] = $Preferences->get_user_notification_count($_SESSION['login_index']);
				
				header("Location: overview_notifications.php");
				exit;
				break;
			default:
				
				foreach($Preferences->table_user[$_SESSION['login_index']]->table_notifications as $Notification){
					if($Notification->id == $_POST['submit']){
						$Notification->is_noticed = 1;
					}
				}
				
				#Save the file
				serialize_object($Preferences);
				
				$_SESSION['notification_count'] = $Preferences->get_user_notification_count($_SESSION['login_index']);
				
				header("Location: overview_notifications.php");
				exit;				
				break;
		}
	}
	
?>