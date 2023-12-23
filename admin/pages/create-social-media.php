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
                <h6 class="m-0 font-weight-bold text-primary">Ajout d'un réseau social <a href="./lists-social-media.php" class="text-end btn btn-danger btn-sm float-right">Retour</a></h6>
            </div>
            <div class="card-body">
                <form action="../../config/form.php" method="POST">
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <label for="nom">Nom</label><br/>
                            <input type="text" class="form-control" name="nom" placeholder="Saisir le nom" required /><br/>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label for="prenom">URL</label><br/>
                            <input type="text" class="form-control" name="url" placeholder="URL" required /><br/>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label for="status">Status</label><br/>
                            <select name="status" id="" class="form-control">
                                <option>Choisir un status</option>
                                <option value="visible">Visible</option>
                                <option value="masquer">Masquer</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-xs-12">
                        <input type="submit" name="createSM" class="btn btn-primary mt-2" value="Enregistrer"/>
                    </div>
                </form>
            </div>
        </div>
    </div>             
<?php include('../includes/footer.php')?>                    
