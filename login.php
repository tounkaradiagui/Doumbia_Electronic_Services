<?php $title = "Connexion";
include('./inc/header.php') ?>
<section class="bg-dark position-relative min-vh-10 overflow-hidden mb-4" data-bs-theme="dark">

</section>
<div class="d-lg-flex position-relative h-100">
    <!-- Sign in form -->
    <div class="d-flex flex-column align-items-center w-lg-50 h-100 px-3 px-lg-5 pt-5">
        <div class="w-100 mt-auto" style="max-width: 526px;">
            <h1>Connectez - vous</h1>
            <p class="pb-3 mb-3 mb-lg-4">Vous n'avez pas de compte ?&nbsp;&nbsp;<a href="./register.php">S'inscrire !</a></p>
            <form class="needs-validation" novalidate>
                <div class="pb-3 mb-3">
                    <div class="position-relative">
                        <i class="ai-mail fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input class="form-control form-control-lg ps-5" type="email" name="email" placeholder="Votre email" required>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="position-relative">
                        <i class="ai-lock-closed fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <div class="password-toggle">
                            <input class="form-control form-control-lg ps-5" type="password" name="password" placeholder="Mot de passe" required>
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-between pb-4">
                    <div class="form-check my-1">
                        <input class="form-check-input" type="checkbox" id="keep-signedin">
                        <label class="form-check-label ms-1" for="keep-signedin">Garder ma connexion</label>
                    </div>
                    <a class="fs-sm fw-semibold text-decoration-none my-1" href="forgot-password.php">Mot de passe oublié ?</a>
                </div>
                <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Connexion</button>

                <!-- Sign in with social account -->
                <h2 class="h6 text-center pt-3 pt-lg-4 mb-4">Ou se connecter un compte google</h2>
                <div class="row row-cols-1 row-cols-sm-2 gy-3">
                    <div class="col-md-12">
                        <a class="btn btn-icon btn-outline-secondary btn-google btn-lg w-100" href="#">
                            <i class="ai-google fs-xl me-2"></i>
                            Google
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="w-50 bg-size-cover bg-repeat-0 bg-position-center mt-5" style="background-image: url(./assets/img/account/cover.jpg);"></div>
</div>

<?php include('./inc/footer.php') ?>