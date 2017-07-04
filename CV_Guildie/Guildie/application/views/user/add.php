<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

			<!-- main content -->
			<div id="main-content" class="container col-md-10 padding-b-4">

				<div class="row bg-white padding-tb-15p">
					<!-- breadcrumb -->
					<div class="container col-md-12">
						<h4 class="font-light">
							<a href="<?php echo site_url('managment/user_controller/users') ?>"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> </a>
							\ <a href="#basicInfo">Osnovni podatki</a>
							\ <a href="#companyInfo">Podatki za društvo</a>
							\ <a href="#appInfo">Vloga v aplikaciji</a>
						</h4>
					</div>
					<!-- breadcrumb -->
				</div>

				<div class="row padding-tb-15p">
					<div class="container col-md-12">
						<h2>
							<!--Dodaj novega uporabnika-->
							<?php echo $user_action ?>
						</h2>
					</div>
				</div>

				<!-- add -->
				<div class="row padding-tb-15p">
					<form action="add" method="post">

						<div class="container col-md-12">

							<div class="container col-md-12 bg-white border-1-ddd padding-tb-5p showHide-mainContent pointer">
								<h4> Osnovni podatki <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small></h4>
							</div>

							<div id="basicInfo" class="container bg-white col-md-12 border-1-ddd margin-t-5p padding-tb-15p">
								<div class="form-group col-md-4">
									<p>Ime</p>
									<input class="form-control border-radius-0 input" placeholder="Vpišite ime"
									onkeyup="check_input()"
									type="text"
									name="name"
									value="<?php if(!empty($user)){
										echo $user->getName();
									}?>"
									>
								</div>
								<div class="form-group col-md-4">
									<p>Priimek</p>
									<input class="form-control border-radius-0 input" placeholder="Vpišite priimek"
									onkeyup="check_input()"
									type="text"
									name="surname"
									value="<?php if(!empty($user)){
										echo $user->getSurname();
									}?>"
									>
								</div>
								<div class="form-group col-md-4">
									<p>Elektronski naslov</p>
									<input class="form-control border-radius-0 input" placeholder="Vpišite el. naslov"
									onkeyup="check_input()"
									type="email"
									name="email"
									value="<?php if(!empty($user)){
										echo $user->getEmail();
									}?>"
									>
								</div>
								<div class="form-group col-md-4">
									<p>Telefonska št.</p>
									<input class="form-control border-radius-0 input" placeholder="Vpišite el. naslov"
									type="tel"
									name="telephone_num"
									value="<?php if(!empty($user)){
										echo $user->getTelephoneNum();
									}?>"
									>
								</div>
								<div class="form-group col-md-4">
									<p>Ulica</p>
									<input class="form-control border-radius-0 input" placeholder="Vpišite naziv ulice"
									type="text"
									name="address"
									value=" "
									>
								</div>
								<div class="form-group col-md-4">
									<p>Hišna št.</p>
									<input class="form-control border-radius-0 input" placeholder="hiš. št."
									type="number"
									name="house_num"
									value=" "
									>
								</div>
								<div class="form-group col-md-4">
									<p>Nadstropje</p>
									<input class="form-control border-radius-0 input" placeholder="št. nad."
									type="number"
									name="floor"
									value=" "
									>
								</div>
								<div class="form-group col-md-4">
									<p>Mesto</p>
									<input class="form-control border-radius-0 input" placeholder="Občina ali mesto"
									type="text"
									name="city"
									value=" "
									>
								</div>
								<div class="form-group col-md-4">
									<p>Pošta</p>
									<input class="form-control border-radius-0 input" placeholder="Poštna številka"
									type="number"
									name="post_num"
									value=" "
									>
								</div>
							</div>

						</div>
						<div class="container col-md-12">

							<div class="container col-md-12 bg-white border-1-ddd margin-t-5p padding-tb-5p showHide-mainContent pointer">
								<h4> Podatki za društvo <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small></h4>
							</div>

							<div id="companyInfo" class="container bg-white col-md-12 border-1-ddd margin-t-5p padding-tb-15p">
								<div class="form-group col-md-4">
									<p>Datum pridružitve</p>
									<input class="form-control border-radius-0 input" placeholder=""
									type="text"
									id="date_selector"
									name="date_joined"
									value="<?php if(!empty($user)){
										echo $user->getDateJoined();
									}?>">
								</div>
								<div class="form-group col-md-4">
									<p>Vloga v društvu</p>
									<input class="form-control border-radius-0 input" placeholder="Vloga v društvu"
									type="text"
									name="position"
									value="<?php if(!empty($user)){
										echo $user->getPosition();
									}?>"
									>
								</div>
							</div>

						</div>
						<div class="container col-md-12">

							<div class="container col-md-12 bg-white border-1-ddd margin-t-5p padding-tb-5p showHide-mainContent pointer">
								<h4> Podatki za aplikacijo <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small></h4>
							</div>

							<div id="appInfo" class="container bg-white col-md-12 border-1-ddd margin-t-5p padding-tb-15p">
								<div class="form-group col-md-4">
									<p>
									Uporabniško ime
									<br>
									<small class="text-muted">Če je prazno, bo avtogenerirano (pr. Janez Novak => JN)</small>
									</p>
									<input class="form-control border-radius-0 input" placeholder=""
									type="text"
									name="username"
									value="<?php if(!empty($user)){
										echo $user->getUsername();
									}?>"
									>
								</div>
								<div class="form-group col-md-4">
									<p>
									Geslo
									<br>
									<small class="text-muted">Naj vsebuje znake, števila in črke</small>
									</p>
									<input class="form-control border-radius-0 input" placeholder=""
									type="password"
									id="password"
									name="password"
									value="<?php if(!empty($user)){
										echo $user->getPassword();
									}?>"
									>
								</div>
								<div class="form-group col-md-4">
									<p>
									Potrditev gesla
									<br>
									<small class="text-muted">Najprej vpišite geslo</small>
									</p>
									<input class="form-control border-radius-0 input" placeholder=""
									type="password"
									id="password_confirm"
									name="password_confirm"
									value="" disabled>
								</div>
								<div class="form-group col-md-12">
									<p>Vloga v aplikacijji</p>
									<select class="form-control border-radius-0 input"
									name="role">

										<option title="Ima popoln nadzor nad aplikacijo in akcij društva" value="1">Nadzornik - vse pravice pri nadzoru, upravljanju in organizaciji</option>

									</select>
								</div>
							</div>

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
												value="<?php if(!empty($user)){
													echo $user->getId();
												}?>"
												name="user_add"
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
												value="<?php if(!empty($user)){
													echo $user->getId();
												}?>"
												name="user_add"
												>
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
				</div>
				<!-- add -->

			</div>
			<!-- main content -->
