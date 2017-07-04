<?php

class User{
	
	public $ID;
	public $date_created;
	public $date_altered;
	public $role;
	public $name;
	public $email;
	public $password;
	
	public $Options;
	
	public $table_comments;
	public $table_notifications;
	
	public function __construct($role, $name, $email, $password, $Options){
		
		$this->ID = 'usr'.$this->create_ID();
		$this->date_created = $this->create_date();
		$this->date_altered = 0;
		$this->role = $this->role_assign($role);
		$this->name = $name;
		$this->email = $this->create_encryption($email);
		$this->password = $this->create_encryption($password);
		
		$this->Options = $Options;
		
		$this->table_notifications = array();
		$this->table_comments = array();
		
	}
	
	public function add($Object){
		
		switch(get_class($Object)){
			
			case 'Notification':
				$this->insert_notification($Object);
				break;
			case 'Comment':
				$this->insert_comment($Object);
				break;
			
		}
		
	}
	
	public function set_new_options($Options){
	
		$this->Options = $Options;
	
	}
	
	public function get_notifications_count(){		
		return $this->count_notifications();
	}

	/*
	 *
	 * @CLASS PRIVATE FUNCTIONS
	 *
	 * 	#they help define the class
	 *
	 */
	
	private function create_encryption($password){
		
		$options = [
				'cost' => 12
		];
		
		$password_HASH = password_hash($password, PASSWORD_DEFAULT, $options);
		
		return $password_HASH;
	}
	
	private function create_ID(){
	
		$ID = bin2hex(openssl_random_pseudo_bytes(10));
	
		return $ID;
	
	}
	
	
	private function create_date(){
	
		$date = date("Y-m-d H:i:s");
	
		return $date;
	
	}
	
	private function role_assign($role){
		
		/*
		 * @role
		 * 	0 - ADMIN
		 * 	1 - USER _BK - bookkeeper
		 * 	2 - USER_CC - customer consultant
		 * 
		 */
		
		switch($role){
			
			case 0: 
				return 'ADMIN';
				break;
			case 1:
				return 'USER_BK';
				break;
			case 2:
				return 'USER_CC';
				break;
			default:
				return 'VISITOR' . $this->create_ID();
				break;
			
		}
		
	}
	
	private  function count_notifications(){
		
		$count = 0;
		
		foreach($this->table_notifications as $Notification){	
			if(empty($Notification->is_noticed)){
				$count++;
			}
		}
		
		return $count;
		
	}
	
	
	/*
	 *
	 * @MAIN PRIVATE FUNCTIONS
	 *
	 * 	#they work with outside variables
	 *
	 */
	
	private  function insert_notification($Notification){
	
		array_unshift($this->table_notifications, $Notification);
		
	}
	
	private  function insert_comment($Comment){
		
		if($this->name == $Comment->author){
			$Comment->is_noticed = 1;
		}
		
		array_unshift($this->table_comments, $Comment);
	
	}
	
}


?>