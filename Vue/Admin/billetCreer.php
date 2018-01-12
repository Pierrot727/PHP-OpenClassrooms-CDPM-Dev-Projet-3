<?php $this->menuActif = "Administration";
$this->grade = $this->nettoyer($grade);
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"></h1>
    <div class="row placeholders">
        <div id="contenu">

            <?php $this->titre = "Mon Blog - Ajouter un nouveau billet" ?>
            <h2>Création d'un nouveau billet</h2>
            <br>
            <hr>
            <form method="post" class="crud-box">
                <div class="row">
                    <div class="col-xs-4 col-md-4 form-group">

                        <label>Date (AAAA-MM-DD)</label><br>
                        <input name="dateBillet" class="crud-container" placeholder="Entrez la date de ce billet"
                               required>
                    </div>
                    <div class="col-xs-4 col-md-4 form-group">
                        <label>Titre du billet</label><br>
                        <input name="titreBillet" placeholder="Entrez votre le titre" required>
                    </div>
                    <div class="col-xs-4 col-md-4 form-group">
                        <label>Illustration</label><br>
                        <input name="photoBillet" placeholder="Photo associée">
                    </div>
                    <div class="col-xs-12 col-md-12 form-group">
                        <label>Texte</label>
                        <textarea rows="20" id="tiny" name="contenuBillet" placeholder="Le texte"></textarea>
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
