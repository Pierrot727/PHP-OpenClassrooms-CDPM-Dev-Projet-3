<?php $this->menuActif = "Administration" ?>
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
            <a id="lienCrBillet" href="admin/billetCreer">
                <img src="Contenu/images/symbol/nouveau.png" alt="Nouveau billet" title="Nouveau billet"> Créer un nouveau billet
            </a>

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
                                <th><a id="lienModifBillet" href="admin/billetModifier/<?= $billet['id'] ?>">
                                        <img src="Contenu/images/symbol/modifier.png" alt="modifier billet" title="Cliquez pour modifier le billet selectionné">
                                    </a>
                                    <a href="#modal-dialog" class="modal-toggle" data-toggle="modal"
                                       data-href=""
                                       data-modal-type="confirm" data-modal-title="Effacer un billet"
                                       data-modal-text="Are you sure you want to delete {$property.address_string}?"
                                       data-modal-confirm-url="{$base_url}residential-lettings/properties/do-delete/property/{$property.id}">
                                        <i class="icon-trash"></i>
                                        <img src="Contenu/images/symbol/supprimer.png" alt="supprimer billet" title="Cliquez pour supprimer le billet selectionné"
                                             data-toggle="modal" data-target="#myModal">
                                    </a>

                                    <?php if ($billet['visible'] == "NON") : ?>
                                        <a id="lienBilletVisible" href="admin/billetVisible/<?= $billet['id'] . '?statut=OUI' ?>">
                                            <img src="Contenu/images/symbol/visible.png" alt="Rendre visible le billet" title="Cliquez pour rendre visible le billet">
                                        </a>
                                    <?php else : ?>
                                        <a id="lienBilletMasquer" href="admin/billetVisible/<?= $billet['id'] . '?statut=NON' ?>">
                                            <img src="Contenu/images/symbol/masquer.png" alt="Masquer billet" title="Cliquez pour masquer le billet">
                                        </a>
                                    <?php endif; ?>
                                </th>
                            </tr>
                        <?php endforeach; ?>


                        <select name="form_action">
                            <option value="">Choisissez une action</option>
                            <option value="supprimer">Supprimer</option>
                            <option value="archiver">Activer/suspendre publication</option>
                        </select>
                        <button type="submit" name="action_valider">Valider</button>
                </div>

            </form>


            <!-- Modal de confirmation de suppression-->
            <div id="modal-dialog" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                            <h3>Demande de confirmation</h3>
                        </div>
                        <div class="modal-body">
                            <p>Etes-vous sur de vouloir supprimer le billet concerné ?</p>
                        </div>
                        <div class="modal-footer">
                            <a href="admin/billetSupprimer/<?= $billet['id'] ?>" id="btnYes" class="btn confirm">Oui, je
                                confirme</a>
                            <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">Non, j'annule</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
