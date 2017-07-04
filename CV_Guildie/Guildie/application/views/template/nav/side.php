<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			
			<!-- nav side | md & lg -->
			<div id="sideNav-holder" class="container col-md-2 hidden-sm hidden-xs">
				<div class="row bg-main-04 text-left padding-b-12" style="height: 200vh;min-height: 100vh">
					<!-- nav side tiles -->
					<div class="row nav-side">
						<ul id="sideNav-content" class="col-md-12">			
							<!-- družabno -->
							<li class="li-header margin-l-10p">
								DRUŽABNO
							</li>
							<li class="nav-side-li message-dropdown col-md-12">
								<a class="row disabled" href="#">
									<span class="f-l margin-l-7p">
										<i class="fa fa-envelope" aria-hidden="true"></i> 
									</span>
									<span class="f-l margin-l-10p">
										Poštni predal
									</span>
									<span class="f-r margin-r-7p">
										<span class="notificationNumber">2</span>
									</span>
								</a>
								<!-- last message -->
								<div class="message-dropdown-content">
								    <p class="font-light border-b-1-ddd">@TM danes 12:35</p>
								    <p>Ja sem videl ja.. pa še nekaj ti imam za povedati, ko boš t...</p>
								 </div>
								 <!-- last message -->
							</li>
							<li class="nav-side-li col-md-12">
								<a class="row" href="<?php echo site_url('messaging/announcement/add') ?>">
									<span class="f-l margin-l-7p">
										<i class="fa fa-paper-plane-o" aria-hidden="true"></i>
									</span>
									<span class="f-l margin-l-10p">
										Novo obvestilo
									</span>
								</a>
							</li>								
							<li class="nav-side-li col-md-12">
								<a class="row" href="<?php echo site_url('organization/cproject/projects') ?>">
									<span class="f-l margin-l-7p">
										<i class="fa fa-hashtag" aria-hidden="true"></i>
									</span>
									<span class="f-l margin-l-10p">
										Aktivnosti
									</span>
								</a>
							</li>							
							<!-- družabno -->
							<!-- aktiva -->													
							<li class="li-header margin-l-10p">
								AKTIVA
							</li>
							<li class="nav-side-li col-md-12">
								<a class="row active" href="<?php echo site_url('organization/cproject/projects') ?>">
									<span class="f-l margin-l-7p">
										<i class="fa fa-tags" aria-hidden="true"></i>
									</span>
									<span class="f-l margin-l-10p">
										Projekti
									</span>
									<span class="f-r margin-r-7p">
										<span class="notificationNumber">0</span>
									</span>
								</a>
							</li>
							<li class="nav-side-li col-md-12">
								<a class="row" href="<?php echo site_url('organization/event_controller/events') ?>">
									<span class="f-l margin-l-7p">
										<i class="fa fa-calendar" aria-hidden="true"></i>
									</span>
									<span class="f-l margin-l-10p">
										Dogodki
									</span>
									<span class="f-r margin-r-7p">
										<span class="notificationNumber-active">16</span>
									</span>
								</a>
							</li>		
							<li class="nav-side-li col-md-12">
								<a class="row a-progress progress-invert-75" href="<?php echo site_url('organization/milestone_controller/milestones') ?>">
									<span class="f-l margin-l-7p">
										<i class="fa fa-line-chart" aria-hidden="true"></i>
									</span>
									<span class="f-l margin-l-10p">
										Cilji
									</span>
									<span class="f-r margin-r-7p">
										<span class="notificationNumber">25%</span>
									</span>
								</a>
							</li>								
							<!-- aktiva -->		
							<!-- nadzor -->
							<li class="li-header margin-l-10p">
								NADZOR
							</li>
							<li class="nav-side-li col-md-12">
								<a class="row" href="../index.html">
									<span class="f-l margin-l-7p">
										<i class="fa fa-database" aria-hidden="true"></i>
									</span>
									<span class="f-l margin-l-10p">
										Društvo
									</span>
								</a>
							</li>	
							<li class="nav-side-li col-md-12">
								<a class="row" href="<?php echo site_url('managment/User_controller/users') ?>">
									<span class="f-l margin-l-7p">
										<i class="fa fa-address-book-o" aria-hidden="true"></i>
									</span>
									<span class="f-l margin-l-10p">
										Člani
									</span>
								</a>								
							</li>		
							<li class="nav-side-li col-md-12">
								<a class="row disabled" href="#">
									<span class="f-l margin-l-7p">
										<i class="fa fa-folder" aria-hidden="true"></i>
									</span>
									<span class="f-l margin-l-10p">
										Datoteke
									</span>
									<span class="f-r margin-r-7p">
										<span class="notificationNumber">0,0<small>GB</small></span>
									</span>									
								</a>								
							</li>													
							<!-- nadzor -->			
							<!-- aplikacija -->
							<li class="li-header margin-l-10p">
								APLIKACIJA
							</li>
							<li class="nav-side-li col-md-12">
								<a class="row" href="../index.html">
									<span class="f-l margin-l-7p">
										<i class="fa fa-cogs" aria-hidden="true"></i>
									</span>
									<span class="f-l margin-l-10p">
										Nastavitve
									</span>
								</a>
							</li>	
							<li class="nav-side-li col-md-12">								
								<a class="row disabled" href="#">
									<span class="f-l margin-l-7p">
										<i class="fa fa-cube" aria-hidden="true"></i>
									</span>
									<span class="f-l margin-l-10p">
										Kube
									</span>
								</a>								
							</li>							
							<!-- aplikacija -->									
						</ul>					
					</div>
					<!-- nav side tiles -->
				</div>
			</div>
			<!-- nav side | md & lg -->