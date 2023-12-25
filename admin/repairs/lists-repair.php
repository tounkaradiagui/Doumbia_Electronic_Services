<?php include('../includes/header.php') ?>
<div class="container-fluid">

    <?php displayMessage(); ?>

    <div class="card shadow mb-4">
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
                        $query = getData('reparations');
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