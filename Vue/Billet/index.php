<?php $this->titre = "Mon Blog - " . $this->nettoyer($billet['titre']); ?>

<div class="row">
    <div class="colonne-gauche">
        <img src="<?= "Contenu/images/illustrations/" . $this->nettoyer($billet['photo']) ?>-large.jpg""
        class="polaroid" alt="">
        <div class="img-overlay">
            Auteur Jean FORTEROCHE, <?= IntlDateFormatter::formatObject(new DateTime($billet['date']),IntlDateFormatter::LONG) ?>
        </div>
        <!--  blocks gauche -->
        <h3><?= $this->nettoyer($billet['titre']) ?></h3>
        <div class="left-block texte-courant">
            <?= $billet['contenu'] ?>
        </div>
        <h3>Commentaires</h3>
        <div class="left-block">
            <?php foreach ($commentaires as $commentaire): ?>
                <form method="post" action="commentaire/signaler/<?= $commentaire['id'] ?>">
                    <p>
                        <input type="hidden" name="id_comment" value="29">
                        <input type="hidden" name="id_episode" value="1">
                        <span class="pseudo">
                            <i class="fa fa-pencil" aria-hidden="true"></i> <?= $this->nettoyer($commentaire['auteur']) ?>
                        </span>
                        <span class="comment-date">
                            <?= $this->nettoyer($commentaire['date']) ?>
                        </span>
                        <span class="comment-signaler">
                            <a href="<?= "commentaire/signaler/" . $this->nettoyer($commentaire['id']) ?>">Signaler le commentaire</a>
                        </span>
                        <p>
                        <span>
                            <?= $this->nettoyer($commentaire['contenu']) ?>
                        </span>
                        </p>
                    </p>
                </form>
            <?php endforeach; ?>
        </div>

        <h3>Laisser votre commentaire</h3>
        <div class="left-block comment-form">
            <form class="largeur-totale" action="billet/commenter" method="post">
                <label>Pseudo</label>
                <div>
                    <input type="text" class="bords-arrondis largeur-moyenne" name="auteur" required/>
                    (lettres non accentuées et tiret uniquement)
                </div>
                <label>Commentaire</label>
                <div>
                    <textarea rows="8" class="bords-arrondis largeur-totale" name="contenu"></textarea>
                </div>
                <p>
                    <input type="hidden" name="id" value="<?= $billet['id'] ?>">
                    <input type="submit" class="bords-arrondis" value="Commenter">
                </p>
            </form>
        </div>
    </div>

    <div class="colonne-droite">
        <h3 class="first">Derniers épisodes</h3>
        <div class="right-block">
            <?php foreach ($billets as $billet): ?>
                <div class="liste-titres">
                    <img src="<?= "Contenu/images/illustrations/" . $this->nettoyer($billet['photo']) ?>-small.jpg">
                    &nbsp;&nbsp;
                    <a href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>"><?= $this->nettoyer($billet['titre']) ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>



