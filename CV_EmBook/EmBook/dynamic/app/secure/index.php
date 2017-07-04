<?php
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/validation/session.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/html/controler_calendar.php';
	
	
	$_SESSION['notifications_liveBox'] = 1;
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/main/preferences_overview.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/main/roombook_overview.php';
	
	/*
	 * @calendar functions
	 * 
	 */
	if(empty($_SESSION["datetime"]) || empty($_GET["cal"])){
		$_SESSION["datetime"] = new DateTime('now');
	}	
	if(!empty($_GET['cal'])){		
		$_SESSION['datetime'] = addORsub_datetime($_GET['cal'], $_SESSION['datetime']);
	}
	
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
			<h1 class="color-white font-light col-sm-6 text-left">Glavni kontrolni panel</h1>
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
				
				<!-- calendar -->
				<div class="container col-md-12">
				
					<div class="container col-md-12 bg-pink-light  liveBox color-white" style="overflow: hidden">
						<div onclick="javascript:location.href='index.php?cal=down'" class="container col-md-1 text-left pointer" style="z-index: 50">
							<h3><i class="fa fa-angle-left fa-3x" aria-hidden="true"></i></h3>
							<h3 class="font-light text-center">-4 <span class="visible-lg">dni</span></h3>
						</div>									
						<div class="container col-md-10">	
							<?php generate_calendar($_SESSION['datetime']);?>
						</div>
						<div onclick="javascript:location.href='index.php?cal=up'" class="container col-md-1 text-right pointer">
							<h3><i class="fa fa-angle-right fa-3x" aria-hidden="true"></i></h3>
							<h3 class="font-light text-center">+4 <span class="visible-lg">dni</span></h3>
						</div>																		
					</div>
				
				</div>
				<!-- calendar -->	
				
				<!-- actions -->
				<div class="container col-md-12">
					
					<!-- booking -->
					<div onclick="javascript:location.href='create_booking.php'" class="container col-lg-4 col-md-6 margin-t-7px">
						<div class="row col-md-12 liveBox bg-orange-middle color-white pointer">
							<h3 class="text-center"><i class="fa fa-plus-square-o fa-4x" aria-hidden="true"></i></h3>
							<h3 class="font-light">Rezervacija</h3>
						</div>
					</div>
					<!-- booking -->				

					<!-- booking list -->
					<div onclick="javascript:location.href='overview_booking.php'" class="container col-lg-4 col-md-6 margin-t-7px">
						<div class="row col-md-12 liveBox bg-silver-2d color-white pointer" style="overflow: hidden">
							<div id="bookingslist01">						
								<h3 class="text-center"><i class="fa fa-list fa-4x" aria-hidden="true"></i></h3>
								<h3 class="font-light">Seznam</h3>
							</div>
							<!-- booking list statistic -->
							<div id="bookingslist02" class="text-right" style="display:none;">
								<h3 class="hr-row-1-e"><strong>18</strong></h3>
								<h5 class="font-light">aktivnih naročil</h5>
								<h3 class="hr-row-1-e"><strong>6</strong></h3>
								<h5 class="font-light">v čakanju</h5>
							</div>
							<!-- booking list statistic -->
						</div>
					</div>
					<!-- booking list -->				

					<!-- rooms list -->
					<div onclick="javascript:location.href='overview_room.php'" class="container col-lg-4 col-md-6 margin-t-7px">
						<div class="row col-md-12 liveBox bg-blue-dark color-white pointer" style="overflow: hidden">
							<div id="rooms01">						
								<h3 class="text-center"><i class="fa fa-bed fa-4x" aria-hidden="true"></i></h3>
								<h3 class="font-light">Sobe</h3>
							</div>
							<!-- rooms statistic -->
							<div id="rooms02" class="text-right" style="display:none;">
								<h3 class="hr-row-1-e"><strong><?php echo $RoomBook-> get_unavail_count();?></strong></h3>
								<h5 class="font-light">zasedenih sob</h5>
								<h3 class="hr-row-1-e"><strong><?php echo $RoomBook-> get_avail_count();?></strong></h3>
								<h5 class="font-light">proste sobe</h5>

							</div>
							<!-- rooms statistic -->							
						</div>
					</div>
					<!-- rooms -->								
				
				</div>				
				<!-- actions -->
				
			</div>
			<!-- main action -->
			
		</div>
	
</div>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="../style/js/jquery-1.11.3.min.js"></script>
		
	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="../style/js/bootstrap.js"></script>

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
	var room = 0;
	
	setInterval(function() {		
		if(room == 0){
			$('#rooms01').fadeOut(1000);
			$('#rooms02').toggle(1500);
			room = 1;
		}else{
			$('#rooms02').toggle(1000);
			$('#rooms01').fadeIn(1500);
			room = 0;			
		}
	}, 5000);
	</script>

    <script>
	var bookingslist = 0;
	
	setInterval(function() {		
		if(bookingslist == 0){
			$('#bookingslist01').fadeOut(1000);
			$('#bookingslist02').toggle(2000);
			bookingslist = 1;
		}else{
			$('#bookingslist02').toggle(1000);
			$('#bookingslist01').fadeIn(2000);
			bookingslist = 0;			
		}
	}, 6000);
	</script>
	
	<script>
	var c1 = 1;
	var c2 = 1;
	
	var notification_sphere = <?php echo json_encode($table_notification_sphere); ?>;
	var notification_message =  <?php echo json_encode($table_notification_message); ?>;
	
	setInterval(function() {		
		if (c1 == <?php echo json_encode((int)count($table_notification_sphere)); ?>) c1=0;
		if (c2 == <?php echo json_encode((int)count($table_notification_message)); ?>) c2=0;	
		$('#notification_title').fadeOut(2000, function() {
		    $(this).html(notification_sphere[c1]).fadeIn(3000);
		    ++c1;
		 });
		 $('#notification_description').fadeOut(2000, function() {
		 	$(this).html(notification_message[c2]).fadeIn(3000);
		    ++c2;
		 });	
	}, 6000);	
	</script>

   
</body>
</html>
