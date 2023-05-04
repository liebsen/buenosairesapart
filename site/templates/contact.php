<?php snippet('header') ?>
  <section class="section wrapper style1 align-center">
    <div class="inner medium">
      <h2><?= $page->title()->html() ?></h2>
      <?php if($success && !isset($alert['error'])): ?>
      <div class="alert success">
        <p><?= $success ?></p>
      </div>
      <?php else: ?>
      <p><?= $page->text()->kirbytext() ?></p>
      <?php if (isset($alert['error'])): ?>
          <div><?= $alert['error'] ?></div>
      <?php else: ?>
      <form method="post" action="<?= $page->url() ?>">
        <div class="honeypot">
          <label for="website">Website <abbr title="required">*</abbr></label>
          <input type="url" id="website" name="website" tabindex="-1">
        </div>
        <div class="fields">
          <div class="field half">
            <label for="name">Nombre completo</label>
            <input type="text" name="name" id="name" value="" />
          </div>
          <div class="field half">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="" />
          </div>
          <div class="field">
            <label for="text">Mensaje</label>
            <textarea name="text" id="text" rows="6"></textarea>
          </div>
        </div>
        <ul class="actions special">
          <li><input type="submit" name="submit" id="submit" value="Solicitar contacto" /></li>
        </ul>
      </form>
      <?php endif ?>
      <?php endif ?>
    </div>
  </section>

<?php snippet('footer') ?>
