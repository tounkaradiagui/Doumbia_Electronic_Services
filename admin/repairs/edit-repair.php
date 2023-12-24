<?php include('../includes/header.php') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- DataTales for users management-->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mettre à jour une réparation <a href="lists-repair.php" class="text-end btn btn-danger btn-sm float-right">Retour</a></h6>
        </div>
        <div class="card-body">
            <!-- Form for users adding -->
            <form action="../../config/form.php" method="POST" enctype="multipart/form-data">
                <?php

                $param = checkUserId('id');
                if (!is_numeric($param)) {
                    echo '<h5>' . $param . '</h5>';
                    return false;
                }

                $repair = getDataById($param, 'reparations');
                if ($repair['status'] == 200) {
                ?>
                    <input type="hidden" class="form-control" name="id" value="<?= $repair['data']['id']; ?>" /><br />
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <label for="title">Titre</label><br />
                            <input type="text" class="form-control" name="title" value="<?= $repair['data']['title']; ?>" required /><br />
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label for="type_dispositif">Type de dispositif</label><br />
                            <select name="type_dispositif" id="" class="form-control">
                                <option>Selectionner un type de dispositif</option>
                                <option value="phone" <?= $repair['data']['type_dispositif'] == 'phone' ? "selected" : ""; ?>>Téléphone</option>
                                <option value="tablette" <?= $repair['data']['type_dispositif'] == 'tablette' ? "selected" : ""; ?>>Tablette</option>
                                <option value="ordinateur" <?= $repair['data']['type_dispositif'] == 'ordinateur' ? "selected" : ""; ?>>Ordinateur</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label for="date_reparation">Date</label><br />
                            <input type="date" class="form-control" value="<?= $repair['data']['date_reparation'] ?>" name="date_reparation" /><br />
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-8 col-xs-12">
                            <label for="description_probleme">Description du problème</label><br />
                            <textarea type="text" class="form-control" value="<?= $repair['data']['description_probleme']; ?>" name="description_probleme" placeholder="Expliquez en quelques mots le problème lié à ce dispositif" required>
                             <?= $repair['data']['description_probleme']; ?> 
                            </textarea>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label for="image">Image</label><br />
                            <input type="file" name="image" accept=".jpg,.png,.jpeg"><br /><br />
                            <?php if (!empty($repair['data']['image'])) : ?>
                                <img src="../../config/images/<?= $repair['data']['image'] ?>" alt="Image actuelle" style="max-width: 200px; max-height: 200px;"><br />
                            <?php else : ?>
                                <p>Aucune image disponible</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-4 col-xs-12">
                            <label for="cout_estime">Coût estimé</label><br />
                            <input type="text" class="form-control" name="cout_estime" value="<?= $repair['data']['cout_estime']; ?>" placeholder="Saisir le prix de réparation" required /><br />
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label for="statut_reparation">Status</label><br />
                            <select name="statut_reparation" id="" class="form-control">
                                <option>Selectionner un status</option>
                                <option value="En attente" <?= $repair['data']['statut_reparation'] == 'En attente' ? "selected" : ""; ?>>En attente</option>
                                <option value="En cours" <?= $repair['data']['statut_reparation'] == 'En cours' ? "selected" : ""; ?>>En cours</option>
                                <option value="Terminé" <?= $repair['data']['statut_reparation'] == 'Terminé' ? "selected" : ""; ?>>Terminé</option>
                                <option value="Annulé" <?= $repair['data']['statut_reparation'] == 'Annulé' ? "selected" : ""; ?>>Annulé</option>
                            </select>
                        </div>

                        <div class="col-md-4 col-xs-12">
                            <label for="client_id">Client</label><br />
                            <select name="client_id" id="" class="form-control">
                                <option>Choisir un client</option>
                                <?php
                                $query = getClientData('clients');
                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $client) {
                                ?>
                                        <option value="<?= $client['id'] ?>" <?= $client['id'] ? "selected" : ""; ?>><?= $client['nom'] ?> <?= $client['prenom'] ?></option>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <option>Aucun client</option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>


                    </div>
                    <div class="row">
                        <input type="submit" name="updateRepair" class="btn btn-primary mt-2" value="Enregistrer" />
                    </div>
                <?php
                } else {
                    echo '<h5>' . $repair['message'] . '</h5>';
                }
                ?>
            </form>
        </div>
    </div>
</div>
<?php include('../includes/footer.php') ?>