<!DOCTYPE HTML>
<html>
<head>
    <title>Billet simple pour l'Alaska</title>
    <base href="<?= $racineWeb ?>"
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Billet simple pour l'Alaska, livre de Jean FORTEROCHE version en ligne via un blog"/>
    <link href="Contenu/css/normalize.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="Contenu/css/bootstrap.min.css">
    <link rel="stylesheet" href="Contenu/css/font-awesome.css">
    <link href="Contenu/css/visiteur.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="Contenu/js/jquery.js"></script>
    <script src="Contenu/js/bootstrap.min.js"></script>
    <script src='Contenu/js/tinymce/tinymce.min.js'></script>

    <link rel='stylesheet' id='Roboto-css'
          href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700'>
    <link rel='stylesheet' id='Patua+One-css' href='http://fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700'>
    <link rel='stylesheet' id='Roboto+Slab-css' href='http://fonts.googleapis.com/css?family=Roboto+Slab:1,300,400,400italic,700,700italic'>
    <link rel='stylesheet' id='Caudex-css' href='http://fonts.googleapis.com/css?family=Caudex:100,300,400,400italic,700,700italic'>
    <link rel='stylesheet' id='Lato-css' href='http://fonts.googleapis.com/css?family=Lato:100,300,400'>
    <link rel='stylesheet' id='Great+Vibes-css' href='http://fonts.googleapis.com/css?family=Great+Vibes'>
    <link rel="stylesheet" type="text/css" href="Contenu/css/font-awesome.css" media="screen">
</head>

<body class="bg-gray">

<header class="visiteur">

    <nav class="container">
        <ul class="menu">
            <li><img src="Contenu/images/logo.png"></li>
            <li class="selected"><a href="">Accueil</a></li>
            <li><a href="histoire">Mon histoire</a></li>
            <li><a href="contact">Contact</a></li>
        </ul>
    </nav>

    <h1 class="titre-page">BILLET SIMPLE POUR L&#039;ALASKA</h1>
    <h2 class="titre-complement">un roman de Jean FORTEROCHE</h2>
</header>

<div class="container">
            <?php if (!empty($flash)): ?>
                <div class="alert alert-<?= $flash['type'] ?>">
                    <p><strong><?= ucfirst($flash['type']) ?> !</strong> <?= $flash['message'] ?></p>
                </div>
            <?php endif; ?>
    <?= $contenu ?>
</div>

<footer>

    <div class="container">
        <div class="row link-zone">

            <div>
                <h3>Site conçu grace à</h3>
                <p> Un framework MVC par <a target="_blank" href="https://github.com/bpesquet/MonBlog">Baptiste
                        Pesquet</a><br>
                    Booststrap <a target="_blank" href="https://getbootstrap.com/">Framework CSS</a><br>
                    Tiny Mce. <a target="_blank" href="http://tinymce.com">WYSIWYG editor</a><br>
                    Design original de Daniel JEREMIE<br>
                    Développé par Pierre-Emmanuel LAPORTE</a></p>
            </div>
            <div>
                <h3>Mes derniers ouvrages</h3>
                <p><a href="">Livre 1</a><br>
                    <a href="">Livre 2</a><br>
                    <a href="">Livre 3</a></p>
            </div>
            <div>
                <h3>Écrivez-moi</h3>
                <p> Jean Forteroche<br><span>
                        Maison des auteurs<br>
                          3, impasse de l'ange bleu<br>
                          40100 Gignac<br>
                          Tel. 05 55 24 45 90 <br>
						  </span>
            </div>

        </div>
    </div>


    <div class="copyright">
        <div class="container">
            <p>&copy; 2018 Jean FORTEROCHE - Billet simple pour l'Alaska - Projet n° 3 - Chef de projet Dévellopement -
                OpenClassRooms - <a href="admin">Administration</a></p>
        </div>
    </div>

</footer>
</body>
</html>
