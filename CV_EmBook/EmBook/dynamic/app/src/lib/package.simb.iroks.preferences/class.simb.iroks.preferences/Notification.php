<?php

class Notification{
	
	public $id;
	public $trigger;
	public $date_created;
	public $hazard_degree;
	public $sphere;
	public $type;
	
	public $outline;
	public $message;
	
	public $is_noticed;
	
	public function __construct($outline, $sphere_degree){
			
			$this->trigger = $trigger;
			$this->date_created = $this->create_date();
			$this->declare_sphere($sphere_degree);
			
			$this->create($outline);
			
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
	 * #they are called by the class
	 *
	 */
	
	private function declare_type($hazard_degree){
		
		/*
		*	#hazard_degree:
		*		DEGREE | TYPE
		*		0 - info
		*		1 - warning
		*		2 - danger
		*/
		
		switch($hazard_degree){
			
			case 0:
				return "Info";
				break;
			case 1:
				return "Opozorilo";
				break;
			case 2:
				return "Nevarnost";
				break;
			default:
				break;
				
		}
		
	}
	
	private function declare_sphere($sphere_degree){
	
		/*
			*	#sphere_degree:
			*		DEGREE | TYPE
			*		0 - system
			*		1 - user
			*
			*/
	
		switch($sphere_degree){
				
			case 0:
				return 'SISTEM';
				break;
			case 1:
				return 'OSEBNO';
				break;
			default:
				break;
	
		}
	
	}
	
	private function create($outline){
		
		/*
		 *	#message:
		 *		- for standard error type messages and standard messages that are expected to occur
		 *		
		 *		OUTLINE | EXPLANATION
		 *			
		 *		log1 - login time
		 *		log2 - invalid input
		 *
		 *
		 *		room0 - insert room
		 *
		 *      reservation0 - insert reservation
		 *
		 */
		
		switch($outline){	
			
			/*
			 * @login message
			 *
			 */
			
			case "log1":
				$this->hazard_degree = 0;
				$this->sphere = $this->declare_sphere(1);
				$this->type = $this->declare_type(0);
				
				$this->message = "Izvršena prijava v sistem";
				break;
			case "log2":
				$this->hazard_degree = 1;
				$this->sphere = $this->declare_sphere(1);
				$this->type = $this->declare_type(1);
				
				$this->message = "Nekdo se je zmotil ob prijavi v sistem, ste bili morda to Vi?";
				break;

			/*
			 * @room message
			 *
			 */
					
			case "room0":
				$this->hazard_degree = 0;
				$this->sphere = $this->declare_sphere(0);
				$this->type = $this->declare_type(0);
				
				$this->message = "Dodana je bila nova soba";
				break;


		 	/*
			 * @reservation message
			 *
			 */

			case "reservation0":
				$this->hazard_degree = 0;
				$this->sphere = $this->declare_sphere(0);
				$this->type = $this->declare_type(0);
				
				$this->message = "Dodana je bila nova rezervacija";
				break;
						
			default:
				return 0;
				break;

		}
		
		
		
	}
	
}