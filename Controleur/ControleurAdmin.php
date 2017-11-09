<?php

namespace Blog\Controleur;

use Blog\Modele\Billet;
use Blog\Modele\Commentaire;
use Blog\Modele\Utilisateur;


/**
 * Contrôleur des actions d'administration
 *
 * @author Baptiste Pesquet
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
        $this->genererVue(array('nbBillets' => $nbBillets,
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

        $this->genererVue($param);
    }

    public function inscription()
    {
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
                $this->rediriger("admin");
            } else {
                $param['msgErreur'] = 'Mot de passe non identique';
            }
        }
        $this->genererVue($param);
    }

    public function creationBillet()
    {
        if ($this->requete->existeParametre("dateBillet") && $this->requete->existeParametre("titreBillet") && $this->requete->existeParametre("contenuBillet")) {
            $dateBillet = $this->requete->getParametre('dateBillet');
            $titreBillet = $this->requete->getParametre('titreBillet');
            $contenuBillet = $this->requete->getParametre('contenuBillet');
            $this->billet->creationBillet($dateBillet, $titreBillet, $contenuBillet);
            $this->rediriger("admin");
        }
        $billet = array('title' => "Mon titre", 'description' => '<p>Le contenu de mon article</p>');
        $this->genererVue(array('billet' => $billet));
    }

    public function test()
    {
        var_dump($_POST);
        $ids = $this->requete->getParametre('check_list');

        switch ($this->requete->getParametre('form_action')) {
            case 'supprimer':
                $this->billet->supprimerBillets($ids);
                break;
            case "archiver":
                $this->billet->archiverBillets($ids);
                break;
            default:
                //
        }

    }

    /**
     * $_GET['id'] : id du billet à modifier
     */
    public function modifierBillet()
    {
        $id = $this->requete->getParametre('id');
        if ($this->requete->existeParametre("dateBillet") && $this->requete->existeParametre("titreBillet") && $this->requete->existeParametre("contenuBillet")) {
            $dateBillet = $this->requete->getParametre('dateBillet');
            $titreBillet = $this->requete->getParametre('titreBillet');
            $contenuBillet = $this->requete->getParametre('contenuBillet');
            $this->billet->modifierBillet($id, $dateBillet, $titreBillet, $contenuBillet);
            $this->rediriger("admin");
        }

        $billet = $this->billet->getBillet($id);
        $this->genererVue(array('billet' => $billet));
    }

    public function supprimerBillet()
    {
        $id = $this->requete->getParametre('id');
        $this->billet->supprimerBillet($id);
        $this->rediriger("admin");
    }


}