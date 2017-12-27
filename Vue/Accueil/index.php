<div class="row pagination">
    <ul>
        <?php for ($i = 1; $i <= $nbPages; $i++): ?>
            <li class="bords-arrondis <?= ($i == $page) ? "page-actuelle" : "" ?>">
                <a href="accueil/page/<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</div>

<div class="row">
    <?php foreach ($billets as $billet): ?>

        <div class="post-block"><a href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>">
                <img class="polaroid"
                     src="<?= "Contenu/images/illustrations/" . $this->nettoyer($billet['photo']) ?>-medium.jpg"></a>
            <div class="corps-post">
                <span>
                    <i class="fa fa-user"></i> Jean FORTEROCHE - <?= $this->nettoyer($billet['date']) ?>
                </span>
                <p class="titre-post">
                    <span class="bords-arrondis">EPISODE
                    </span><?= $this->nettoyer($billet['titre']) ?>
                </p>
                <p class="texte-post"><?= $this->supernettoyer($billet['contenu']) ?>
                </p>
            </div>
            <div class="pied-post">
                <i class="fa fa-comment-o"></i> <span><?= $this->supernettoyer($billet['cptCom']) ?>
                    commentaires | </span>
                <a href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>">Lire la suite</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="row pagination">
    <ul>
        <?php for ($i = 1; $i <= $nbPages; $i++): ?>
            <li class="bords-arrondis <?= ($i == $page) ? "page-actuelle" : "" ?>">
                <a href="accueil/page/<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</div>
