<?php

/**
 * The main footer-template
 *
 * @package Nattours
 */

?>
<footer>
    <div class="container">
        <div class="row">
            <div class="footer-menu-column">
                <ul class="footer-links-menu">
	                <?php nattours_footer_menu() ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<!-- <script src="http://code.responsivevoice.org/responsivevoice.js"></script> -->
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css'
      rel='stylesheet'/>
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.62.0/dist/L.Control.Locate.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.62.0/dist/L.Control.Locate.min.css">
</body>
</html>

