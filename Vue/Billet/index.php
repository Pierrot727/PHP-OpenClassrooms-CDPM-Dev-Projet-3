<?php $this->titre = "Mon Blog - " . $this->nettoyer($billet['titre']); ?>

<div class="row">
    <div class="colonne-gauche">
        <img src="<?= "Contenu/images/illustrations/" . $this->nettoyer($billet['photo']) ?>-large.jpg""
        class="polaroid" alt="">
        <div class="img-overlay">
            Auteur Jean
            FORTEROCHE, <?= IntlDateFormatter::formatObject(new DateTime($billet['date']), IntlDateFormatter::LONG) ?>
        </div>
        <!--  blocks gauche -->
        <h3><?= $this->nettoyer($billet['titre']) ?></h3>
        <div class="left-block texte-courant">
            <?= $billet['contenu'] ?>
        </div>

        <h3>Commentaires</h3>
        <div class="left-block">
            <?php if ($this->nettoyer($nbCommentaires) >= 1) { ?>

                <?php foreach ($commentaires as $commentaire): ?>
                    <form method="post" action="commentaire/signaler/<?= $commentaire['id'] ?>">
                        <p>
                            <input type="hidden" name="id_comment" value="">
                            <input type="hidden" name="id_episode" value="">
                            <span class="pseudo">
                            <i class="fa fa-pencil"
                               aria-hidden="true"></i>
                                <?= $this->nettoyer($commentaire['auteur']) ?>
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

            <?php } else { ?>
                <p>
                        <span>
                            Il n'y a pas encore de commentaire ...
                        </span>
                </p>
            <?php } ?>
        </div>

        <h3>Laisser votre commentaire</h3>
        <div class="left-block comment-form">
            <?php if (isset($login)) { ?>
                <?php if ($acces == "Banni") { ?>
                    <div class="alert alert-danger">
                        <strong>Impossible!</strong> Vous êtes banni !
                    </div>
                <?php } else { ?>
                    <form class="largeur-totale" action="billet/commenter" method="post">
                        <label>Vous êtes identifié, <?= $login ?>, vous pouvez poster, si vous le souhaitez votre
                            commentaire ci-dessous :</br>
                        </label>
                        </br>
                        <label>Commentaire</label>
                        <div>
                        <textarea enabled=false rows="8" class="bords-arrondis largeur-totale"
                                  name="contenu"></textarea>
                        </div>
                        <p>
                            <input type="hidden" name="id" value="<?= $billet['id'] ?>">
                            <input type="submit" class="bords-arrondis" value="Commenter">
                        </p>
                    </form>
                <?php } ?>
            <?php  } else { ?> <a href="admin/">Vous devez être enregitré pour poster un commentaire, cliquez içi pour
                vous identifier</a>
            <?php } ?>
        </div>
    </div>

    <div class="colonne-droite">
        <h3 class="first">Derniers épisodes</h3>
        <div class="right-block">
            <?php foreach ($billets as $billet): ?>
                <div class="liste-titres">
                    <img src="<?= "Contenu/images/illustrations/" . $this->nettoyer($billet['photo']) ?>-small.jpg">
                    <a href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>"><?= $this->nettoyer($billet['titre']) ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>



