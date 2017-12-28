<?php
require 'recaptchalib.php';
$siteKey = '6LcWfj4UAAAAAIbBCZma2f11zU4sawCXLwi8Yao7'; // votre clé publique
$secret = '6LcWfj4UAAAAAEgMUSRlSX8HgYzwTgk6rHkMTrzp'; // votre clé privée
?>
<div class="row">
    <div class="login-box">
        <h2>Laissez-moi un message</h2>
        <hr>
        <form id="login-form" method="post" action="contact/contacter">

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

            <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
            <div class="col-sm-6 col-lg-offset-4 form-group">
                <input type="submit" class="bords-arrondis" value="Envoyer">
            </div>
        </form>
    </div>
</div>
<script src="https://www.google.com/recaptcha/api.js"></script>
<?php
$reCaptcha = new ReCaptcha($secret);
if(isset($_POST["g-recaptcha-response"])) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
    if ($resp != null && $resp->success) {echo "CAPTCHA OK";}
    else {echo "CAPTCHA incorrect";}
}
?>