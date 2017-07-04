<?php

/*
 *
 *	@Super creator
 *		#it creates all files for data storage	
 *
 *		-> REQUIRE ALL CLASS FILES
 *			01 -> Preferences
 *
 *		-> unlinked on first login
 */

	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/res/support/serializer.php';

	/*
	 *	@Preferences
	 */

	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Options.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Notification.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Comment.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/User.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.preferences/class.simb.iroks.preferences/Preferences.php';

	$Preferences = new Preferences();
	
	$Preferences->add(new User(0, 'Admin', 'admin@em-book.si', 'admin', new Options(0, null, 0)), null);
	$Preferences->add(new User(1, 'Gašper', 'gasper@em-book.si', 'gasper', new Options(0, null, 0)), null);
	$Preferences->add(new User(1, 'Tim', 'tim@em-book.si', 'tim', new Options(0, null, 0)), null);


	serialize_object($Preferences);
	
	/*
	 *	@RoomBook
	 */
	
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.bookkeeping/class.simb.iroks.roombook/Room.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.bookkeeping/class.simb.iroks.roombook/RoomBook.php';
	
	$RoomBook = new RoomBook();
	$RoomBook->add(new Room('Soba1','Standard dvoposteljna soba','55','4','Soba je opremljena s kopalnico (tuš ali kad), straniščem, televizijo, radiem, telefonom, mini barom, sefom, kopalnim plaščem, torbo s kopalnimi brisačami, klimatsko napravo, priključkom za internet, internetom na televiziji in balkonom.','Polni','min3','Standardna dvoposteljna soba',1,'wifi,miniBar,televizija,radio'),null);
	$RoomBook->add(new Room('Soba2','Enoposteljna soba','45','4','Soba, z odličnim razgledom na bližnje jezero. Psi dovoljeni.','Soba','avans','sim',1,'wifi,miniFridge'),null);
	$RoomBook->add(new Room('Soba3','Družinska soba','65','4','Velika sobo, ki ponuja vso ugodje doma. Za malčke, je soba opremljena z igralnim prostoromo. Za romanco poskrbi odličen razgled.','Polni','max14','Udobna družinska soba',1,'wifi, miniFridge,miniOven,igralni prostor,TV'),null); // playpen je za otroke zagrajeno območje za igrat - ponavad za todlerje
	$RoomBook->add(new Room('Soba4','Standard dvoposteljna soba','40','4','Soba prilagojena zgolj za prenočitev. Majhni psi dovoljeni. ','Prilagojena','min3','Enostavna dvoposteljna soba za prenočitev',1,'wifi,miniBar'),null);
	$RoomBook->add(new Room('Soba5','Družinska soba','65','4','Udobna soba za celotno družino. Z ognjiščem si lahko pričarate pravi božični ambient! Če si samo želite oddahniti, vas čaka udoben jacuzzi za dve osebi. Pričakala vas bo steklenica okoliškega domačega vina. Za malčke je poskrbljen bivalni prostor. ','Polni','avans','Družinska suit soba',1,'wifi,miniBar,TV,ognjišče,jacuzzi'),null);


	serialize_object($RoomBook);

	/*
	 *	@ReservationBook
	 */

	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.accounting/class.simb.iroks.reservationbook/Reservation.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.accounting/class.simb.iroks.reservationbook/ReservationBook.php';

	$ReservationBook = new ReservationBook();

	$ReservationBook->add(new Reservation(1, "Janez", "Novak", "janez.novak@gmail.com", "02541652", "Slovenska ulica 5", "Maribor", "2000", "01/18/2017", "01/21/2017", "1", "1", "5","", 0), null);

	$ReservationBook->add(new Reservation(2, "Marko", "Kolar", "marko.kolar@gmail.com", "031542659", "Mladinska ulica 23", "Maribor", "2000", "01/20/2017", "01/21/2017", "3", "2", "10","", 0), null);

	$ReservationBook->add(new Reservation(0, "Ana", "Zupan", "ana.zupan@gmail.com", "040662351", "Koroska cesta 16", "Ljubljana", "1000", "01/19/2017", "01/24/2017", "2", "2", "8","", 1), null);


	serialize_object($ReservationBook);

	
?>