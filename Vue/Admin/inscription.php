<?php $this->menuActif = "Utilisateurs";
$this->grade = $this->nettoyer($grade);
$this->titre = "Mon Blog - Ajouter un utilisateur" ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"></h1>
    <div class="row placeholders">
        <div id="contenu">

            <?php $this->titre = "Mon Blog - Administration" ?>
            <h2>Inscription d'un utilisateur</h2>
            <br>


            <form action="admin/inscription" method="post">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" placeholder="Entrez votre nom.." class="form-control"
                                   required>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>Prénom</label>
                            <input type="text" name="prenom" placeholder="Entrez votre prénom.." class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Date de naissance (AAAA-MM-JJ)</label>
                            <input type="text" name="dateNaissance" placeholder="Entrez votre date de naissance.."
                                   class="form-control">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Entrez votre email.." class="form-control">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>Login</label>
                            <input name="pseudo" type="text" placeholder="Entrez un identifiant.." class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Mot de passe</label>
                            <input type="password" name="mdp" placeholder="Entre votre mot de passe.."
                                   class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Vérification du mot de passe</label>
                            <input type="password" name="verif_mdp" placeholder="Retapez votre mot de passe.."
                                   class="form-control">
                        </div>
                    </div>

                    <button class="btn btn-lg btn-info" type="submit">Créer l'utilisateur</button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php if (isset($msgErreur)): ?>
    <p><?= $msgErreur ?></p>
<?php endif; ?>
