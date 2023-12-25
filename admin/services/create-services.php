<?php $title = "Mes Services";
include('../includes/header.php') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mes Services</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>
    <?php displayMessage(); ?>
    <div class="card shadow mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ajouter un service<a href="services.php" class="text-end btn btn-danger btn-sm float-right">Retour</a></h6>
        </div>
        
        <div class="card-body">
            <form action="../../config/form.php" method="POST" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <label for="title">Titre</label><br />
                        <input type="text" class="form-control" name="title" placeholder="Titre" required /><br />
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <label for="slug">Slug</label><br />
                        <input type="text" class="form-control" name="slug" placeholder="Saisir le slug" required /><br />
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <label for="image">Image</label><br />
                        <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="image" required /><br />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label for="description">Description</label><br />
                        <textarea type="text" class="form-control"  name="description" value="" rows="5" placeholder="Saisir une Description" required></textarea>
                    </div>
                </div>

                <h5 class="mt-4"> <strong>Tag de référencement (SEO)</strong> </h5>

                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <label for="meta_title">Titre Meta</label><br />
                        <input type="text" class="form-control" name="meta_title" placeholder="Un titre de réferencement" required /><br />
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label for="status">Statut</label><br />
                        <select name="status" id="" class="form-control">
                            <option>Selectionner un status</option>
                            <option value="visible">Visible</option>
                            <option value="masquer">Masquer</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <label for="meta_description">Meta Description</label><br />
                        <textarea type="text" class="form-control" name="meta_description" value="" rows="3" placeholder="Saisir une courte description" required></textarea>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label for="meta_keyword">Mots clés</label><br />
                        <textarea type="text" class="form-control" name="meta_keyword" value="" rows="3" placeholder="Ajouter des mots clés" required></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <input type="submit" name="createServices" class="btn btn-primary mt-2" value="Enregistrer" />
                </div>

            </form>
        </div>
    </div>
</div>
<?php include('../includes/footer.php') ?>