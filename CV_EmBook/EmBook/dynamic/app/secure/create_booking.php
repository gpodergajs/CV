<?php
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/validation/session.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/html/controler_form.php';
	
	$_SESSION['notifications_liveBox'] = 1;
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/main/preferences_overview.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/main/insertReservation_action.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/main/insertRoom_overview.php';
	
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- meta inf -->
	<meta name="robots" content="index, follow">
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="charset" content="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<meta name="Author" content="">
	<meta name="Programmer" content="">
	<title>emBook</title>
	<!-- meta inf 

	<link rel="icon" href="images/favicon.ico">
	-->
	
	<!-- local -->
	<link href="../style/css/bootstrap.css" rel="stylesheet">
	<link href="../style/css/datepicker.css" rel="stylesheet">
	<link href="../style/css/glypho.css" rel="stylesheet">
	<link href="../style/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="../style/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!-- local -->
	
	<!-- external -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700&amp;subset=latin-ext" rel="stylesheet">


	<!-- external -->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]--> 


	    
</head>
<body style="background: url(<?php echo$_SESSION['image_bg_path']?>) no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">

<div class="container-fluid" style="max-width: 1920px;margin-bottom: 100px">
		
		<div class="container col-md-12" style="padding-top:20px;padding-bottom:30px">
			<h1 class="color-white font-light col-sm-6 text-left">Sobe</h1>
			<h1 class="color-white col-sm-6 text-right">em<span class="color-orange">Book</span> <span class="font-light text-muted">easy 0.1.0</span></h1>
			<div class="row hr-row-1-e"></div>
		</div>
		
		<div class="row text-left visible-xs visible-sm color-white bg-blue-dark" style="height: 100vh">
			<div class="container">
				<h3><i class="fa fa-frown-o fa-5x text-left" aria-hidden="true"></i></h3>
				<br>
				<h2>Žal, za telefon ni prilagojen sistem - <i class="fa fa-window-restore" aria-hidden="true"></i> uporabi tablico</h2>			
			</div>
		</div>
		
		<div class="row visible-lg visible-md hidden-xs hidden-sm">
			
			<!-- menu -->
			<div class="container col-md-1">
			
				<!-- side-menu -->
				<div class="row col-md-offset-1 col-md-11 bg-19-6 text-center">
					<h3 onclick="javascript:location.href='index.php'" title="Domov" class="color-white font-light padding-tb-3pr pointer"><i class="fa fa-bars" aria-hidden="true"></i></h3>
					<h3 onclick="javascript:location.href='settings.php'" title="Nastavitve" class="color-white font-light padding-tb-3pr pointer"><i class="fa fa-cog" aria-hidden="true"></i></h3>
					<div class="row hr-row-1-e padding-t-100px"></div>
					<div class="row dropdown" style="padding-top: 8px; padding-bottom: 5px">
						<button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-power-off" aria-hidden="true"></i></button>
						<ul class="dropdown-menu">
							<li title="Pojdi v spanje, uniči le varnostno kritične podatke v seji, omogoči vidljivost notifikacij"><a href="../src/res/validation/sleep.php">Spanje</a></li>
						    <li title="Popolnoma zaključi sejo, vsi sejni podatki bodo odstranjeni"><a href="../src/res/validation/logout.php">Odjava</a></li>
						 </ul>
					</div>
				</div>
				<!-- side-menu -->
				
			</div>
			
			<div class="container col-lg-4 col-md-5">
				
				<!-- row 1 -->
				<div class="container col-md-12">
					
					<!-- user -->
					<div class="container col-md-6">
						<div class="row col-md-12 liveBox bg-purple-dark color-white pointer">
							<h3 class="text-center"><i class="fa fa-user-circle-o fa-4x" aria-hidden="true"></i></h3>
							<h3 class="font-light"><?php echo $_SESSION['login_user']?></h3>
						</div>
					</div>
					<!-- user -->
					
					<!-- comments -->
					<div onclick="javascript:location.href='overview_comments.php'" class="container col-md-6">
						<div class="row col-md-12 liveBox bg-blue-light liveBox pointer color-white">
							<div id="comments01">						
								<h3 class="text-center"><i class="fa fa-comments-o fa-4x" aria-hidden="true"></i></h3>
								<h3 class="font-light">Pogovor</h3>
							</div>
							<!-- comment statistic -->
							<div id="comments02" class="text-right" style="display:none;">
								<?php if(!empty($Preferences->table_user[$_SESSION['login_index']]->table_comments)){?>
								<h3 class="hr-row-1-e"><strong><?php echo $Preferences->table_user[$_SESSION['login_index']]->table_comments[0]->author;?></strong> <br> <span class="font-light">sporoča</span></h3>
								<h5 class="font-light"><?php echo substr((string)$Preferences->table_user[$_SESSION['login_index']]->table_comments[0]->message,0,75).'..'?></h5>
								<?php }else{?>
								<h3 class="hr-row-1-e"><strong>Brez</strong> sporočil</h3>
								<h5 class="font-light">Bodi prvi in nekaj sporoči svoji ekipi!</h5>
								<?php }?>
							</div>
							<!-- comment statistic -->
						</div>			
					</div>
					<!-- comments -->
					
				</div>
				<!-- row 1 -->
				
				<!-- row 2 - notifications -->
				<div onclick="javascript:location.href='overview_notifications.php'" class="container col-md-12 margin-t-7px">
					<div class="container col-md-12">
						<div class="row col-md-12 bg-green-light liveBox  color-white pointer">
							<div class="row">
								<h4 class="col-md-6 text-left font-light" style="padding-top: 7%">
									<strong id="notification_title" class="color-green-dark"><?php echo $table_notification_sphere[0];?></strong>
									<br>
									<span id="notification_description"><?php echo $table_notification_message[0];?></span>
								</h4>
								<h2 class="col-md-6 text-right">
									<span style="font-size: 56px">25</span>
									<br>
									december
								</h2>
							</div>
							<div class="row bg-green-dark">
									<h4 class="col-md-12 font-light">
									<?php if(!empty($_SESSION['notification_count'])){?>
									<i class="fa fa-bell" aria-hidden="true"></i> <?php echo $_SESSION['notification_count'] ?> neprebranih notifikacij
									<?php }else{?>
									<i class="fa fa-bell-slash-o" aria-hidden="true"></i> 0 neprebranih notifikacij
									<?php }?>
									</h4>	
							</div>
						</div>
					</div>
				</div>
				<!-- row 2  notifications-->
				
			</div>
			<!-- menu -->
			
			<!-- main action -->
			<div class="container col-lg-7 col-md-6">
			
				<div class="container col-md-12 color-white">
					<form method="POST" class="container col-md-12">	
						
						<!-- basic info -->
						<div class="container col-md-12 bg-silver-19" style="padding-top: 5px; padding-bottom: 2%">							
							 <div class="form-group col-md-12">
								<h3 class="color-white font-light text-left">Ustvari rezervacijo - <small>obvezno izpolniti!</small></h3>
								<div class="row hr-row-1-e"></div>									  
							  </div>
							  <div class="form-group col-md-12">
							  	<?php if(!empty($_GET['ote'])){ generate_form_alert($_GET['ote'], $_GET['dgr'], 0);}?>  
							  </div>
							  <div class="form-group col-md-12">
							    <label class="font-light" for="room_id">Izberi sobo</label>
							    <select class="form-control" id="room_id" name="room_id" style="border-radius: 0;height: 50px">
							    	<option value="null">izberi sobo..</option>
							    	<?php $room_index = 0;?>
							    	<?php foreach($RoomBook->table_room as $Room){?>
							    	<?php if(!empty($Room->availability)){?>
							    	<option value="<?php echo $room_index?>"><?php echo $Room->name.' | ';?><?php for($x=0;$x<(int)$Room->rating;$x++){echo '*';}?></option>
							    	<?php $room_index++;?>
							    	<?php }?>
							    	<?php }?>
							    </select>
							  </div>
							  <div class="form-group col-md-12">
							    <h4 class="font-light color-white">Podatki o naročniku</h4>
							    <hr>
							  </div>							  
							  <div class="form-group col-md-6">
							    <label class="font-light" for="title">Ime:</label>
							    <input type="text" name="name" value="" placeholder="*Ime naročnika.." class="form-control" id="title" style="border-radius: 0;height: 50px">
							  </div>
							  <div class="form-group col-md-6">
							    <label class="font-light" for="title">Priimek:</label>
							    <input type="text" name="surname" value="" placeholder="*Priimek naročnika.." class="form-control" id="title" style="border-radius: 0;height: 50px">
							  </div>
							  <div class="form-group col-md-6">
							    <label class="font-light" for="title">Elektronski naslov:</label>
							    <input type="email" name="email" value="" placeholder="*Elektronski naslov" class="form-control" id="title" style="border-radius: 0;height: 50px">
							  </div>
							  <div class="form-group col-md-6">
							    <label class="font-light" for="title">Telefon:</label>
							    <input type="text" name="phone" value="" placeholder="*Telefonski kontakt" class="form-control" id="title" style="border-radius: 0;height: 50px">
							  </div>
							  <div class="form-group col-md-6">
							    <label class="font-light" for="title">Naslov:</label>
							    <input type="text" name="address" value="" placeholder="*Vpiši polni naslov" class="form-control" id="title" style="border-radius: 0;height: 50px">
							  </div>
							  <div class="form-group col-md-6">
							    <label class="font-light" for="title">Pošta in poštna številka:</label>
							    <input type="text" name="post_name" value="" placeholder="*Kraj pošte" class="form-control" id="title" style="border-radius: 0;height: 50px">
							    <input type="number" name="post_number" value="" placeholder="*Poštna številka" class="form-control" id="title" style="border-radius: 0;height: 50px">
							  </div>
							  <div class="form-group col-md-12">
							    <h4 class="font-light color-white">Podatki rezervacije</h4>
							    <hr>
							  </div>	
							  <div class="form-group col-md-6">
							    <label class="font-light" for="title">Datum prihoda:</label>
							    <input id="date_start" type="text" name="date_start" value="" class="form-control" style="border-radius: 0;height: 50px">
							   </div>
							  <div class="form-group col-md-6">
							    <label class="font-light" for="title">Datum odhoda:</label>
							    <input id="date_end" type="text" name="date_end" value="" class="form-control" style="border-radius: 0;height: 50px">
							  </div>
							  <div class="form-group col-md-offset-6 col-md-6">
							    <h4 class="font-light color-white">Trenutno izbranih <strong id="showDays"> </strong> dni</h4>
							    <h3 style="border-bottom: 1px solid #eee"><span id="dateDuration-span">0</span> <span id="dateDuration-info" class="display-none"></span></h3>
							  </div>
							  <div class="form-group col-md-3">
							    <label class="font-light" for="title">Št. oseb:</label>
							    <input type="number" name="guest_number" value="" placeholder="1" class="form-control" id="title" style="border-radius: 0;height: 50px">					  
							  </div>
							  <div class="form-group col-md-3">
							    <label class="font-light" for="title">odrasli:</label>
							    <input type="number" name="adult_number" value="" placeholder="0" class="form-control" id="title" style="border-radius: 0;height: 50px">
							  </div>
							  <div class="form-group col-md-6">
							    <label class="font-light" for="title">Popust:</label>
							    <input type="number" name="discount" value="" placeholder="0" class="form-control" id="title" style="border-radius: 0;height: 50px">
							  </div>
							  <div class="form-group col-md-12">
							  	<button onClick="calculateAssessment()" type="button" class="btn btn-info font-light" style="border-radius: 0;width:100%;;font-size: 22px">Overi za predračun</button>
							  </div>
						</div>	
						<!-- basic info -->
						
						<!-- pre-cost -->
						<div id="assessment" class="container col-md-12 margin-t-7px bg-green-dark display-none" style="padding-top: 5px; padding-bottom: 2%; display: none">			
							<div class="form-group col-md-12">
							    <h3 class="font-light">Cena paketa oz. rezervacije:</h3>
							    <hr>
							    <h3><small class="font-light color-white">po zgornjih kriterijih</small> 205,78 €</h3>
							    <hr>
							  </div>						
						</div>
						<!-- pre-cost -->
								
						<!-- basic info -->
						<div class="container col-md-12 margin-t-7px bg-silver-19" style="padding-top: 5px; padding-bottom: 2%">							
							  <div class="form-group col-md-12">
								<h3 class="color-white font-light text-left">Dodatni pogoji ali želje - <small>neobvezno!</small></h3>
								<div class="row hr-row-1-e"></div>									  
							  </div>
							  <div class="form-group col-md-12">
							    <label class="font-light" for="textarea">Pogoji ali povpraševanje: <small class="text-muted">*vpiši uporabljen kanal</small></label>
							    <textarea class="form-control" id="textarea" name="description" rows="5" style="border-radius: 0;">Vpiši dodatne pogoje ali kopiraj povpraševanje..</textarea>
							  </div>		
						</div>	
						<!-- basic info -->

						<!-- basic info -->
						<div class="container col-md-12 margin-t-7px bg-silver-19" style="padding-top: 15px; margin-bottom: 20px">							
							  <div class="form-group col-md-12">
							 	 <button type="submit" name="submit" value="insert" class="btn btn-primary font-light" style="border-radius: 0;width:100%;;font-size: 22px">Potrdi rezervacijo</button>
							  </div>					
						</div>	
						<!-- basic info -->
					
					</form>			
			</div>			
				
			</div>
			<!-- main action -->
			
		</div>
	
