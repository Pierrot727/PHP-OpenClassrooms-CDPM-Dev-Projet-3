<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">

        <li><a id="lienDashboard" href="admin/"><img src="Contenu/images/symbol/dashboard.png"
                                                                    alt="Panneau de modération"
                                                                    title="Panneau de modération"> Tableau de
                bord</a></li>
        <li><a id="lienAdministration" href="admin/administration"><img src="Contenu/images/symbol/admin.png"
                                                                        alt="Panneau d'administration"
                                                                        title="Panneau d'administration"> Administration</a></li>
        <li class="active"><a id="lienModeration" href="admin/moderation"><img src="Contenu/images/symbol/moderer.png"
                                                                alt="Panneau de modération"
                                                                title="Panneau de modération"> Panneau de
                modération<span class="sr-only">(current)</span></a></li>
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

            <?php $this->titre = "Mon Blog - Administration" ?>
            <h2>Panneau de modération</h2>
            <br>

            Ce blog comporte <?= $this->nettoyer($nbBillets) ?> billet(s) et
            <?= $this->nettoyer($nbCommentaires) ?> commentaire(s) et <?= $this->nettoyer($nbSignalements) ?>
            signalements </br>
            <hr>


            <form action="admin/general" method="post">


                <h2 class="sub-header">Gestion des commentaires et signalements</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Selection</th>
                            <th>Titre du billet</th>
                            <th>Commentaire</th>
                            <th>Signalement(s)</th>
                            <th>Action(s)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($billets as $billet):
                            ?>
                            <tr>

                                <th><input id="checkbox" name="check_list[]"
                                           value="<?= $this->nettoyer($billet['id']) ?>"
                                           type="checkbox"></th>
                                <th>
                                    <a href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>"><?= $this->nettoyer($billet['titre']) ?></a>
                                </th>
                                <th>
                                  Com
                                </th>
                                <th>Signalement</th>
                                <th><a id="lienEditerCommentaire" href="admin/EditerCommentaire/<?= $billet['id'] ?>"><img
                                                src="Contenu/images/symbol/commentaire-edit.png"
                                                alt="modifier billet"
                                                title="Editer le commentaire"></a>
                                    <a id="lienSupprimerCommentaire" href="admin/supprimerCommentaire/<?= $billet['id'] ?>"><img
                                                src="Contenu/images/symbol/commentaire-sup.png"
                                                alt="modifier billet"
                                                title="Suprimer le commentaire"></a>
                                    <a id="lienSupprimerSignalement"
                                       href="admin/supprimerSignalement/<?= $billet['id'] ?>"><img
                                                src="Contenu/images/symbol/signalement-sup.png"
                                                alt="supprimer billet"
                                                title="Supprimer le/les signalements"></a>
                                    <a id="lienBlacklisterMembre"
                                       href="admin/blacklister/<?= $billet['id'] ?>"><img
                                                src="Contenu/images/symbol/user-ban.png"
                                                alt="blacklister le membre"
                                                title="Blacklister le membre"></a>
                                </th>


                            </tr>

                        <?php endforeach; ?>


                        <select name="form_action">
                            <option value="">Choisissez une action</option>
                            <option value="supprimer">Supprimer</option>
                            <option value="archiver">Activer/suspendre publication</option>
                        </select>

                        <button type="submit" name="action_valider">Valider</button>
                </div> <!-- #contenu -->

            </form>

            <hr>

        </div>
    </div>
</div>
