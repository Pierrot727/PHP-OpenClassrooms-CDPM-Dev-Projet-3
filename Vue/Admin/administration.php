<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">

        <li><a id="lienDashboard" href="admin/"><img src="Contenu/images/symbol/dashboard.png"
                                                                    alt="Panneau de modération"
                                                                    title="Panneau de modération"> Tableau de
                bord</a></li>
        <li class="active"><a id="lienAdministration" href="admin/administration"><img src="Contenu/images/symbol/admin.png"
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

            <?php $this->titre = "Mon Blog - Administration" ?>
            <h2>Administration</h2>
            <br>
            Bienvenue, <?= $this->nettoyer($login) ?> !
            Ce blog comporte <?= $this->nettoyer($nbBillets) ?> billet(s) et
            <?= $this->nettoyer($nbCommentaires) ?> commentaire(s) et <?= $this->nettoyer($nbSignalements) ?>
            signalements </br>
            <hr>
            <a id="lienCrBillet" href="admin/creationBillet"><img src="Contenu/images/symbol/nouveau.png"
                                                                  alt="Nouveau billet"
                                                                  title="Nouveau billet"> Créer un nouveau
                billet</a>

            <form action="admin/general" method="post">


                <h2 class="sub-header">Ensemble des billets</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Selection</th>
                            <th>Titre</th>
                            <th>Date</th>
                            <th>Billet commençant par</th>
                            <th>Commentaire(s)</th>
                            <th>Signalement(s)</th>
                            <th>Visible</th>
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
                                    <time><?= $this->nettoyer($billet['date']) ?></time>
                                </th>
                                <th><?= mb_substr($this->superNettoyer($billet['contenu']), 0, 50) ?></th>
                                <th><?= $this->nettoyer($billet['cptCom']) ?></th>
                                <th><?= $this->nettoyer($billet['cptSig']) ?></th>
                                <th><?= $this->nettoyer($billet['visible']) ?></th>
                                <th><a id="lienModifBillet" href="admin/modifierBillet/<?= $billet['id'] ?>"><img
                                            src="Contenu/images/symbol/modifier.png"
                                            alt="modifier billet"
                                            title="Cliquez pour modifier le billet selectionné"></a>
                                    <a id="lienSupprimerBillet"
                                       href="admin/supprimerBillet/<?= $billet['id'] ?>"><img
                                            src="Contenu/images/symbol/supprimer.png"
                                            alt="supprimer billet"
                                            title="Cliquez pour supprimer le billet selectionné" data-toggle="modal" data-target="#myModal"></a>
                                    <a id="lienVisibleBillet"
                                       href="admin/VisibleBillet/<?= $billet['id'] ?>"><img
                                            src="Contenu/images/symbol/visible.png"
                                            alt="Rendre visible le billet"
                                            title="Cliquez pour rendre visible le billet"></a>
                                    <a id="lienMasquerBillet"
                                       href="admin/MasquerBillet/<?= $billet['id'] ?>"><img
                                            src="Contenu/images/symbol/masquer.png"
                                            alt="Masquer billet"
                                            title="Cliquez pour masquer le billet"></a>
                                </th>
                            </tr>

                        <?php endforeach; ?>



                        <select name="form_action">
                            <option value="">Choisissez une action</option>
                            <option value="supprimer">Supprimer</option>
                            <option value="archiver">Activer/suspendre publication</option>
                        </select>

                        <button type="submit" name="action_valider" >Valider</button>
                </div> <!-- #contenu -->

            </form>

            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Déclencher le popup</button>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Avertissement</h4>
                        </div>
                        <div class="modal-body">
                            <p>Billet supprimé !</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>

                </div>
            </div>

            <hr>

        </div>
    </div>
</div>
