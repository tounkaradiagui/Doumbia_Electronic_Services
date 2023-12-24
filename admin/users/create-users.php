<?php include('../includes/header.php')?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
        </div>

        <!-- DataTales for users management-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ajout d'un utilisateur <a href="users.php" class="text-end btn btn-danger btn-sm float-right">Retour</a></h6>
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
                        <div class="col-md-4 col-xs-12">
                            <label for="phone">Téléphone</label><br/>
                            <input type="text" class="form-control" name="phone" placeholder="Saisir le numéro de Téléphone" required /><br/>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label for="address">Adresse</label><br/>
                            <input type="text" class="form-control" name="address" placeholder="Saisir la ville" required /><br/>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label for="role">Rôle</label><br/>
                            <select name="role" id="" class="form-control">
                                <option>Affecter un rôle</option>
                                <option value="admin">Administrateur</option>
                                <option value="employe">Employer</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <label for="password">Mot de passe</label><br/>
                            <input type="password" class="form-control" name="password" placeholder="Saisir le le mot de passe" required /><br/>
                        </div>
                        <!-- <div class="col-md-4 col-xs-12">
                            <label for="password_confirmation">Confirmé le mot de passe</label><br/>
                            <input type="text" class="form-control" name="password_confirmation" placeholder="Confirmé" required /><br/>
                        </div> -->
                        <div class="col-md-4 col-xs-12">
                            <label for="status">Status</label><br/>
                            <select name="status" id="" class="form-control">
                                <option>Choisir un status</option>
                                <option value="active">Actif</option>
                                <option value="inactive">Désactiver</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label for="client_id">Client</label><br/>
                            <select name="client_id" id="" class="form-control">
                                <option value="inactive">Désactiver</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="createUser" class="btn btn-primary mt-2" value="Enregistrer"/>
                 
                </form>
            </div>
        </div>
    </div>             
<?php include('../includes/footer.php')?>                    
