<?php

class Preferences {
	
	public $ID;
	public $date_created;
	public $date_altered;
	
	public $Settings;
	
	public $table_user;
	
	public function __construct(){
		
		$this->ID = 'prfs'.$this->create_ID();
		$this->date_created = $this->date_altered = $this->create_date();
		
		$this->table_user = array();	
		
	}
	
	public function add($Object, $index = null){
		
		switch(get_class($Object)){
			
			case 'User':
				$this->insert_user($Object);
				break;
			case 'Comment':
				$this->select_all_Comment($Object);
				break;
			default:
				$this->select_user($Object, $index);
			
		}
		
		
	}

	public function notify_all($Notification, $index){
		
		$U_index = 0;
		
		foreach($this->table_user as $User){
			
			if($U_index == $index){
				$Notification->is_seen = 1;
				$User->add($Notification);
			}else{
				$Notification->is_seen = 0;
				$User->add($Notification);
			}
			
			$U_index++;
		}
		
	}
	
	public function get_user_role($email){
		
		foreach($this->table_user as $User){
			if(password_verify($email, $User->email)){
				return $User->role;
			}
		}
		
	}
	
	public function get_user_name($email){
		
		foreach($this->table_user as $User){
			if(password_verify($email, $User->email)){
				return $User->name;
			}
		}
	
	}
	
	public function get_user_index($email){
		
		for($x = 0;$x<count($this->table_user);$x++){
			
			if(password_verify($email, $this->table_user[$x]->email)){
				return $x;
			}
			
		}
		
	}
	
	public function validate_user($email){
		
		foreach($this->table_user as $User){
			if(password_verify($email, $User->email)){
					return 1;
				}
		}
		
		return 0;
		
	}
	
	public function verify_user($password){

		foreach($this->table_user as $User){
			if(password_verify($password, $User->password)){
				return 1;
			}
		}
		
		return 0;
		
	}
	
	public function get_user_notification_count($user_name){
		
		foreach($this->table_user as $User){
			
			if($User->name == $user_name){
				return $User->get_notifications_count();
			}
			
		}
		
		
	}
	
	public function get_user_options($type, $index){
		
		switch($type){
			
			case 'logout_onTime':
				return $this->table_user[$index]->Options->logout_onTime;		
				break;
			case 'image_bg_path':
				return $this->table_user[$index]->Options->image_bg_path;
				break;
			case 'file_css_path':
				return $this->table_user[$index]->Options->file_css_path;		
				break;
				
		}
		
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
	
	private function create_encryption($password){
	
		$options = [
				'cost' => 12
		];
	
		$password_hash = password_hash($password, PASSWORD_DEFAULT, $options);
	
		return $password_hash;
	}


	/*
	 *
	 * @MAIN PRIVATE FUNCTIONS
	 *
	 * #they work with outside variables
	 *
	 */
	
	private function insert_user($User){
	
		array_push($this->table_user, $User);
	
	}
	
	private function select_user($Object, $index){
	
		$this->table_user[$index]->add($Object);
	
	}
	
	private function select_all_Comment($Comment){
		
		foreach($this->table_user as $User){
			
			$User->add($Comment);
			
		}
		
	}
	
	private function select_all_Notification($Notification){
		
		foreach($this->table_user as $User){
			
			$Notification->is_noticed = 0;
			$User->add($Notification);

		}
		
	}

}

?>