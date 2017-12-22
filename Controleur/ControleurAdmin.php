<?php

namespace Blog\Controleur;

use Blog\Framework\Session;
use Blog\Modele\Billet;
use Blog\Modele\Commentaire;
use Blog\Modele\Utilisateur;


/**
 * Contrôleur des actions d'administration
 *
 * @author Pierre-emmanuel Laporte
 */
class ControleurAdmin extends ControleurSecurise
{
    private $billet;
    private $commentaire;
    private $utilisateur;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
        $this->utilisateur = new Utilisateur();

    }

    public function index()
    {
        //$this->needModeratorRole();
        $this->needAdminRole();
        $nbBillets = $this->billet->getNombreBillets();
        $nbCommentaires = $this->commentaire->countCommentaires();
        $nbSignalements = $this->commentaire->getNombreSignalements();
        $billets = $this->billet->getBilletsTronques();
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVueAdmin(array('nbBillets' => $nbBillets,
            'nbCommentaires' => $nbCommentaires, 'nbSignalements' => $nbSignalements, 'billets' => $billets, 'login' => $login));
    }

    public function modifierMdp()
    {
        $param = array();

        if ($this->requete->existeParametre("mdp") &&
            $this->requete->existeParametre("verif_mdp")) {
            $mdp = $this->requete->getParametre('mdp');
            $verifMdp = $this->requete->getParametre('verif_mdp');
            if ($mdp === $verifMdp) {
                $id = $this->requete->getSession()->getAttribut("idUtilisateur");
                $this->utilisateur->modificationPassword($id, $mdp);
                $this->rediriger("admin");
            } else {
                $param['msgErreur'] = 'Mot de passe non identique';
            }

        }

        $this->genererVueAdmin($param);
    }

    public function inscription()
    {
        $this->needAdminRole();
        $param = array();
        if ($this->requete->existeParametre("pseudo") && $this->requete->existeParametre("nom") && $this->requete->existeParametre("prenom")
            && $this->requete->existeParametre("dateNaissance") && $this->requete->existeParametre("email") && $this->requete->existeParametre("mdp")
            && $this->requete->existeParametre("verif_mdp")) {
            $mdp = $this->requete->getParametre('mdp');
            $verifMdp = $this->requete->getParametre('verif_mdp');
            $pseudo = $this->requete->getParametre('pseudo');
            $nom = $this->requete->getParametre('nom');
            $prenom = $this->requete->getParametre('prenom');
            $dateNaissance = $this->requete->getParametre('dateNaissance');
            $email = $this->requete->getParametre('email');

            if ($mdp === $verifMdp) {
                $this->utilisateur->inscription($pseudo, $mdp, $nom, $prenom, $dateNaissance, $email);
                $this->rediriger("admin/utilisateurs");
            } else {
                $param['msgErreur'] = 'Mot de passe non identique';
            }
        }
        $this->genererVueAdmin($param);
    }

    public function billetCreer()
    {
        if ($this->requete->existeParametre("dateBillet") && $this->requete->existeParametre("titreBillet") && $this->requete->existeParametre("contenuBillet")) {
            $dateBillet = $this->requete->getParametre('dateBillet');
            $titreBillet = $this->requete->getParametre('titreBillet');
            if($this->requete->existeParametre('photoBillet')){
                $photoBillet = $this->requete->getParametre('photoBillet');
            }else{
                $photoBillet = "defaut";
            }
            $contenuBillet = $this->requete->getParametre('contenuBillet');
            $this->billet->BilletCreer($dateBillet, $titreBillet, $photoBillet, $contenuBillet);
            $this->rediriger("admin");
        }
        $billet = array('title' => "Mon titre", 'description' => '<p>Le contenu de mon article</p>');
        $this->genererVueAdmin(array('billet' => $billet));
    }

    public function general()
    {

        $ids = $this->requete->getParametre('check_list');

        switch ($this->requete->getParametre('form_action')) {
            case 'supprimer':
                $this->billet->billetSupprimer($ids);
                break;
            case "archiver":
                $this->billet->archiverBillets($ids);
                break;
            default:
        }

    }

    /**
     * $_GET['id'] : id du billet à modifier
     */
    public function billetModifier()
    {
        $id = $this->requete->getParametre('id');
        if ($this->requete->existeParametre("dateBillet") && $this->requete->existeParametre("titreBillet") && $this->requete->existeParametre("contenuBillet")) {
            $dateBillet = $this->requete->getParametre('dateBillet');
            $titreBillet = $this->requete->getParametre('titreBillet');
            $photoBillet = $this->requete->getParametre('photoBillet');
            $contenuBillet = $this->requete->getParametre('contenuBillet');
            $this->billet->billetModifier($id, $dateBillet, $titreBillet, $photoBillet, $contenuBillet);
            $this->rediriger("admin");
        }

        $billet = $this->billet->getBillet($id);
        $this->genererVueAdmin(array('billet' => $billet));
    }

    public function billetSupprimer()
    {
        $id = $this->requete->getParametre('id');
        $this->billet->billetSupprimer($id);
        $this->setFlash(Session::FLASH_TYPE_SUCCESS, "Billet supprimé");
        $this->rediriger("admin/administration");
    }

    public function billetVisible()
    {
        $id = $this->requete->getParametre('id');
        $statut = $this->requete->getParametre('statut');

        $this->billet->BilletVisible($id, $statut);
        $this->setFlash(Session::FLASH_TYPE_SUCCESS, "Statut du billet modifié");
        $this->rediriger("admin/administration");
    }

    public function moderation()
    {
        $billets = $this->billet->getBilletsTronques();
        $commentaires = $this->commentaire->getCommentairesTronques();

        $this->genererVueAdmin(array('billets' => $billets, 'commentaires' => $commentaires));

    }

    public function administration()
    {

        $nbBillets = $this->billet->getNombreBillets();
        $nbCommentaires = $this->commentaire->countCommentaires();
        $nbSignalements = $this->commentaire->getNombreSignalements();
        $billets = $this->billet->getBilletsTronques();
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVueAdmin(array('nbBillets' => $nbBillets,
            'nbCommentaires' => $nbCommentaires, 'nbSignalements' => $nbSignalements, 'billets' => $billets, 'login' => $login));
    }

    public function utilisateurs()
    {
        $utilisateurs = $this->utilisateur->getUtilisateurs();
        $this->genererVueAdmin(array('utilisateurs' => $utilisateurs));
    }

    public function utilisateurModifier() {

    }


    public function supprimerSignalement()
    {
        $id = $this->requete->getParametre('id');
        $this->commentaire->supprimerSignalement($id);
        $this->setFlash(Session::FLASH_TYPE_SUCCESS, "Signalement(s) supprimé(s)");
        $this->rediriger("admin/moderation");
    }

    public function commentaireSupprimer()
    {
        $id = $this->requete->getParametre('id');
        $this->commentaire->commentaireSupprimer($id);
        $this->setFlash(Session::FLASH_TYPE_SUCCESS, "Commentaire supprimé");
        $this->rediriger("admin/moderation");
    }

    public function commentaireEditer()
    {
        $id = $this->requete->getParametre('id');
        if ($this->requete->existeParametre("contenuCommentaire")) {
            $contenuCommentaire = $this->requete->getParametre('contenuCommentaire');
            $this->commentaire->commentaireEditer($contenuCommentaire, $id);
            $this->rediriger("moderation");
        }

        $commmentaire = $this->commentaire->getCommentaire($id);
        $this->genererVueAdmin(array('commentaire' => $commmentaire));

    }
}
