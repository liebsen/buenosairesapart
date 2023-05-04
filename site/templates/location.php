<?php snippet('header') ?>
  <div id="wrapper" class="divided">
    <section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
      <div class="content">
        <h2><?= $page->title() ?></h2>
        <p><?= $page->text()->kirbytext() ?></p>
        <ul class="actions stacked">
          <li><a href="/contacto" class="button">Contacto</a></li>
        </ul>
      </div>
      <div class="image">
        <div id="map"></div>
      </div>
    </section>
  </div>
  <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet">
  <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
  <script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoib3ZlcmxlbW9uIiwiYSI6ImNraHVtN2lxOTB1dGUycm1hbHFvM215NzkifQ.mq69zruKTDCKvFuxi2dBjw';
    const map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/<?= $page->style() ?>',
      center: [<?= $page->lat() ?>, <?= $page->lng() ?>],
      zoom: <?= $page->zoom() ?>
    });
     
    // Create a default Marker, colored black, rotated 45 degrees.
    const marker2 = new mapboxgl.Marker({ color: 'black', rotation: 15 })
      .setLngLat([<?= $page->lat() ?>, <?= $page->lng() ?>])
      .addTo(map);
  </script>

<?php snippet('footer') ?>  