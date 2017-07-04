<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- js for maps -->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsxY-sgAPbwfkNKSgLUL99YhyHHK29i0Q&callback=initMap">
</script>
<script>
    function initMap() {
        var myOptions = {
            center: new google.maps.LatLng(54, -2),
            zoom: 6,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("map"), myOptions);

        var addressArray = new Array();

        <?php foreach($location_data as $location){ ?>
        addressArray.push("<?php echo $location ?>");
        <?php }?>

        var geocoder = new google.maps.Geocoder();

        var markerBounds = new google.maps.LatLngBounds();

        for (var i = 0; i < addressArray.length; i++) {
            geocoder.geocode( { 'address': addressArray[i]}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        url: '<?php echo site_url('organization/cproject/projects'); ?>',
                        title: i + " - " + addressArray[i]
                    });
                    markerBounds.extend(results[0].geometry.location);
                    map.fitBounds(markerBounds);


                    google.maps.event.addListener(marker, 'click', function() {
                        window.location.href = this.url;
                    });
                } else {
                   $(".googleMaps-warning").show(500);
                }
            });
        }

    }
</script>
<!-- js for maps -->