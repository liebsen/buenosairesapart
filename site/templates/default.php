<?php snippet('header') ?>
  <div id="wrapper" class="divided">
    <section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right" id="home">
      <div class="content">
        <div class="anchor" name="<?= $site->children()->first()->slug() ?>"></div>
        <h1><?php echo $page->title()->html() ?></h1>
        <p class="text-light text-hili"><?= $page->text() ?></p>
        <ul class="actions stacked">
          <li><a href="#modelos" class="button large wide smooth-scroll-middle">Comenzar</a></li>
        </ul>
      </div>
      <div class="image onscroll-content-fade-left" style="<?= $site->children()->first()->style()->value() ?: '' ?>">
      <?php if($page->files()->first()) :?>
        <img src="<?= $page->files()->first()->url() ?>" alt="" />
      <?php endif;?>
        <div class="tail" name="<?= $site->children()->first()->slug() ?>"></div>
      </div>
    </section>

    <section id="modelos" class="spotlight style1 orient-left content-align-center image-position-center onscroll-image-fade-in onscroll-content-fade-left">
      <div class="anchor" name="modelos"></div>
      <div class="content">
        <h1 class="text-white"><?php echo $site->find('/modelos')->title() ?></h1>
        <p class="text-light text-hili"><?php echo $site->find('/modelos')->text() ?></p>
        <ul class="actions stacked">
          <li><a href="/modelos" class="button large wide smooth-scroll-middle">Más de nuestros modelos</a></li>
        </ul>        
        <div class="swiffy">
          <div class="swiffy-slider">
            <ul class="slider-container">
              <?php foreach($site->find('modelos')->children() as $item):?>
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
        <div class="tail" name="modelos"></div>
      </div>

    </section>

    <?php $i=0; foreach($site->children()->visible() as $section):?>
      <?php if ($section->home()->value() === 'true'):?>
      <section class="spotlight style1 orient-right content-align-left image-position-center onscroll-image-fade-in onscroll-content-fade-right" id="<?= $section->slug() ?>">        
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
