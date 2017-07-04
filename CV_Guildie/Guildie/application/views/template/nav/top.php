<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		
	<div class="container-fluid wrapper">
		<!-- top wide navigation -->
		<div class="row bg-white">		
				<!-- nav wide -->	
				<div class="container col-md-2 text-center">
					<h4  class="padding-t-8p text-muted">
                        <a href="<?php echo site_url('guildie/index') ?>">@dev 0.0.0. +rev</a>
					</h4>
				</div>
				<div class="container col-md-10 border-l-1-main">
					<div class="row bg-main-03">
						<div class="container col-md-12 nav-wide">
							<ul>
								<li id="sideNav-hideShow" class="li-left border-r-1-silver-01" >
									<a href="#" style="padding-left: 10px;">
										<i class="fa fa-bars" aria-hidden="true"></i>
									</a>								
								</li>		
								<li class="li-left border-r-1-silver-01">
									<a class="a-notificationElement" href="">
										<i class="fa fa-bell" aria-hidden="true"></i> 
										<sup class="notificationNumber">
										0
										</sup>
									</a>
								<li>		
								<li class="li-left li-header border-r-1-silver-01">
									<?php echo $heading?>								
								</li>																						
								<li>
									<a class="name" href="">
										<?php echo $user_name_abr?>	
									</a>
								<li>			
							</ul>
						</div>			
					</div>
				</div>
				<!-- nav wide -->		
		</div>
		<!-- top wide navigation -->
	</div>
		
	