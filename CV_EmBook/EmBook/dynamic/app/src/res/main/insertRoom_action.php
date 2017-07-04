<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.bookkeeping/class.simb.iroks.roombook/Room.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.bookkeeping/class.simb.iroks.roombook/RoomBook.php';
	
	$data_roombook = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/data_roombook.inc.php');
	
	$RoomBook = unserialize($data_roombook);



	if(isset($_POST['submit'])){
		
		switch($_POST['submit']){
		
			case 'insert':
				
				$accessoryTMP =explode(",",$_POST['accessory']);
				$RoomBook->add(new Room( $_POST['name'], $_POST['category'], $_POST['cost'], $_POST['grade'], $_POST['description'], $_POST['package'], $_POST['terms'], $_POST['title_simbolic'], $_POST['type'], $_POST['accessory']), null );
				
				serialize_object($RoomBook);
				
				header("Location: index.php");
	
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Options.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Notification.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Comment.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/User.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Preferences.php';
				
				$data_roombook = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/data_preferences.inc.php');
				
				$Preferences = unserialize($data_roombook);
				
				$Preferences->notify_all(new Notification('room0', 0), $_SESSION['login_index']);
				serialize_object($Preferences);
				
				exit;	
				break;

		}

	}





?>