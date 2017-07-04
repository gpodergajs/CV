<?php

	function generate_form_alert($outline, $degree, $html){
		
		/*
		 * #input_error
		 * 
		 * 	OUTLINE | DEGREE | EXPLANATION
		 * 	  inp 	0		empty post
		 * 	  inp		1		unvalid input
		 *       inp		2		unvalid character set
		 * 	  inp		3		no match found
		 * 	
		 * 	  pass 		0		password does not match
		 *    pass		1		unvalid characteristics password
		 * 
		 *    img		0		image not uploaded
		 * 	  img 		1		image to large
		 * 	  img 		2		image exists
		 * 	  img 		3		wrong file type
		 * 
		 * 	  mail      0	    mail send
		 * 
		 * 	  alt		0		successefuly altered
		 * 
		 */
		
		$message = null;
		$summary = null;
		$type = null;
		
		switch($outline){
			
			case 'inp':
				
				switch($degree){
					
					case 0:
						$summary = 'Pozor!';
						$message = 'Prosim preglejte prazna polja, obvezna morajo biti izpolnjena..';
						$type = 'warning';
						break;
					case 1:
						$summary = 'Pozor!';
						$message = 'Napačen vnos, prosim preverite Vaše podatke in poskusite ponovno..';
						$type = 'warning';
						break;
					case 2:
						$summary = 'Pozor!';
						$message = 'Vaš vnos je napačen, uporabili ste neveljavne znake..';
						$type = 'warning';						
						break;
					case 3:
						$summary = 'Napaka!';
						$message = 'Nismo našli ujemanja z Vašim vnosom, prosim preverite Vaš vnos..';
						$type = 'danger';						
						break;
					
				}
				
				break;
			case 'stg':
				
				switch($degree){
					
					case 0:
						$summary = 'Uspeh!';
						$message = 'Uspešno ste spremenili nastavitve...';
						$type = 'success';
						break;					
				}
				
				break;
			default:
				break;
			
		}
		
		switch($html){
			
			case 0:
				$form_alert =
				'<div class="form-group">
	     			<h4 class="alert alert-'.$type.' font-light" style="border: none"><strong>'.$summary.'</strong> '.$message.'</h4>
	      		 </div>';				
				break;
			case 1:
				$form_alert =
				'<div class="form-group">
					<div class="col-md-10">
	     				<h4 class="alert alert-'.$type.' border-none font-light"><strong>'.$summary.'</strong> '.$message.'</h4>
	     			</div>
	    		 </div>';				
				break;
			
		}

		
		echo $form_alert;
	}

?>