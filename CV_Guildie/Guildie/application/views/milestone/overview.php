<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

			<!-- main content -->
			<div id="main-content" class="container col-md-10">
				
				<!-- search engine -->
				<div class="row bg-white border-b-1-ddd padding-tb-15p">
					<div class="container col-md-4 padding-tb-5p form-dropdown">
						<h2 class="font-light">
							<a href="<?php echo site_url('organization/milestone_controller/add') ?>" class="btn btn-md btn-success"> 
								<i class="fa fa-gavel" aria-hidden="true"></i> Ustvari nov cilj 									
							</a>												
							<a href="<?php echo site_url('organization/milestone_controller/link') ?>" class="btn btn-md btn-info-b"> <i class="fa fa-plug" aria-hidden="true"></i> Poveži z ciljem </a>
						</h2>
						<!-- quick form -->
						<div class="form-dropdown-content bg-white border-1-ddd">
							<form>
								<div class="form-group padding-tb-5p margin-b-5p">
									<h3>
										<span style="float:left">Ustvari nov cilj</span>
										<span title="Odpri celozaslonsko" style="float:right">
											<a href="<?php echo site_url('organization/milestone/add') ?>" class="btn btn-sm btn-info"> 
												<i class="fa fa-window-maximize" aria-hidden="true"></i>						
											</a>	
										</span>
									</h3>
								</div>
								<div class="form-group col-md-12 margin-t-5p">
									<hr>
									<p>Naziv</p>
									<input class="form-control border-radius-0 input-b" placeholder="Naziv cilja"
										type="text"
										name="title"
										value="">
								</div>	
								<div class="form-group col-md-12">
									<p>Rok</p>
									<div id="date_selector_embed" class="col-md-12"></div>
									<input type="hidden"
										id="date_selector_hidden"
										type="text"
										name="date_deadline"
										value="">
								</div>		
								<div class="form-group col-md-12">
									<p>Določite prioriteto</p>
									<select class="form-control border-radius-0 input"
									name="priority">
									
										<option title="Nizka" class="text-muted" value="1">1</option>
										<option title="Nizka"class="text-muted" value="2">2</option>
										<option title="Nizka" class="text-muted" value="3">3</option>
										<option title="Srednja" value="4">4</option>
										<option title="Srednja" value="5">5</option>
										<option title="Srednja" value="6">6</option>
										<option title="Srednja" value="7">7</option>
										<option title="Visoka" class="color-danger" value="8">8</option>
										<option title="Visoka" class="color-danger" value="9">9</option>
										
									</select>		
								</div>
                                <div class="form-group col-md-12">
                                    <h3 class="font-light">
                                        Vrednost cilja
                                        <br>
                                        <small>
                                            Z določilom vrednosti cilja, lahko spremljate Vaš napredek, v primeru da
                                            ta ni nastavljen je napredek odvisen od št. končanih projektov ali njihovih vrednosti.
                                        </small>
                                    </h3>
                                </div>
                                <div class="form-group col-md-6">
                                    <p>Vrednost mejnika</p>
                                    <input  class="form-control border-radius-0 input-b"
                                           id="value_num_max"
                                           min="0" max="1000000"
                                            type="number"
                                           name="value_num_max"
                                           value="">
                                </div>
                                <div class="form-group col-md-6">
                                    <p>Izberite enoto</p>
                                    <select class="form-control border-radius-0 input"
                                            onchange="chooseMeasurement(this)"
                                            name="fkmilestone_value_measurement_id">

                                        <option title="Nedoločena" class="text-muted" value="0" disabled selected>nedoločena</option>
                                        <option title="Nedoločena" class="text-muted" value="Delovnih ur">Delovnih ur</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <p>Uporabi novo enoto ali jo izberi</p>
                                    <input  class="form-control border-radius-0 input-b"
                                            type="text"
                                            name="measurement_name"
                                            value="">
                                </div>
								<div class="form-group col-md-12">
									<p>Opis <small class="text-muted">po želji*</small></p>
									<textarea class="form-control" rows="5" 
									id="description"
									name="description">
									
									</textarea>
								</div>														
								<div class="form-group col-md-12">
									<button class="btn btn-md btn-success" style="width: 100%"
									type="submit"
									name="milostone_add">
									Potrdi in dodaj
									</button> 
								</div>																				
							</form>
						</div>
						<!-- quick form -->							
					</div>													
					<div class="container col-md-8">							
						<h4>
							Zakaj cilji? <small class="font-light">višja produktivnost Vašega poslanstva..</small>
						</h4>
						<p class="font-light text-muted">
							Cilji Vam omogočajo enostavnejši <strong>nadzor</strong> nad množico <strong>projektov/dogodkov</strong>, ki so lahko med seboj povezani v <strong>skupen cilj</strong>. 
							Lažji nadzor, organizacija in pregled sodelovanja.
						</p>
					</div>		
				</div>
				<!-- search engine -->
				
				<div class="row padding-tb-15p">
					<div class="container col-md-12">
						<h2>
						Pregled ciljev
						<small class="font-light">naslednji cilj čez 3 dni</small>
						</h2>
					</div>
				</div>
				
				
				<!-- basic info -->		
				<div class="row bg-white padding-tb-15p">
				
					<div class="container col-md-4">

						<div class="c100 p85 big" style="margin:0 auto;margin-top: 5px"> 
 							<span style="color: #333;font-weight: 200">25%</span> 
							<div class="slice"> 
								<div class="bar"></div> 
								<div class="fill"></div> 
							</div> 	
						</div> 
									
					</div>
					<div class="container col-md-8 padding-tb-15p">
						<div class="col-md-4 padding-tb-15p">
							<h2>Zanimivo </h2>
							<h5 class="font-light">
							Cilji so snovani na intervalu
							</h5>
							<!-- date form and to -->
							<p class="border-b-1-ddd">
								<strong>22.05.2017</strong> - <strong>18.09.2017</strong>
							</p>
							<!-- date form and to -->
							<h5 class="font-light">
							Naslednji cilj
							</h5>
							<!-- first milestone reached -->
							<p class="border-b-1-ddd">
								<a href="">moj cilj <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
							</p>
							<!-- first milestone reached -->
						</div>
						<div class="col-md-4 padding-tb-15p">
							<div class="container col-md-12 text-center" style="margin-top: 20px">
								<h3 class="number-inProgress font-light font-size-78">2</h3>
								<h3 class="font-light letter-spacing-1">
									<small>V TEKU</small>
								</h3>
							</div>						
						</div>
						<div class="col-md-4 padding-tb-15p">
							<div class="container col-md-12 text-center" style="margin-top: 20px">
								<h3 class="number-complete font-light font-size-78">5</h3>
								<h3 class="font-light letter-spacing-1">
									<small>DOSEŽENIH</small>
								</h3>
							</div>						
						</div>						
					</div>					
				
				
				</div>
				<!-- basic info -->	
				
				
					
					
			</div>
			<!-- main content -->
