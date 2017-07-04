<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <!-- external -->
    <script src="<?php echo base_url() ?>/assets/external/SimpleWeather/jquery.simpleWeather.min.js"></script>
    <script>
        // v3.1.0
        //Docs at http://simpleweatherjs.com
        $(document).ready(function(){
            $.simpleWeather({
                location: 'Maribor, SL',
                woeid: '',
                unit: 'c',
                success: function(weather) {
                    $("#weather-highLow").html(weather.high+'/'+weather.low);
                    $("#weather-temp").html('<i class="icon-'+weather.code+'"></i>'+weather.temp+'&deg;'+weather.units.temp);
                    $("#weather-city").html(weather.city);
                },
                error: function(error) {
                    $("#weatherWidget").hide();
                }
            });

        });
    </script>
