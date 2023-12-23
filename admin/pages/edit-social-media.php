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
                <h6 class="m-0 font-weight-bold text-primary">Modifier un réseau social <a href="../pages/lists-social-media.php" class="text-end btn btn-danger btn-sm float-right">Retour</a></h6>
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

                        $sm = getDataById($param, 'social_medias');
                        if($sm['status'] == 200){
                            ?>  
                                <input type="hidden" class="form-control" name="smId" value="<?= $sm['data']['id'];?>"/><br/>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <label for="nom">Nom</label><br/>
                                        <input type="text" class="form-control" value="<?= $sm['data']['nom'];?>" name="nom" required /><br/>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label for="url">URL</label><br/>
                                        <input type="text" class="form-control" value="<?= $sm['data']['url'];?>" name="url" required /><br/>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label for="status">Status</label><br/>
                                        <select value="" name="status" id="" class="form-control">
                                            <option>Choisir un status</option>
                                            <option value="visible" <?= $sm['data']['status'] == 'visible' ? "selected" : "";?> >Actif</option>
                                            <option value="masquer"  <?= $sm['data']['status'] == 'masquer' ? "selected" : "";?> >Désactiver</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mt-4">
                                    <input type="submit" name="updateSM" class="btn btn-success mt-4" value="Valider"/>
                                </div>
                            <?php
                        }else{
                            echo '<h5>'.$sm['message'].'</h5>';
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>             
<?php include('../includes/footer.php')?>                    
