<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

			<!-- main content -->
			<div id="main-content" class="container col-md-10" style="min-height: 100vh">

				<!-- search engine -->
				<div class="row bg-white border-b-1-ddd padding-tb-15p">
					<div class="container col-md-2">
						<h2 class="font-light">
							<a href="" class="btn btn-md btn-info-b"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Prejšni</a>
						</h2>
					</div>
					<div class="container col-md-8">
						<form method="post" action="detail">
							<div class="form-group col-md-12" style="margin-top: 10px">

								<input type="text" class="search-input font-light" placeholder="Išči po podatkih.."
								name="project_query"

								>
								<input style="display: none"
								type="submit"
								name="project_search">
							</div>
						</form>
					</div>
					<div class="container text-right col-md-2">
						<h2 class="font-light">
							<a href="" class="btn btn-md btn-info-b"> Naslednji  <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
						</h2>
					</div>
				</div>
				<!-- search engine -->

				<!-- name -->
				<div class="row bg-eee padding-tb-15p">

					<div class="container col-md-12 padding-b-5p">
						<h1 class="font-light">
							<span style="float: left">


								<?php echo $cProject->getTitle();/* $days = round($cProject->getDaysRemaining()); */?>

								<?php //echo $days ; ?>
								<?php
                /*
									if ($days <= 1 && $days > -1) { // će  se ni potekel
										echo '<small class="font-light">čez<strong class="font-normal">';
										echo $days;
										echo 'dan';
										echo ' </strong> ob <strong class="font-normal"><?php echo $cEvent->getTimeOf(); ?></strong></small>';
									}else if ($days < 0){
										echo '<small class="font-light">preteklo pred <strong class="font-normal">';
										echo $days * -1;

										if ($days == -1){
											echo " dnevom";
										}else if($days < -1){
											echo " dnevi";
										}


									}else if ($days > 1){ // ce se ni potekel

										echo '<small class="font-light">čez <strong class="font-normal">';
										echo $days;
										echo ' dni';
									}

									 ?>
								 </strong> ob <strong class="font-normal"><?php echo $cProject->getTimeEnd(); */?>

								 </strong></small>
							</span>
							<span style="float: right">
								<form action="add" method="POST">
									<button class="btn btn-md btn-primary" type="submit" name="edit" value="<?php echo $cProject->getId()?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Uredi</button>
								</form>
							</span>
						</h1>
					</div>

				</div>
				<!-- name -->

                <!-- search error -->
                <div class="row bg-eee padding-tb-15p <?php if(!empty($cProject) || is_null($cProject)){ echo 'display-none';}?>">
                    <div class="container col-md-12">
                        <h3>
							<span class="color-warning" style="font-size: 42px">
							<i class="fa fa-frown-o" aria-hidden="true"></i>
							Ups...
							</span>
                            <small>
                                prišlo je do nadzarovane napake, z Vašim ključem iskanja <strong><?php ?></strong>
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

				<!-- info -->
				<div class="row bg-white padding-tb-15p <?php if(empty($cProject)){ echo 'display-none';}?>">

					<div class="container col-md-8">

						<!-- basic info -->
						<div class="container col-md-12 padding-tb-15p">
							<h3 class="font-light">Projekt je dodala oseba <strong class="font-normal">@DV</strong></h3>
							<hr>
						</div>
						<!-- basic info -->

						<!-- extensive info -->
						<div class="container col-md-12">
							<div class="form-group col-md-12">
								<h4>Besedilo oz. podan opis</h4>
								<hr>
								<div class="form-group">
									<?php echo $cProject->getDescription(); ?><!-- description -->
								</div>
							</div>
              <!-- all active projects -->
              
              <div class="row padding-tb-15p">
                  <div class="container col-md-12">
                      <div class="container col-md-12 bg-white border-t-2-info border-rbl-1-ddd showHide-mainContent pointer">
                          <h3>Tekoči projekti <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small></h3>
                      </div>
                      <!-- table -->
                      <div class="container bg-white col-md-12 border-rbl-1-ddd margin-t-5p padding-tb-15p">
                          <table class="table table-hover table-responsive">
                              <thead>
                              <tr>
                                  <th>Ime in priimek <a href="" class="btn btn-xs btn-link"> <i class="fa fa-sort" aria-hidden="true"></i> </a></th>
                                  <th>El. naslov </th>
                                  <th>Vrsta računa <a href="" class="btn btn-xs btn-link"> <i class="fa fa-sort" aria-hidden="true"></i> </a></th>
                                  <th>Dosegljivost </th>
                                  <th>Akcije </th>
                              </tr>
                              </thead>
                              <tbody>
<!--
                              <?php  foreach ($data_project as $project) { ?>

                                <!--
                                      <tr>
                                          <td><?php echo $user->getName()." ".$user->getSurname();?></td>
                                          <td><?php echo $user->getEmail(); ?></td>
                                          <td><?php echo $user->getPosition();  ?></td>
                                          <td>1h</td>
                                          <td>
                                              <form action="add" method="POST">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="edit" value="<?php echo $cProject->getId()?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                  <button class="btn btn-sm btn-info-b" type="submit" name="detail" value="<?php echo $cProject->getId()?>"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                                                  <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-comments-o" aria-hidden="true"></i></button>
                                                  <button class="btn btn-sm btn-danger" type="submit" name="turnOff" value="<?php echo $cProject->getId()?>"><i class="fa fa-power-off" aria-hidden="true"></i></button>
                                              </form>
                                          </td>
                                      </tr>
                                    -->

                                  <?php }?>
                                -->

                              </tbody>
                          </table>

                      </div>
                      <!-- table -->
                  </div>
              </div>
						</div>
						<!-- extensive info -->

					</div>

					<div class="container col-md-4">
						<div class="row calendar-full margin-t-5p">
							<div class="month">
								<ul>
							    	<li style="text-align:center">

							    	<?php
                    /*
							    		$arr = date_parse($cProject->getDate_start());
							    		$dateObj = DateTime::createFromFormat('!m',$arr['month']);
							    		$monthName = $dateObj->format('F');
							    		echo $monthName;
                      */
							    	?>

							      		<br>
							      		<span style="font-size:18px">2016</span>
							    	</li>
							  	</ul>
							</div>
							<?php
/*
							echo '<ul class="days border-t-ddd">';
							echo '<li></li>';

								for($i = 1 ; $i < cal_days_in_month(CAL_GREGORIAN,$arr['month'],$arr['year'])+1; $i++) {
									if($arr['day'] == $i){
										echo '<li><span class="active">'.$i.'</span></li>';
									}else
										echo  '<li>'.$i.'</li>';
								}
							echo '</ul>';
              */
							 ?>
						</div>
						<div class="row calendar-full margin-t-5p">

						</div>

				</div>
				<!-- info -->

				</div>
			</div>
			<!-- main content -->
