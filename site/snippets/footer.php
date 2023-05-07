<?php if($site->whatsapp()):?>
  <div class="floating-taps">
    <a target="_blank" class="wpp is-clickable" href="https://wa.me/<?php echo $site->whatsapp()->value() ?>?text=<?php echo urlencode($site->whatsapptext()->value()) ?>">
      <i class="fab fa-whatsapp fa-2x" aria-hidden="true"></i>
    </a>
  </div>
<?php endif; ?>

  <footer class="wrapper style1 align-center">
    <div class="inner">
      <ul class="icons">
      <?php foreach(page('socials')->children() as $social): ?>
        <li><a href="<?= $social->action()->value() ? $social->action() . ':' : '' ?><?= $social->link() ?>" class="icon style1 <?= $social->icon() ?>" target="_blank"><span class="label"><?= $social->title() ?></span></a></li>
      <?php endforeach ?>
      </ul>
      <p>© <?= date('Y') ?> <?= $site->title() ?> | <?= $site->slogan() ?: '' ?></p>
    </div>
  </footer>

  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/jquery.scrollex.min.js"></script>
  <script src="/assets/js/jquery.scrolly.min.js"></script>
  <script src="/assets/js/swiffy-slider.min.js"></script>
  <script src="/assets/js/browser.min.js"></script>
  <script src="/assets/js/breakpoints.min.js"></script>
  <script src="/assets/js/util.js"></script>
  <script src="/assets/js/main.js"></script>
  <script src="/assets/js/site.js"></script>
</body>
</html>