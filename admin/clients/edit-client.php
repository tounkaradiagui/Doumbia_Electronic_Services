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
                <h6 class="m-0 font-weight-bold text-primary">Modifier un utilisateur <a href="lists-client.php" class="text-end btn btn-danger btn-sm float-right">Retour</a></h6>
            </div>
            <div class="card-body">
                <!-- Form for users adding -->
                <form action="../../config/form.php" method="POST">
                    <?php
                        
                        $param = checkId('id');
                        if(!is_numeric($param)){
                            echo '<h5>'.$param.'</h5>';
                            return false;
                        }

                        $client = getDataById($param, 'clients');
                        if($client['status'] == 200){
                            ?>  
                                <input type="hidden" class="form-control" name="clientId" value="<?= $client['data']['id'];?>"/><br/>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <label for="nom">Nom</label><br/>
                                        <input type="text" class="form-control" value="<?= $client['data']['nom'];?>" name="nom" placeholder="Saisir le nom" required /><br/>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label for="prenom">Prénom</label><br/>
                                        <input type="text" class="form-control" value="<?= $client['data']['prenom'];?>" name="prenom" placeholder="Saisir le prénom" required /><br/>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                        <label for="email">Email</label><br/>
                                        <input type="email" class="form-control" value="<?= $client['data']['email'];?>" name="email" placeholder="Saisir l'adresse email" required /><br/>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label for="phone">Téléphone</label><br/>
                                        <input type="text" class="form-control" value="<?= $client['data']['phone'];?>" name="phone" placeholder="Saisir le numéro de Téléphone" required /><br/>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label for="address">Adresse</label><br/>
                                        <input type="text" class="form-control" value="<?= $client['data']['address'];?>" name="address" placeholder="Saisir la ville" required /><br/>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <input type="submit" name="updateClient" class="btn btn-success mt-4" value="Valider"/>
                                </div>
                            <?php
                        }else{
                            echo '<h5>'.$client['message'].'</h5>';
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>             
<?php include('../includes/footer.php')?>                    
