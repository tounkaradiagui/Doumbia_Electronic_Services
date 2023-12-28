<?php $title = "Inscription";
include('./inc/header.php') ;

if(isset($_SESSION['auth'])){
    redirect('./index.php', "Vous êtes déjà connecté !");
}else{
    
}

?>
<!-- Hero -->
<section class="bg-dark position-relative min-vh-10 overflow-hidden mb-4" data-bs-theme="dark">

</section>
<div class="d-lg-flex position-relative h-100">
    <!-- Sign up form -->

    
    <div class="d-flex flex-column align-items-center w-lg-50 h-100 px-3 px-lg-5 pt-5">
        <div class="w-100 mt-auto" style="max-width: 526px;">
            <h1>Création de votre compte</h1>
            <?php displayMessage(); ?>
            <p class="pb-3 mb-3 mb-lg-4">Vous avez déjà un compte ?&nbsp;&nbsp;<a href="./login.php">Se connecter ici !</a></p>
            
            <form class="needs-validation" novalidate action="./config/auth-form.php" method="POST">
                <div class="row row-cols-1 row-cols-sm-2">
                    <div class="col mb-4">
                        <input class="form-control form-control-lg" type="text" name="nom" placeholder="Nom">
                    </div>
                    <div class="col mb-4">
                        <input class="form-control form-control-lg" type="text" name="prenom" placeholder="Prénom">
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-sm-2">
                    <div class="col mb-4">
                        <input class="form-control form-control-lg" type="text" name="phone" placeholder="Numéro de Téléphone">
                    </div>
                    <div class="col mb-4">
                        <input class="form-control form-control-lg" type="email" name="email" placeholder="Adresse email">
                    </div>
                </div>
                <div class="password-toggle mb-4">
                    <input class="form-control form-control-lg" type="password" name="password" placeholder="Mot de passe">
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox">
                        <span class="password-toggle-indicator"></span>
                    </label>
                </div>
                <div class="password-toggle mb-4">
                    <input class="form-control form-control-lg" type="password" name="password_confirmation" placeholder="Confirmer le mot de passe">
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox">
                        <span class="password-toggle-indicator"></span>
                    </label>
                </div>
                <div class="pb-4">
                    <div class="form-check my-2">
                        <input class="form-check-input" type="checkbox" name="terms" id="terms">
                        <label class="form-check-label ms-1" for="terms">J'accepte les <a href="#">Termes &amp; Conditions</a></label>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary w-100 mb-4" name="register" type="submit">Poursuivre</button>

                <h2 class="h6 text-center pt-3 pt-lg-4 mb-4">Ou s'inscrire avec google</h2>
                <div class="row row-cols-1 row-cols-sm-2 gy-3 mb-4">
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