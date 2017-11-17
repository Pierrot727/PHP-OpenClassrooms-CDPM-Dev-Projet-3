<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Administration</title>
    <base href="<?= $racineWeb ?>">
    <link rel="stylesheet" href="Contenu/css/bootstrap.min.css">
    <link rel="stylesheet" href="Contenu/css/styleAdmin.css"/>
    <script src="Contenu/js/jquery.js"></script>
    <script src="Contenu/js/bootstrap.min.js"></script>
    <script src='Contenu/js/tinymce/tinymce.min.js'></script>
</head>

<body>

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
                <li><a id="lienPass" href="admin/modifierMdp">Changer votre mot de passe</a></li>
                <li><a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <?php var_dump($flash); ?>
    <div id="contenu">
        <div class="row">


            <?= $contenu ?>
        </div> <!-- #contenu -->
    </div>
</div>

</body>
</html>