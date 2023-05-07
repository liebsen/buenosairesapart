<?php $positions = ['center','top','left','right','bottom']; ?>
<?php snippet('header') ?>
  <div id="wrapper" class="divided">
    <section class="spotlight style1 orient-left content-align-left background-image fullscreen onload-image-fade-in onload-content-fade-right" id="home" style="background-image:url(<?= $page->files()->first() ? $page->files()->first()->url() : ''; ?>); background-position: <?= $page->files()->first() ? "center {$positions[intval($page->files()->first()->position()->value())]}" : 'center'; ?>">
      <div class="content">
        <div class="anchor" name="<?= $site->children()->first()->slug() ?>"></div>
        <h1><?php echo $page->title()->html() ?></h1>
        <p class="text-light text-hili"><?= $page->text() ?></p>
        <ul class="actions stacked">
          <li><a href="#avisos" class="button large wide smooth-scroll-middle">Comenzar</a></li>
        </ul>
      </div>
      <div class="tail" name="<?= $site->children()->first()->slug() ?>"></div>
    </section>

    <section id="avisos" class="spotlight style1 orient-left content-align-center image-position-center onscroll-image-fade-in onscroll-content-fade-left">
      <div class="anchor" name="avisos"></div>
      <div class="content">
        <h1 class="text-white"><?php echo $site->find('/avisos')->title() ?></h1>
        <p class="text-light text-hili"><?php echo $site->find('/avisos')->text() ?></p>
        <ul class="actions stacked">
          <li><a href="/avisos" class="button large wide smooth-scroll-middle">Más de nuestros avisos</a></li>
        </ul>        
        <div class="swiffy">
          <div class="swiffy-slider">
            <ul class="slider-container">
              <?php foreach($site->find('avisos')->children() as $item):?>
              <li>
                <a href="<?= $item->url() ?>" class="swiffy-item bg-light">
                  <div class="swiffy-img" style="background-image: url('<?= $item->files()->first() ? $item->files()->first()->url() : '' ?>')"></div>
                  <div class="swiffy-text">
                    <h3 class="swiffy-title"><strong><?= $item->title() ?></strong></h3>
                    <p class="text-hili"><?= $item->subtitle() ?></p>
                  </div>
                </a>
              </li>
            <?php endforeach ?>
            </ul>

            <button type="button" class="slider-nav"></button>
            <button type="button" class="slider-nav slider-nav-next"></button>

            <div class="slider-indicators">
              <button class="active"></button>
              <button></button>
              <button></button>
            </div>
          </div>
        </div>
        <div class="tail" name="avisos"></div>
      </div>

    </section>

    <?php $i=0; foreach($site->children()->visible() as $section):?>
      <?php if ($section->home()->value() === 'true'):?>
      <section class="spotlight style1 orient-<?= intval($i%2) == 0 ? 'right' : 'left' ?> content-align-left image-position-center onscroll-image-fade-in onscroll-content-fade-<?= intval($i%2) == 0 ? 'right' : 'left' ?>" id="<?= $section->slug() ?>">        
        <div class="content">
          <div class="anchor" name="<?= $section->slug() ?>"></div>
          <h1><?= $section->title() ?></h1>
          <p class="text-light text-hili align-left"><?= $section->intro() ?></p>
          <ul class="actions special">
            <li><a href="/<?= $section->slug() ?>" class="button primary"> Conocer más </a></li>
          </ul>
          <div class="tail" name="<?= $section->slug() ?>"></div>
        </div>
        <div class="image" style="<?= $section->style()->value() ?: '' ?>">
          <?php if($section->files()->first()):?>
          <img src="<?= $section->files()->first()->url()?>" alt="" />
          <?php endif;?>
        </div>        
      </section>
    <?php $i++;  endif;?>
    <?php endforeach;?>
  </div>

<?php snippet('footer') ?>
