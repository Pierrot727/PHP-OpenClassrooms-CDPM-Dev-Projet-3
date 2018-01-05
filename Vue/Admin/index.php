<?php
$this->menuActif = "Tableau de bord";
$this->grade = $this->nettoyer($grade);
?>
<pre>
    <?php
    var_dump($_FILES);
    ?>
</pre>

<div class="container">
    <div class="row">
        <?php $this->titre = "Mon Blog - Administration" ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header"></h1>
            <div class="row placeholders">
                <div id="contenu">
                    <h2>Tableau de bord</h2>
                    Bienvenue, <?= $this->nettoyer($login) ?> !
                    Ce blog comporte <?= $this->nettoyer($nbBillets) ?> billet(s)
                    et <?= $this->nettoyer($nbCommentaires) ?>
                    commentaire(s) et <?= $this->nettoyer($nbSignalements) ?> signalements
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-lg-offset-2 ">

            <div class="panel panel-default">
                <div class="panel-heading"><h4>Votre profil</h4></div>
                <div class="panel-body">

                    <div class="box box-info">

                        <div class="box-body">
                            <div class="col-sm-4">
                                <?php if (isset($this->$utilisateur['photo'])) { ?>
                                <div align="center"><img alt="User Pic"
                                                         src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"
                                                         id="profile-image1" class="img-circle img-responsive">
                                <?php } else { ?>
                                    <div align="center"><img alt="User Pic"
                                                             src="Contenu/images/uploads/<?= $this->nettoyer($utilisateur['photo']) ?>"
                                                             id="profile-image1" class="img-circle img-responsive">
                                <?php } ?>


                                        <form action="" method="post" id="profile-form-upload" class="hidden" enctype="multipart/form-data" >
                                        <input name="file" id="profile-image-upload" type="file">                                    <!--Upload Image Js And Css-->
                                    </form>
                                    <div style="color:#999;">Cliquez içi pour changer l'image de profil</div>



                                </div>

                                <br>

                                <!-- /input-group -->
                            </div>
                            <div class="col-sm-6">
                                <h4 style="color:#00b1b1;"><?= $this->nettoyer($utilisateur['prenom']) ?> <?= $this->nettoyer($utilisateur['nom']) ?></h4></span>
                                <span><p><?= $this->nettoyer($utilisateur['grade']) ?></p></span>
                                <?php if ($this->nettoyer($utilisateur['acces'] == "Banni")) { ?>
                                <span></br>
                                    </br>
                                    <div class="alert alert-danger">
                                        <strong>Attention !</strong> Vous êtes banni, contactez un administrateur !
                                    </div>
                                    </p></span>
                                <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                            <hr style="margin:5px 0 5px 0;">


                            <div class="col-sm-5 col-xs-6 tital ">Nom:</div>
                            <div class="col-sm-7 col-xs-6 "><?= $this->nettoyer($utilisateur['nom']) ?></div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital ">Prénom:</div>
                            <div class="col-sm-7"><?= $this->nettoyer($utilisateur['prenom']) ?></div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital ">Identifiant :</div>
                            <div class="col-sm-7"><?= $this->nettoyer($login) ?></div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital ">Date de naissance :</div>
                            <div class="col-sm-7"><?= $this->nettoyer($utilisateur['naissance']) ?></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>


                </div>
            </div>
        </div>
        <script>
            $(function () {
                $('#profile-image1').on('click', function () {
                    $('#profile-image-upload').click();
                });
                $('#profile-image-upload').on('change',function () {
                    console.log("jiojo");
                    $('#profile-form-upload').submit();
                })
            });
        </script>
    </div>
</div>

<hr> <!-- Barre séparateur -->
