<?php
$this->menuActif = "Tableau de bord";
$this->titre = "Mon Blog - Modification de mot de passe";
$this->grade = $this->nettoyer($grade) ;
?>
    <p>Changer votre mot de passe actuel</p>

    <form action="" method="post">
        <input name="mdp" type="password" placeholder="Entrez votre mot de passe"
               required>
        <input name="verif_mdp" type="password" placeholder="Confirmer votre mot de passe"
               required>
        <button type="submit">Changer</button>
    </form>

<?php if (isset($msgErreur)): ?>
    <p><?= $msgErreur ?></p>
<?php endif; ?>