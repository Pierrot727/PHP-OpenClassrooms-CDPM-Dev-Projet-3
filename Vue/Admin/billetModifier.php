<?php $this->menuActif = "Administration" ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"></h1>
    <div class="row placeholders">
        <div id="contenu">

            <h2>Modifier un billet existant</h2>


            <div class="col-sm-8 contact-form">
                <form id="contact" method="post" class="form" role="form">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 form-group">
                            <input class="form-control" id="name" name="dateBillet" placeholder="Entrez la date de ce billet" type="text" value="<?= $billet['date'] ?>" required autofocus/>
                        </div>
                        <div class="col-xs-6 col-md-6 form-group">
                            <input class="form-control" id="email" name="titreBillet" placeholder="Entrez votre le titre" type="text" value="<?= $billet['titre'] ?>" required/>
                        </div>
                    </div>
                    <textarea class="form-control" id="tiny" name="contenuBillet" placeholder="Le texte" rows="5"><?= $billet['contenu'] ?>
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

