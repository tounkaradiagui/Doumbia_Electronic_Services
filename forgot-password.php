<?php $title = "Réinitialiser mon mot de passe";
include('./inc/header.php') ?>
<!-- Hero -->
<section class="bg-dark position-relative min-vh-10 overflow-hidden mb-4" data-bs-theme="dark">

</section>

    <div class="d-flex flex-column align-items-center position-relative h-100 px-3 pt-5 mt-5">
        <!-- Content -->
        <div class="mt-auto" style="max-width: 700px;">
            <h1 class="pt-3 pb-2 pb-lg-3">Mot de passe oublié ?</h1>
            <p class="pb-2">Changez votre mot de passe en trois étapes simples. 
                Cela permet de sécuriser votre nouveau mot de passe.
            </p>
            <ul class="list-unstyled pb-2 pb-lg-0 mb-4 mb-lg-5">
                <li class="d-flex mb-2">
                    <span class="text-primary fw-semibold me-2">1.</span>
                    Remplissez votre adresse e-mail ci-dessous.
                </li>
                <li class="d-flex mb-2">
                    <span class="text-primary fw-semibold me-2">2.</span>
                    Nous vous enverrons par e-mail un code temporaire.
                </li>
                <li class="d-flex mb-2">
                    <span class="text-primary fw-semibold me-2">3.</span>
                    Utilisez le code pour changer votre mot de passe sur notre site sécurisé.
                </li>
            </ul>
            <div class="card border-0 bg-primary" data-bs-theme="dark">
                <form class="card-body">
                    <div class="mb-4">
                        <div class="position-relative">
                            <i class="ai-mail fs-lg position-absolute top-50 start-0 translate-middle-y text-light opacity-80 ms-3"></i>
                            <input class="form-control form-control-lg ps-5" type="email" placeholder="Saisir votre adresse email" required>
                        </div>
                    </div>
                    <button class="btn btn-light" type="submit">Obtenir un nouveau mot de passe</button>
                </form>
            </div>
        </div>

    </div>

<?php include('./inc/footer.php') ?>