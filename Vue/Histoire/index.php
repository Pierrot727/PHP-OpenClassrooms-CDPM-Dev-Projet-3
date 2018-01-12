<h1 class="titre-page">QUI SUIS-JE ?</h1>

<div class="container">

    <div class="row">


        <div class="about-img">
            <img alt="User Pic"
                 src="Contenu/images/uploads/<?= $this->nettoyer($auteur['photo']) ?>"
                 id="profile-image1" class="img-thumbnail img-responsive">

        </div>
        <div class="about-text">
            <p><span><?= $this->nettoyer($auteur['titre']) ?></span><br>
                <?= $auteur['texte'] ?>

            <p><span>Citation</span><br>
                <?= $this->nettoyer($auteur['citation']) ?>
        </div>
    </div>
    </br>
    </br>
</div>