<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- main content -->
<div id="main-content" class="container col-md-10">

    <!-- search engine -->
    <div class="row bg-white border-b-1-ddd padding-tb-15p">
        <div class="container col-md-12 padding-tb-5p">
            <h2 class="font-light">
                <a href="<?php echo site_url('organization/cproject/add') ?>" class="btn btn-md btn-success">
                    <i class="fa fa-gavel" aria-hidden="true"></i> Ustvari projekt
                </a>
                <a href="<?php echo site_url('organization/cproject/table') ?>" class="btn btn-md btn-info-b"> <i class="fa fa-tasks" aria-hidden="true"></i></a>
            </h2>
        </div>
    </div>
    <!-- search engine -->

    <div class="row padding-tb-15p">
        <div class="container col-md-12">
            <h2>
                Pregled projektov
                <small class="font-light">naslednji čez 1 dan</small>
            </h2>
        </div>
    </div>

    <!-- basic info -->
    <div class="row padding-tb-15p">

        <div class="col-md-4">
            <div class="container col-md-12 bg-white padding-tb-5p border-t-2-dead border-rbl-1-ddd  text-center">
                <div class="form-group">
                    <h3 class="font-light">
                        Čakalna vrsta
                    </h3>
                </div>
            </div>

            <div class="container col-md-12"  id="step01" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-height: 100vh">

                <input type="hidden" name="state_num" value="0" readonly />


                <div class="row" draggable="true" ondragstart="drag(event)" id="project1">

                    <?php
                    foreach ($projects as $project) { if ($project->getStateNum() == 0){
                        ?>

                        <div class="form-group col-md-12 bg-white border-1-ddd margin-t-5p showHide-mainContent pointer">

                            <h4>
                                <span class="color-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                <?php echo $project->getTitle(); ?>
                            </h4>
                        </div>

                        <div class="form-group col-md-12 bg-white border-1-ddd padding-t-5p display-none">
                            <p><strong>Teža:</strong> <?php echo $project->getValueNum()."/".$project->getValueNumMax(); ?></p>
                            <p class="progress-light-5" style="height: 10px"></p>
                            <p><strong>Rok:</strong> <?php echo $project->getDateDeadline(); ?></p>
                            <p><strong>Trajanje:</strong> 5 dni</p>
                            <p><strong>Cilj:</strong> moj cilj</p>
                            <p><strong>Zadnja znana sprememba</strong></p>
                            <p class="text-muted">
                                @GD 22. 05. 2017 18:45
                            </p>
                            <form action="detail" method="post">
                                <button class="btn btn-sm btn-info-b" type="submit" name="detail" value="<?php echo $project->getId()?>">Podrobnosti</button>
                            </form>
                            <form>
                                <p class="text-right"></p>
                            </form>
                        </div>
                    <?php }} ?>

                </div>
            </div>
        </div>

        <div class="col-md-4 border-rl-1-ddd">
            <div class="container col-md-12 bg-white padding-tb-5p border-t-2-inProgress border-rbl-1-ddd text-center">
                <div class="form-group">
                    <h3 class="font-light">
                        V poteku
                    </h3>
                </div>
            </div>
            <?php foreach ($projects as $project) {

            ?>
            <div class="container col-md-12"  id="step02" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-height: 100vh">


                <input type="hidden" name="state_num" value="1" readonly>


                <div class="row" draggable="true" ondragstart="drag(event)" id="project2">



                    <?php
                    if ($project->getStateNum() == 1){
                        ?>

                        <div class="form-group col-md-12 bg-white border-1-ddd margin-t-5p showHide-mainContent pointer">
                            <h4>
                                <span class="color-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                <?php echo $project->getTitle(); ?>
                            </h4>
                        </div>

                        <div class="form-group col-md-12 bg-white border-1-ddd padding-t-5p display-none">
                            <p><strong>Teža:</strong> <?php echo $project->getValueNum()."/".$project->getValueNumMax(); ?></p>
                            <p class="progress-light-5" style="height: 10px"></p>
                            <p><strong>Rok:</strong> nedoločen</p>
                            <p><strong>Trajanje:</strong> <?php echo $project->getDateDeadline(); ?></p>
                            <p><strong>Cilj:</strong> moj cilj</p>
                            <p><strong>Zadnja znana sprememba</strong></p>
                            <p class="text-muted">
                                @GD 22. 05. 2017 18:45
                            </p>
                            <form>
                                <p class="text-right">

                                </p>
                            </form>
                        </div>
                    <?php } }?>
                </div>
                <?php  ?>
            </div>
        </div>

        <div class="col-md-4">
            <div class="container col-md-12 padding-tb-5p text-center">
                <h3 class="font-light">Končani</h3>
                <p class="text-muted"><small>Končane projekte je smiselno arhivirati</small></p>
            </div>
            <div class="container col-md-12"  id="step03" ondrop="drop(event)" ondragover="allowDrop(event)" style="min-height: 100vh">

                <input type="hidden" name="state_num" value="3" readonly>

            </div>
        </div>

    </div>
    <!-- basic info -->




</div>
<!-- main content -->