</div>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="../style/js/jquery-1.11.3.min.js"></script>
		
	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="../style/js/bootstrap.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="../style/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<script src="../style/js/bootstrap-datepicker.js"></script>

	<script>
    $(document).ready(function () {
			
    		var dayDiff;

        	var date_start = $('date_start');

    		$("#date_start").datepicker("update", new Date());    	
    		var date_start = $('#date_start').datepicker({
	        	format: "dd-mm-yyyy"
	         });

    		$("#date_end").datepicker("update", new Date(new Date().getTime() + 24 * 60 * 60 * 1000));
    		
    		$(document).on("change", "#date_start", function () {
         	date_start = $(this);  	
    		})
			
			var start = new Date($('#date_start').val()).getTime();
         	var end = new Date($('#date_end').val()).getTime();
 			dayDiff = ((end - start) / (1000 * 3600 * 24)); 
         	
         	$('#dateDuration-span').text(dayDiff);

			//Change calculation on change - end date
			$(document).on("change", "#date_end", function () {
         	date_end = $(this);

         	if(date_start == null || date_end.val()<date_start.val()){
         		alert("Pozor! Izbira datuma je nepravilna.."); 
         	}else {
         			var start = new Date($('#date_start').val()).getTime();
         			var end = new Date($('#date_end').val()).getTime();
         			dayDiff = ((end - start) / (1000 * 3600 * 24)); 
         			$('#dateDuration-info').toggle(200);
         			$('#dateDuration-info').html("<small>računam..</small>");
         			$('#dateDuration-info').toggle(200);
         			$('#dateDuration-span').toggle(500);
         			$('#dateDuration-span').text(parseInt(dayDiff));
         			$('#dateDuration-span').toggle(500);        			
         	}
         		
    		}) 
			
			//Change calculation on change - start date
			$(document).on("change", "#date_start", function () {
	         	date_start = $(this);

	         	if(date_end == null || date_end.val()<date_start.val()){
	         		alert("Pozor! Izbira datuma je nepravilna.."); 
	         	}else {
	         			var start = new Date($('#date_start').val()).getTime();
	         			var end = new Date($('#date_end').val()).getTime();
	         			dayDiff = ((end - start) / (1000 * 3600 * 24)); 
	         			$('#dateDuration-info').toggle(200);
	         			$('#dateDuration-info').html("<small>računam..</small>");
	         			$('#dateDuration-info').toggle(200);
	         			$('#dateDuration-span').toggle(500);
	         			$('#dateDuration-span').text(parseInt(dayDiff));
	         			$('#dateDuration-span').toggle(500);
	         			
	         	}
	         		
	    		}) 
    	
    });
	</script>
	
	<script>

	</script>
	
	<script>
	function calculateAssessment(){

		//Računanje za prikaz predračuna glede na rezervacijo
		var persons = 0;
		var room_cost = 0;
		
		$("#assessment").toggle();

	}
	</script>

    <script>
	var comment = 0;
	
	setInterval(function() {		
		if(comment == 0){
			$('#comments01').fadeOut(500);
			$('#comments02').toggle(1500);
			comment = 1;
		}else{
			$('#comments02').toggle(500);
			$('#comments01').fadeIn(1500);
			comment = 0;			
		}
	}, 7000);
	</script>
	
	<script>
	var c1 = 1;
	var c2 = 1;
	
	var notification_sphere = <?php echo json_encode($table_notification_sphere); ?>;
	var notification_message =  <?php echo json_encode($table_notification_message); ?>;
	
	setInterval(function() {		
		if (c1 == <?php echo json_encode((int)$_SESSION['notification_count']); ?>) c1=0;
		if (c2 == <?php echo json_encode((int)$_SESSION['notification_count']); ?>) c2=0;
		if(c1 > 1){
		    $('#notification_title').fadeOut(2000, function() {
		    	$(this).html(notification_sphere[c1]).fadeIn(3000);
		    	++c1;
		    });
		    $('#notification_description').fadeOut(2000, function() {
		    	$(this).html(notification_message[c2]).fadeIn(3000);
		    	++c2;
		    });
		}
	}, 6000);	
	</script>

   
</body>
</html>
