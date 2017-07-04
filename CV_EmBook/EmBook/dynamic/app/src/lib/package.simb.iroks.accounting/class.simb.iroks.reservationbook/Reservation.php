<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.bookkeeping/class.simb.iroks.roombook/RoomBook.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.bookkeeping/class.simb.iroks.roombook/Room.php';

class Reservation{

/* main attributes */

	public $ID;
	public $date_created;
	public $date_altered;

	/* booking details */


	public $data_roombook;
	public $RoomBook;
	public $is_confirmed;

	public $room;

	public $first_name;
	public $last_name;
	public $email;
	public $telephone;
	public $address;
	public $post_name;
	public $post_number;

	public $date_arrival;
	public $date_departure;

	public $no_of_guests;
	public $no_of_adults;
	
	public $discount;
	public $price;
	public $extras;


	public function __construct($room, $first_name, $last_name, $email, $telephone, $address, $post_name, $post_number, $date_arrival, $date_departure, $no_of_guests, $no_of_adults, $discount, $extras, $is_confirmed){


		$this->data_roombook = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/data_roombook.inc.php');
		$this->RoomBook = unserialize($this->data_roombook);

		$this->ID = 'rsrv'.$this->create_ID();
		$this->date_created = $this->create_date();
		$this->date_altered = 0;

		$this->room = $room;
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->email = $email;
		$this->telephone = $telephone;
		$this->address = $address;
		$this->post_name = $post_name;
		$this->post_number = $post_number;
		$this->date_arrival = $date_arrival;
		$this->date_departure = $date_departure;
		$this->no_of_guests = $no_of_guests;
		$this->no_of_adults = $no_of_adults;
		$this->discount = $discount;
		$this->price = $this->calculate_price($room, $discount);
		$this->extras = $extras;
		$this->is_confirmed = $this->set_is_confirmed($is_confirmed);

		$this->RoomBook->setAvailability(0, $this->room);
		
		require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/res/support/serializer.php';
		
		serialize_object($this->RoomBook);
	}	



	/* 0 - not confirmed , 1 - confirmed */
	private function set_is_confirmed($is_confirmed){
		$this->is_confirmed = $is_confirmed;
	}

	private function get_is_confirmed(){
		return $this->is_confirmed;
	}

	private function create_ID(){
		
		$ID = bin2hex(openssl_random_pseudo_bytes(10));
		
		return $ID;
		
	}

	private function create_date(){
		
		$date = date("Y-m-d H:i:s");
		
		return $date;
		
	}

	private function calculate_price($room, $discount){

		$room_price = $this->RoomBook->get_cost($room);

		if($discount>0){
			return $room_price - ($room_price * ($discount / 100)); 

		}else{
			return $room_price;
		}

	}

	private function get_days_array(){


		$interval = new DateInterval("P1D");
		
		$period = new DatePeriod($date_arrival, $interval, $date_departure);
		$days = array();

		$i = 0;
		
		foreach($days as $date){
			$days[$i] = $date;
			$i++;
		}
		
		return $days;

/*
		$date1 = new DateTime("2017-01-10");
		$date2 = new DateTime("2017-01-15");
		$interval = new DateInterval("P1D");
		
		$period = new DatePeriod($date1, $interval, $date2);
		$days = array();

		$i = 0;
		
		foreach($days as $date){
			$days[$i] = $date;
			$i++;
		}
		
		return $days;

		//$days = $date1->diff($date2);
		//echo $days->format('%a dni')."\n";
		*/
	}

	}




?>