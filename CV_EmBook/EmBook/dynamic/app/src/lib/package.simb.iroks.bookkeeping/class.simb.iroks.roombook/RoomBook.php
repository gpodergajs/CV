<?php

class RoomBook {
	
	public $ID;
	public $date_created;
	public $date_altered;
	
	public $table_room;
	

	public function __construct(){
		
		$this->ID = 'rmbk'.$this->create_ID();
		$this->date_created = $this->date_altered = $this->create_date();
		
		$this->table_room = array();	
		
	}

	
	public function add($Object, $index){
		
		switch(get_class($Object)){
			
			case 'Room':
				$this->insert_room($Object);
				break;
			default:
				$this->select_room($Object, $index);
			
		}		
	}

	public function getRm($id){
		$room = $this -> select_room($id);
		return $room;
	}



	public function getAvailability($id){

		$room = $this->select_room($index);
		return $room->availability;

	}


	public function setAvailability($availability, $id){

		$this->select_room($id)->setAvailability($availability);

	}


	
	public function get_unavail_count(){		
		return $this->occupation_count();
	}


	
	public function get_avail_count(){		
		return $this->unoccupation_count();
	}


	public function get_room_count(){
		return $this->room_count();

	}

	public function get_cost($index){

		$room = $this->select_room($index);
		return $room->cost;

	}
	
	public function get_name($index){
	
		$room = $this->select_room($index);
		return $room->name;
	
	}

	
	/*
	 *
	 * @CLASS PRIVATE FUNCTIONS
	 *
	 * #they help define the class
	 *
	 */
	
	private function create_ID(){
	
		$ID = bin2hex(openssl_random_pseudo_bytes(10));
	
		return $ID;
	
	}
	
	
	private function create_date(){
	
		$date = date("Y-m-d H:i:s");
	
		return $date;
	
	}

	/*
	 *
	 * @MAIN PRIVATE FUNCTIONS
	 *
	 * #they work with outside variables
	 *
	 */
	
	private function insert_room($Room){
		
		array_push($this->table_room, $Room);
		
	}
	
	private function select_room($index){
		
		return $this->table_room[$index];
		
	}



/* number of occupied rooms */
	private function occupation_count(){

		$sum_room_isOccupied = 0;

		foreach($this->table_room as $Room){	
			if($Room->availability == 0){
				$sum_room_isOccupied++;

			}
		}
		
		return $sum_room_isOccupied;
	}	

/* number of unnoccupied rooms */
private function unoccupation_count(){

		$sum_room_isUnoccupied = 0;
	

		foreach($this->table_room as $Room){	
	
			if($Room->availability == 1){
				$sum_room_isUnoccupied++;

			}
		}
		
		return $sum_room_isUnoccupied;
	}	


/* number of rooms */
	private function room_count(){

		$roomCount = 0;

		foreach ($this->table_room as $Room) {
			$roomCount++;
		}

		return $roomCount;
	}







}

?>