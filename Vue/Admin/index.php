<?php $this->titre = "Mon Blog - Administration" ?>
<h2>Administration</h2>
Bienvenue, <?= $this->nettoyer($login) ?> ! </br>
Ce blog comporte <?= $this->nettoyer($nbBillets) ?> billet(s) et
<?= $this->nettoyer($nbCommentaires) ?> commentaire(s) et <?= $this->nettoyer($nbSignalements) ?> signalements </br>
<hr>
<a id="lienNbillet" href="admin/creationBillet"><img src="Contenu/images/symbol/nouveau.png" alt="Nouveau billet"
                                                     title="Nouveau billet"> Créer un nouveau billet</a>
<hr>
<form action="admin/test" method="post">


    <table>
        <tr>
            <th>Selection</th>
            <th>Titre</th>
            <th>Date</th>
            <th>Billet commençant par</th>
            <th>Commentaires</th>
            <th>Signalement</th>
            <th>Action(s)</th>
        </tr>

        <?php foreach ($billets as $billet):
            ?>
            <tr>

                <th><input id="checkbox" name="check_list[]" value="<?= $this->nettoyer($billet['id']) ?>"
                           type="checkbox"></th>
                <th>
                    <a href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>"><?= $this->nettoyer($billet['titre']) ?></a>
                </th>
                <th>
                    <time><?= $this->nettoyer($billet['date']) ?></time>
                </th>
                <th><?= mb_substr($this->superNettoyer($billet['contenu']),0,50 )?></th>
                <th><?= $this->nettoyer($billet['cptCom']) ?></th>
                <th>-</th>
                <th><a id="lienModifBillet" href="admin/modifierBillet/<?= $billet['id'] ?>"><img src="Contenu/images/symbol/modifier.png"
                                                                             alt="modifier billet"
                                                                             title="Cliquez pour modifier le billet selectionné"></a>
                    <a id="lienSupprimerBillet" href="admin/supprimerBillet/<?= $billet['id'] ?>"><img
                                src="Contenu/images/symbol/supprimer.png"
                                alt="supprimer billet"
                                title="Cliquez pour supprimer le billet selectionné"></a>
                </th>
            </tr>

        <?php endforeach; ?>


    </table>
    <select name="form_action">
        <option value="">Choisissez une action</option>
        <option value="supprimer">Supprimer</option>
        <option value="archiver">Activer/suspendre publication</option>
    </select>

    <button type="submit" name="action_valider">Valider</button>

</form>

<hr>


<hr>
Gestion :
<a id="lienPass" href="admin/modifierMdp">Changer le mot de passe</a> -
<a id="lienIns" href="admin/inscription">Ajouter un nouvel utilisateur</a> -
<a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a>
