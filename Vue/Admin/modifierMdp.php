<?php
$this->menuActif = "Tableau de bord";
$this->titre = "Mon Blog - Modification de mot de passe";
$this->grade = $this->nettoyer($grade);
?>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header"></h1>
        <div class="row">
            <div class="inscription-box">
                <form id="login-form" method="post">
                    <h2>Modificiation de votre mot de passe.</h2>
                    <hr>
                    <div class="col-sm-12 form-group">
                        <label>Mot de passe</label>
                        <input name="mdp" type="password" placeholder="Entrez votre mot de passe"
                               class="form-control" required>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label>Confirmation du mot de passe</label>

                        <input name="verif_mdp" type="password" placeholder="Confirmer votre mot de passe"
                               class="form-control" required>
                    </div>
                    <div class="col-sm-6 col-lg-offset-4 form-group">
                        <input type="submit" class="bords-arrondis" value="Changer">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php if (isset($msgErreur)): ?>
    <p><?= $msgErreur ?></p>
<?php endif; ?>