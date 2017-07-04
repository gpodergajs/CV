<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

			<!-- main content -->
			<div id="main-content" class="container col-md-10">
					
					<div class="row bg-white border-b-1-ddd padding-tb-15p">
						<div class="container col-md-12">
							<h3 class="font-light">
							Pozdravljen <?php echo $user_name ?>, <small class="font-light"><?php echo $inspiration ?></small>
							</h3>
						</div>				
					</div>
					
					<div class="row bg-white padding-tb-15p">
						
						<!-- feed -->
						<div class="container col-md-6 margin-t-20p">
							<div class="container col-md-12">
								<div class="row col-md-12">
									<h4>
										<i class="fa fa-comments-o" aria-hidden="true"></i> Nedavni pogovori
										<br>
										<small>pogovori današnjega dne</small>
									</h4>								
								</div>
													
								<!-- message -->
								<div class="row col-md-12  padding-tb-5p">
									<form>
										<input 
											type="hidden"
											name="idmessage"
											value="">
										<h5>
											<span style="float: left">
												@Gašper, <small>pred 29min</small>
											</span>								
											<span style="float: right">
												<button class="btn btn-xs btn-info border-0"
													type="submit"
													name="message"
													value="">
													<i class="fa fa-reply" aria-hidden="true"></i>
												</button>											
											</span>
										</h5>	
									</form>						
								</div>
								<div class="row col-md-12 border-b-1-ddd padding-b-5p">
									<p class="font-light">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
									sed do eiusmod tempor incididunt ut labore...
									</p>
								</div>
								<!-- message -->		
								
								<!-- message -->
								<div class="row col-md-12  padding-tb-5p">
									<form>
										<input 
											type="hidden"
											name="idmessage"
											value="">
										<h5>
											<span style="float: left">
												@Matic, <small>pred 29min</small>
											</span>								
											<span style="float: right">
												<button class="btn btn-xs btn-info border-0"
													type="submit"
													name="message"
													value="">
													<i class="fa fa-reply" aria-hidden="true"></i>
												</button>											
											</span>
										</h5>	
									</form>						
								</div>
								<div class="row col-md-12 border-b-1-ddd padding-b-5p">
									<p class="font-light">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
									sed do eiusmod tempor incididunt ut labore...
									</p>
								</div>
								<!-- message -->													
												
							</div>
						</div>
						<!-- feed -->	
						
						<!-- activity -->
						<div class="container col-md-6 margin-t-20p">
							<div class="container col-md-12">
								<div class="row col-md-12">
									<h4>
										<i class="fa fa-history" aria-hidden="true"></i> Zadnje spremembe
										<br>
										<small>aktivnosti in notifikacije vseh uporabnikov</small>
									</h4>								
								</div>
								
								<!-- notification -->
								<div class="row col-md-12  border-l-5 border-danger margin-t-5p">															
									<h5 class="font-light" style="float:left">								
									 2 projekta sta v zamudi
									</h5>
									<form>
										<h5 style="float:right">
											<input 
											type="hidden"
											name="idnotification"
											value="" />
											<button class="btn btn-xs btn-primary border-0"
												type="submit"
												name="notification"
												value="">
												<i class="fa fa-eye" aria-hidden="true"></i>
											</button>											
										</h5>
									</form>																			
								</div>
								<!-- notification -->
								<!-- notification -->
								<div class="row col-md-12 border-l-5 border-info margin-t-5p">															
									<h5 class="font-light" style="float:left">
									@Tim je zaključil projekt MojProjekt
									</h5>
									<form>
										<h5 style="float:right">
											<input 
											type="hidden"
											name="idnotification"
											value="" />
											<button class="btn btn-xs btn-primary border-0"
												type="submit"
												name="notification"
												value="">												
												<i class="fa fa-eye" aria-hidden="true"></i>
											</button>											
										</h5>
									</form>																			
								</div>
								<!-- notification -->												
								<!-- notification -->
								<div class="row col-md-12 border-l-5 border-warning margin-t-5p">															
									<h5 class="font-light" style="float:left">
									Rok za GeoProjekt je še 1 dan
									</h5>
									<form>
										<h5 style="float:right">
											<input 
											type="hidden"
											name="idnotification"
											value="" />
											<button class="btn btn-xs btn-primary border-0"
												type="submit"
												name="notification"
												value="">												
												<i class="fa fa-eye" aria-hidden="true"></i>
											</button>											
										</h5>
									</form>																			
								</div>
								<!-- notification -->	
								
								<div class="row col-md-12 text-right margin-t-5p padding-tb-5px">
									<p>
										<a href="">poglej vse <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
									</p>
								</div>
							</div>
						</div>
						<!-- activity -->											
					
					</div>
					
					<div class="row bg-eee padding-tb-15p">				
					
					</div>
					
				</div>
				<!-- main content -->
