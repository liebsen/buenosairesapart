<?php snippet('header') ?>
  <div id="wrapper" class="divided">
    <div class="floating-taps">
      <a href="https://wa.me/<?= site()->wpp() ?>?text=<?= site()->wppstr() ?> <?= $page->url() ?>" class="wpp is-clickable" target="_blank">
        <i class="fab fa-whatsapp fa-2x"></i>
      </a>
    </div>
    <section class="section wrapper style1 align-center">
      <div class="anchor" name="<?= $page->slug() ?>"></div>


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
            pitch: 0,
            bearing: 0,
            zoom: 12,
            interactive: false,
          })

          setTimeout(() => {
            map.flyTo({
              center: pos,
              pitch: 60,
              zoom:17,
              bearing: -60,
              duration: 15000,
            })
          }, 5000)

          // Create a default Marker, colored black, rotated 45 degrees.
          const marker2 = new mapboxgl.Marker({ color: 'red' })
            .setLngLat(pos)
            .addTo(map);
        </script>   
        <?php endif ?>        
      </header>

      <!--header>
        <div class="section-image" style="background-image:url(<?= $page->image() ? $page->image()->url() : ''; ?>)">
          <h1 class="text-shadow"><?= $page->title() ?></h1>
          <p class="text-shadow2"><?= $page->subtitle() ?></p>
        </div>
      </header-->


      <div class="inner align-left">
        <!--h3 class=""><?= $page->title() ?></h3-->

        <div class="table-wrapper">
          <table class="alt">
            <tbody>
            <?php if($page->sup()->value()):?>
              <tr>
                <td align="right"><strong>Covered</strong></td>
                <td align="left"><?= $page->sup()->value() ?>m2</td>
              </tr>
            <?php endif ?>
            <?php if($page->rooms()->value()):?>
              <tr>
                <td align="right"><strong>Rooms</strong></td>
                <td align="left"><?= $page->rooms()->value() ?></td>
              </tr>
            <?php endif ?>
            <?php if($page->bathrooms()->value()):?>
              <tr>
                <td align="right"><strong>Bathrooms</strong></td>
                <td align="left"><?= $page->bathrooms()->value() ?></td>
              </tr>
            <?php endif ?>
            <?php if($page->floors()->value()):?>
              <tr>
                <td align="right"><strong>Floors</strong></td>
                <td align="left"><?= $page->floors()->value() ?></td>
              </tr>
            <?php endif ?>
            <?php if($page->delivertime()->value()):?>
              <tr>
                <td align="right"><strong>Delivery time</strong></td>
                <td align="left"><?= $page->delivertime()->value() ?> days</td>
              </tr>
            <?php endif ?>
            <?php if($page->price()->value()):?>
              <tr>
                <td align="right"><strong>Price</strong></td>
                <td align="left"><?= $page->price()->value() ?> <?= $currencies[$page->currency()->value()] ?></td>
              </tr>
            <?php endif ?>
            <?php if($page->equipment()->value()):?>
              <tr>
                <td align="right"><strong>Equipped with</strong></td>
                <td align="left"><?= $page->equipment()->value() ?></td>
              </tr>
            <?php endif ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="inner align-left">
        <div class="p-align-left"><?= $page->text()->kirbytext() ?></div>
      </div>

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