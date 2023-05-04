<?php snippet('header') ?>

  <div id="wrapper" class="divided">
    <section class="section wrapper style1 align-center">
      <div class="anchor" name="<?= $page->slug() ?>"></div>
      <?= snippet('pagetop') ?>
      <div class="inner">
        <div class="align-left"><?= $page->text()->kirbytext() ?></div>
        <div class="table-wrapper">
          <table class="alt">
            <tbody>
            <?php if($page->sup()->value()):?>
              <tr>
                <td align="right"><strong>Superficie cubierta</strong></td>
                <td align="left"><?= $page->sup()->value() ?>m2</td>
              </tr>
            <?php endif ?>
            <?php if($page->amb()->value()):?>
              <tr>
                <td align="right"><strong>Ambientes</strong></td>
                <td align="left"><?= $page->amb()->value() ?></td>
              </tr>
            <?php endif ?>
            <?php if($page->rooms()->value()):?>
              <tr>
                <td align="right"><strong>Habitaciones</strong></td>
                <td align="left"><?= $page->rooms()->value() ?></td>
              </tr>
            <?php endif ?>
            <?php if($page->bathrooms()->value()):?>
              <tr>
                <td align="right"><strong>Baños</strong></td>
                <td align="left"><?= $page->bathrooms()->value() ?></td>
              </tr>
            <?php endif ?>
            <?php if($page->floors()->value()):?>
              <tr>
                <td align="right"><strong>Plantas</strong></td>
                <td align="left"><?= $page->floors()->value() ?></td>
              </tr>
            <?php endif ?>
            <?php if($page->delivertime()->value()):?>
              <tr>
                <td align="right"><strong>Entrega</strong></td>
                <td align="left"><?= $page->delivertime()->value() ?> días</td>
              </tr>
            <?php endif ?>
            <?php if($page->price()->value()):?>
              <tr>
                <td align="right"><strong>Precio</strong></td>
                <td align="left"><?= $page->price()->value() ?>ARS</td>
              </tr>
            <?php endif ?>
            <?php if($page->equipment()->value()):?>
              <tr>
                <td align="right"><strong>Equipada con</strong></td>
                <td align="left"><?= $page->equipment()->value() ?></td>
              </tr>
            <?php endif ?>
            </tbody>
          </table>
        </div>        
      </div>


      <!-- Gallery -->
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
    </section>
  </div>

<?php snippet('footer') ?>