<?= $site->title()->html() ?><?php if(trim(strtolower($site->title()->html())) !== trim(strtolower($page->title()->html()))):?> | <?php echo $page->title()->html() ?><?php endif ?>