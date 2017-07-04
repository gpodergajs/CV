<?php 

	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.accounting/class.simb.iroks.reservationbook/Reservation.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.accounting/class.simb.iroks.reservationbook/ReservationBook.php';
					
	
	$data_reservationbook = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/data_reservationbook.inc.php');
	
	$ReservationBook = unserialize($data_reservationbook);

	/* to get values of room type http://localhost/app/src/lib/package.simb.iroks.bookkeeping/class.simb.iroks.roombook/test.php?numb='type in number of wanted room' */

	echo var_dump(get_object_vars($ReservationBook->table_reservation[6]));


 ?>