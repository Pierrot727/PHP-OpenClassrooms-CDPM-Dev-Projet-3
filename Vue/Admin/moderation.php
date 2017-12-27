<?php $this->menuActif = "Moderation";
$this->grade = $this->nettoyer($grade) ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"></h1>
    <div class="row placeholders">
        <div id="contenu">

            <?php $this->titre = "Mon Blog - Administration" ?>
            <h2>Panneau de modération</h2>
            <br>
            <form action="admin/general" method="post">
                <h2 class="sub-header">Gestion des commentaires et signalements</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Titre du billet</th>
                            <th>Commentaire</th>
                            <th>Signalement(s)</th>
                            <th>Action(s)</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php if ($commentaires == null) { ?>
                            <tr>
                                <th>-</th>
                                <th>Aucun commentaire à afficher</th>
                                <th>-</th>
                                <th>-</th>
                            </tr>
                        <?php } else { ?>

                            <?php foreach ($commentaires as $commentaire): ?>
                                <tr>
                                    <th>
                                        <a href="<?= "billet/index/" . $this->nettoyer($commentaire['id']) ?>"><?= $this->nettoyer($commentaire['titre']) ?></a>
                                    </th>
                                    <th>
                                        <?= $this->nettoyer($commentaire['contenu']) ?>
                                    </th>
                                    <th>
                                        <?= ($this->nettoyer($commentaire['signalement'])) ? "Oui" : "Non" ?>
                                    </th>
                                    <th>
                                        <a id="lienEditerCommentaire"
                                           href="admin/commentaireEditer/<?= $commentaire['idc'] ?>">
                                            <img src="Contenu/images/symbol/commentaire-edit.png" alt="modifier billet"
                                                 title="Editer le commentaire">
                                        </a>
                                        <a id="lienSupprimerCommentaire"
                                           href="admin/commentaireSupprimer/<?= $commentaire['idc'] ?>">
                                            <img src="Contenu/images/symbol/commentaire-sup.png"
                                                 alt="supprimer commentaire" title="Suprimer le commentaire">
                                        </a>
                                        <?php if ($commentaire['signalement'] > 0) : ?>
                                            <a id="lienSupprimerSignalement"
                                               href="admin/supprimerSignalement/<?= $commentaire['idc'] ?>">
                                                <img src="Contenu/images/symbol/signalement-sup.png"
                                                     alt="supprimer signalement" title="Supprimer le/les signalements">
                                            </a>
                                        <?php endif; ?>
                                    </th>
                                </tr>
                            <?php endforeach; ?>

                        <?php } ?>
                </div> <!-- #contenu -->
            </form>
            <hr>
        </div>
    </div>
</div>
