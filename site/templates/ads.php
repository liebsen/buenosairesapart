<?php snippet('header') ?>
  <div id="wrapper" class="divided">
    <section class="section wrapper style1 align-center">
      <div class="anchor" name="<?= $page->slug() ?>"></div>
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
            center: [-58.468291099,-34.5420301],
            zoom: 14,
            interactive: false,
          })

          // Create a default Marker, colored black, rotated 45 degrees.
          <?php $locations = []; foreach($items as $ad) :?>
            <?php $locations[] = (object) [
              "title" => $ad->title()->value(),
              "url" => $ad->url(),
              "img" => count($ad->files()) ? $ad->files()->first()->url() : '',
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
              .setPopup(popup)
              .addTo(map)
            bounds.extend(pos)
          })
          if(locations.length > 1) {
            console.log('fit bounds')
            map.fitBounds(bounds, { padding: 100 })
          }
        </script>   
      </header>

      <!-- Gallery -->
      <div class="inner">
        <h2 class="align-left">Properties</h2>
        <hr>
        <!--div class="gallery style2 large lightbox onscroll-fade-in"-->
        
        <?php foreach($items as $item) :?>
          <section>
            <header>
              <h3><?= $item->title() ?></h3>
            </header>
            <div class="content">
              <a href="<?= $ad->url() ?>" class="image">
                <div class="box-custom">
                  <div class="slide-image" style="background-image: url('<?= count($item->files()) ? $item->files()->first()->url() : '' ?>')">
                    
                    <?php if($item->rooms->value()):?>
                      <i class="fa fa-bedroom"><?= $item->rooms() ?></i>
                    <?php endif ?>
                  </div>
                  <p><?= $item->caption() ?></p>
                </div>
              </div>
            </a>
          </section>
        <?php endforeach; ?>
        
        <!--/div-->
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