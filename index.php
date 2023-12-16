<?php $title = "Bienvenue sur Doumbia Electro";
include('./inc/header.php') ?>

<!-- Hero -->
<section class="bg-dark position-relative min-vh-100 overflow-hidden pt-5" data-bs-theme="dark">
  <svg class="position-absolute top-0" width="262" height="160" viewBox="0 0 262 160" fill="none" xmlns="http://www.w3.org/2000/svg" style="left: 6%;">
    <ellipse cx="131" cy="30.5" rx="131" ry="129.5" fill="white" fill-opacity=".03"></ellipse>
  </svg>
  <div class="container position-relative z-5 text-center pt-5 mt-lg-4 mt-xl-5">
    <h1 class="display-1 pt-4 mt-sm-3">
      <span class="text-white fw-normal">Have a look </span>
      <span class="d-inline-flex align-items-center">
        <span class="text-white">Ar</span>
        <img class="flex-shrink-0 mt-2" src="./config/assets/img/landing/intro/avatar.png" width="51" alt="Image">
        <span class="text-white">und!</span>
      </span>
    </h1>
    <p class="text-body fs-xl mb-5">And you will find everything you need to build a great looking website</p>
    <a class="scroll-down-btn" href="#landings" data-scroll data-scroll-offset="20">
      <div class="mouse"></div>
      <p>Landings</p>
    </a>
  </div>
  <div class="d-none d-lg-block" style="margin-top: -80px;"></div>
  <div class="d-none d-sm-block d-lg-none" style="margin-top: -40px;"></div>
  <div class="parallax mx-auto mb-n5" style="max-width: 1606px;">
    <div class="parallax-layer" data-depth="-0.1">
      <img src="./config/assets/img/landing/intro/hero/01.png" alt="Background shapes">
    </div>
    <div class="parallax-layer z-2" data-depth="0.12">
      <img src="./config/assets/img/landing/intro/hero/02.png" alt="Foreground shape">
    </div>
    <div class="parallax-layer z-2" data-depth="0.35">
      <img src="./config/assets/img/landing/intro/hero/03.png" alt="Foreground shape">
    </div>
    <div class="parallax-layer z-2" data-depth="0.23">
      <img src="./config/assets/img/landing/intro/hero/04.png" alt="Foreground shape">
    </div>
  </div>
</section>

<!-- Light / Dark mode (Comparison slider) -->
<section class="d-flex w-100 position-relative overflow-hidden">

  <div class="position-absolute top-0 start-0 w-50 h-100 bg-dark"></div>
  <div class="position-absolute top-0 end-0 w-50 h-100" style="background-color: #f6f9fc;"></div>
</section>

<?php include('./inc/footer.php') ?>