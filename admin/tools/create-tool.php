<?php include('../includes/header.php') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ajout d'un matériel de réparation <a href="lists-tool.php" class="text-end btn btn-danger btn-sm float-right">Retour</a></h6>
        </div>
        <div class="card-body">
            <form action="../../config/form.php" method="POST">

                <div class="row">

                    <div class="col-md-4 col-xs-12">
                        <label for="numero_serie">Numéro Serie</label><br />
                        <input type="text" class="form-control" name="numero_serie" placeholder="828377283992D" required /><br />
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <label for="modele">Modèle</label><br />
                        <input type="text" class="form-control" name="modele" placeholder="Samsung Galxay" required /></i>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <label for="reparation_id">Titre de la réparation</label><br />
                        <select name="reparation_id" id="" class="form-control">
                            <option>Choisir un titre</option>
                            <?php
                            $query = getToolsName('reparations');
                            if ($query) {
                                foreach ($query as $tool) {
                            ?>
                                    <option value="<?= $tool['id'] ?>"><?= $tool['title'] ?> </option>
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

                <div class="row mt-3">
                    <input type="submit" name="createTool" class="btn btn-primary mt-2" value="Enregistrer" />
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('../includes/footer.php') ?>