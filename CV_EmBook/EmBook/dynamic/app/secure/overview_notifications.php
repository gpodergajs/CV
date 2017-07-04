<?php
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/validation/session.php';
	
	$_SESSION['notifications_liveBox'] = 0;
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
			<h1 class="color-white font-light col-sm-6 text-left">Pregled notifikacij</h1>
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
			
			<!-- table notifications -->
			<div class="container col-md-11">
				
				<div class="container col-md-12" style="padding-top: 15px">					
					<form method="POST">
						<a href="#" onclick="showActions()" class="btn-submit-purple bg-purple-transition deco-none font-light" style="font-size: 16px"> prikaži akcije <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
						<span id="actions" style="display:none">
							<button type="submit" name="submit" value="check_all" class="btn btn-warning" style="margin-left: 8px">Preglej vse</button>
						</span>	
					</form>
				</div>
				
				<div class="container col-md-12 padding-t-2p">
					<div class="container col-md-12 bg-green-light">
						<h3 class="color-white font-light col-sm-6 text-left">Nepregledane notifikacije</h3>
						<h3 class="color-white col-sm-6 text-right"><?php echo $_SESSION['notification_count'] ?> | nepregledanih</h3>
						<div class="row hr-row-1-e"></div>					
					</div>
					
					<!-- dynamic -->
					<div class="container col-md-12 padding-b-5px" style="background: #191919">
						
						<?php if(empty($_SESSION['notification_count'])){?>
						<div class="container color-white col-md-12 padding-t-5px margin-t-5px">
							<h4 class="font-light">Ni nedavnih notifikacij..</h4>
						</div>
						<?php }?>
						
						<?php foreach($Preferences->table_user[$_SESSION['login_index']]->table_notifications as $Notification){?>
						<?php if(empty($Notification->is_noticed) && $Notification->hazard_degree == 2){?>
							<div class="container color-white col-md-12 padding-t-5px margin-t-5px">
								<h4 class="col-md-1 font-light text-center color-red"><i class="fa fa-bomb" aria-hidden="true"></i></h4>
								<h4 class="col-md-2 font-light text-center"><?php echo $Notification->date_created?></h4>
								<h4 class="col-md-2 font-light text-left"><?php echo $Notification->type?></h4>
								<h4 class="col-md-6 font-light text-left"><?php echo $Notification->message?></h4>
								<form class="col-md-1" method="POST">							
									<p><button type="submit" name="submit" value="<?php echo $Notification->id?>" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button></p>
								</form>
								<div class="row hr-row-1-e"></div>
							</div>
						<?php }?>
						<?php }?>

						<?php foreach($Preferences->table_user[$_SESSION['login_index']]->table_notifications as $Notification){?>
						<?php if(empty($Notification->is_noticed) && $Notification->hazard_degree == 1){?>
						<div class="container color-white col-md-12 padding-t-5px margin-t-5px">
							<h4 class="col-md-1 font-light text-center color-orange-light"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h4>
							<h4 class="col-md-2 font-light text-center"><?php echo $Notification->date_created?></h4>
							<h4 class="col-md-2 font-light text-left"><?php echo $Notification->type?></h4>
							<h4 class="col-md-6 font-light text-left"><?php echo $Notification->message?></h4>
							<form class="col-md-1" method="POST">							
								<p><button type="submit" name="submit" value="<?php echo $Notification->id?>" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button></p>
							</form>
							<div class="row hr-row-1-e"></div>
						</div>
						<?php }?>
						<?php }?>

						<?php foreach($Preferences->table_user[$_SESSION['login_index']]->table_notifications as $Notification){?>
						<?php if(empty($Notification->is_noticed) && $Notification->hazard_degree == 0){?>					
						<div class="container color-white col-md-12 padding-t-5px margin-t-5px">
							<h4 class="col-md-1 font-light text-center color-blue-light"><i class="fa fa-info" aria-hidden="true"></i></h4>
							<h4 class="col-md-2 font-light text-center"><?php echo $Notification->date_created?></h4>
							<h4 class="col-md-2 font-light text-left"><?php echo $Notification->type?></h4>
							<h4 class="col-md-6 font-light text-left"><?php echo $Notification->message?></h4>
							<div class="row hr-row-1-e"></div>
						</div>
						<?php }?>
						<?php }?>

					</div>
					<!-- dynamic -->
				
				</div>
				
				<div class="container col-md-12 padding-tb-3pr">
					<div class="container col-md-12 bg-green-dark">
						<h3 class="color-white font-light col-sm-6 text-left">Arhiv <small class="pointer" id="showArchive">prikaži vse <i class="fa fa-angle-double-right" aria-hidden="true"></i></small></h3>
						<h3 class="color-white col-sm-6 text-right"><?php echo count($Preferences->table_user[$_SESSION['login_index']]->table_notifications) ?> | vseh</h3>
						<div class="row hr-row-1-e"></div>					
					</div>			
									
					<!-- dynamic -->
					<div id="archive" class="container col-md-12 bg-silver-2d padding-b-5px" style="display: none">

						<?php foreach($Preferences->table_user[$_SESSION['login_index']]->table_notifications as $Notification){?>
						<?php if(!empty($Notification->is_noticed) && $Notification->hazard_degree == 2){?>
							<div class="container color-white col-md-12 padding-t-5px margin-t-5px">
								<h4 class="col-md-1 font-light text-center color-red"><i class="fa fa-bomb" aria-hidden="true"></i></h4>
								<h4 class="col-md-2 font-light text-center"><?php echo $Notification->date_created?></h4>
								<h4 class="col-md-1 font-light text-left"><?php echo $Notification->type?></h4>
								<h4 class="col-md-6 font-light text-left"><?php echo $Notification->message?></h4>
								<form class="col-md-2" method="POST">							
									<p><button type="submit" name="submit" value="" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button></p>
								</form>
								<div class="row hr-row-1-e"></div>
							</div>
						<?php }?>
						<?php }?>

						<?php foreach($Preferences->table_user[$_SESSION['login_index']]->table_notifications as $Notification){?>
						<?php if(!empty($Notification->is_noticed) && $Notification->hazard_degree == 1){?>
						<div class="container color-white col-md-12 padding-t-5px margin-t-5px">
							<h4 class="col-md-1 font-light text-center color-orange-light"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h4>
							<h4 class="col-md-2 font-light text-center"><?php echo $Notification->date_created?></h4>
							<h4 class="col-md-1 font-light text-left"><?php echo $Notification->type?></h4>
							<h4 class="col-md-6 font-light text-left"><?php echo $Notification->message?></h4>
							<form class="col-md-2" method="POST">							
								<p><button type="submit" name="submit" value="" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button></p>
							</form>
							<div class="row hr-row-1-e"></div>
						</div>
						<?php }?>
						<?php }?>

						<?php foreach($Preferences->table_user[$_SESSION['login_index']]->table_notifications as $Notification){?>
						<?php if(!empty($Notification->is_noticed) && $Notification->hazard_degree == 0){?>					
						<div class="container color-white col-md-12 padding-t-5px margin-t-5px">
							<h4 class="col-md-1 font-light text-center color-blue-light"><i class="fa fa-info" aria-hidden="true"></i></h4>
							<h4 class="col-md-2 font-light text-center"><?php echo $Notification->date_created?></h4>
							<h4 class="col-md-1 font-light text-left"><?php echo $Notification->type?></h4>
							<h4 class="col-md-6 font-light text-left"><?php echo $Notification->message?></h4>
							<div class="row hr-row-1-e"></div>
						</div>
						<?php }?>
						<?php }?>					
					
					
					</div>
					<!-- dynamic -->
				
				</div>
				
				
			</div>
			<!-- table notifications -->

			
		</div>
	
</div>
	
	<?php 
	/*
	 * 	@Pregled notifikacij po tem, ko se že prikažejo med aktivnimi
	 * 
	 * 	*napaka odpravljena..
	 *
	 */
	
	foreach($Preferences->table_user[$_SESSION['login_index']]->table_notifications as $Notification){
		if(empty($Notification->is_noticed) && $Notification->hazard_degree == 0){
			$Notification->is_noticed = 1;
		}
	}
	
	#Save the file
	serialize_object($Preferences);
	?>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="../style/js/jquery-1.11.3.min.js"></script>
		
	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="../style/js/bootstrap.js"></script>

	<script>
	$("#showArchive").click(function(){
	    $("#archive").toggle();
	});
	</script>
	
	<script>
	function showActions() {
	    $("#actions").toggle();
	}
	</script>

   
</body>
</html>
