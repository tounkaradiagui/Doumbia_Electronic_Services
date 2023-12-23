<?php include('../includes/header.php')?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
        </div>
        
        <?php displayMessage(); ?>
        <!-- DataTales for users management-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Gestion de réseaux sociaux <a href="../pages/create-social-media.php" class="text-end btn btn-success btn-sm float-right">Ajouter</a></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>URL</th>
                                <th>Statut</th>
                                <th colspan="2" >Actions</th>
                            </tr>
                            
                        </thead>
                        
                        <tbody>
                            <?php
                                $query = getData('social_medias');
                                if(mysqli_num_rows($query) > 0)
                                {
                                    foreach ($query as $sm) {
                                        ?>
                                            <tr>
                                                <td> <?= $sm['nom']?> </td>
                                                <td> <?= $sm['url']?> </td>
                                                <td> <?= $sm['status']?> </td>
                                                <td> 
                                                    <a href="./edit-social-media.php?id=<?= $sm['id']?>" class="btn btn-primary btn-sm" title="Modifier"><i class="fa fa-edit"></i></i></a>
                                                </td>
                                                <td> 
                                                    <a href="./delete-social-media.php?id=<?= $sm['id']?>" onclick="return confirm('Voulez-vous supprimer ce réseau social ?')" class="btn btn-danger btn-sm" title="Supprimer"><i class="fa fa-trash"></i></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }else{
                                    ?>
                                        <tr>
                                            <h4>Aucun enregistrement dispobile </h4>
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
