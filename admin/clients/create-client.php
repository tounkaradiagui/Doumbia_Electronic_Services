<?php include('../includes/header.php')?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ajout d'un client <a href="lists-client.php" class="text-end btn btn-danger btn-sm float-right">Retour</a></h6>
            </div>
            <div class="card-body">
                <form action="../../config/form.php" method="POST">
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <label for="nom">Nom</label><br/>
                            <input type="text" class="form-control" name="nom" placeholder="Saisir le nom" required /><br/>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label for="prenom">Prénom</label><br/>
                            <input type="text" class="form-control" name="prenom" placeholder="Saisir le prénom" required /><br/>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label for="email">Email</label><br/>
                            <input type="email" class="form-control" name="email" placeholder="Saisir l'adresse email" required /><br/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <label for="phone">Téléphone</label><br/>
                            <input type="text" class="form-control" name="phone" placeholder="Saisir le numéro de Téléphone" required /><br/>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <label for="address">Adresse</label><br/>
                            <input type="text" class="form-control" name="address" placeholder="Saisir la ville" required /><br/>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" name="createClient" class="btn btn-primary mt-2" value="Enregistrer"/>
                    </div>
                </form>
            </div>
        </div>
    </div>             
<?php include('../includes/footer.php')?>                    
