<?php $this->menuActif = "Administration" ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"></h1>
    <div class="row placeholders">
        <div id="contenu">

            <?php $this->titre = "Mon Blog - Ajouter un nouveau billet" ?>
            <h2>Création d'un nouveau billet</h2>
            <form method="post" class="crud-box">
                <div>
                    <label>Date</label>
                    <input name="dateBillet" class="crud-container" placeholder="Entrez la date de ce billet" required>
                </div>
                <div>
                    <label>Titre du billet</label>
                    <input name="titreBillet" placeholder="Entrez votre le titre" required>
                </div>
                <div>
                    <label>Illustration</label>
                    <input name="photoBillet" placeholder="Entrez le nom exacte de la photo associée">
                </div>
                <div>
                    <label>Texte</label>
                    <textarea id="tiny" name="contenuBillet" placeholder="Le texte"></textarea>
                </div>
                <button type="submit">Créer le nouveau billet</button>
            </form>

            <script>
                tinymce.init({
                    selector: '#tiny',
                    language: 'fr_FR'
                });
            </script>
            <hr> <!-- Barre séparateur -->
        </div>
    </div>
</div>

<div class="row">
    <div class="login-box">
        <h2>Laissez-moi un message</h2>
        <hr>
        <form id="login-form" method="post" action="\verif-login">

            <label>Nom</label>
            <div>
                <input type="text" class="largeur-totale bords-arrondis">
            </div>

            <label>Adress e.mail</label>
            <div>
                <input type="text" class="largeur-totale bords-arrondis">
            </div>

            <label>Message</label>
            <div>
                <textarea class="largeur-totale bords-arrondis" rows="8"></textarea>
            </div>


            <p>
                <button class="login-button bords-arrondis" type="submit">Envoyer</button>
            </p>
        </form>
    </div>
</div>