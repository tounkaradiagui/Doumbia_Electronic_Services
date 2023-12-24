<?php include('../includes/header.php')?>
    <div class="container-fluid">
                
        <?php displayMessage(); ?>
     
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Gestion des clients <a href="create-client.php" class="text-end btn btn-success btn-sm float-right">Ajouter</a></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Adresse</th>
                                <th>Date de Création</th>
                                <th colspan="2" >Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                $query = getData('clients');
                                if(mysqli_num_rows($query) > 0)
                                {
                                    foreach ($query as $client) {
                                        ?>
                                            <tr>
                                                <td> <?= $client['nom']?> </td>
                                                <td> <?= $client['prenom']?> </td>
                                                <td> <?= $client['email']?> </td>
                                                <td> <?= $client['phone']?> </td>
                                                <td> <?= $client['address']?> </td>
                                                <td> <span class="fas fa-badge-danger"><?= $client['created_at']?></span></td>
                                                <td> 
                                                    <a href="./edit-client.php?id=<?= $client['id']?>" class="btn btn-primary btn-sm" title="Modifier"><i class="fa fa-edit"></i></i></a>
                                                </td>
                                                <td> 
                                                    <a href="./delete-client.php?id=<?= $client['id']?>" onclick="return confirm('Voulez-vous supprimer ce client ?')" class="btn btn-danger btn-sm" title="Supprimer"><i class="fa fa-trash"></i></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }else{
                                    ?>
                                        <tr >
                                            <td colspan="7">
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
<?php include('../includes/footer.php')?>                    
