<?php include('../includes/header.php') ?>
<div class="container-fluid mt-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
        </div>

    <?php displayMessage(); ?>
    <div class="row">
        <div class="col-md-12">
            <h4>Filtrer la liste par date et par status</h4>
        </div>
        <div class="col-md-12">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-md-3">
                        <input type="date" required name="date" class="form-control" value="<?= isset($_GET['date']) == true ? $_GET['date'] : "" ?>">
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-control" required>
                            <option value="En cours" <?= isset($_GET['status']) == true ? ($_GET['status'] == "En cours" ? "selected" : "") : "" ?>>En cours</option>
                            <option value="En attente" <?= isset($_GET['status']) == true ? ($_GET['status'] == "En attente" ? "selected" : "") : "" ?>>En attente</option>
                            <option value="Terminé" <?= isset($_GET['status']) == true ? ($_GET['status'] == "Terminé" ? "selected" : "") : "" ?>>Terminé</option>
                            <option value="Annulé" <?= isset($_GET['status']) == true ? ($_GET['status'] == "Annulé" ? "selected" : "") : "" ?>>Annulé</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-primary btn-sm"> <i class="fas fa-check"></i> Appliquer le filtre</button>
                        <a href="lists-repair.php" type="submit" class="btn btn-danger ml-3 btn-sm"> <i class="fas fa-ban"></i> Annuler le filtre</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Gestion des réparations <a href="create-repair.php" class="text-end btn btn-success btn-sm float-right">Ajouter</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Type de dispositif</th>
                            <th>Date de réparation</th>
                            <th>Image</th>
                            <th>Prix de réparation</th>
                            <th>Status</th>
                            <th>Client</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if(isset($_GET['date']) && $_GET['date'] != "" && isset($_GET['status']) && $_GET['status'] != ""){

                                $query = getData('reparations');
                            }else{
                                $query = getData('reparations');
                            }

                        if (mysqli_num_rows($query) > 0) {
                            foreach ($query as $repair) {
                        ?>
                                <tr>
                                    <td> <?= $repair['id'] ?> </td>
                                    <td> <?= $repair['title'] ?> </td>
                                    <td> <?= $repair['type_dispositif'] ?> </td>
                                    <td> <?= $repair['date_reparation'] ?> </td>
                                    <td>
                                        <?php if (!empty($repair['image'])) : ?>
                                            <img src="../../config/images/<?= $repair['image'] ?>" alt="Image" style="max-width: 50px; max-height: 50px;">
                                        <?php else : ?>
                                            Aucune image
                                        <?php endif; ?>
                                    </td>
                                    <td> <?= $repair['cout_estime'] ?> </td>
                                    <td> <?= $repair['statut_reparation'] ?> </td>
                                    <td> <?= getClientName($repair['client_id']) ?> </td>
                                    <td>
                                        <a href="./edit-repair.php?id=<?= $repair['id'] ?>" class="btn btn-primary btn-sm" title="Modifier"><i class="fa fa-edit"></i></i></a>
                                    </td>
                                    <td>
                                        <a href="./delete-repair.php?id=<?= $repair['id'] ?>" onclick="return confirm('Voulez-vous supprimer cette réparation ?')" class="btn btn-danger btn-sm" title="Supprimer"><i class="fa fa-trash"></i></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="9">
                                    <h4>Aucun enregistrement dispobile </h4>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('../includes/footer.php') ?>