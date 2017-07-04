<?php

class Comment{
	
	public $id;
	public $date_created;
	public $author;
	public $type_degree;
	public $type_name;
	
	public $title;
	public $message;
	public $icon;
	
	public $is_noticed;
	
	public function __construct($author, $type, $title, $message){
		
			$this->id = $this->create_ID();
			$this->date_created = $this->create_date();
			$this->author = $author;
			$this->type_degree = $type;
			$this->type_name = $this->declare_type($type);
			
			$this->title = $title;
			$this->message = $message;
			
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
	
	private function declare_type($type){
	
		switch($type){
			
			case 0:
				$this->icon = '<i class="fa fa-comment" aria-hidden="true"></i>';
				return 'Komentar';
				break;
			case 1:
				$this->icon = '<i class="fa fa-angle-double-up" aria-hidden="true"></i>';
				return 'Prednostno';
			case 2:
				$this->icon = '<i class="fa fa-bullhorn" aria-hidden="true"></i>';
				return 'Nujno';
				break;
		}
	
	}
	
}