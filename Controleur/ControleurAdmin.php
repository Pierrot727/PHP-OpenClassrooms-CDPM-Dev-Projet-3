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
        $nbBillets = $this->billet->getNombreBillets();
        $nbCommentaires = $this->commentaire->countCommentaires();
        $nbSignalements = $this->commentaire->getNombreSignalements();
        $billets = $this->billet->getBilletsTronques();
        $login = $this->requete->getSession()->getAttribut("login");
        $utilisateur = $this->utilisateur->getUtilisateur($login);
        $grade = $this->requete->getSession()->getAttribut("grade");
        $this->genererVueAdmin(array('nbBillets' => $nbBillets,
            'nbCommentaires' => $nbCommentaires, 'nbSignalements' => $nbSignalements, 'billets' => $billets, 'login' => $login, 'utilisateur' => $utilisateur, 'grade' => $grade));
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
        $grade = $this->requete->getSession()->getAttribut("grade");
        $this->genererVueAdmin(array($param,'grade' => $grade));
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

        $grade = $this->requete->getSession()->getAttribut("grade");
        $this->genererVueAdmin(array($param, 'grade' => $grade));
    }



    public function utilisateurSupprimer() {
        $this->needAdminRole();
        $id = $this->requete->getParametre('id');
        $this->utilisateur->utilisateurSupprimer($id);
        $this->setFlash(Session::FLASH_TYPE_SUCCESS, "Utilisateur supprimé");
        $this->rediriger("admin","utilisateurs");
    }

    public function utilisateurModerateur() {
        $this->needAdminRole();
        $id = $this->requete->getParametre('id');
        $this->utilisateur->utilisateurModerateur($id);
        $this->setFlash(Session::FLASH_TYPE_SUCCESS, "Utilisateur upgradé Modérateur");
        $this->rediriger("admin","utilisateurs");
    }

    public function utilisateurAdministrateur() {
        $this->needAdminRole();
        $id = $this->requete->getParametre('id');
        $this->utilisateur->utilisateurAdministrateur($id);
        $this->setFlash(Session::FLASH_TYPE_SUCCESS, "Utilisateur upgradé administrateur");
        $this->rediriger("admin","utilisateurs");
    }

    public function utilisateurDemote() {
        $this->needAdminRole();
        $id = $this->requete->getParametre('id');
        $this->utilisateur->utilisateurDegrade($id);
        $this->setFlash(Session::FLASH_TYPE_SUCCESS, "Dégradation utilisateur");
        $this->rediriger("admin","utilisateurs");
    }

    public function utilisateurBannir() {
        $this->needAdminRole();
        $id = $this->requete->getParametre('id');
        $this->utilisateur->utilisateurBannir($id);
        $this->setFlash(Session::FLASH_TYPE_SUCCESS, "Utilisateur banni !");
        $this->rediriger("admin","utilisateurs");
    }

    public function utilisateurDeBannir() {
        $this->needAdminRole();
        $id = $this->requete->getParametre('id');
        $this->utilisateur->utilisateurDeBannir($id);
        $this->setFlash(Session::FLASH_TYPE_SUCCESS, "Utilisateur debanni !");
        $this->rediriger("admin","utilisateurs");
    }

    public function billetCreer()
    {
        $this->needAdminRole();
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
        $grade = $this->requete->getSession()->getAttribut("grade");
        $this->genererVueAdmin(array('billet' => $billet, 'grade' => $grade));
    }

    public function general()
    {
        $this->needAdminRole();
        $ids = $this->requete->getParametre('check_list');

        switch ($this->requete->getParametre('form_action')) {
            case 'supprimer':
                $this->billet->billetSupprimer($ids);
                break;
            default:
        }

    }

    /**
     * $_GET['id'] : id du billet à modifier
     */
    public function billetModifier()
    {
        $this->needAdminRole();
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
        $grade = $this->requete->getSession()->getAttribut("grade");
        $this->genererVueAdmin(array('billet' => $billet, 'grade' => $grade));
    }

    public function billetSupprimer()
    {
        $this->needAdminRole();
        $id = $this->requete->getParametre('id');
        $this->billet->billetSupprimer($id);
        $this->setFlash(Session::FLASH_TYPE_SUCCESS, "Billet supprimé");
        $this->rediriger("admin/administration");
    }

    public function billetVisible()
    {
        $this->needAdminRole();
        $id = $this->requete->getParametre('id');
        $statut = $this->requete->getParametre('statut');

        $this->billet->BilletVisible($id, $statut);
        $this->setFlash(Session::FLASH_TYPE_SUCCESS, "Statut du billet modifié");
        $this->rediriger("admin/administration");
    }

    public function moderation()
    {
        $this->needModeratorRole();
        $billets = $this->billet->getBilletsTronques();
        $commentaires = $this->commentaire->getCommentairesTronques();
        $grade = $this->requete->getSession()->getAttribut("grade");
        $this->genererVueAdmin(array('billets' => $billets, 'commentaires' => $commentaires, 'grade' => $grade));

    }

    public function administration()
    {
        $this->needAdminRole();
        $nbBillets = $this->billet->getNombreBillets();
        $nbCommentaires = $this->commentaire->countCommentaires();
        $nbSignalements = $this->commentaire->getNombreSignalements();
        $billets = $this->billet->getBilletsTronques();
        $login = $this->requete->getSession()->getAttribut("login");
        $grade = $this->requete->getSession()->getAttribut("grade");
        $this->genererVueAdmin(array('nbBillets' => $nbBillets,
            'nbCommentaires' => $nbCommentaires, 'nbSignalements' => $nbSignalements, 'billets' => $billets, 'login' => $login, 'grade' => $grade));
    }

    public function utilisateurs()
    {
        $this->needAdminRole();
        $utilisateurs = $this->utilisateur->getUtilisateurs();
        $grade = $this->requete->getSession()->getAttribut("grade");
        $this->genererVueAdmin(array('utilisateurs' => $utilisateurs, 'grade' => $grade));
    }

    public function utilisateurEditer() {
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

        $grade = $this->requete->getSession()->getAttribut("grade");
        $this->genererVueAdmin(array($param, 'grade' => $grade));

    }


    public function supprimerSignalement()
    {
        $this->needModeratorRole();
        $id = $this->requete->getParametre('id');
        $this->commentaire->supprimerSignalement($id);
        $this->setFlash(Session::FLASH_TYPE_SUCCESS, "Signalement(s) supprimé(s)");
        $this->rediriger("admin","moderation");
    }

    public function commentaireSupprimer()
    {
        $this->needModeratorRole();
        $id = $this->requete->getParametre('id');
        $this->commentaire->commentaireSupprimer($id);
        $this->setFlash(Session::FLASH_TYPE_SUCCESS, "Commentaire supprimé");
        $this->rediriger("admin","moderation");
    }

    public function commentaireEditer()
    {
        $this->needModeratorRole();
        $id = $this->requete->getParametre('id');
        if ($this->requete->existeParametre("contenuCommentaire")) {
            $contenuCommentaire = $this->requete->getParametre('contenuCommentaire');
            $this->commentaire->commentaireEditer($contenuCommentaire, $id);
            $this->rediriger("admin","moderation");
        }
        $grade = $this->requete->getSession()->getAttribut("grade");
        $commmentaire = $this->commentaire->getCommentaire($id);
        $this->genererVueAdmin(array('commentaire' => $commmentaire, 'grade' => $grade));

    }
}
