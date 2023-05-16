<?php snippet('header') ?>
  <div id="wrapper" class="divided">
    <section class="section wrapper fullscreen style1 align-center">
      <div class="anchor" name="<?= $page->slug() ?>"></div>
      <?= snippet('pagetop') ?>
      <div class="inner">
        <div class="align-left">
          <?= $page->text()->kirbytext() ?>
        </div>
        <!-- Pages -->
        <div class="align-left">
        <?php foreach($page->children()->visible() as $folder): ?>
          <a class="no-decor" href="<?= $folder->url() ?>">
            <header>
              <h2><?= $folder->title() ?></h2>
              <p><?= $folder->subtitle() ?></p>
            </header>
            <p><?= $folder->intro()->kirbytext() ?></p>
          </a>
          <hr>
        <?php endforeach ?>
        </div>
      </div>
      <!-- Gallery -->
      <?php if(count($page->files()) > 1):?>
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