<?php
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/validation/session.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/html/controler_form.php';
	
	$_SESSION['notifications_liveBox'] = 0;
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/main/comment_action.php';
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
			<h1 class="color-white font-light col-sm-6 text-left">Pogovor</h1>
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
			
			<!-- table comments -->
			<div class="container col-md-11">
				
				<div class="container col-md-12" style="padding-top: 15px">					
					<div class="container col-md-12 padding-b-5px">
						<a href="#" onclick="showForm()" class="btn-submit-purple bg-purple-transition deco-none font-light" style="font-size: 16px"> oddaj komentar <i class="fa fa-level-down" aria-hidden="true"></i></a>
					</div>
					<div id="form" class="container col-md-12 color-white margin-t-7px padding-tb-3pr bg-19-6" style="display:none">
						<form method="POST" class="container col-md-12">
						  <div class="form-group col-md-6">
						    <label class="font-light" for="title">Naslov:</label>
						    <input type="text" name="title" value="" placeholder="Vpiši naslov komentarja" class="form-control" id="title" style="border-radius: 0;height: 50px">
						  </div>
						  <div class="form-group col-md-6">
						    <label class="font-light" for="select">Kategorija</label>
						    <select class="form-control" id="select" name="type" style="border-radius: 0;height: 50px">
						      <option value="0">Pogovor</option>
						      <option value="1">Prednostno</option>
						      <option value="2">Nujno</option>
						    </select>
						  </div>
						  <div class="form-group col-md-12">
						    <label class="font-light" for="textarea">Komentar:</label>
						    <textarea class="form-control" id="textarea" name="message" rows="3" style="border-radius: 0;"></textarea>
						  </div>
						  <div class="form-group col-md-12">
						 	 <button type="submit" name="submit" value="insert" class="btn btn-primary font-light" style="border-radius: 0;float: right;font-size: 16px">Oddaj komentar</button>
						  </div>
						</form>
					</div>
				</div>
				
				<div class="container col-md-12 padding-t-2p">
					
					<div class="container col-md-4 ">
						<div class="container col-md-12 bg-orange-middle">
							<h3 class="color-white font-light text-center"><i class="fa fa-bullhorn fa-3x" aria-hidden="true"></i></h3>
							<h2 class="color-white font-light text-center">Nujno</h2>
							<div class="row hr-row-1-e padding-t-5px"></div>		
							<h4 class="color-white text-right">0 | nepregledanih</h4>			
						</div>
						<div class="container col-md-12 bg-19-6" style="padding-bottom: 15px">

						<?php foreach($Preferences->table_user[$_SESSION['login_index']]->table_comments as $Comment){?>
						<?php if(empty($Comment->is_noticed) && $Comment->type_degree == 2){?>
							<div class="container col-md-12" style="margin-top: 20px">
								<div class="row bg-orange-dark padding-lr-5px color-white">
									<h4 class="col-lg-6 font-light text-left"><strong><?php echo $Comment->title?></strong></h4>
									<h5 class="col-lg-6 font-light text-right"><?php echo $Comment->author?><br><?php echo $Comment->date_created?></h5>
								</div>
								<div class="row bg-white padding-lr-5px">
									<div class="container col-md-12">
										<p class="padding-t-5px"><?php echo $Comment->message?></p>
									</div>
								</div>
								<div class="row">
									<form method="POST">
										<button type="submit" name="submit" value="<?php echo $Comment->id?>" class="btn btn-danger text-center font-light" style="border-radius: 0;float: right;font-size: 14px; width:100%">Označi prebrano</button>
									</form>
								</div>
							</div>
						<?php }?>
						<?php }?>
						
						<?php foreach($Preferences->table_user[$_SESSION['login_index']]->table_comments as $Comment){?>
						<?php if(!empty($Comment->is_noticed) && $Comment->type_degree == 2){?>
							<div class="container col-md-12" style="margin-top: 20px">
								<div class="row bg-orange-dark padding-lr-5px color-white">
									<h4 class="col-lg-6 font-light text-left"><strong><?php echo $Comment->title?></strong></h4>
									<h5 class="col-lg-6 font-light text-right"><?php echo $Comment->author?><br><?php echo $Comment->date_created?></h5>
								</div>
								<div class="row bg-white padding-lr-5px">
									<div class="container col-md-12">
										<p class="padding-t-5px"><?php echo $Comment->message?></p>
									</div>
								</div>
							</div>
						<?php }?>
						<?php }?>
						
						</div>									
					</div>
					
					<div class="container col-md-4">
						<div class="container col-md-12 bg-green-light">
							<h3 class="color-white font-light text-center"><i class="fa fa-angle-double-up fa-3x" aria-hidden="true"></i></h3>
							<h2 class="color-white font-light text-center">Prednostno</h2>
							<div class="row hr-row-1-e padding-t-5px"></div>	
							<h4 class="color-white text-right">0 | nepregledanih</h4>					
						</div>
						<div class="container col-md-12 bg-19-6" style="padding-bottom: 15px">

						<?php foreach($Preferences->table_user[$_SESSION['login_index']]->table_comments as $Comment){?>
						<?php if(empty($Comment->is_noticed) && $Comment->type_degree == 1){?>
							<div class="container col-md-12" style="margin-top: 20px">
								<div class="row bg-green-dark padding-lr-5px color-white">
									<h4 class="col-lg-6 font-light text-left"><strong><?php echo $Comment->title?></strong></h4>
									<h5 class="col-lg-6 font-light text-right"><?php echo $Comment->author?><br><?php echo $Comment->date_created?></h5>
								</div>
								<div class="row bg-white padding-lr-5px">
									<div class="container col-md-12">
										<p class="padding-t-5px"><?php echo $Comment->message?></p>
									</div>
								</div>
								<div class="row">
									<form method="POST">
										<button type="submit" name="submit" value="<?php echo $Comment->id?>" class="btn btn-success text-center font-light" style="border-radius: 0;float: right;font-size: 14px; width:100%">Označi prebrano</button>
									</form>
								</div>
							</div>						
						<?php }?>
						<?php }?>
						
						<?php foreach($Preferences->table_user[$_SESSION['login_index']]->table_comments as $Comment){?>
						<?php if(!empty($Comment->is_noticed) && $Comment->type_degree == 1){?>
							<div class="container col-md-12" style="margin-top: 20px">
								<div class="row bg-green-dark padding-lr-5px color-white">
									<h4 class="col-lg-6 font-light text-left"><strong><?php echo $Comment->title?></strong></h4>
									<h5 class="col-lg-6 font-light text-right"><?php echo $Comment->author?><br><?php echo $Comment->date_created?></h5>
								</div>
								<div class="row bg-white padding-lr-5px">
									<div class="container col-md-12">
										<p class="padding-t-5px"><?php echo $Comment->message?></p>
									</div>
								</div>
							</div>						
						<?php }?>
						<?php }?>
						
						</div>			
					</div>
					
					<div class="container col-md-4">
						<div class="container col-md-12 bg-blue-light">
							<h3 class="color-white font-light text-center"><i class="fa fa-comment fa-3x" aria-hidden="true"></i></h3>
							<h2 class="color-white font-light text-center">Pogovor</h2>
							<div class="row hr-row-1-e padding-t-5px"></div>									
							<h4 class="color-white text-right">0 | nepregledanih</h4>			
						</div>
						<div class="container col-md-12 bg-19-6" style="padding-bottom: 15px">

						<?php foreach($Preferences->table_user[$_SESSION['login_index']]->table_comments as $Comment){?>
						<?php if(empty($Comment->is_noticed) && $Comment->type_degree == 0){?>
							<div class="container col-md-12" style="margin-top: 20px">
								<div class="row bg-blue-dark padding-lr-5px color-white">
									<h4 class="col-lg-6 font-light text-left"><strong><?php echo $Comment->title?></strong></h4>
									<h5 class="col-lg-6 font-light text-right"><?php echo $Comment->author?><br><?php echo $Comment->date_created?></h5>
								</div>
								<div class="row bg-white padding-lr-5px">
									<div class="container col-md-12">
										<p class="padding-t-5px"><?php echo $Comment->message?></p>
									</div>
								</div>
							</div>
						<?php }?>
						<?php }?>
						
						<?php foreach($Preferences->table_user[$_SESSION['login_index']]->table_comments as $Comment){?>
						<?php if(!empty($Comment->is_noticed) && $Comment->type_degree == 0){?>
							<div class="container col-md-12" style="margin-top: 20px">
								<div class="row bg-blue-dark padding-lr-5px color-white">
									<h4 class="col-lg-6 font-light text-left"><strong><?php echo $Comment->title?></strong></h4>
									<h5 class="col-lg-6 font-light text-right"><?php echo $Comment->author?><br><?php echo $Comment->date_created?></h5>
								</div>
								<div class="row bg-white padding-lr-5px">
									<div class="container col-md-12">
										<p class="padding-t-5px"><?php echo $Comment->message?></p>
									</div>
								</div>
							</div>
						<?php }?>
						<?php }?>
						
						</div>			
					</div>
				
				</div>
				
			</div>
			<!-- table comments -->

			
		</div>
	
</div>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="../style/js/jquery-1.11.3.min.js"></script>
		
	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="../style/js/bootstrap.js"></script>

	<script>
	$("showForm").click(function(){
	    $("#form").toggle();
	});
	</script>
	
	<script>
	function showForm() {
	    $("#form").toggle();
	}
	</script>

   
</body>
</html>
