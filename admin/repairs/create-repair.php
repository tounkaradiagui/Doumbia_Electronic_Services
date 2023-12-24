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
            <h6 class="m-0 font-weight-bold text-primary">Ajout d'une réparation <a href="lists-repair.php" class="text-end btn btn-danger btn-sm float-right">Retour</a></h6>
        </div>
        <div class="card-body">
            <form action="../../config/form.php" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <label for="title">Titre</label><br />
                        <input type="text" class="form-control" name="title" placeholder="Saisir le titre" required /><br />
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <label for="type_dispositif">Type de dispositif</label><br />
                        <select name="type_dispositif" id="" class="form-control">
                            <option>Selectionner un type dispositif</option>
                            <option value="phone">Téléphone</option>
                            <option value="tablette">Tablette</option>
                            <option value="ordinateur">Ordinateur</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <label for="date_reparation">Date</label><br />
                        <input type="date" class="form-control" name="date_reparation" required /><br />
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <label for="description_probleme">Description du problème</label><br />
                        <textarea type="text" class="form-control" name="description_probleme" placeholder="Expliquez en quelques mots le problème lié à ce dispositif" required></textarea>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <label for="image">image</label><br />
                        <input type="file" class="form-control" name="image" required /><br />
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-4 col-xs-12">
                        <label for="cout_estime">Coût estimé</label><br />
                        <input type="text" class="form-control" name="cout_estime" placeholder="Saisir le prix de réparation" required /><br />
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <label for="statut_reparation">Status</label><br />
                        <select name="statut_reparation" id="" class="form-control">
                            <option>Selectionner un status</option>
                            <option value="En attente">En attente</option>
                            <option value="En cours">En cours</option>
                            <option value="Terminé">Terminé</option>
                            <option value="Annulé">Annulé</option>
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
                                    <option value="<?= $client['id'] ?>"><?= $client['nom'] ?> <?= $client['prenom'] ?></option>
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
                    <input type="submit" name="createRepair" class="btn btn-primary mt-2" value="Enregistrer" />
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('../includes/footer.php') ?>