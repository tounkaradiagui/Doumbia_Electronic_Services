<?php include('../includes/header.php') ?>
<div class="container-fluid">

    <?php displayMessage(); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Gestion des matériels de réparations <a href="create-tool.php" class="text-end btn btn-success btn-sm float-right">Ajouter</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Réparation</th>
                            <th>Numéro de série</th>
                            <th>Modèle</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $query = getData('equipements');
                        if (mysqli_num_rows($query) > 0) {
                            foreach ($query as $tool) {
                        ?>
                                <tr>
                                    <td> <?= getToolTitle($tool['reparation_id']) ?> </td>
                                    <td> <?= $tool['numero_serie'] ?> </td>
                                    <td> <?= $tool['modele'] ?> </td>
                                    <td>
                                        <a href="./edit-tool.php?id=<?= $tool['id'] ?>" class="btn btn-primary btn-sm" title="Modifier"><i class="fa fa-edit"></i></i></a>
                                    </td>
                                    <td>
                                        <a href="./delete-tool.php?id=<?= $tool['id'] ?>" onclick="return confirm('Voulez-vous supprimer cette équipement ?')" class="btn btn-danger btn-sm" title="Supprimer"><i class="fa fa-trash"></i></i></a>
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