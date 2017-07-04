<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

			<!-- main content -->
			<div id="main-content" class="container col-md-10">
				
				<!-- search engine -->
				<div class="row bg-white border-b-1-ddd padding-tb-15p">
                    <!-- breadcrumb -->
                    <div class="container col-md-12">
                        <h4 class="font-light">
                            <a href="<?php echo site_url('organization/milestone_controller/milestones') ?>"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> </a>
                            \ <a href="<?php echo site_url('organization/milestone_controller/add') ?>">Ustvari cilj</a>
                        </h4>
                    </div>
                    <!-- breadcrumb -->
                </div>
				<!-- search engine -->
				
				<div class="row padding-tb-15p">
					<div class="container col-md-12">
						<h2>
						Povežite projekte z želenim ciljem
						</h2>
					</div>
				</div>

				<!-- table projects -->
				<div class="row padding-tb-15p">
					<div class="container col-md-12">
						<div class="container col-md-12 bg-white border-t-5-info border-rbl-1-ddd showHide-mainContent pointer">
							<h3> Projekti <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small></h3>
						</div>
						<!-- table -->
						<div class="container bg-white col-md-12 border-rbl-1-ddd margin-t-5p padding-tb-15p">
						
							<div class="table-responsive">
							  <table class="table table-hover">
							    <thead>
							      <tr>
							        <th>Naziv <a href="" class="btn btn-xs btn-link"> <i class="fa fa-sort" aria-hidden="true"></i> </a></th>
							        <th>Trajanje/preostane</th>
							        <th>Rok</th>
							        <th>Izbira cilja</th>
							      </tr>
							    </thead>
							    <tbody>
							      <tr>
							        <td>Projekt 1</td>
							        <td>5 dni/89 dni</td>
							        <td>22. 09. 2017</td>
							        <td>
							        	<form>
							        		<input 
							        		type="hidden" 
							        		name="idproject"
							        		value="">
							        		<div class="form-group col-md-10">
												<select class="form-control border-radius-0 input"
												name="idmilestone">
													<option disabled selected>Izberi cilj</option>
													<option value="1">Cilj 1</option>
													<option value="1">Cilj 2</option>
												</select>				
											</div>	
											<div class="form-group col-md-2">			        		
								        		<button class="btn btn-sm btn-primary" style="margin-top: 4px"
								        		type="submit">
								        		
								        		<i class="fa fa-plug" aria-hidden="true"></i>
								        		</button>
							        		</div>
							        	</form>  
							        </td>
							      </tr>
							  	</tbody>
							  </table>							
							</div>	
												
						</div>
						<!-- table -->
					</div>
				</div>
				<!-- table projects -->				
				
				
					
					
			</div>
			<!-- main content -->
