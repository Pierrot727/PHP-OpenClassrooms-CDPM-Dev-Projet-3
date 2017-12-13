<div class="row">

    <form class="login-box" action="connexion/connecter" method="post" class="form-signin">
        <?php $this->titre = "Mon Blog - Connexion" ?>
        <h2>Identifiez-vous</h2></br>
        <label for="inputEmail" class="sr-only">Login</label>
        <label><h5>Identifiant :</h5></label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Entrez votre login" name="login" required
               autofocus><br>
        <label><h5>Mot de passe :</h5></label>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Entrez votre mot de passe"
               name="mdp" required></br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">S'identifier</button>
    </form>

</div> <!-- /container -->
<br>
<div class="row">

    <?php if (isset($msgErreur)): ?>
    <div class="alert alert-danger">
        <p><strong>Attention !</strong> <?= $msgErreur ?></p>
    </div>
    <?php endif; ?>

</div>
