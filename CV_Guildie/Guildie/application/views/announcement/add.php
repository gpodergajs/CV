<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

			<!-- main content -->
			<div id="main-content" class="container bg-white col-md-10">
				
				<!-- search engine -->
				<div class="row bg-white border-b-1-ddd padding-tb-15p">
                    <!-- breadcrumb -->
                    <div class="container col-md-12">
                        <h4 class="font-light">
                            <a href="<?php echo site_url('organization/inbox_controller/overview') ?>"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> </a>
                            \ <a href="#createAnnouncement">Ustvari obvestilo</a>
                        </h4>
                    </div>
                    <!-- breadcrumb -->
				</div>
				<!-- search engine -->
				
				<!-- title -->
				<div class="row bg-eee padding-tb-15p">
					<div class="container col-md-12">
						<h2>Ustvari novo obvestilo</h2>
					</div>
				</div>
				<!-- title -->

                <!-- form -->
                <form>

                    <!-- basic info -->
                    <div class="row bg-eee padding-tb-15p">

                        <!-- create new milestone -->
                        <div class="container col-md-12">
                            <div class="container col-md-12 bg-white border-1-ddd padding-tb-5p showHide-mainContent pointer">
                                <h4> Pošlji obvestilo <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small></h4>
                            </div>

                            <div id="createAnnouncement" class="container bg-white col-md-12 border-1-ddd margin-t-5p padding-tb-15p">
                                <!-- basic info -->
                                <div class="container col-md-6">
                                    <div class="form-group col-md-12 margin-t-5p">
                                        <p>
                                            Zadeva
                                            <br>
                                            <small class="text-muted">*Je prvi vpogled v obvestilo, zato naj bo smiseln</small>
                                        </p>
                                        <input class="form-control border-radius-0 input" placeholder="Vpišite zadevo ali temo obvestila"
                                               type="text"
                                               name="subject"
                                               value="">
                                    </div>
                                </div>
                                <div class="container col-md-6">
                                    <div class="form-group col-md-6">
                                        <p>
                                            Določite prioriteto obvestila
                                            <br>
                                            <small class="text-muted">*Visoka prioriteta naj uporablja el. sporočila</small>
                                        </p>
                                        <select class="form-control border-radius-0 input"
                                                name="priority">
                                            <option title="Obvestilo" class="text-muted" value="1">Obvestilo</option>
                                            <option title="Pomembno" value="2">Pomembno</option>
                                            <option title="Visoka" class="color-danger" value="3">Visoko</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <p>
                                            Izberite način
                                            <br>
                                            <small class="text-muted">Določite kako bo sporočilo poslano..</small>
                                        </p>
                                        <select class="form-control border-radius-0 input"
                                                name="option">
                                            <option title="Obvestilo bo prikazano v nabiralniku" value="0">Interno</option>
                                            <option title="Obvestilo bo poslano po elektornski pošti" value="1">Elektronsko obvestilo</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- basic info -->

                                <div class="container col-md-12 margin-t-5p">
                                    <div class="form-group col-md-12 padding-tb-5p">
                                        <p>Napišite telo obvestila</p>
                                    </div>
                                    <div class="adjoined-bottom col-md-12">
                                        <div class="grid-container" >
                                            <div class="grid-width-100">
            							<textarea class="form-control" oninvalid="this.setCustomValidity('Obvezno polje!')" oninput="setCustomValidity('')"
                                                  id="editor"
                                                  name="message"
                                                  required>

            							</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- form -->
                            </div>
                        </div>
                        <!-- create new milestone -->

                    </div>
                    <!-- basic info -->

                        <!-- form submit button -->
                        <div class="form-actionBar-fixed-bottom">
                            <div class="container-fluid wrapper">
                                <div class="row text-right padding-tb-5p visible-lg visible-md">
                                    <div class="container col-md-12">
                                        <h3>
                                            <button class="btn btn-success btn-md font-light" style="font-size: 18px"
                                                    id="btn-submit"
                                                    type="submit"
                                                    value=""
                                                    name="announcement_add">
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
                                                    value=""
                                                    name="announcement_add">

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
			<!-- main content -->
