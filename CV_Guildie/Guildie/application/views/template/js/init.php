<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url() ?>/assets/js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url() ?>/assets/js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!-- nav side script -->
<script>
    var sideNav_anim = false;

    $('#sideNav-hideShow').on('click',function(){
        if (sideNav_anim) {
            return;
        }

        sideNav_anim = true;

        $('#sideNav-holder').toggle(0, function(){
            $('#sideNav-content').toggle(400);
            $('#main-content').toggleClass('col-md-10 col-md-12');
            sideNav_anim = false;
        });

    });
    /*
     * @noAnimation
     $('#sideNav-hideShow').on('click',function(){
     if (sideNav_anim) {
     return;
     }

     sideNav_anim = true;

     $('#sideNav-holder').toggle(0, function(){
     $('#sideNav-content').toggle();
     $('#main-content').toggleClass('col-md-10 col-md-12');
     sideNav_anim = false;
     });
     });
     */
</script>
<!-- nav side script -->

<!-- element muted -->
<script>
    var elementMuted_anim = false;

    $('.message-stack-muted').hover(function(){
        if (elementMuted_anim) {
            return;
        }

        elementMuted_anim = true;
        $(this).next().toggleClass('message-stack-muted message-stack-muted-b');
        $(this).toggleClass('message-stack-muted margin-tb-5p');
        $(this).children('h4').toggleClass('text-muted');
        $(this).children('p').toggleClass('text-muted');
        elementMuted_anim = false;

    });
</script>
<!-- element muted -->

<script>
    var mainContent_anim = false;

    $('.showHide-mainContent').click(function(){
        if (mainContent_anim) {
            return;
        }

        mainContent_anim = true;
        $(this).next().slideToggle(400);
        mainContent_anim = false;

    });
    /*
     * @noAnimation
     $('.showHide-mainContent').click(function(){
     if (mainContent_anim) {
     return;
     }

     mainContent_anim = true;
     $(this).next().slideToggle();
     mainContent_anim = false;

     });
     */
</script>