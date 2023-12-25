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
                <?php

                    $param = checkId('id');
                    if (!is_numeric($param)) {
                        echo '<h5>' . $param . '</h5>';
                        return false;
                    }

                    $service = getDataById($param, 'activites');
                    if ($service['status'] == 200) {
                    ?>
                <input type="hidden" class="form-control" name="serviceId" value="<?= $service['data']['id']; ?>" /><br />
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <label for="title">Titre</label><br />
                        <input type="text" class="form-control" name="title" value="<?= $service['data']['title']; ?>" placeholder="Titre" required /><br />
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <label for="slug">Slug</label><br />
                        <input type="text" class="form-control" name="slug" value="<?= $service['data']['slug']; ?>" placeholder="Saisir le slug" required /><br />
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <label for="image">Image</label><br />
                        <input type="file" name="image" accept=".jpg,.png,.jpeg"><br /><br />
                        <?php if (!empty($service['data']['image'])) : ?>
                            <img src="../../config/images/<?= $service['data']['image'] ?>" alt="Image actuelle" style="max-width: 200px; max-height: 200px;"><br />
                        <?php else : ?>
                            <p>Aucune image disponible</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label for="description">Description</label><br />
                        <textarea type="text" class="form-control" name="description" value="<?= $service['data']['description']; ?>" rows="5" placeholder="Saisir une Description" required><?= $service['data']['description']; ?></textarea>
                    </div>
                </div>

                <h5 class="mt-4"> <strong>Tag de référencement (SEO)</strong> </h5>

                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <label for="meta_title">Titre Meta</label><br />
                        <input type="text" class="form-control" name="meta_title" value="<?= $service['data']['meta_title']; ?>" placeholder="Un titre" required /><br />
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <label for="status">Status</label><br />
                        <select name="status" id="" class="form-control">
                            <option>Selectionner un Status</option>
                            <option value="visible" <?= $service['data']['status'] == 'visible' ? "selected" : ""; ?>>Visible</option>
                            <option value="masquer" <?= $service['data']['status'] == 'masquer' ? "selected" : ""; ?>>Masquer</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <label for="meta_description">Meta Description</label><br />
                        <textarea type="text" class="form-control" name="meta_description" value="<?= $service['data']['meta_description']; ?>" rows="5" placeholder="Saisir une courte Description" required><?= $service['data']['meta_description']; ?></textarea>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label for="meta_keyword">Mots clés</label><br />
                        <textarea type="text" class="form-control" name="meta_keyword" value="<?= $service['data']['meta_keyword']; ?>" rows="5" placeholder="Saisir une courte Description" required><?= $service['data']['meta_keyword']; ?></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <input type="submit" name="updateServices" class="btn btn-primary mt-2" value="Enregistrer" />
                </div>
                <?php
                } else {
                    echo '<h5>' . $repair['message'] . '</h5>';
                }
                ?>
            </form>
        </div>
    </div>
</div>
<?php include('../includes/footer.php') ?>