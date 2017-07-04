<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

			<!-- main content -->
			<div id="main-content" class="container bg-eee col-md-10">

				<!-- search engine -->
				<div class="row bg-white border-b-1-ddd padding-tb-15p">
					<!-- breadcrumb -->
					<div class="container col-md-12">
						<h4 class="font-light">
							<a href="<?php echo site_url('organization/event_controller/events') ?>"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> </a>
							\ <a href="#createEvent"><?php echo $event_action ?></a>
							\ <a href="#descriptionEvent">Opis dogodka</a>
						</h4>
					</div>
					<!-- breadcrumb -->
				</div>
				<!-- search engine -->

				<!-- title -->
				<div class="row bg-eee padding-tb-15p">
					<div class="container col-md-12">
						<h2><?php echo $event_action ?></h2>
					</div>
				</div>
				<!-- title -->

				<!-- form -->
				<form action="add" method="post">

					<div class="row bg-eee padding-tb-15p">

						<!-- basic info -->
						<div class="container col-md-12">
							<div class="container col-md-12 bg-white border-1-ddd padding-tb-5p showHide-mainContent pointer">
								<h4> <?php echo $event_action ?> <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small></h4>
							</div>

							<div id="createEvent" class="container bg-white col-md-12 border-1-ddd margin-t-5p padding-tb-15p">
								<div class="container col-md-6">
									<div class="form-group col-md-12 margin-t-5p">
										<p>Naziv</p>
										<input class="form-control border-radius-0 input" placeholder="Naziv dogodka"
											type="text"
											name="title"
											value="<?php if(!empty($event)){
												echo $event->getTitle();
											}?>">
									</div>
                                    <div class="form-group col-md-6 margin-t-5p">
                                        <p>
                                            Že znan tip?
                                        </p>
                                        <select class="form-control border-radius-0 input"
                                                onchange="chooseType(this);"
                                                name="type_select">

                                            <option value="0" disabled selected>že znani tipi</option>
                                            <option value="Sestanek">Sestanek</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 margin-t-5p">
                                        <p>
                                            Tip dogodka
                                        </p>
                                        <input class="form-control border-radius-0 input" placeholder="Vpišite tip dogodka"
                                               type="text"
                                               name="type"
																							 value="<?php if(!empty($event)){
												 												echo $event->getType();
												 											}?>">
                                    </div>
                                    <div class="form-group col-md-6 margin-t-5p">
                                        <p>Znan gostitelj?</p>
                                        <select class="form-control border-radius-0 input"
                                                onchange="chooseHost(this);"
                                                name="host_select">

                                            <option value="0" disabled selected>že znan gostitelj</option>
                                            <option value="Pivovarna Laško">Pivovarna Laško</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 margin-t-5p">
										<p>Gostitelj/organizator</p>
										<input class="form-control border-radius-0 input" placeholder="Gostitelj dogodka"
											type="text"
											name="host_name"
											value="<?php if(!empty($event)){
												echo $event->getHost_name();
											}?>">
									</div>
                                    <div class="form-group col-md-12 margin-t-5p">
                                        <p>Izberi naslov</p>
                                        <select class="form-control border-radius-0 input"
                                                onchange="chooseHost(this);"
                                                name="fkevent_address_id">

                                            <option value="0" disabled selected>vsi znani naslovi za dogodke</option>
                                            <option value="">Naslov 1, 33 majna, 2000 Maribor</option>

                                        </select>
                                    </div>
									<div class="form-group col-md-4">
										<p>Ulica</p>
										<input class="form-control border-radius-0 input" placeholder="Vpišite naziv ulice"
											type="text"
											name="address"
											value="">
									</div>
									<div class="form-group col-md-4">
										<p>Hišna št.</p>
										<input class="form-control border-radius-0 input" placeholder="hiš. št."
											type="number"
											name="house_num"
											value="">
									</div>
									<div class="form-group col-md-4">
										<p>Nadstropje</p>
										<input class="form-control border-radius-0 input" placeholder="št. nad."
											type="number"
											name="floor"
											value="">
									</div>
									<div class="form-group col-md-4">
										<p>Mesto</p>
										<input class="form-control border-radius-0 input" placeholder="Občina ali mesto"
											type="text"
											name="city"
											value="">
										</div>
									<div class="form-group col-md-4">
										<p>Pošta</p>
										<input class="form-control border-radius-0 input" placeholder="Poštna številka"
											type="number"
											name="post_num"
											value="">
									</div>
								</div>
								<div class="container col-md-6">
									<div class="form-group col-md-6">
										<p>Datum trajanje od</p>
										<input class="form-control border-radius-0 input"
											id="date_selector_hidden"
											type="text"
											name="date_start"
											value="<?php if(!empty($event)){
												echo $event->getDate_start();
											}?>">
									</div>
									<div class="form-group col-md-6">
										<p>Pričetek ob</p>
										<div class="input-group clockpicker">
										    <input  class="form-control"
										     type="text"
										     name="time_start"
										     value="09:30"
										    >
										    <span class="input-group-addon">
										        <span class="glyphicon glyphicon-time"></span>
										    </span>
										</div>
									</div>
									<div id="date_selector_embed" class="container col-md-12"></div>
									<div class="container col-md-6 margin-t-5p">
										<p>datum do</p>
										<input class="form-control border-radius-0 input" placeholder=""
											type="text"
											id="date_selector"
											name="date_end"
											value="<?php if(!empty($event)){
												echo $event->getDate_end();
											}?>">
									</div>
									<div class="form-group col-md-6 margin-t-5p">
										<p>konec ob</p>
										<div class="input-group clockpicker">
										    <input class="form-control"
										    type="text"
										    name="time_end"
										    value="09:30">
										    <span class="input-group-addon">
										        <span class="glyphicon glyphicon-time"></span>
										    </span>
										</div>
									</div>
								</div>
								<div id="descriptionEvent" class="container col-md-12">
									<div class="form-group col-md-12 margin-t-5p">
										<p>Opis dogodka</p>
		                           		<div class="adjoined-bottom">
		                            		<div class="grid-container" >
		                                    	<div class="grid-width-100">
		            								<textarea class="form-control" oninvalid="this.setCustomValidity('Obvezno polje!')" oninput="setCustomValidity('')"
		            								id="editor"
		            								name="description"
		            								required>

																<?php if(!empty($event)){
																	echo htmlspecialchars($event->getDescription());
																}?>

		            								</textarea>
		                                 		</div>
		                            		</div>
		                        		</div>
									</div>
								</div>
							</div>
						</div>
						<!-- basic info -->

					</div>

						<!-- form submit button -->
						<div class="form-actionBar-fixed-bottom">
							<div class="container-fluid wrapper">
								<div class="row text-right padding-tb-5p visible-lg visible-md">
									<div class="container col-md-12">
										<h3>
											<button class="btn btn-success btn-md font-light" style="font-size: 18px"
												id="btn-submit"
												type="submit"
												value="<?php if(!empty($event)){
													echo $event->getId();
												}?>"
												name="event_add"
												>
												Potrdi in dodaj
											</button>
										</h3>
									</div>
								</div>
								<!-- xs & sm -->
								<div class="row text-right padding-tb-5p visible-sm visible-xs">
									<div class="container col-md-12">
										<h3>
											<button class="btn btn-success btn-md font-light" style="font-size: 18px"
												id="btn-submit"
												type="submit"
												value="<?php if(!empty($event)){
													echo $event->getId();
												}?>"
												name="event_add">

												<i class="fa fa-plus" aria-hidden="true"></i>
											 </button>
										</h3>
									</div>
								</div>
								<!-- xs & sm -->
							</div>
						</div>
						<!-- form submit button -->


					</form>
					<!-- form -->

			</div>
			<!-- main content -->
