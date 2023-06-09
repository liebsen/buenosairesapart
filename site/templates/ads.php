<?php $currencies = ['USD','ARS'] ?>
<?php snippet('header') ?>
  <div id="wrapper" class="divided breathe">
    <?php if ($page->showmap()->value() !== "false" && $page->lat()->value() && $page->lng()->value()): ?>
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
    </section>
    <?php endif ?>   

    <section class="section wrapper style1 align-center">
      <div class="anchor" name="cards"></div>
<?php

function get_color_by_value($val) {
  switch($val) {
    case 0:
    case 1: 
      return 'muted';
    case 2:
      return 'warning';
    case 3: 
      return 'success';
  }
}

$specs = [
  (object) [
    "name"=> "loudness",
    "icon"=> "deafness"
  ],
  (object) [
    "name" => "luminosity",
    "icon"=> "sun"
  ],
  (object) [
    "name"=> "landscape",
    "icon"=> "tree"
  ],
  (object) [
    "name"=> "accessibility",
    "icon"=> "road"
  ],
  (object) [
    "name"=> "price",
    "icon"=> "money"
  ],
];
?>

      <!-- Gallery -->
      <div class="inner pt-0">
        <h2 class="align-left">Properties</h2>
        <hr>
        <!--div class="gallery style2 large lightbox onscroll-fade-in"-->
        <div class="row">
        <?php foreach($items as $item) :?>
          <div class="col-12-xxsmall col-12-xsmall col-6-small col-4-medium col-3-large">
            <div class="content">
              <a href="<?= $item->url() ?>" class="inline-100">
                <div class="card">
                  <div class="card-background" style="background-image: url('<?= count($item->files()) ? $item->files()->first()->url() : '' ?>')">
                    <div class="features">
                    <?php foreach($specs as $spec): $val = $item->{$spec->name}()->value(); ?>
                      <?php if($val):?>
                        <i class="fa fa-<?= $spec->icon ?> text-<?= get_color_by_value($val) ?>"></i>
                      <?php endif ?>  
                    <?php endforeach ?>
                    </div>
                  </div>
                  <div class="card-texts text-left">
                    <h4 class="mb-1"><?= $item->title() ?></h4>
                    <p><?= $item->caption()->value?: 'No description yet' ?></p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
        </div>
        
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