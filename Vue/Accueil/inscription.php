<?php
require 'recaptchalib.php';
$siteKey = '6LcWfj4UAAAAAIbBCZma2f11zU4sawCXLwi8Yao7'; // votre clé publique
$secret = '6LcWfj4UAAAAAEgMUSRlSX8HgYzwTgk6rHkMTrzp'; // votre clé privée
?>
    <div class="row">
        <div class="inscription-box">
            <form id="login-form" method="post">
                <h2>Inscription sur le site.</h2>
                <hr>
                <div class="col-sm-12 form-group">
                    <label>Nom</label>
                    <input name="nom" type="text" placeholder="Entrez votre nom"
                           class="form-control">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Prénom</label>
                    <input name="prenom" type="text" placeholder="Entrez votre prénom"
                           class="form-control">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Date de naissance (AAAA-MM-JJ)</label>
                    <input type="text" name="dateNaissance"
                           placeholder="Entrez votre date de naissance.." class="form-control">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Entrez votre email.."
                           class="form-control">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Login</label>
                    <input name="pseudo" type="text" placeholder="Entrez un identifiant.."
                           class="form-control">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Mot de passe</label>
                    <input type="password" name="mdp" placeholder="Entre votre mot de passe.."
                           class="form-control">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Vérification du mot de passe</label>
                    <input type="password" name="verif_mdp"
                           placeholder="Retapez votre mot de passe.." class="form-control">
                </div>
                <div class="col-sm-6 col-lg-offset-2 form-group">
                    <div class="g-recaptcha" data-sitekey="<?php //echo $siteKey; ?>">
                    </div>
                </div>
                </br>
                <div class="col-sm-6 col-lg-offset-4 form-group">
                    <input type="submit" class="bords-arrondis" value="Créer l'utilisateur">
                </div>
            </form>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js">
    </script>
<?php
/*$reCaptcha = new ReCaptcha($secret);
if(isset($_POST["g-recaptcha-response"])) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
    if ($resp != null && $resp->success) {echo "CAPTCHA OK";}
    else {echo "CAPTCHA incorrect";}
} */
?>

<?php if (isset($msgErreur)): ?>
    <p><?= $msgErreur ?></p>
<?php endif; ?>