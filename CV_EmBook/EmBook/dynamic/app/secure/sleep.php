<?php

	include  $_SERVER['DOCUMENT_ROOT'].'/app/src/res/validation/login.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/html/controler_form.php';
	
	$_SESSION['notifications_liveBox']=0;
	include $_SERVER['DOCUMENT_ROOT'].'/app/src/res/main/preferences_overview.php';
	
	if(!isset($_SESSION['login_user'])){
		header("Location: ../login.php");
		exit;
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

	<link rel="icon" href="../images/favicon.ico">
	-->
	
	<!-- local -->
	<link href="../style/css/bootstrap.css" rel="stylesheet">
	<link href="../style/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="../style/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!-- local -->
	
	<!-- external -->
	<link href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700&amp;subset=latin-ext" rel="stylesheet">


	<!-- external -->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	      <script src="../https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="../https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]--> 


	    
</head>
<body style="background: url(<?php echo$_SESSION['image_bg_path']?>) no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">

<div id="show_loginPane" class="container-fluid bg-sleep pointer" style="max-width: 1920px;height: 100vh">

	<div  class="container col-lg-offset-4 col-lg-4 col-md-offset-2 col-md-8" style="margin-top: 25vh;">
		<div class="row text-center color-white" style="margin-bottom: 2%;">
			<div class="row" style="padding-top: 1%; padding-bottom: 1%;background: rgba(0,0,0, 0.8)">
				<h1 class="color-white text-center color-orange">
					<i class="fa fa-coffee fa-3x color-white" aria-hidden="true"></i>
					<br>
					<?php echo $_SESSION['login_user']?> <small>je v stanju spanja..</small>
				</h1>
				<div class="row hr-row-1-e"></div>
				<h4 class="font-light">Klikni, da se zbudiš..</h4>
			</div>
		</div>
		<div class="row" style="margin-bottom: 2%;">
			<?php
				if(!empty($_GET['ote'])){
					generate_form_alert($_GET['ote'], $_GET['dgr'], 0);
				}	
			?>
		</div>
		<div class="row">
			<div class="row col-md-5">
				<div class="container col-md-3 bg-green-light color-white padding-lr-5px text-center">
					<h4><i class="fa fa-bell" aria-hidden="true"></i></h4>
				</div>
				<div class="container col-md-9 bg-green-dark text-left padding-lr-5px color-white">
					<h4><span class="bg-green-dark font-light"><strong><?php echo $_SESSION['notification_count']?></strong> notifikacije</span></h4>
				</div>
			</div>
		</div>
		<div class="row padding-t-3p text-center">		
			<button onclick="javascript:location.href='../src/res/validation/logout.php'" type="submit" name="submit" value="login" class="btn-submit-purple bg-purple-transition deco-none font-light" style="margin:auto; font-size: 16px">Prijava z drugim računom</button>
			<br>
			<a href="../src/res/validation/logout.php" type="button" class="btn btn-danger margin-t-5px" style="font-size: 16px">Odjavi se</a>
		</div>
	</div>

</div>

<div id="loginPane" class="container-fluid" style="max-width: 1920px;">

	<div  class="container col-md-offset-4 col-md-4" style="margin-top: 20vh;">
		<div class="row text-center color-white" style="margin-bottom: 2%;">
			<div class="row" style="padding-top: 1%; padding-bottom: 1%;background: rgba(0,0,0, 0.7)">
				<h1 class="color-white text-center color-orange">Dobrodošel nazaj <?php echo $_SESSION['login_user']?>! <br> <small class="font-light">počitek je le en ključen del večje produktivnosti..</small></h1>
				<div class="row hr-row-1-e"></div>
			</div>
		</div>
		<div class="row text-center">
			<form method="POST">
			  <div class="form-group">
			    <input type="email" name="email" placeholder="Vpiši elektronski naslov" class="form-control" id="email" style="border-radius: 0;width: 60%;margin: auto; height: 50px">
			  </div>
			  <div class="form-group">
			    <input type="password" name="password" placeholder="Vpiši geslo.." class="form-control" id="email" style="border-radius: 0;width: 60%;margin: auto; height: 50px">
			  </div>
			  <button type="submit" name="submit" value="sleep.php" class="btn-submit-purple bg-purple-transition deco-none font-light" style="margin:auto; font-size: 16px">PRIJAVA</button>
			</form>			
		</div>
	</div>
	
</div>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="../style/js/jquery-1.11.3.min.js"></script>
		
	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="../style/js/bootstrap.js"></script>

	<script>

	$("#loginPane").hide();
	
	$( "#show_loginPane" ).click(function() {
		  $("#show_loginPane").slideUp(500);
		  $("#loginPane").fadeIn(2500);
		});
	</script>

   
</body>
</html>
