<?php $this->titre = "Mon Blog - Modifier un billet" ?>
    <h3>Modification d'un billet</h3>
    <form method="post">
        <input name="dateBillet" placeholder="Entrez la date de ce billet" value="<?=  $billet['date'] ?>"
               required>
        <input name="titreBillet" placeholder="Entrez votre le titre"
               required value="<?= $billet['titre'] ?>">
        <textarea id="tiny" name="contenuBillet" placeholder="Le texte"><?= $billet['contenu'] ?></textarea>
        <button type="submit">Modifier le billet</button>
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