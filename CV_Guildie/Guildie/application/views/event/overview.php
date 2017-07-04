<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

			<!-- main content -->
			<div id="main-content" class="container bg-white col-md-10">

				<!-- search engine -->
				<div class="row bg-white border-b-1-ddd padding-tb-15p">
					<div class="container col-md-4">
						<h2 class="font-light">
							<form action="add" method="POST">
								<button class="btn btn-md btn-success" type="submit" name="add"><i class="fa fa-user-plus" aria-hidden="true"></i> Nov dogodek </button>
							</form>
						</h2>
					</div>
					<div class="container col-md-8">
						<form action="detail" method="post">
							<div class="form-group col-md-12" style="margin-top: 10px">
								<input type="text" class="search-input font-light" placeholder="Išči po podatkih.."
								name="event_query"
								>
								<input style="display: none"
								type="submit"
								name="event_search">

							</div>
						</form>
					</div>
				</div>
				<!-- search engine -->

                <!-- google maps error -->
                <div class="row bg-eee padding-tb-15 display-none googleMaps-warning">
                    <div class="alert alert-warning alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <strong>Ups..</strong> morda je na zemljevidu vpisan neveljavni poštni naslov, nekatere povezave na zemljevidu posledično ne bodo prikazane..
                    </div>
                </div>
                <!-- google maps error -->

				<!-- title -->
				<div class="row bg-eee padding-tb-15p">
					<div class="container col-md-12">
						<h2>
						Pregled dogodkov
						</h2>
					</div>
				</div>
				<!-- title -->

				<div class="row">
					<div class="container col-md-8">


						<!-- item -->
						<div class="container col-md-12 margin-t-5p padding-tb-5p">
						<?php $n=0; $k = 0;?>
						<?php foreach ($years as $year) {
							$n++;
						?>

							<div class="container col-md-12 showHide-mainContent pointer border-b-1-ddd">

								<h3>
								<strong> <?php echo $n  ?></strong> | <?php echo $year ?> <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small>
								</h3>

							</div>

							<div class="container col-md-12 bg-white margin-t-5p padidng-tb-15p">
							  <table class="table table-hover table-responsive">
							  	<thead>
							  		 <tr>
								        <th>Naziv</th>
								        <th>Naslov </th>
								        <th>Gostitelj</th>
								        <th>Datum pričetka<small class="text-muted"><?php // echo round($event->getDaysRemaining()); ?> dni </small></th>
								        <th>Akcije </th>
							  		</tr>
							  	</thead>


							<?php


								for($i = 0 ; $i < sizeof($events);$i++){
							 ?>

							  <?php /* to je potrebno ze prej izracunat, ne na view strani */ if(date_format(date_create($events[$i]->getDate_start()),"Y-m-d") == $year){  ?>

							    <tbody style="font-size: 15px;padding-top: 30px">

							      <tr>
							      	<td><?php echo $events[$i]->getTitle(); ?></td>
							        <td><?php echo $events[$i]->getLocation(); ?> </td>
							        <td><?php echo $events[$i]->getHost_name(); ?></td>
							        <td><?php echo $events[$i]->getDate_start(); ?> <small class="text-muted"></small></td>
							        <td>
												<form action="add" method="POST">
													<button class="btn btn-sm btn-primary" type="submit" name="edit" value="<?php echo $events[$i]->getId()?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
													<button class="btn btn-sm btn-success" type="submit" name="detail" value="<?php echo $events[$i]->getId()?>"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
												</form>
							        </td>
							      </tr>

							      <?php  }}?>

							  	</tbody>
							  </table>
							</div>

							<?php } ?>



						</div>
						<!-- item -->

					</div>

					<!-- map -->
					<div class="container col-md-4">

						<div class="row">

							<div class="container col-md-12 margin-t-20p">
								<div id="map"></div>
							</div>

						</div>

					</div>
					<!-- map -->

				</div>

			</div>
			<!-- main content -->
