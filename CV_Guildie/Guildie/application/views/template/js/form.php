<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <!-- smart form -->
    <script>
    //$('#btn-submit').hide();
    </script>
    <!-- smart form -->

    <!-- ckeditor -->
	<script src="<?php echo base_url() ?>/assets/external/ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url() ?>/assets/external/ckeditor/samples/js/sample.js"></script>
	<!-- ckeditor -->

	<script>
    initSample();
	</script>

    <script>
    function chooseType(data) {

        $('input[name=type]').val(data.value);

    }
    function chooseHost(data) {

        $('input[name=host_name]').val(data.value);

    }
    function chooseMeasurement(data) {

        $('input[name=measurement_name]').val(data.value);

    }
    </script>
