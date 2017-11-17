<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">

        <li><a id="lienDashboard" href="admin/"><img src="Contenu/images/symbol/dashboard.png"
                                                     alt="Panneau de modération"
                                                     title="Panneau de modération"> Tableau de
                bord</a></li>
        <li><a id="lienAdministration" href="admin/administration"><img src="Contenu/images/symbol/admin.png"
                                                                        alt="Panneau d'administration"
                                                                        title="Panneau d'administration"> Administration</a>
        </li>
        <li><a id="lienModeration" href="admin/moderation"><img src="Contenu/images/symbol/moderer.png"
                                                                alt="Panneau de modération"
                                                                title="Panneau de modération"> Panneau de
                modération</a></li>
        <li class="active"><a id="lienUtilisateurs" href="admin/utilisateurs"><img src="Contenu/images/symbol/user.png"
                                                                                   alt="Panneau de gestion utilisateur"
                                                                                   title="Gestion utilisateur(s)">
                Utilisateur(s)</a><span class="sr-only">(current)</span></li>
    </ul>
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"></h1>
    <div class="row placeholders">
        <div id="contenu">

            <?php $this->titre = "Mon Blog - Administration" ?>
            <h2>Panneau de gestion des utilisateurs</h2>
            <br>


            <form action="admin/general" method="post">


                <h2 class="sub-header">Liste des utilisateurs</h2>
                <div class="table-responsive">
                    <a id="lienIns" href="admin/inscription"><img
                                src="Contenu/images/symbol/user-new.png"
                                alt="Ajouter un nouvel utilisateur"
                                title="Ajouter un nouvel utilisateur"> Ajouter un nouvel utilisateur</a>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Selection</th>
                            <th>Login</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date de naissance</th>
                            <th>Email</th>
                            <th>Modérateur</th>
                            <th>Administrateur</th>
                            <th>Blacklist</th>
                            <th>Action(s)</th>
                            <th>Administration</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($billets as $billet):
                            ?>
                            <tr>

                                <th><input id="checkbox" name="check_list[]"
                                           value="<?= $this->nettoyer($billet['id']) ?>"
                                           type="checkbox"></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><a id="lienEditerUtilisateur" href="admin/utilisateurEditer"><img
                                                src="Contenu/images/symbol/user-edit.png"
                                                alt="Editer utilisateur"
                                                title="Editer l'utilisateur"></a>
                                    <a id="lienSupprimerUtilisateur" href="admin/utilisateurSupprimer"><img
                                                src="Contenu/images/symbol/user-supr.png"
                                                alt="Supprimer utilisateur"
                                                title="Supprimer l'utilisateur"></a>
                                    <a id="lienDebanirUtilisateur"
                                       href="admin/utilisateurUnban"><img
                                                src="Contenu/images/symbol/user-unban.png"
                                                alt="Débanir l'utilisateur"
                                                title="Débanir l'utilisateur"></a>
                                    <a id="lienBanirUtilisateur"
                                       href="admin/utilisateurUnban"><img
                                                src="Contenu/images/symbol/user-ban.png"
                                                alt="Banir l'utilisateur"
                                                title="Banir l'utilisateur"></a>
                                </th>
                                <th><a id="lienPromoteModo"
                                       href="admin/utilisateurModerateur"><img
                                                src="Contenu/images/symbol/user-modo.png"
                                                alt="Promouvoir modérateur"
                                                title="Promouvoir modérateur"></a>
                                    <a id="lienBanirUtilisateur"
                                       href="admin/utilisateurUnModerateur"><img
                                                src="Contenu/images/symbol/user-unmodo.png"
                                                alt="Enlever les droits de modération"
                                                title="Enlever les droits de modération"></a>
                                    <a id="lienBanirUtilisateur"
                                       href="admin/utilisateurAdministrateur"><img
                                                src="Contenu/images/symbol/user-admin.png"
                                                alt="Promouvoir administrateur"
                                                title="Promouvoir administrateur"></a>
                                    <a id="lienBanirUtilisateur"
                                       href="admin/utilisateurUnAdministrateur"><img
                                                src="Contenu/images/symbol/user-unadmin.png"
                                                alt="Enlever les droits administrateurs"
                                                title="Enlever les droits administrateurs"></a></th>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                </div>

            </form>

            <hr>

        </div>
    </div>
</div>