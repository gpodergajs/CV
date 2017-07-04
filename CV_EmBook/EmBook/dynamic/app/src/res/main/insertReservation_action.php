<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/res/support/serializer.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.accounting/class.simb.iroks.reservationBook/Reservation.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.accounting/class.simb.iroks.reservationBook/ReservationBook.php';
	
	$data_reservationbook = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/data_reservationbook.inc.php');
	
	$ReservationBook = unserialize($data_reservationbook);


	if(isset($_POST['submit'])){

		
		
		switch($_POST['submit']){
		
			case 'insert':


				if(empty($_POST['room_id']) || empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['address']) || empty($_POST['post_name'] || empty($_POST['post_number'])) ){
					header("Location: create_booking.php?ote=inp&dgr=0");
					exit();
				}else{

					if($_SESSION['login_role'] == 2){

						$ReservationBook->add(new Reservation($_POST['room_id'], $_POST['name'], $_POST['surname'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['post_name'], $_POST['post_number'], $_POST['date_start'], $_POST['date_end'], $_POST['guest_number'], $_POST['adult_number'], $_POST['discount'], $_POST['description'], 0), null);

					}else{
						$ReservationBook->add(new Reservation($_POST['room_id'], $_POST['name'], $_POST['surname'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['post_name'], $_POST['post_number'], $_POST['date_start'], $_POST['date_end'], $_POST['guest_number'], $_POST['adult_number'], $_POST['discount'], $_POST['description'], 1), null);
					}



				}

			
				serialize_object($ReservationBook);
				
				header("Location: index.php");
	
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Options.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Notification.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Comment.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/User.php';
				require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Preferences.php';
				
				$data_reservationbook = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/data_preferences.inc.php');
				
				$Preferences = unserialize($data_reservationbook);
				
				$Preferences->notify_all(new Notification('reservation0', 0), $_SESSION['login_index']);
				serialize_object($Preferences);
				
				exit;	
				break;

		}

	}





?>