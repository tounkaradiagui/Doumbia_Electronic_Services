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
                <h6 class="m-0 font-weight-bold text-primary">Modifier un utilisateur <a href="users.php" class="text-end btn btn-danger btn-sm float-right">Retour</a></h6>
            </div>
            <div class="card-body">
                <!-- Form for users adding -->
                <form action="../../config/form.php" method="POST">
                    <?php
                        
                        $param = checkUserId('id');
                        if(!is_numeric($param)){
                            echo '<h5>'.$param.'</h5>';
                            return false;
                        }

                        $user = getUserById($param, 'users');
                        if($user['status'] == 200){
                            ?>  
                                <input type="hidden" class="form-control" name="userId" value="<?= $user['data']['id'];?>"/><br/>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <label for="nom">Nom</label><br/>
                                        <input type="text" class="form-control" value="<?= $user['data']['nom'];?>" name="nom" placeholder="Saisir le nom" required /><br/>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label for="prenom">Prénom</label><br/>
                                        <input type="text" class="form-control" value="<?= $user['data']['prenom'];?>" name="prenom" placeholder="Saisir le prénom" required /><br/>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                        <label for="email">Email</label><br/>
                                        <input type="email" class="form-control" value="<?= $user['data']['email'];?>" name="email" placeholder="Saisir l'adresse email" required /><br/>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label for="phone">Téléphone</label><br/>
                                        <input type="text" class="form-control" value="<?= $user['data']['phone'];?>" name="phone" placeholder="Saisir le numéro de Téléphone" required /><br/>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label for="address">Adresse</label><br/>
                                        <input type="text" class="form-control" value="<?= $user['data']['address'];?>" name="address" placeholder="Saisir la ville" required /><br/>
                                    </div>
                                </div>
            
                                <div class="row">
                                    
                                    <div class="col-md-6 col-xs-12">
                                        <label for="role">Rôle</label><br/>
                                        <select value="" name="role" id="" class="form-control">
                                            <option>Affecter un rôle</option>
                                            <option value="admin" <?= $user['data']['role'] == 'admin' ? "selected" : "";?> >Administrateur</option>
                                            <option value="client" <?= $user['data']['role'] == 'client' ? "selected" : "";?> >Client</option>
                                        </select>
                                    </div>
                                  
                                    <div class="col-md-6 col-xs-12">
                                        <label for="status">Status</label><br/>
                                        <select value="" name="status" id="" class="form-control">
                                            <option>Choisir un status</option>
                                            <option value="active" <?= $user['data']['status'] == 'active' ? "selected" : "";?> >Actif</option>
                                            <option value="inactive"  <?= $user['data']['status'] == 'inactive' ? "selected" : "";?> >Désactiver</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <input type="submit" name="update" class="btn btn-success mt-4" value="Valider"/>
                                </div>
                            <?php
                        }else{
                            echo '<h5>'.$user['message'].'</h5>';
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>             
<?php include('../includes/footer.php')?>                    
