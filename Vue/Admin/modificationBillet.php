<?php $this->titre = "Mon Blog - Modifier un billet" ?>
    <h3>Création d'un nouveau billet</h3>
    <form method="post">
        <input name="dateBillet" placeholder="Entrez la date de ce billet"
               required>
        <input name="titreBillet" placeholder="Entrez votre le titre"
               required value="<?= $billet['title'] ?>">
        <textarea id="tiny" name="contenuBillet" placeholder="Le texte"><?= $billet['description'] ?></textarea>
        <button type="submit">Créer le nouveau billet</button>
    </form>

    <script>
        tinymce.init({
            selector: '#tiny',
            language: 'fr_FR'
        });
    </script>
<?php if (isset($msgErreur)): ?>
    <p><?= $msgErreur ?></p>
<?php endif; ?>