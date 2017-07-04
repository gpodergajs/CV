<?php

class ReservationBook{

/* main attributes */

	public $ID;
	public $date_created;
	public $date_altered;

	public $table_reservation;



	public function __construct(){

		$this->ID = 'rsbk'.$this->create_ID();
		$this->date_created = $this->date_altered = $this->create_date();

		$this->table_reservation = array();

	}	

	public function add($Object, $index){

		switch(get_class($Object)){

			case 'Reservation':
				$this->insert_reservation($Object);
				break;
			default:
				$this->select_reservation($Object, $index);

		}
	}

	private function set_is_confirmed($is_confirmed, $id){

		$this->select_reservation($index)->set_is_confirmed($is_confirmed);
	}

	private function get_is_confirmed($id){

		return $this->select_reservation($index)->get_is_confirmed();
	}


	public function insert_reservation($Reservation){

		array_push($this->table_reservation, $Reservation);
	}


	public function select_reservation($index){

		return $this->table_reservation[$index];
	}


	public function get_reservation_count(){

		return $this->reservation_count();
	}


	public function reservation_count(){

		$reservationCount = 0;

		foreach ($this->table_reservation as $Reservation) {
			$reservationCount++;
		}

		return $reservationCount;
	}


	private function create_ID(){
		
		$ID = bin2hex(openssl_random_pseudo_bytes(10));
		
		return $ID;
	}


	private function create_date(){
		
		$date = date("Y-m-d H:i:s");
		
		return $date;
	}


}


?>