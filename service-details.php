<?php include('./inc/header.php') ?>
<section class="container py-5 my-sm-2 my-md-4 my-lg-5" id="services">
  <div class="row">
    <?php
    if (isset($_GET['slug'])) {
      $slug = validate($_GET['slug']);

      if ($slug != '') {
        // Utilisation de requêtes préparées pour éviter les attaques SQL
        $serviceSlug = "SELECT * FROM activites WHERE status = 'visible' AND slug = ? AND deleted = '0'";
        $stmt = mysqli_prepare($connection, $serviceSlug);
        mysqli_stmt_bind_param($stmt, "s", $slug);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && $countService = mysqli_fetch_assoc($result)) {
    ?>
          <div class="col-md-12 pb-4">
            <h2 class="mb-3 h3 font-weight-normal text-start">Détails du Services</h2>
          </div>
          <div class="col-md-7 mb-3">
            <div class="card shadow h-100 d-flex flex-column">
              <div class="card-header">
                <h6 class="card-title"><?= $countService['title'] ?></h6>
              </div>
              <?php if (!empty($countService['image'])) : ?>
                <img src="./config/images/<?= $countService['image'] ;?>" class="card-img-top" alt="Image" />
              <?php else : ?>
                Aucune image
              <?php endif; ?>
              <div class="card-body flex-grow-1">
                <div class="row">
                  <div class="col-md-12">
                    <p class="fs-4 fw-normal lh-base">
                      <?= $countService['meta_description'] ;?>
                    </p>
                  </div>
                </div>

              </div>
              <div class="card-footer">
                <span class="small text-muted">Date de publication : <?= formatDate($countService['updated_at']) ?></span>
              </div>
            </div>
          </div>

          <div class="col-md-5 mb-3 sticky">
            <div class="card shadow h-100 d-flex flex-column">
              <div class="card-header">
                <h6 class="card-title"><?= $countService['title'] ?></h6>
              </div>
             
              <div class="card-body flex-grow-1">
                <form action="./config/form.php" method="POST">
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      <label for="nom">Nom</label><br />
                      <input type="text" class="form-control" name="nom" placeholder="Saisir votre nom" required /><br />
                    </div>
                    <div class="col-md-12 col-xs-12">
                      <label for="prenom">Prénom</label><br />
                      <input type="text" class="form-control" name="prenom" placeholder="Prénom" required /><br />
                    </div>
                    <div class="col-md-12 col-xs-12">
                      <label for="service_type">Service</label><br />
                      <input type="text" class="form-control" name="service_type" value="<?= $countService['title'] ?>" readonly required /><br />
                    </div>
                    <div class="col-md-12 col-xs-12">
                      <label for="phone">Numéro de Téléphone</label><br />
                      <input type="text" class="form-control" name="phone" placeholder="Votre numéro joignable" required /><br />
                    </div>
                    <div class="col-md-12 col-xs-12">
                      <label for="message">Message</label><br />
                      <textarea type="text" class="form-control" rows="10" name="message" placeholder="Ecrire votre message ici !" required ></textarea>
                    </div>
  
                    <div class="col-md-12 col-xs-12 mt-4">
                      <input type="submit" value="Envoyer" class="btn btn-primary" name="submitMessage">
                    </div>
                    
                  </div>               
                </form>

              </div>
            </div>
          </div>
    <?php
        } else {
          // Rediriger si aucune correspondance n'est trouvée
          redirect("services.php", '');
        }
      } else {
        // Rediriger si le slug est vide
        redirect("services.php", '');
      }
    }
    ?>
  </div>

</section>

<!-- Light / Dark mode (Comparison slider) -->
<section class="d-flex w-100 position-relative overflow-hidden">

  <div class="position-absolute top-0 start-0 w-50 h-100 bg-dark"></div>
  <div class="position-absolute top-0 end-0 w-50 h-100" style="background-color: #f6f9fc;"></div>


</section>


<?php include('./inc/footer.php') ?>