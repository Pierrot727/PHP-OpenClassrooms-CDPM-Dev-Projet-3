<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <base href="<?= $racineWeb ?>">
    <link rel="stylesheet" href="Contenu/css/bootstrap.min.css">
    <link rel="stylesheet" href="Contenu/css/style.css"/>
    <script src="Contenu/js/jquery.js"></script>
    <script src="Contenu/js/bootstrap.min.js"></script>
    <script src='Contenu/js/tinymce/tinymce.min.js'></script>

    <title><?= $titre ?></title>
</head>


<body class="corp">
<header class="visiteur">
    <div class="container">
    <div class="row">
        <div class="col-lg-4"><img src='Contenu/images/logo.png' alt='logo'></div>
        <div class="col-lg-8">
            <nav class="menu">

                <ul class="list-unstyled">
                    <li><a href='Accueil'>Accueil</a></li>
                    <li><a href='MesLivres'>Mes livres</a></li>
                    <li><a href='QuiEstJF'>Qui est Jean Forteroche ?</a></li>
                    <li><a href='Contact'>Contact</a></li>
                </ul>
            </nav>
        </div>
        <a href=""><h1 id="titre-page">Billet simple pour l'Alaska</h1></a>
        <h2 id="sous-titre-page">Un roman de Jean Forteroche.</h2>
    </div>
</header>


<div id="contenu">

    <?php var_dump($flash); ?>
    <?= $contenu ?>
</div> <!-- #contenu -->

<footer id="piedBlog">
    <div class="container">
        <div class="row link-zone">

        </div>
        <div class="copyright">
            © 2017 Jean FORTEROCHE - Billet simple pour l'Alaska - <?= $lien ?>
        </div>
    </div>
</footer>
</div> <!-- #global -->

</body>
</html>