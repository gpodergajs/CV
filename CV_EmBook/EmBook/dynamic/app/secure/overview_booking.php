<?php
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/validation/session.php';
	
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.accounting/class.simb.iroks.reservationBook/Reservation.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/app/src/lib/package.simb.iroks.accounting/class.simb.iroks.reservationBook/ReservationBook.php';
	
	$data_reservationbook = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/app/src/rep/data_reservationbook.inc.php');
	
	$ReservationBook = unserialize($data_reservationbook);
	
	$_SESSION['notifications_liveBox'] = 1;
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/main/notifications_action.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/main/preferences_overview.php';
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
			<h1 class="color-white font-light col-sm-6 text-left">Pregled rezervacij</h1>
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
			
			<!-- table booking -->
			<div class="container col-md-11">
					
				<div class="container col-md-12 padding-t-2p" style="padding-top: 10px">
					<div class="container col-md-12 bg-blue-dark">
						<h3 class="color-white font-light col-sm-6 text-left">Pregled rezervacij</h3>
						<div class="row hr-row-1-e"></div>					
					</div>
					
					<!-- dynamic -->
					<div class="container col-md-12 padding-b-5px">
						
						<?php $index = 1;?>
						<?php foreach($ReservationBook->table_reservation as $Reservation1){?>
						<div class="container col-md-12 margin-t-5px" style="background: #191919">
							<div class="row pointer openTable" style="border-bottom: 1px solid #eee;">
								<h4 class="font-light col-md-6 text-left color-white" style="float: left">
								<?php echo $index?> | dodano <?php echo $Reservation1->date_created ?> | pri.: <?php echo $Reservation1->date_arrival ?> odh.: <?php echo $Reservation1->date_departure ?>
								</h4>
								<h4  class="font-light col-md-6 text-right color-white" style="float:right">
									odpri
								</h4>
							</div>
							<div class="row tableData bg-purple-light">

								<!-- basic information -->
								<div class="table-responsive col-md-12" style="margin-top: 10px">
								  <table class="table table-bordered">
									    <thead class="bg-purple-dark  color-white">
									      <tr>
									        <th>Osebe</th>
									        <th><small>od tega</small> odrasli</th>
									        <th>Cena</th>
									        <th>Je potrjeno</th>
									      </tr>
									    </thead>
									    <tbody class="bg-white">
									      <tr>
									        <td><?php echo $Reservation1->no_of_guests ?></td>
									        <td><?php echo $Reservation1->no_of_adults ?></td>
									        <td><?php echo $Reservation1->price ?></td>
									        <td><?php echo $Reservation1->is_confirmed ?></td>
									      </tr>
									    </tbody>    
								  </table>
								</div>	
								<!-- basic information -->
								
								<!-- client information -->
								<div class="table-responsive col-md-12" style="margin-top: 10px">
								  <table class="table table-bordered">
									      <thead class="bg-purple-dark  color-white">
									      <tr>
									        <th>Ime in priimek</th>
									        <th>El. naslov</th>
									        <th>Tel.</th>
									        <th>Naslov</th>
									        <th>Pošta, kraj</th>
									      </tr>
									    </thead>
									    <tbody class="bg-white">
									      <tr>
									        <td><?php echo $Reservation1->first_name ?> <?php echo $Reservation1->last_name ?></td>
									        <td><?php echo $Reservation1->email ?></td>
									        <td><?php echo $Reservation1->telephone ?></td>
									        <td><?php echo $Reservation1->address ?></td>
									        <td><?php echo $Reservation1->post_name ?>, <?php echo $Reservation1->post_number ?></td>
									      </tr>
									    </tbody>    
								  </table>
								</div>	
								<!-- client information -->
														
							</div>
						</div>
						<?php $index++;?>
						<?php }?>
					
					</div>
					<!-- dynamic -->
				
				</div>
				
			</div>
			<!-- table booking -->

			
		</div>
	
</div>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="../style/js/jquery-1.11.3.min.js"></script>
		
	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="../style/js/bootstrap.js"></script>

	<script>
    $(document).ready(function () {
    	$(".tableData").hide();
    });
    </script>
   
   	<script>
	$('.openTable').click(function() {
		 $(this).siblings(".tableData").slideToggle(500);
	});
	</script>
   
</body>
</html>
