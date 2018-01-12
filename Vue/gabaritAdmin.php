<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="backoffice">
    <meta name="author" content="Pierre-Emmanuel Laporte">

    <title>Administration</title>
    <base href="<?= $racineWeb ?>">
    <link rel="stylesheet" href="Contenu/css/bootstrap.min.css">
    <link rel="stylesheet" href="Contenu/css/administration.css"/>
    <link rel="stylesheet" href="Contenu/css/font-awesome.css">
    <script src="Contenu/js/jquery.js"></script>
    <script src="Contenu/js/bootstrap.min.js"></script>
    <script src='Contenu/js/tinymce/tinymce.min.js'></script>
</head>

<body>
<?php $this->actif = "class='active'" ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Billet simple pour l'Alaska</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a id="lienPass" href="#">Retourner au site</a></li>
                <li><a id="lienPass" href="admin/modifierMdp">Changer votre mot de passe</a></li>
                <li><a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div id="contenu">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li <?php if (($this->menuActif == "Tableau de bord")) {
                        echo($this->actif);
                    } ?>>
                        <a id="lienDashboard" href="admin/">
                            <img src="Contenu/images/symbol/dashboard.png" alt="Tableau de bord"
                                 title="Tableau de bord"> Tableau de bord
                        </a>
                    </li>
                    <?php if ($this->grade == "Administrateur") { ?>
                        <li <?php if (($this->menuActif == "Administration")) {
                            echo($this->actif);
                        } ?>>
                            <a id="lienAdministration" href="admin/administration">
                                <img src="Contenu/images/symbol/admin.png" alt="Panneau d'administration"
                                     title="Panneau d'administration">Administration</a><span
                                    class="sr-only">(current)</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($this->grade == "Moderateur" || $this->grade == "Administrateur") { ?>
                    <li <?php if (($this->menuActif == "Moderation")) {
                        echo($this->actif);
                    } ?>>
                        <a id="lienModeration" href="admin/moderation">
                            <img src="Contenu/images/symbol/moderer.png" alt="Panneau de modération"
                                 title="Panneau de modération"> Panneau de modération
                        </a>
                    </li>
                    <?php } ?>
                    <?php if ($this->grade == "Administrateur") { ?>
                    <li <?php if (($this->menuActif == "Utilisateurs")) {
                        echo($this->actif);
                    } ?>>
                        <a id="lienUtilisateurs" href="admin/utilisateurs">
                            <img src="Contenu/images/symbol/user.png" alt="Panneau de gestion utilisateur"
                                 title="Gestion utilisateur(s)">Utilisateur(s)
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <?php if (!empty($flash)): ?>
                <div class="alert alert-<?= $flash['type'] ?>">
                    <p><strong><?= ucfirst($flash['type']) ?> !</strong> <?= $flash['message'] ?></p>
                </div>
            <?php endif; ?>
                </div>
            </div>
            <?= $contenu ?>

        </div>
    </div>
</div>
</body>
</html>