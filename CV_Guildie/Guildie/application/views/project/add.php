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
                <a href="<?php echo site_url('organization/cproject/projects') ?>"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> </a>
                \ <a href="#createProject">Ustvari projekt</a>
                \ <a href="#addTask">Dodaj različne naloge</a>
            </h4>
        </div>
        <!-- breadcrumb -->
    </div>
    <!-- search engine -->

    <!-- title -->
    <div class="row bg-eee padding-tb-15p">
        <div class="container col-md-12">
            <h2>Ustvari nov projekt</h2>
        </div>
    </div>
    <!-- title -->

    <!-- form -->
    <form action="add" method="post">

        <!-- basic info -->
        <div class="row padding-tb-15p">

            <!-- create new project -->
            <div class="container col-md-12">
                <div class="container col-md-12 bg-white border-1-ddd padding-tb-5p showHide-mainContent pointer">
                    <h4> Ustvarite projekt <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small></h4>
                </div>

                <div id="createMilestone" class="container bg-white col-md-12 border-1-ddd margin-t-5p padding-tb-15p">
                    <div class="container col-md-6">
                        <div class="form-group col-md-12 margin-t-5p">
                            <p>Naziv</p>
                            <input class="form-control border-radius-0 input" placeholder="Naziv cilja"
                                   type="text"
                                   name="title"
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
                            <h4>
                                Vrednost projekta
                                <br>
                                <small class="font-light">
                                    Z določilom vrednosti projekta, lahko spremljate Vaš napredek, v primeru da
                                    ta ni nastavljen je napredek odvisen od št. končanih nalog ali njihovih vrednosti.
                                </small>
                            </h4>
                        </div>
                        <div class="form-group col-md-6">
                            <p>Vrednost projekta</p>
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
                                    name="">

                                <option title="Nedoločena" class="text-muted" value="0" disabled selected>nedoločena</option>
                                <option title="Nedoločena" class="text-muted" value="Delovnih ur">Delovnih ur</option>
                                <?php foreach($data_measurement as $measurement_name){ ?>

                                    <option title="<?php echo $measurement_name ?>" class="text-muted" value="<?php echo $measurement_name ?>"><?php echo $measurement_name ?></option>

                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <p>Uporabi novo enoto?</p>
                            <input  class="form-control border-radius-0 input"
                                    type="text"
                                    name="measurement_name"
                                    value="">
                        </div>
                    </div>
                    <div class="container col-md-6">
                        <div class="form-group col-md-12">
                            <p>Rok</p>
                            <input class="form-control border-radius-0 input"
                                   id="date_selector_hidden"
                                   type="text"
                                   name="date_deadline"
                                   value="">
                        </div>
                        <div id="date_selector_embed" class="col-md-12"></div>
                    </div>
                    <div class="container col-md-12 margin-t-5p">
                        <div class="form-group col-md-12 padding-tb-5p">
                            <p>Opis cilja</p>
                        </div>
                        <div class="adjoined-bottom col-md-12">
                            <div class="grid-container" >
                                <div class="grid-width-100">
                                                <textarea class="form-control" oninvalid="this.setCustomValidity('Obvezno polje!')" oninput="setCustomValidity('')"
                                                          id="editor"
                                                          name="description"
                                                          required>

                                                </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- create new project -->

        </div>
        <!-- basic info -->

        <!-- basic info -->
        <div class="row padding-tb-15p">

            <!-- create new project -->
            <div class="container col-md-12">
                <div class="container col-md-12 bg-white border-1-ddd padding-tb-5p showHide-mainContent pointer">
                    <h4>
                        <span>Dodajte različne naloge za dosego projekta <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small></span>
                    </h4>
                    <p class="font-light col-md-12">
                        Velik projekt? Razdelite projekt na več manjših nalog in bolje spremljajte Vaš napredek..
                    </p>
                </div>

                <div id="addTask" class="container col-md-12">

                    <div id="alert-noTask" class="container col-md-12 margin-t-5p padding-tb-15p display-none">
                        <h4 class="text-muted">
                            Brez dodanih nalog.. <span class="font-light">dodajte novo nalogo s klikom <a class="pointer" onclick="newTask()">tukaj</a></span>
                        </h4>
                    </div>

                    <div class="container col-md-12 bg-white border-1-ddd margin-t-5p padding-tb-15p">
                        <div class="container col-md-12">
                            <h4>
                                <span style="float: left">
                                    Naloga - <small class="font-light">najprej vpišite spodnje podatke*</small>
                                </span>
                                <span style="float: right">
                                    <button class="btn btn-info btn-xs font-light" style="font-size: 18px"
                                            id="btn-cloneTask"
                                            type="button">
                                            <i class="fa fa-clone" aria-hidden="true"></i>

                                    </button>
                                    <button class="btn btn-danger btn-xs font-light" style="font-size: 18px"
                                            id="btn-removeTask"
                                            type="button">
                                            <i class="fa fa-trash" aria-hidden="true"></i>

                                    </button>
                                </span>
                            </h4>
                        </div>
                        <div class="container col-md-3">
                            <div class="form-group col-md-12 margin-t-5p">
                                <p>Naziv</p>
                                <input class="form-control border-radius-0 input" placeholder="Naziv naloge"
                                       type="text"
                                       name="task_title[]"
                                       value="">
                            </div>
                        </div>
                        <div class="container col-md-3">
                            <div class="form-group col-md-12 margin-t-5p">
                                <p>Vrednost naoge</p>
                                <input  class="form-control border-radius-0 input"
                                        id="value_num_max"
                                        min="0" max="1000000"
                                        type="number"
                                        name="task_value_num_max[]"
                                        value="">
                            </div>
                        </div>
                        <div class="container col-md-3">
                            <div class="form-group col-md-12 margin-t-5p">
                                <p>Rok</p>
                                <input class="form-control border-radius-0 input" placeholder=""
                                       type="text"
                                       id="date_selector"
                                       name="task_date_deadline[]"
                                       value="">
                            </div>
                        </div>
                        <div class="container col-md-3 margin-t-5p">
                            <div class="form-group col-md-12">
                                <p>Prioriteta</p>
                                <select class="form-control border-radius-0 input"
                                        name="task_priority[]">

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
                        </div>

                    </div>


                </div>

            </div>
            <!-- create new project -->

        </div>
        <!-- basic info -->

        <!-- form submit button -->
        <div class="form-actionBar-fixed-bottom">
            <div class="container-fluid wrapper">
                <div class="row text-right padding-tb-5p visible-lg visible-md">
                    <div class="container col-md-12">
                        <h3>
                            <button class="btn btn-info btn-md font-light" style="font-size: 18px"
                                    id="btn-addTask"
                                    onclick="newTask()"
                                    type="button">
                                Dodaj novo nalogo

                            </button>
                            <button class="btn btn-success btn-md font-light" style="font-size: 18px"
                                    id="btn-submit"
                                    type="submit"
                                    value=""
                                    name="project_add">
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
                                    name="project_add">

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
