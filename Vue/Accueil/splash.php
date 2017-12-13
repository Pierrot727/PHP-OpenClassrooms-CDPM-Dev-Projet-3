<?php

$expire = time() + 60 * 60 * 24;                    // Cookie expire dans 1 jour - 60 seconds * 60 minutes * 24 hours
setcookie("no_splash", "1", $expire);  // Paramatréage du cookie : setcookie(cookie_name, cookie_value, expiry_time)

?>

<div class="row">
    <div class="message">
        <h2>Bienvenue sur le site du projet 3 d'OpenClassRoom</h2>
        <hr>
        <form id="login-form" method="post" action="accueil">

            <b>Enoncé :</b> Vous venez de décrocher un contrat avec Jean Forteroche, acteur et écrivain. Il travaille
            actuellement sur son prochain roman,<br>
            "Billet simple pour l'Alaska". Il souhaite innover et le publier par épisode en ligne sur son propre
            site.<br>
            Seul problème : Jean n'aime pas WordPress et souhaite avoir son propre outil de blog, offrant des
            fonctionnalités plus simples.<br>
            Vous allez donc devoir développer un moteur de blog en PHP et MySQL.<br>
            <br>
            <div class="bas">
                Ce site démo a été dévellopé avec Bootstrap 3.3.7<br>

                <br>
                Il est disponible en OpenSource sur <a href="https://github.com/Pierrot727/PHP-OpenClassrooms-CDPM-Dev-Projet-3">dépot GIT</a><br>
                <a href="https://www.pierre-laporte.net/openclassrooms/cdpm/projet3/notice.pdf">Documentation du site</a>
                <br>
                Pour tester le site vous pouvez vous identifier sur l'interface admin :<br>
                <br>
                Accés administraeur - Login: admin - Pass: admin<br>
                Accés modérateur - Login: modo - Pass: modo<br>
                Accés utilisateur - Login: user - Pass: user<br>
                <br>
                La base de donnée SQL est remise à zéro toutes les 3 heures.<br>
                <br>

                <p>
                    <button class="bouton" type="submit">Ok, C'est parti !</button>
                </p>
            </div>
        </form>
    </div>
</div>