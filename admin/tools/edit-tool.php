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
            <h6 class="m-0 font-weight-bold text-primary">Mettre à jour une réparation <a href="lists-tool.php" class="text-end btn btn-danger btn-sm float-right">Retour</a></h6>
        </div>
        <div class="card-body">
            <!-- Form for users adding -->
            <form action="../../config/form.php" method="POST">
                <?php

                $param = checkId('id');
                if (!is_numeric($param)) {
                    echo '<h5>' . $param . '</h5>';
                    return false;
                }

                $tool = getDataById($param, 'equipements');
                if ($tool['status'] == 200) {
                ?>
                    <input type="hidden" class="form-control" name="toolId" value="<?= $tool['data']['id']; ?>" /><br />
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <label for="numero_serie">Numéro Serie</label><br />
                            <input type="text" class="form-control" name="numero_serie" value="<?= $tool['data']['numero_serie']; ?>" placeholder="828377283992D" required /><br />
                        </div>

                        <div class="col-md-4 col-xs-12">
                            <label for="modele">Modèle</label><br />
                            <input type="text" class="form-control" name="modele" placeholder="Samsung Galxay" value="<?= $tool['data']['modele']; ?>" required /></i>
                        </div>

                        <div class="col-md-4 col-xs-12">
                            <label for="reparation_id">Titre de la réparation</label><br />
                            <select name="reparation_id" id="" class="form-control">
                                <option>Choisir un titre correspondant</option>
                                <?php
                                $query = getData('reparations');
                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $tool) {
                                ?>
                                        <option value="<?= $tool['id']; ?>" <?= $tool['id']  ? "selected" : ""; ?>> <?= $tool['title']; ?> </option>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <option>Aucun matériel</option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                    </div>

                    <div class="row mt-4">
                        <input type="submit" name="updateTool" class="btn btn-success mt-4" value="Valider" />
                    </div>
                <?php
                } else {
                    echo '<h5>' . $tool['message'] . '</h5>';
                }
                ?>
            </form>
        </div>
    </div>
</div>
<?php include('../includes/footer.php') ?>