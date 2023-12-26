<?php include('../includes/header.php')?>
    <div class="container-fluid">
                
        <?php displayMessage(); ?>
     
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Messages reçu 
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Date de réception</th>
                                <th colspan="2" >Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                $query = getData('contact');
                                if(mysqli_num_rows($query) > 0)
                                {
                                    foreach ($query as $message) {
                                        ?>
                                            <tr>
                                                <td> <?= $message['nom']?> </td>
                                                <td> <?= $message['prenom']?> </td>
                                                <td> <?= $message['phone']?> </td>
                                                <td> <?= $message['email']?> </td>
                                                <td> <span class="fa fa-badge-danger"><?= $message['created_at']?></span></td>
                                                <td> 
                                                    <a href="./view-message.php?id=<?= $message['id']?>" class="btn btn-primary btn-sm" title="Voir le message"><i class="fa fa-eye"></i></i></a>
                                                </td>
                                                <td> 
                                                    <a href="./delete-message.php?id=<?= $message['id']?>" onclick="return confirm('Voulez-vous archiver ce message ?')" class="btn btn-danger btn-sm" title="Archiver"><i class="fa fa-trash"></i></i></a>
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
