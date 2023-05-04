  <?php if($page->image()): ?>
    <header>
      <div class="section-image" style="background-image:url(<?= $page->image()->url() ?>)">
        <h1><?= $page->title() ?></h1>
        <p><?= $page->subtitle() ?></p>
      </div>
    </header>
  <?php else: ?>
    <div class="inner">
      <h1 class="align-left"><?= $page->title() ?></h1>
      <p class="text-light align-left"><?= $page->subtitle() ?></p>
    </div>
  <?php endif ?>
