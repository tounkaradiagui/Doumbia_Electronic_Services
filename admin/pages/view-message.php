<?php include('../includes/header.php') ?>
<div class="container-fluid">

    <?php displayMessage(); ?>

    <?php
    if (isset($_GET['id'])) {
        $id = validate($_GET['id']);

        // Sélectionnez les détails du message en fonction de l'ID
        $query = "SELECT * FROM contact WHERE id = ?";
        $stmt = mysqli_prepare($connection, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && $message = mysqli_fetch_assoc($result)) {
    ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Lecture du message de
                            <span class="text-black">

                                <?= $message['nom'] ?> <?= $message['prenom'] ?>
                            </span>

                            <a href="messages.php" class="text-end btn btn-danger btn-sm float-right">Retour</a>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 flex-column">
                                    <h3>Message</h3>
                                    <span class="text-primary"><?= $message['message'] ?></span>
                                </div>
                                <div class="col-md-4 border-left-dark">
                                    <h3>Type de Service : <span class="text-primary">Neant</span> </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        Date de reception : <h6><?= $message['created_at'] ?></h6>
                    </div>
                </div>
    <?php
            } else {
                // Rediriger ou afficher un message si aucun résultat n'est trouvé
                redirect("./services.php", "Aucun message trouvé.");
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Erreur de préparation de la requête : " . mysqli_error($connection);
        }
    } else {
        // Rediriger ou afficher un message si l'ID n'est pas défini
        redirect("./services.php", "ID de message non spécifié.");
    } ?>
</div>
<?php include('../includes/footer.php') ?>