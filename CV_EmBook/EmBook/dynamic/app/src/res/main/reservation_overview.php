<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.bookkeeping/class.simb.iroks.roombook/Room.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.bookkeeping/class.simb.iroks.roombook/RoomBook.php';

$data_roombook = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/data_roombook.inc.php');

$RoomBook = unserialize($data_roombook);
?>