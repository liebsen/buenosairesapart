<?php $currencies = ['USD','ARS'] ?>
<?php $states = ['Poor','Regular','Good','Excelent'] ?>

<style>
  .ad-images {
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all 0.75s ease;
    position: relative;
  }
  .ad-images a:not(.inline) {
    display: block;
  }
  .ad-images .img {
    background-color: whitesmoke;
    border-radius: 0.5rem;
    min-height: 23.5vh;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    background-image: url('/assets/images/image-placeholder.jpg');
  }  
  @media screen and (min-width: 767px) {
    .ad-images .img {
      width: 20vw;
    }
    .ad-images .i-0 {
      width: 100%;
      height: 50vh;
    }
  }

</style>
<?php snippet('header') ?>
  <div id="wrapper" class="divided">
    <?php if($page->showcontactbutton()->value()) :?>
    <div class="floating-taps">
      <a href="https://wa.me/<?= site()->wpp() ?>?text=<?= site()->wppstr() ?> <?= $page->url() ?>" class="wpp is-clickable" target="_blank">
        <i class="fab fa-whatsapp fa-2x"></i>
      </a>
    </div>
    <?php endif ?>
    <section class="section wrapper style1 align-center">
      <div class="anchor" name="<?= $page->slug() ?>"></div>


      <!--header>
        <div class="section-image" style="background-image:url(<?= $page->image() ? $page->image()->url() : ''; ?>)">
          <h1 class="text-shadow"><?= $page->title() ?></h1>
          <p class="text-shadow2"><?= $page->subtitle() ?></p>
        </div>
      </header-->

      <header>
      <?php if ($page->files()->count()) :?>
        <div class="gallery lightbox fullscreen ad-images align-items-end onload-fade-in bg-theme">
        <?php $photos = [] ?>
        <?php $i = 0; foreach($page->files() as $file) :?>
          <?php $photos[$i] = $file->url() ?>
        <?php $i++; endforeach ?>
        <?php for($i=0; $i<6; $i++):?>
          <?php if(empty($photos[$i])):?>
            <?php $photos[$i] = '/assets/images/image-placeholder.jpg' ?>
          <?php endif ?>
        <?php endfor ?>
          <div class="row justify-content-center">
            <div class="col-12-small col-9-medium p-0">
              <div class="p-05">
                <a href="<?= $photos[0] ?>" class="image">
                  <div class="img i-0" style="background-image: url('<?= $photos[0] ?>')"></div>
                </a>
              </div>
              <div class="row m-0">
                <div class="col-12-small col-6-medium p-05">
                  <a class="inline" href="<?= $photos[1] ?>">
                    <div class="img i-1" style="background-image: url('<?= $photos[1] ?>')"></div>
                  </a>
                </div>
                <div class="col-12-small col-6-medium p-05">
                  <a class="inline" href="<?= $photos[2] ?>">
                    <div class="img i-2" style="background-image: url('<?= $photos[2] ?>')"></div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-12-small col-3-medium p-0">
              <a href="<?= $photos[3] ?>" class="p-05">
                <div class="img i-3" style="background-image: url('<?= $photos[3] ?>')"></div>
              </a>
              <a href="<?= $photos[4] ?>" class="p-05">
                <div class="img i-4" style="background-image: url('<?= $photos[4] ?>')"></div>
              </a>
              <a href="<?= $photos[5] ?>" class="p-05">
                <div class="img i-5" style="background-image: url('<?= $photos[5] ?>')"></div>
              </a>
            </div>
          </div>
        </div>
      <?php endif ?>
      </header>

      <div class="inner align-left">
        <!--h3 class=""><?= $page->title() ?></h3-->
        <h3>Features</h3>
        <div class="table-wrapper">
          <table class="alt pairs">
            <tbody>
            <?php if($page->loudness()->value()):?>
              <tr>
                <td align="right"><strong>Loudness</strong></td>
                <td align="left"><?= $states[$page->loudness()->value()] ?></td>
              </tr>
            <?php endif ?>
            <?php if($page->luminosity()->value()):?>
              <tr>
                <td align="right"><strong>Luminosity</strong></td>
                <td align="left"><?= $states[$page->luminosity()->value()] ?></td>
              </tr>
            <?php endif ?>
            <?php if($page->landscape()->value()):?>
              <tr>
                <td align="right"><strong>Landscape</strong></td>
                <td align="left"><?= $states[$page->landscape()->value()] ?></td>
              </tr>
            <?php endif ?>
            <?php if($page->accessibility()->value()):?>
              <tr>
                <td align="right"><strong>Accessibility</strong></td>
                <td align="left"><?= $states[$page->accessibility()->value()] ?></td>
              </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>

      <div class="inner align-left">
        <h3>Sheet</h3>
        <div class="table-wrapper">
          <table class="alt pairs">
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
      <?php if ($page->showmap()->value() !== "false" && $page->lat()->value() && $page->lng()->value()): ?>
      <!-- map -->      
      <div class="inner align-left">
        <h3>Map</h3>
        <div class="map-container">
          <div id="map"></div>
        </div>
        <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet">
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
        <script>
          // TO MAKE THE MAP APPEAR YOU MUST
          // ADD YOUR ACCESS TOKEN FROM
          // https://account.mapbox.com
          window.addEventListener('load', () => {
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

            // Create a default Marker, colored black, rotated 45 degrees.
            const marker2 = new mapboxgl.Marker({ color: 'red' })
              .setLngLat(pos)
              .addTo(map);

            var clock = 0
            var lastscroll = 0
            var isMapViewport = () => {
              map.flyTo({
                center: pos,
                pitch: 60,
                zoom:17,
                bearing: -60,
                duration: 15000,
              })
            }

            var checkMapScrollPosition = () => {
              var scroll = $(window).scrollTop()
              var mapscroll = $('.map-container').offset().top
              if (lastscroll > scroll) {
                console.log('a(1)')
                // scrolling up
              } else {
                console.log('a(2)')
                console.log(scroll, mapscroll)
                // scrolling down
                if(mapscroll > scroll - $('.map-container').height()) {
                  console.log('a(3)')
                  isMapViewport()
                } else {
                  console.log('a(4)')
                }
              }            
              lastscroll = scroll
            }

            $(window).scroll(function(e) {
              if(clock) {
                clearInterval(clock)
              }
              clock = setTimeout(() => {
                checkMapScrollPosition()
              }, 500)
            })
          })

        </script>   
      </div>
      <?php endif ?>

      <div class="inner align-left">
        <h3>Description</h3>
        <div class="p-align-left"><?= $page->text()->kirbytext() ?></div>
      </div>
    </section>
  </div>

<?php snippet('footer') ?>