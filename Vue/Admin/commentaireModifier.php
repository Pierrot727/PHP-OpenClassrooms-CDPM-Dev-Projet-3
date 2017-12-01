<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">

        <li><a id="lienDashboard" href="admin/"><img src="Contenu/images/symbol/dashboard.png"
                                                     alt="Panneau de modération"
                                                     title="Panneau de modération"> Tableau de
                bord</a></li>
        <li class="active"><a id="lienAdministration" href="admin/administration"><img
                    src="Contenu/images/symbol/admin.png"
                    alt="Panneau d'administration"
                    title="Panneau d'administration"> Administration</a><span class="sr-only">(current)</span></li>
        <li><a id="lienModeration" href="admin/moderation"><img src="Contenu/images/symbol/moderer.png"
                                                                alt="Panneau de modération"
                                                                title="Panneau de modération"> Panneau de
                modération</a></li>
        <li><a id="lienUtilisateurs" href="admin/utilisateurs"><img src="Contenu/images/symbol/user.png"
                                                                    alt="Panneau de gestion utilisateur"
                                                                    title="Gestion utilisateur(s)">
                Utilisateur(s)</a></li>
    </ul>
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"></h1>
    <div class="row placeholders">
        <div id="contenu">

            <h2>Modifier un billet existant</h2>


            <div class="col-sm-8 contact-form">
                <form id="contact" method="post" class="form" role="form">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 form-group">
                            <input class="form-control" id="name" name="dateBillet"
                                   placeholder="Entrez la date de ce billet" type="text" value="<?= $billet['date'] ?>"
                                   required autofocus/>
                        </div>
                        <div class="col-xs-6 col-md-6 form-group">
                            <input class="form-control" id="email" name="titreBillet"
                                   placeholder="Entrez votre le titre" type="text" value="<?= $billet['titre'] ?>"
                                   required/>
                        </div>
                    </div>
                    <textarea class="form-control" id="tiny" name="contenuBillet" placeholder="Le texte"
                              rows="5"><?= $billet['contenu'] ?></textarea>
                    <br/>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 form-group">
                            <button class="btn btn-primary pull-right" type="submit">Modifier le billet</button>
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

