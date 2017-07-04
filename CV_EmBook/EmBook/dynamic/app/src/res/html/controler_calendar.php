<?php

	function generate_calendar($datetime_session){
		
		require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.accounting/class.simb.iroks.reservationbook/Reservation.php';
		require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.accounting/class.simb.iroks.reservationbook/ReservationBook.php';
					
		$data_reservationbook = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/data_reservationbook.inc.php');
		
		$ReservationBook = unserialize($data_reservationbook);
		
		//Tukaj ponovno ustvarimo nov objekt, ker se zelo čudno obnaša...
		$datetime = new DateTime($datetime_session->format('d-m-Y'));
		$weekend = null;
		$dayStatus = null;
		
		for($i = 0; $i <= 4; $i++){
			
			$dayStatus = null;
			
			foreach($ReservationBook->table_reservation as $Reservation){
				
				if(($Reservation->date_departure == $datetime->format('m/d/Y')) && ($Reservation->date_arrival == $datetime->format('m/d/Y'))){
					$dayStatus = '<div class="row bg-purple-light" style="height:40px"></div>';
				}else if($Reservation->date_arrival == $datetime->format('m/d/Y')){
					$dayStatus = '<div title="PRIHOD - Soba: '.$Reservation->RoomBook->get_name($Reservation->room).' '.$Reservation->email.'" class="row bg-green-light" style="height:40px"></div>';
				}else if($Reservation->date_departure == $datetime->format('m/d/Y')){
					$dayStatus = '<div title="ODHOD - Soba: '.$Reservation->RoomBook->get_name($Reservation->room).' '.$Reservation->email.'" class="row bg-green-dark" style="height:40px"></div>';
				}
				
			}
			
			if(empty($dayStatus)){
				$dayStatus = '<div class="row bg-19-6" style="height:40px"></div>';
			}
			
			switch($datetime->format('D')){			
				case "Mon":
					$weekend = null;
					$dayName = "pon";
					break;
				case "Tue":
					$weekend = null;
					$dayName = "tor";
					break;
				case "Wed":
					$weekend = null;
					$dayName = "sre";
					break;
				case "Thu":
					$weekend = null;
					$dayName = "čet";
					break;
				case "Fri":
					$weekend = null;
					$dayName = "pet";
					break;
				case "Sat":
					$weekend = "bg-pink-dark";
					$dayName = "sob";
					break;
				case "Sun":
					$weekend = "bg-pink-dark";
					$dayName = "ned";
					break;			
			}		
			
			echo '
						<div class="container col-md-3 border-l-1px-white border-r-1px-white '.$weekend.'" style="overflow: hidden; z-index: 40">
							<div class="row text-right padding-r-5px padding-b-5px">
								<h2>
									<strong class="visible-lg" style="font-size:65px">'.$datetime->format('d').'</strong>
									<strong class="visible-md" style="font-size:50px">'.$datetime->format('d').'</strong>
								</h2>
								<h3 class="font-light">
								'.$dayName.'
								</h3>
							</div>
							'.$dayStatus.'
						</div>					
					';			
			
			$datetime->modify('+1 day');
			
		}
		
	}

	function addORsub_datetime($cal, $datetime_session){
		
		switch($cal){
			
			case 'up':
				return $datetime_session->add(new DateInterval('P4D'));
				break;
			case 'down':
				return $datetime_session->sub(new DateInterval('P4D'));
				break;
				
		}
		
	}

?>