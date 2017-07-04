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

    <!-- all active projects -->
    <div class="row padding-tb-15p">
        <div class="container col-md-12">
            <div class="container col-md-12 bg-white border-t-2-info border-rbl-1-ddd showHide-mainContent pointer">
                <h3>Tekoči projekti <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small></h3>
            </div>
            <!-- table -->
            <div class="container bg-white col-md-12 border-rbl-1-ddd margin-t-5p padding-tb-15p">

                <table class="table table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>Naslov</th>
                        <th>Teža <a href="" class="btn btn-xs btn-link"> <i class="fa fa-sort" aria-hidden="true"></i> </a></th>
                        <th>Rok </th>
                        <th>Trajanje <a href="" class="btn btn-xs btn-link"> <i class="fa fa-sort" aria-hidden="true"></i> </a></th>
                        <th>Cilj</th>
                        <th>Zadnja sprememba </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php  foreach ($active_projects as $project) { ?>

                        <tr>
                            <td><?php echo $project->getTitle();?></td>
                            <td><?php echo $project->getValueNum();?></td>
                            <td><?php echo $project->getDateDeadline();?></td>
                            <td><?php echo "trajanje"?></td>
                            <td>1h</td>
                            <td></td>
                        </tr>

                    <?php }?>

                    </tbody>
                </table>

            </div>
            <!-- table -->
        </div>
    </div>
    <!-- all active projects -->

    <!-- all archived projects -->
    <div class="row padding-tb-15p">
        <div class="container col-md-12">
            <div class="container col-md-12 bg-white border-t-2-dead border-rbl-1-ddd showHide-mainContent pointer">
                <h3>Arhivirani projekti <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small></h3>
            </div>
            <!-- table -->
            <div class="container bg-white col-md-12 border-rbl-1-ddd margin-t-5p padding-tb-15p">

                <table class="table table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>Naslov</th>
                        <th>Teža <a href="" class="btn btn-xs btn-link"> <i class="fa fa-sort" aria-hidden="true"></i> </a></th>
                        <th>Rok </th>
                        <th>Trajanje <a href="" class="btn btn-xs btn-link"> <i class="fa fa-sort" aria-hidden="true"></i> </a></th>
                        <th>Cilj</th>
                        <th>Zadnja sprememba </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php  foreach ($archived_projects as $project) { ?>

                        <tr>
                            <td><?php echo $project->getTitle();?></td>
                            <td><?php echo $project->getValueNum();?></td>
                            <td><?php echo $project->getDateDeadline();?></td>
                            <td><?php echo "trajanje"?></td>
                            <td>1h</td>
                            <td></td>
                        </tr>

                    <?php }?>

                    </tbody>
                </table>

            </div>
            <!-- table -->
        </div>
    </div>
    <!-- all archived projects -->

</div>
<!-- main content -->
