<?php snippet('header') ?>
  <div id="wrapper" class="divided">
    <section class="section wrapper style1 align-center">
      <div class="anchor" name="<?= $page->slug() ?>"></div>
      <header>
        <div class="section-image" style="background-image:url(<?= $page->image() ? $page->image()->url() : ''; ?>)">
          <h1 class="text-shadow"><?= $page->title() ?></h1>
          <p class="text-shadow2"><?= $page->subtitle() ?></p>
        </div>
      </header>      
      <!--div class="inner">
        <h2 class="align-left"><?= $page->title() ?></h2>
        <p class="align-left"><?= $page->subtitle() ?></p>
        <hr>
        <div class="p-align-left"><?= $page->text()->kirbytext() ?></div>
      </div-->      
      <!-- Map -->
      <header>
        <div class="map-container">
          <div id="map"></div>
        </div>
        <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet">
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
        <script>
          // TO MAKE THE MAP APPEAR YOU MUST
          // ADD YOUR ACCESS TOKEN FROM
          // https://account.mapbox.com
          
          mapboxgl.accessToken = 'pk.eyJ1Ijoib3ZlcmxlbW9uIiwiYSI6ImNraHVtN2lxOTB1dGUycm1hbHFvM215NzkifQ.mq69zruKTDCKvFuxi2dBjw';
          const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/dark-v9',
            center: [0,0],
            zoom: 16,
            interactive: false
          })

          // Create a default Marker, colored black, rotated 45 degrees.
          <?php $locations = []; foreach($page->children() as $ad) :?>
            <?php $locations[] = (object) [
              "title" => $ad->title()->value(),
              "url" => $ad->url(),
              "img" => $ad->files()->first()->url(),
              "lng" => $ad->lng()->value(),
              "lat" => $ad->lat()->value()
            ]; ?>
          <?php endforeach ?>

          const locations = <?= json_encode($locations) ?>;
          var bounds = new mapboxgl.LngLatBounds()          
          locations.forEach(e => {
            const pos = [e.lng, e.lat]
            var popup = new mapboxgl.Popup({ offset: 25 }).setText(`<h3>${e.title}</h3><br><img src="${e.img}"><br><a href="${e.url}">Ver aviso</a>`)
            const el = document.createElement('a')
            el.href = e.url
            el.className = 'marker'
            el.style.backgroundImage = `url(${e.img})`
            const marker2 = new mapboxgl.Marker(el)
              .setLngLat(pos)
              // .setPopup(popup)
              .addTo(map)
            bounds.extend(pos)
          })
          
          map.fitBounds(bounds, { padding: 100 })
        </script>   
      </header>

      <!-- Gallery -->
      <div class="inner">
        <h2 class="align-left">Venta</h2>
        <hr>
        <div class="gallery style2 large lightbox onscroll-fade-in">
        <?php foreach($page->children() as $ad) :?>
          <?php if ($ad->operation()->value() == 0 && $ad->enable()->value() === 'true'):?>
          <article>
            <a href="<?= $ad->url() ?>" class="image">
              <div class="slide-image" style="background-image: url('<?= $ad->files()->first()->url() ?>')"></div>
            </a>
            <div class="caption">
              <h3><?= $ad->title() ?></h3>
              <p><?= $ad->text() ?></p>
              <ul class="actions fixed">
                <li><span class="button small">Detalles</span></li>
              </ul>
            </div>
          </article>
        <?php endif;?>
        <?php endforeach; ?>
        </div>
      </div>
      <!-- Gallery 2 -->
      <div class="inner">
        <h2 class="align-left">Alquiler</h2>
        <hr>
        <div class="gallery style2 large lightbox onscroll-fade-in">
        <?php foreach($page->children() as $ad) :?>
          <?php if ($ad->operation()->value() == 1 && $ad->enable()->value() === 'true'):?>
          <article>
            <a href="<?= $ad->url() ?>" class="image">
              <div class="slide-image" style="background-image: url('<?= $ad->files()->first()->url() ?>')"></div>
            </a>
            <div class="caption">
              <h3><?= $ad->title() ?></h3>
              <p><?= $ad->text() ?></p>
              <ul class="actions fixed">
                <li><span class="button small">Detalles</span></li>
              </ul>
            </div>
          </article>
        <?php endif;?>
        <?php endforeach; ?>
        </div>
      </div>
    </section>
  </div>

<?php snippet('footer') ?>

<style>
.marker {
  background-image: url('/assets/images/stoplighe01.jpg');
  background-size: cover;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  cursor: pointer;
}
 
.mapboxgl-popup {
  max-width: 200px;
}
</style>