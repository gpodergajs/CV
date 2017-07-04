<?php

class Options{
	
	public $date_altered;

	
	#Logout options
	/*
	 *  1 - will enter sleep
	 *  0 - will full exit application
	 * 
	 */
	public $logout_onTime;
	
	#Style options
	public $image_bg_path;
	public $file_css_path;
	
	/*
	 * @MAIN PUBLIC FUNCTIONS
	 *
	 */
	
	public function __construct($logout_onTime, $image_bg_name, $bg_opacity){
		
		$this->logout_onTime = $logout_onTime;
		
		$this->image_bg_path = $this->select_background($image_bg_name);
		$this->file_css_path = $this->select_bg_opacity($bg_opacity);
		
	}
	
	public function set_logout_onTime($logout_onTime){
		$this->logout_onTime = $logout_onTime;
	}
	
	public function set_background($image_bg_name){
		$this->image_bg_path = $this->select_background($image_bg_name);	
	}
	
	public function set_bg_opacity($bg_opacity){
		$this->file_css_path = $this->select_bg_opacity($bg_opacity);
	}
	
	/*
	 *
	 * @CLASS PRIVATE FUNCTIONS
	 *
	 * #they help define the class
	 *
	 */
	
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
	
	private function select_bg_opacity($bg_opacity){
	
		switch($bg_opacity){
				
			case 1:
				return '../style/css/liveBox_opacityON.css';
				break;
			default:
				return  '../style/css/liveBox_opacityOFF.css';
				break;
					
		}
	
	}
	
	private function select_background($image_bg_name){
	
		switch($image_bg_name){
			
			case 'World':
				return '../style/images/bg/world.jpg';
				break;
			case 'Dandelion':
				return '../style/images/bg/dandelion.jpg';
				break;
			case 'SpringLake':
				return '../style/images/bg/spring_lake.jpg';
				break;
			default:
				return '../style/images/bg/abstract_01.png';
				break;
			
		}
	
	}
	
}

?>