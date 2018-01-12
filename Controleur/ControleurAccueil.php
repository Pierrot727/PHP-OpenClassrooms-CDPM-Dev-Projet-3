<?php

namespace Blog\Controleur;

use Blog\Framework\Controleur;
use Blog\Framework\Session;
use Blog\Modele\Billet;
use Blog\Modele\Commentaire;
use Blog\Modele\Utilisateur;
use Blog\Modele\Histoire;

class ControleurAccueil extends Controleur
{

    private $billet;
    private $histoire;

    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
        $this->utilisateur = new Utilisateur();
        $this->histoire = new Histoire();
    }

    // Affiche la liste de tous les billets du blog
    public function index()
    {
        $page = 1;
        $histoire = $this->histoire->auteur();
        $billets = $this->billet->getBilletsTronquesVisible($page, 200);
        $nbPages = $this->billet->getNombrePages();
        if (isset($_COOKIE['no_splash'])) {
            $this->genererVue(array('billets' => $billets,
                'page' => $page,
                'nbPages' => $nbPages,
                'histoire' => $histoire,
            ));
        } else {
            $this->rediriger('accueil', 'splash');
        }
    }


    public function page()
    {
        $page = $this->requete->getParametre("id");
        $billets = $this->billet->getBilletsTronquesVisible($page, 200);
        $nbPages = $this->billet->getNombrePages();
        $this->genererVue(array('billets' => $billets,
            'page' => $page,
            'nbPages' => $nbPages
        ), 'index');
    }

    public function splash()
    {
        $expire = time() + 60 * 60 * 24;                    // Cookie expire dans 1 jour - 60 seconds * 60 minutes * 24 hours
        setcookie("no_splash", "1", $expire, '/');  // Paramatréage du cookie : setcookie(cookie_name, cookie_value, expiry_time)
        $this->genererVue();
    }

    public function forbidden()
    {
        $this->genererVue();
    }

    public function inscription()
    {
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
            $loginExistant = $this->utilisateur->existanceUtilisateur($pseudo, $nom, $prenom, $email);
            if ($mdp === $verifMdp) {
                if ($loginExistant == false ) {
                        $this->utilisateur->inscription($pseudo, $mdp, $nom, $prenom, $dateNaissance, $email);
                        $this->setFlash(Session::FLASH_TYPE_SUCCESS,"Inscription réalisée !");
                        $this->rediriger("admin");
                } else {
                    $param['msgErreur'] = $loginExistant;
                    $this->setFlash(Session::FLASH_TYPE_WARNING,"Login existant");
                }
            } else {
                $param['msgErreur'] = 'Mot de passe non identique !';
                $this->setFlash(Session::FLASH_TYPE_SUCCESS, "Mot de passe non identique !");
            }
        }
        $this->genererVue();
    }

}

