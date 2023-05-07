<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php snippet('pagetitle') ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <meta name="description" content="<?= $site->text() ?>"/>
  <meta property="og:type" content="<?= $site->ogtype() ?>" />
  <meta property="og:title" content="<?= $site->ogtitle() ?>" />
  <meta property="og:description" content="<?= $site->ogdescription() ?>" />
  <meta property="og:image" itemprop="image primaryImageOfPage" content="<?= $site->ogimage()->toFile()->url() ?>" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="<?= $site->themecolor() ?>" />
  <meta name="theme-color" content="<?= $site->themecolor() ?>" />
  <link href="https://fonts.googleapis.com/css?family=<?= $site->fontfamily() ?: '' ?>:<?= $site->fontweight() ?: '' ?>" rel="stylesheet">

  <link rel="shortcut icon" type="image/png" href="<?= $site->favicon()->toFile()->url() ?>" />
  <link rel="stylesheet" href="/assets/css/main.css" />
  <link rel="stylesheet" href="/assets/css/site.css" />
  <link rel="stylesheet" href="/assets/css/animation.css" />
  <link rel="stylesheet" href="/assets/css/swiffy-slider.min.css" />
  <noscript><link rel="stylesheet" href="as/sets/css/noscript.css" /></noscript>

  <style>
    :root {
      --theme-dark-color: <?= $site->themebackground() ?: '' ?>;
      --theme-color: <?= $site->themecolor() ?: '' ?>;
    }
    body {
      font-family: '<?= $site->fontfamily() ?: '' ?>', -apple-system,system-ui,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',sans-serif;
    }

    #loader {
      background-color: var(--theme-dark-color);
      position: fixed;
      left: 0;
      top: 0;
      right: 0;
      bottom: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 10000; 
      transition: all ease 1.4s;
    }

    .loader-background {
      opacity: 0.1;
      background-size: 220px;
      background-repeat: no-repeat;
      background-position: center center;
      /* background-image: url(/assets/images/BackgroundLoader.jpg); */
      -webkit-animation-name: loaderIn;
      animation-name: loaderIn;
      transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
      -webkit-animation-duration: 5s;
      animation-duration: 5s;
      animation-delay: 0s;
      -webkit-animation-fill-mode: both;
      animation-fill-mode: both;  
    }

    @keyframes loaderIn {
      0% {
        opacity: 0.1;
      }
      50% {
        opacity: 0.25;
      }
      100% {
        opacity: 0.9;
        transform: scale(0.75);
      }
    }

    .loader-container {
      width: 100%;
      height: 100vh;
      flex-direction: column;
      display: flex;
      align-items: center;
      justify-content: center;  
      background-size: 220px;
      background-repeat: no-repeat;
      background-position: center center;
    }

    .loader-section {
      font-size: 1.25rem;
      color: white;
      text-transform: uppercase;
      font-weight: 400;
    }

    .loader-doodles {
      background-size: 25%, 50%, contain;
      background-position: center, center, center;
      background-repeat: no-repeat, no-repeat, no-repeat;
      min-height: 100%;
    }

    .loader-container svg {
      display: none;
      flex: 1;
    }

    .load-progress {
      height: 200px;
    }

    .load-progress > svg {
      height: 100%;
      display: block;
    }

    .loader-invisible {
      opacity:0;
      pointer-events: none;
    }    
  </style>
  <?php if($site->googleanalytics()->value()): ?>
    <?php snippet('googleanalytics') ?>
  <?php endif ?>
</head>
<body class="is-preload hidden">
  <div id="loader" style="<?= $site->styleloader()->value() ? : '' ?>">
    <div class="loader-background">
      <div class="loader-container" style="background-image: url('<?= $site->backgroundloader()->value() ? $site->backgroundloader()->toFile()->url() : ''; ?>')">
      </div>
    </div>
  </div>
  <div class="header">
    <a href="<?= $page->slug() !== 'home' ? '/' : '#home' ?>">
      <img class="logo" src="<?= $site->logo()->value() ? $site->logo()->toFile()->url() : '' ?>" width="200" />
    </a>
    <div class="overlay desktop" style="<?= $site->stylemenu()->value() ? : '' ?>">
      <div class="overlay-content" style="background-image: url(<?= $site->backgroundmenu()->value() ? $site->backgroundmenu()->toFile()->url() : '' ; ?>)">
        <div class="overlay-tools">
          <a class="close toggle-menu">
            <img class="is-clickable" src="/assets/images/vector-29@2x.svg" width="30" />
          </a>
          <a href="/">
            <img class="logo animated fadeIn delay" src="<?= $site->logomenu()->value() ? $site->logomenu()->toFile()->url() : '' ?>" width="280" />
          </a>
        </div>
        <div class="menu-options animated fadeIn delay2">
        <?php foreach($site->children()->visible() as $section):?>
        <?php if ($section->header()->value() === 'true'):?>
        <a class="fadeIn" href="/<?= $section->slug() ?>">
          <?= $section->title() ?>
        </a>
        <?php endif;?>
        <?php endforeach;?>
        <?php foreach(page('socials')->children() as $social): ?>
        <a href="<?= $social->action()->value() ? $social->action() . ':' : '' ?><?= $social->link() ?>" class="icon style1 <?= $social->icon() ?>" target="_blank"><span class="label"><?= $social->title() ?></span></a>
        <?php endforeach ?>
        <?php if($page->action()):?>
          <a href="<?= $page->actionUrl() ?>" class="button primary small"><?= $page->actionText() ?></a>
        <?php endif ?>
        </div> 
      </div>
    </div>
    <img class="mobile toggle-menu is-clickable" src="/assets/images/vector-20@2x.svg" width="30"/>
  </div>