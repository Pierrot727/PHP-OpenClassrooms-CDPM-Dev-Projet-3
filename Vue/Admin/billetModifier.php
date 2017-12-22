<?php $this->menuActif = "Administration" ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"></h1>
    <div class="row placeholders">
        <div id="contenu">

            <h2>Modifier un billet existant</h2>
            <hr>

            <div class="col-sm-12 contact-form">
                <form id="modifierBillet" method="post" class="form" role="form">
                    <div class="row">
                        <div class="col-xs-4 col-md-4 form-group">
                            <label>Date</label>
                            <input class="form-control" id="dateBillet" name="dateBillet"
                                   placeholder="Entrez la date de ce billet" type="text" value="<?= $billet['date'] ?>"
                                   required autofocus/>
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                            <label>Titre</label>
                            <input class="form-control" id="titreBillet" name="titreBillet"
                                   placeholder="Entrez votre titre" type="text" value="<?= $billet['titre'] ?>"
                                   required/>
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                            <label>Image</label>
                            <input class="form-control" id="imageBillet" name="imageBillet"
                                   placeholder="Entrez le nom exacte de la photo (sans suffixe)" type="text" value="<?= $billet['photo'] ?>"/>
                        </div>
                    </div>
                    <label>Contenu du billet</label>
                    <textarea class="form-control" rows="20" id="tiny" name="contenuBillet" placeholder="Le texte">
                        <?= $billet['contenu'] ?>
                    </textarea>
                    <br/>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 form-group">
                            <button class="btn btn-primary pull-right" type="submit">Modifier le billet</button>
                        </div>
                    </div>
                </form>

                <script>
                    tinymce.init({
                        selector: '#tiny',
                        language: 'fr_FR'
                    });
                </script>

                <?php if (isset($msgErreur)): ?>
                    <p><?= $msgErreur ?></p>
                <?php endif; ?>

                <hr>
            </div>
        </div>
    </div>

