<?php

	if(isset($_POST['submit'])){

		$index = $_POST['room_index'];
		$decision = $_POST['submit'];


		switch ($decision) {
			
			case 'enable':
			   	$RoomBook->getRm($index)->setAvailability(1);
				break;
			
			case 'disable':
				$RoomBook->getRm($index)->setAvailability(0);
				break;	

			default:
				break;
		}
		


	}

?>