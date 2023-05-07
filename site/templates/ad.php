<?php snippet('header') ?>
<?php $currencies = ['ARS', 'USD'] ?>
<?php $operations = ['Venta', 'Alquiler'] ?>
<?php $brightness = ['Pobre', 'Regular', 'Buena', 'Excelente'] ?>
<?php $building = ['Casa', 'Chalet', 'Departamento', 'Monoambiente'] ?>

  <div id="wrapper" class="divided">
    <div class="floating-taps">
      <a href="https://wa.me/<?= site()->wpp() ?>?text=<?= site()->wppstr() ?> <?= $page->url() ?>" class="wpp is-clickable" target="_blank">
        <i class="fab fa-whatsapp fa-2x"></i>
      </a>
    </div>
    <section class="section wrapper style1 align-center">
      <div class="anchor" name="<?= $page->slug() ?>"></div>
      <header>
        <div class="section-image" style="background-image:url(<?= $page->image() ? $page->image()->url() : ''; ?>)">
          <h1 class="text-shadow"><?= $page->title() ?></h1>
          <p class="text-shadow2"><?= $page->subtitle() ?></p>
        </div>
      </header>

      <div class="inner align-left">
        <!--h3 class=""><?= $page->title() ?></h3-->
        <div class="ad-box">
          <h2>
          <?php if ($page->building()) :?>
          <?= $building[$page->building()->value()] ?>
          <?php endif ?>
          <?php if ($page->operation()) :?>
          en <?= $operations[$page->operation()->value()] ?>
          <?php endif ?>
          </h2>
          <?php if ($page->price() && $page->showprice()->value() !== 'false') :?>
            <h4><?= $page->price() ?><?= $currencies[$page->currency()->value()] ?></h4>
          <?php endif ?>
          <?php if ($page->address() && $page->showaddress()->value() !== 'false') :?>
            <h4><?= $page->address() ?></h4>
          <?php endif ?>
          <?php if ($page->rooms()) :?>
          <h4><?= $page->rooms()->value()?> amb</h4>
          <?php endif ?>
          <?php if ($page->brightness()) :?>
          <h4>Luminosidad <?= $brightness[$page->brightness()->value()] ?></h4>
          <?php endif ?>
          <?php if ($page->sup()) :?>
          <h4><?= $page->sup()->value()?>m2</h4>
          <?php endif ?>
          <?php if ($page->totsup() && $page->sup() !== $page->totsup()) :?>
          <h4><?= $page->totsup()->value()?>m2 total</h4>
          <?php endif ?>
          <?php if($page->yard()->value() === 'true'): ?>
          <h4>Patio <span class="fas fa-check text-success"></span></h4>
          <?php endif ?>
          <?php if($page->balcony()->value() === 'true'): ?>
          <h4>Balcón  <span class="fas fa-check text-success"></span></h4>
          <?php endif ?>
        </div>
      </div>
      <div class="inner align-left">
        <div class="p-align-left"><?= $page->text()->kirbytext() ?></div>
      </div>
      <!-- map -->      
      <header>
        <?php if ($page->lat()->value() && $page->lng()->value()): ?>
        <div class="map-container">
          <div id="map"></div>
        </div>
        <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet">
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
        <script>
          // TO MAKE THE MAP APPEAR YOU MUST
          // ADD YOUR ACCESS TOKEN FROM
          // https://account.mapbox.com
          const pos = [<?= $page->lng() ?>, <?= $page->lat() ?>]
          mapboxgl.accessToken = 'pk.eyJ1Ijoib3ZlcmxlbW9uIiwiYSI6ImNraHVtN2lxOTB1dGUycm1hbHFvM215NzkifQ.mq69zruKTDCKvFuxi2dBjw';
          const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/dark-v9',
            center: pos,
            zoom: 16
          })

          // Create a default Marker, colored black, rotated 45 degrees.
          const marker2 = new mapboxgl.Marker({ color: 'red' })
            .setLngLat(pos)
            .addTo(map);
        </script>   
        <?php endif ?>        
      </header>


      <!-- Gallery -->
      <?php if ($page->files()->count() > 1) :?>
      <div class="gallery style2 medium lightbox onscroll-fade-in">
      <?php foreach($page->files() as $file) :?>
        <article>
          <a href="<?= $file->url() ?>" class="image">
            <div class="slide-image" style="background-image: url('<?= $file->url() ?>')"></div>
          </a>
          <div class="caption">
            <h3><?= $file->title() ?></h3>
            <p><?= $file->caption() ?></p>
            <ul class="actions fixed">
              <li><span class="button small">Detalles</span></li>
            </ul>
          </div>
        </article>
      <?php endforeach; ?>
      </div>
      <?php endif ?>
    </section>
  </div>

<?php snippet('footer') ?>