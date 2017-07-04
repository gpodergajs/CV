<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- main content -->
<div id="main-content" class="container col-md-10">

    <!-- search engine -->
    <div class="row bg-white border-b-1-ddd padding-tb-15p">
        <div class="container col-md-4">
            <h2 class="font-light">
                <form action="add" method="POST">
                    <button class="btn btn-md btn-success" type="submit" name="add"><i class="fa fa-user-plus" aria-hidden="true"></i> Nov uporabnik </button>
                </form>
                <a href="#disabled" class="btn btn-info-b"> <i class="fa fa-telegram" aria-hidden="true"></i> Novo obvestilo </a>
            </h2>
        </div>
        <div class="container col-md-8">
            <form action="detail" method="post">
                <div class="form-group col-md-12" style="margin-top: 10px">
                    <input type="text" class="search-input font-light" placeholder="Išči po podatkih.."
                           id="input_text"
                           name="user_query">
                    <input style="display: none"
                           type="submit"
                           name="user_search">
                </div>
            </form>
        </div>
    </div>
    <!-- search engine -->

    <!-- all active users -->
    <div class="row padding-tb-15p">
        <div class="container col-md-12">
            <div class="container col-md-12 bg-white border-t-2-info border-rbl-1-ddd showHide-mainContent pointer">
                <h3> Omogočeni uporabniki <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small></h3>
            </div>
            <!-- table -->
            <div class="container bg-white col-md-12 border-rbl-1-ddd margin-t-5p padding-tb-15p">

                <table class="table table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>Ime in priimek <a href="" class="btn btn-xs btn-link"> <i class="fa fa-sort" aria-hidden="true"></i> </a></th>
                        <th>El. naslov </th>
                        <th>Vrsta računa <a href="" class="btn btn-xs btn-link"> <i class="fa fa-sort" aria-hidden="true"></i> </a></th>
                        <th>Dosegljivost </th>
                        <th>Akcije </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($users as $user) {

                        if($user->getState() == 1){ // if user is enabled

                            ?>

                            <tr>
                                <td><?php echo $user->getName()." ".$user->getSurname();?></td>
                                <td><?php echo $user->getEmail(); ?></td>
                                <td><?php echo $user->getPosition();  ?></td>
                                <td>1h</td>
                                <td>
                                    <form action="add" method="POST">
                                        <button class="btn btn-sm btn-primary" type="submit" name="edit" value="<?php echo $user->getId()?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button class="btn btn-sm btn-info-b" type="submit" name="detail" value="<?php echo $user->getId()?>"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                                        <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-comments-o" aria-hidden="true"></i></button>
                                        <button class="btn btn-sm btn-danger" type="submit" name="turnOff" value="<?php echo $user->getId()?>"><i class="fa fa-power-off" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>

                        <?php }}?>

                    </tbody>
                </table>

            </div>
            <!-- table -->
        </div>
    </div>
    <!-- all active users -->

    <!-- all active users -->
    <div class="row padding-tb-15p">
        <div class="container col-md-12">
            <div class="container col-md-12 bg-white border-t-2-dead border-rbl-1-ddd showHide-mainContent pointer">
                <h3> Onemogočeni uporabniki <small><i class="fa fa-eye-slash" aria-hidden="true"></i> prikaži/skrij</small></h3>
            </div>
            <!-- table -->
            <div class="container bg-white col-md-12 border-rbl-1-ddd margin-t-5p padding-tb-15p">

                <table class="table table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>Ime in priimek <a href="" class="btn btn-xs btn-link"> <i class="fa fa-sort" aria-hidden="true"></i> </a></th>
                        <th>El. naslov </th>
                        <th>Datum reg. </th>
                        <th>Akcije </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($users as $user) {

                        if($user->getState() == 0){ // if user is disabled

                            ?>
                            <tr>
                                <td><?php echo $user->getName()." ".$user->getSurname();  ?></td>
                                <td><?php echo $user->getEmail(); ?></td>
                                <td><?php echo $user->getDateJoined();  ?></td>
                                <td><?php echo $user->getName();  ?></td>
                                <td>
                                    <form action="add" method="POST">
                                        <button class="btn btn-sm btn-success" type="submit" name="turnOn" value="<?php echo $user->getId();?>"><i class="fa fa-plug" aria-hidden="true"></i></button>
                                        <button class="btn btn-sm btn-primary" type="submit" name="edit" value="<?php echo $user->getId()?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button class="btn btn-sm btn-info-b" type="submit" name="detail" value="<?php echo $user->getId()?>"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php }}?>
                    </tbody>
                </table>
            </div>
            <!-- table -->
        </div>
    </div>
    <!-- all active users -->

</div>
<!-- main content -->
