<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

			<!-- main content -->
			<div id="main-content" class="container col-md-10">

				<!-- search engine -->
				<div class="row bg-white border-b-1-ddd padding-tb-15p">
					<div class="container col-md-2">
						<h2 class="font-light">
							<a href="" class="btn btn-md btn-info-b"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Prejšni</a>
						</h2>
					</div>
					<div class="container col-md-8">
						<form action="detail" method="post">
							<div class="form-group col-md-12" style="margin-top: 10px">
								<input type="text" class="search-input font-light" placeholder="Išči po podatkih.."
								id="input_text"
								name="user_query">
								<input style="display: none"
								type="submit"
								name="user_search">
							</div>
						</form>
					</div>
					<div class="container text-right col-md-2">
						<h2 class="font-light">
							<a href="" class="btn btn-md btn-info-b"> Naslednji <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
						</h2>
					</div>
				</div>
				<!-- search engine -->

				<!-- search error -->
				<div class="row bg-eee padding-tb-15p <?php if(!empty($user) || is_null($user)){ echo 'display-none';}?>">
					<div class="container col-md-12">
						<h3>
							<span class="color-warning" style="font-size: 42px">
							<i class="fa fa-frown-o" aria-hidden="true"></i>
							Ups...
							</span>
							<small>
							prišlo je do nadzarovane napake, z Vašim ključem iskanja <strong>"<?php echo $query?>"</strong>
							nismo našli ničesar, kar bi se ujemalo s shranjenimi podatki..
							</small>
						</h3>
						<div class="container col-md-12">
							<h4 class="font-light">Vaše možnosti so slednje</h4>
							<ol>
								<li>Iščite znova z drugačnim ključem</li>
								<li>Morda iščete na napačnem mestu, ta isklanik je zgolj iskalnik za uporabnike aplikacije</li>
								<li>Morda storitev trenutno ni na voljo in poskusite znova kasneje <small>(zelo redko)</small></li>
								<li>V skrajnem primeru kontaktirajte nekoga, ki Vam lahko pomaga ali administratorja aplikacije</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- search error -->

				<!-- name -->
				<div class="row bg-eee padding-tb-15p <?php if(empty($user)){ echo 'display-none';}?>">

					<div class="container col-md-12 padding-b-5p">
						<h1 class="font-light">
							<span style="float: left">
								<?php echo $user->getName()." ".$user->getSurname(); ?> <small class="font-light"><?php echo $user->getPosition(); ?></small>
							</span>
							<span style="float: right">
								<form action="add" method="POST">
									<button class="btn btn-md btn-primary" type="submit" name="edit" value="<?php echo $user->getId()?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Uredi</button>
									<button class="btn btn-md btn-info-b" type="submit"><i class="fa fa-telegram" aria-hidden="true"></i>Pošlji el. pošto</button>
									<button class="btn btn-md btn-success" type="submit"><i class="fa fa-comments-o" aria-hidden="true"></i>Pogovor</button>
								</form>
							</span>
						</h1>
					</div>

				</div>
				<!-- name -->

				<!-- info -->
				<div class="row bg-white padding-tb-15p <?php if(empty($user)){ echo 'display-none';}?>">
					<div class="container col-md-12">

						<!-- company info -->
						<div class="container col-md-12 padding-tb-15p">
							<h3 class="font-light">Pripisana vloga v društvu je <strong>član</strong></h3>
							<h3 class="font-light">Član društva od , <?php  echo $user->getDateJoined() ?>
							<small class="font-light">
							<?php $tDays = $user->getUserSince();
							 switch ($tDays) {
							 	case '1':
							 		echo $tDays." dan" ;
							 		break;
							 	case '2':
							 		echo $tDays." dneva" ;
							 		break;
							 	default:
							 		echo $tDays." dni" ;
							 		break;
							 }
							 ?>
							  </small></h3>
						</div>
						<!-- company info -->

						<!-- basic info -->
						<div class="container col-md-6">

							<h4>Podatki o naslovu</h4>
							<hr>

							<div class="form-group col-md-12">
								<label>Naslov</label>
								<p class="border-b-1-ddd font-light"><?php if (!empty($user->getCAddress())) echo $user->getCAddress()->getStreet(); ?></p>
							</div>

							<div class="form-group col-md-8">
								<label>Mesto</label>
								<p class="border-b-1-ddd font-light"><?php if(!empty($user->getCAddress())) echo $user->getCAddress()->getName();  ?></p>
							</div>

							<div class="form-group col-md-4">
								<label>Pošta</label>
								<p class="border-b-1-ddd font-light"><?php if(!empty($user->getCAddress())) echo $user->getCAddress()->getPostcode();?></p>
							</div>

						</div>
						<!-- basic info -->

						<!-- contant info -->
						<div class="container col-md-6">

							<h4>Konaktni podatki</h4>
							<hr>

							<div class="form-group col-md-12">
								<label>Tel.</label>
								<p class="border-b-1-ddd font-light"><?php echo $user->getTelephoneNum(); ?></p>
							</div>

							<div class="form-group col-md-12">
								<label>El. pošta</label>
								<p class="border-b-1-ddd font-light"><?php echo $user->getEmail(); ?></p>
							</div>

						</div>
						<!-- contant info -->


						<!-- project info -->
						<div class="container col-md-12">

							<!-- projects -->

							<div class="container col-md-12 bg-white border-t-5-info border-rbl-1-ddd showHide-mainContent pointer">
								<h4> Udeležen v projektih <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small></h4>
							</div>
							<!-- table -->
							<div class="container bg-white col-md-12 border-rbl-1-ddd margin-t-5p padding-tb-15p">

							  <table class="table table-hover table-responsive">
							    <thead>
							      <tr>
							        <th>Projekt <a href="" class="btn btn-xs btn-link"> <i class="fa fa-sort" aria-hidden="true"></i> </a></th>
							        <th>Akcije </th>
							      </tr>
							    </thead>
							    <tbody>
							      <tr>
							        <td>Projekt 1</td>
							        <td>
										<a href="" class="btn btn-xs btn-info"> <i class="fa fa-external-link" aria-hidden="true"></i> podrobnosti </a>
							        </td>
							      </tr>
							      <tr>
							        <td>Projekt 2</td>
							        <td>
										<a href="" class="btn btn-xs btn-info"> <i class="fa fa-external-link" aria-hidden="true"></i> podrobnosti </a>
							        </td>
							      </tr>
							  	</tbody>
							  </table>

							</div>
							<!-- table -->

						</div>
						<!-- project info -->

						<!-- activity info -->
						<div class="container col-md-12">
							<div class="container col-md-12 bg-white border-t-5-primary border-rbl-1-ddd showHide-mainContent pointer margin-t-15p">
								<h4> Aktivnost <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small></h4>
							</div>
							<!-- table -->
							<div class="container bg-white col-md-12 border-rbl-1-ddd margin-t-5p padding-tb-15p">

							  <table class="table table-hover table-responsive">
							    <thead>
							      <tr>
							        <th>Aktivnost</th>
							        <th>Čas</th>
							        <th>Akcije</th>
							      </tr>
							    </thead>
							    <tbody>
							      <tr>
							        <td>Spremenil uporabniško ime</td>
							        <td>
										22. 07. 2017 18:33
							        </td>
							        <td>
							        	<a href="" class="btn btn-xs btn-info"> <i class="fa fa-external-link" aria-hidden="true"></i> podrobnosti </a>
							        </td>
							      </tr>
							      <tr>
							        <td>Komentiral projekt a</td>
							        <td>
										22. 07. 2017 18:33
							        </td>
							        <td>
							        	<a href="" class="btn btn-xs btn-info"> <i class="fa fa-external-link" aria-hidden="true"></i> podrobnosti </a>
							        </td>
							      </tr>
							  	</tbody>
							  </table>

							</div>
							<!-- table -->

						</div>
						<!-- activity info -->



					</div>
				</div>
				<!-- info -->




			</div>
			<!-- main content -->
