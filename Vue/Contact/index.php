<?php
require 'recaptchalib.php';
$siteKey = 'XXXX'; // votre clé publique
$secret = 'YYYY'; // votre clé privée
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
            <p>
                <button class="bords-arrondis" type="submit">Envoyer</button>
            </p>
        </form>
    </div>
</div>
<script src="https://www.google.com/recaptcha/api.js"></script>