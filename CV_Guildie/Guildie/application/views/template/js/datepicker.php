<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?php echo base_url() ?>/assets/external/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>/assets/external/datepicker/locales/bootstrap-datepicker.sl.min.js"></script>
<script>
    $('#date_selector').datepicker({
        language: "sl",
        format: 'yyyy-mm-dd'
    });
</script>
<script>
    $('#date_selector_embed').datepicker({
        language: "sl",
        format: 'yyyy-mm-dd'
    });
    $('#date_selector_embed').on('changeDate', function() {
        $('#date_selector_hidden').val(
            $('#date_selector_embed').datepicker('getFormattedDate')
        );
    });
</script>

<script type="text/javascript" src="<?php echo base_url() ?>/assets/external/clockpicker-gh-pages/dist/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker();
</script>