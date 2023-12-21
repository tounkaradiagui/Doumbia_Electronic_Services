<?php $title = "Paramètre"; include('../includes/header.php') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paramètre</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>
    <?php displayMessage(); ?>
    <div class="card shadow mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ajouter les informations de site web 
        </div>
        <div class="card-body">
            <form action="../../config/form.php" method="POST">
                <h5> <strong>Information de base</strong> </h5>
                <?php $setting = getDataById(1, 'settings'); ?>
                <input type="hidden" class="form-control" name="settingsId" value="<?= $setting['data']['id'] ?? 'insertData'; ?> "/>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <label for="title">Titre</label><br/>
                        <input type="text" class="form-control" name="title" value="<?= $setting['data']['title'] ?? ''; ?>"  required /><br/>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <label for="slug">Slug <i class="fas fa-user-lock"></i></label><br/>
                        <input type="text" class="form-control" name="slug" placeholder="Saisir le slug" value="<?= $setting['data']['slug'] ?? ""; ?>" required /><br/>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <label for="small_description">Courte Description</label><br/>
                        <input type="text" class="form-control" name="small_description" value="<?= $setting['data']['small_description'] ?? ''; ?>" required />
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label for="description">Description</label><br/>
                        <textarea type="text" class="form-control" name="description" value="" rows="5" placeholder="Saisir une Description" required ><?= $setting['data']['description'] ?? ''; ?></textarea>
                    </div>
                </div>

                <h5 class="mt-4"> <strong>Tag de référencement (SEO)</strong> </h5>

                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <label for="meta_title">Titre Meta</label><br/>
                        <input type="text" class="form-control" name="meta_title" value=" <?= $setting['data']['meta_title'] ?? ''; ?>" placeholder="Un titre de réferencement" required /><br/>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <label for="meta_description">Meta Description</label><br/>
                        <input type="text" class="form-control" name="meta_description" value="<?= $setting['data']['meta_description'] ?? ''; ?>" placeholder="Une description" required /><br/>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <label for="meta_keyword">Mots clés</label><br/>
                        <input type="text" class="form-control" name="meta_keyword" value="<?= $setting['data']['meta_keyword'] ?? ''; ?>" placeholder="Ajouter des mots clés" required />
                    </div>
                </div>

                <h5> <strong>Contact</strong> </h5>

                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <label for="address">Adresse</label><br/>
                        <input type="text" class="form-control" name="address" value="<?= $setting['data']['address'] ?? ''; ?>" placeholder="Saisir l'adresse de l'entreprise" required /><br/>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <label for="phone"> Numéro de Téléphone</label><br/>
                        <input type="text" class="form-control" name="phone" value="<?= $setting['data']['phone'] ?? ''; ?>" placeholder="Ajouter un numéro de téléphone professionnel" required /><br/>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <label for="email">Email Professionnel</label><br/>
                        <input type="email" class="form-control" name="email" value="<?= $setting['data']['email'] ?? ''; ?>" placeholder="Ajouter une adresse email professionnel" required />
                    </div>
                </div>
                
                <input type="submit" name="settings" class="btn btn-primary mt-2" value="Enregistrer"/>
                
            </form>
        </div>
    </div>
</div>
<?php include('../includes/footer.php') ?>