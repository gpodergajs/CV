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
			
			case 'insert':
				
				$Preferences->add(new Comment($_SESSION['login_user'] , $_POST['type'], $_POST['title'], $_POST['message']), null);

				#Save the file
				serialize_object($Preferences);
				
				header("Location: overview_comments.php");
				exit;	
				break;
			default:
				
				foreach($Preferences->table_user[$_SESSION['login_index']]->table_comments as $Comment){
					if($Comment->id == $_POST['submit']){
						$Comment->is_noticed = 1;
					}
				}
				
				#Save the file
				serialize_object($Preferences);
				
				header("Location: overview_comments.php");
				exit;				
				break;
			
			
		}
		
		
	}

?>