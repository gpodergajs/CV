<?php 


require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.bookkeeping/class.simb.iroks.roombook/Room.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.bookkeeping/class.simb.iroks.roombook/RoomBook.php';
	
	$data_roombook = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/data_roombook.inc.php');
	
	$RoomBook = unserialize($data_roombook);

	/* to get values of room type http://localhost/app/src/lib/package.simb.iroks.bookkeeping/class.simb.iroks.roombook/test.php?numb='type in number of wanted room' */

	echo var_dump(get_object_vars($RoomBook->table_room[$_GET['numb']]));
	echo $RoomBook->get_room_count();
	echo $RoomBook->sum_room_isOccupied;


 ?>