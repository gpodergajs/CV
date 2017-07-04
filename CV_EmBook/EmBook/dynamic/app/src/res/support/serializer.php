<?php

	/*
	 * @cripster 2016
	 * 
	 * @serialize_object()
	 * 	- which data object to serialize 
	 * 
	 * @update_repository()
	 * 	1. Destroy the old #data_x file
	 * 	2. Serialize the new #Object
	 * 
	 */
	
	function serialize_object($Object){
		
		switch (get_class($Object)){
		
			case 'Preferences':
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Options.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Notification.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Comment.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/User.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Preferences.php';
								
				update_repository($Object, 'data_preferences');
				break;

			case 'RoomBook':
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.bookkeeping/class.simb.iroks.roombook/Room.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.bookkeeping/class.simb.iroks.roombook/RoomBook.php';
					
				update_repository($Object, 'data_roombook');
				break;

			case 'ReservationBook':
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.accounting/class.simb.iroks.reservationbook/Reservation.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.accounting/class.simb.iroks.reservationbook/ReservationBook.php';
					
				update_repository($Object, 'data_reservationbook');
				break;

			default:
				break;
		}
		
	}
	
	function update_repository($Object, $repository_name){

		$serialized = serialize($Object);
		
		if(file_exists($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/'.$repository_name.'.inc.php')){
			unlink($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/'.$repository_name.'.inc.php');
		}
		
		file_put_contents($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/'.$repository_name.'.inc.php', $serialized);
		
		
	}

?>