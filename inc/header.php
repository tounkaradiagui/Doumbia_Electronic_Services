<?php require('./config/function.php');?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<!-- Mirrored from around.createx.studio/contacts-v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Nov 2023 19:09:46 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">

  <!-- Viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

  <!-- SEO meta tags -->
  <title> <?php if (isset($title)) {echo $title;} else {echo siteConfig('title') ?? "Doumbia Electronic";} ?> </title>
  <meta name="description" content="<?= siteConfig('description') ?? "Meta description"; ?>">
  <meta name="keywords" content="<?= siteConfig('meta_keyword') ?? "Meta Keyword"; ?>">
  <meta name="author" content="Diagui TOUNKARA">

  <!-- Webmanifest + Favicon / App icons -->
  <link rel="manifest" href="manifest.json">
  <link rel="icon" type="image/png" href="./assets/app-icons/icon-32x32.png" sizes="32x32">
  <link rel="apple-touch-icon" href="./assets/app-icons/icon-180x180.png">

  <!-- Theme switcher (color modes) -->
  <script src="./assets/js/theme-switcher.js"></script>

  <!-- Import Google font (Inter) -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet" id="google-font">

  <!-- Vendor styles -->
  <link rel="stylesheet" media="screen" href="./assets/vendor/leaflet/dist/leaflet.css">

  <!-- Font icons -->
  <link rel="stylesheet" href="./assets/icons/around-icons.min.css">

  <!-- Theme styles + Bootstrap -->
  <link rel="stylesheet" media="screen" href="./assets/css/theme.min.css">
  <link rel="stylesheet" media="screen" href="./assets/css/welcome.css">

  <!-- Customizer generated styles -->
  <style id="customizer-styles"></style>
</head>

<body>

  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;" title="Google Tag Manager"></iframe>
  </noscript>


  <!-- Page loading spinner -->
  <div class="page-loading active">
    <div class="page-loading-inner">
      <div class="page-spinner"></div>
      <span>Chargement...</span>
    </div>
  </div>


  <!-- Customizer modal -->
  <div class="modal fade" id="customizer-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Your custom styles</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-4">
          <p class="mb-3">Grab the generated styles below. Wrap them inside <code>&lt;style&gt;</code> tag and put in the <code>&lt;head&gt;</code> section of your HTML document.</p>
          <p class="mb-4"><span class="fw-medium">IMPORTANT:</span> In order for these styles to take effect you have to placed them below:<br><code>&lt;link rel=&quot;stylesheet&quot; media=&quot;screen&quot; href=&quot;assets/css/theme.min.css&quot;&gt;</code></p>
          <div class="bg-secondary overflow-hidden rounded-4">
            <pre class="text-wrap bg-transparent border-0 text-dark p-4" id="custom-generated-styles"></pre>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary w-100 w-sm-auto mb-3 mb-sm-0" type="button" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary w-100 w-sm-auto ms-sm-3" type="button" id="copy-styles-btn">
            <i class="ai-copy me-2 ms-n1"></i>
            Copy styles
          </button>
        </div>
      </div>
    </div>
  </div>

  <main class="page-wrapper">


    <?php include('./inc/navbar.php') ?>