<?php

class Room{
	
/* main attributes */


	public $ID;
	public $date_created;
	public $date_altered;
	
	public $name;
	public $category;
	public $cost;
	
	public $rating;
	public $description;

	public $package;	// dodatki k sobi
	public $terms;	// dodatni pogoji

/* advanced attributes */

	public $simbolic_adress;
	public $availability;
	public $accessory; // dodatki k sobi ločeni z vejco




public function __construct($name, $category, $cost, $rating, $description,$package,$terms,$simbolic_adress,$availability,$accessory){
		
		$this->ID ='room'.$this->create_ID();
		$this->date_created = $this->create_date();
		$this->date_altered = 0;
		
		
		$this->category = $this->category_assign($category);
		$this->name = $name;
		$this->cost = $cost;
		
		/* from 1 to 4 */
		$this->rating = $rating;
		$this->description = $description;

		
		$this->package = $this->package_assign($package);
		$this->terms = $this->terms_assign($terms);

		$this->simbolic_adress = $simbolic_adress;
	
		/* 0 - not availabe , 1 - available */
		$this->availability = $availability; 
		
		/* Strings are saved in array */
		$this->accessory = explode(",",$accessory);
		
		
	}


	private function create_ID(){
	
		$ID = bin2hex(openssl_random_pseudo_bytes(10));
	
		return $ID;
	
	}
	
	
	private function create_date(){
	
		$date = date("Y-m-d H:i:s");
	
		return $date;
	
	}


	public function setAvailability($availability){

		$this->availability = $availability;

	}


	public function getAvailability(){

		return $this->availability;

	}


	private function terms_assign($terms){
	
		
		switch($terms){
			
			case 'min3': 
				return 0;
				
			case 'max14':
				return 1;

			case 'avans':
				return 2;	
							
		}
		
	}

private function package_assign($package){
	
		
		switch($package){
			
			case 'Polni': 
				return 0;
				
			case 'Prilagojena':
				return 1;

			case 'Soba':
				return 2;	
							
		}
		
	}


private function category_assign($category){
	
		
		switch($category){
			
			case 'Standard dvoposteljna soba': 
					return 0;
				
			case 'Enoposteljna soba':
					return 1;

			case 'Družinska soba':
					return 2;		
							
		}
		
	}



}

?>