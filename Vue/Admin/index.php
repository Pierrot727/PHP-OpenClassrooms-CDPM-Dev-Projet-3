<?php $this->maVar = "toto";  ?>
<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">

        <li class="active"><a id="lienDashboard" href="admin/"><img src="Contenu/images/symbol/dashboard.png"
                                                     alt="Tableau de bord"
                                                     title="Tableau de bord"> Tableau de bord</a><span class="sr-only">(current)</span></li>
        <li ><a id="lienAdministration" href="admin/administration"><img
                        src="Contenu/images/symbol/admin.png"
                        alt="Panneau d'administration"
                        title="Panneau d'administration"> Administration</a></li>
        <li><a id="lienModeration" href="admin/moderation"><img src="Contenu/images/symbol/moderer.png"
                                                                alt="Panneau de modération"
                                                                title="Panneau de modération"> Panneau de modération</a></li>
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
            <h2>Tableau de bord</h2>
            <br>
            Bienvenue, <?= $this->nettoyer($login) ?> !
            Ce blog comporte <?= $this->nettoyer($nbBillets) ?> billet(s) et
            <?= $this->nettoyer($nbCommentaires) ?> commentaire(s) et <?= $this->nettoyer($nbSignalements) ?>
            signalements </br>


            <form action="admin/general" method="post">


                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th>Titre</th>
                            <th>Date</th>
                            <th>Billet commençant par</th>
                            <th>Commentaire(s)</th>
                            <th>Signalement(s)</th>
                            <th>Visible/Masqué</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php foreach ($billets as $billet):
                            ?>
                            <tr>


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

                            </tr>

                        <?php endforeach; ?>


                        </tbody>
                </div> <!-- #contenu -->

            </form>

            <hr>

        </div>
    </div>
</div>
