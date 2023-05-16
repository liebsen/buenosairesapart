<?php snippet('header') ?>

  <div id="wrapper" class="divided">
    <section class="section wrapper style1 align-center">
      <div class="inner">
        <header>
          <h1><?= $page->title() ?></h1>
          <p><?= $page->subtitle() ?></p>
        </header>
        <p><?= $page->text()->kirbytext() ?></p>
        <div class="button-group">
          <a class="button" href="<?= url('/') ?>">Ir a inicio</a>
          <a class="button" href="<?= url('/contacto') ?>">Contactar al administrador</a>
        </div>
      </div>
    </section>
  </div>

<?php snippet('footer') ?> 