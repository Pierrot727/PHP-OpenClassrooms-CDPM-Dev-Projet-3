<div class="row">

    <form action="connexion/connecter" method="post" class="form-signin">
        <?php $this->titre = "Mon Blog - Connexion" ?>
        <h2 class="form-signin-heading">Identifiez-vous</h2>
        <label for="inputEmail" class="sr-only">Login</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Entrez votre login" name="login" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Entrez votre mot de passe"
               name="mdp" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="retenir"> Retenir vos identifiants
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">S'identifier</button>
    </form>

</div> <!-- /container -->

<?php if (isset($msgErreur)): ?>
    <p><?= $msgErreur ?></p>
<?php endif; ?>