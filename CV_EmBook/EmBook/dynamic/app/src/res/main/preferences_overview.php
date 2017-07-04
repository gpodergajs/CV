<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/res/support/serializer.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Options.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Notification.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Comment.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/User.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Preferences.php';

	$data_roombook = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/data_preferences.inc.php');
		
	$Preferences = unserialize($data_roombook);
	
	/*
	 * 	@User notifications
	 * 
	 */
	
	$_SESSION['notification_count'] = $Preferences->get_user_notification_count($_SESSION['login_user']);
	
	if(!empty($_SESSION['notifications_liveBox'])){
	
		$table_notification_sphere = array();
		$table_notification_message = array();
		
		foreach($Preferences->table_user[$_SESSION['login_index']]->table_notifications as $Notification){
				
				switch($Notification->hazard_degree){				
					case 1:
						$icon = '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>';
						break;
					case 2:
						$icon = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i>';
						break;
					default:
						$icon = null;
						break;			
				}
				
				array_unshift($table_notification_sphere, (string)$Notification->sphere.' '.$icon);
				array_unshift($table_notification_message, substr((string)$Notification->message,0,33).'..');
		
		}
		
	}
	
?>