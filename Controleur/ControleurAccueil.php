<?php

namespace Blog\Controleur;

use Blog\Framework\Controleur;
use Blog\Modele\Billet;
use Blog\Modele\Commentaire;

class ControleurAccueil extends Controleur
{

    private $billet;

    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    // Affiche la liste de tous les billets du blog
    public function index()
    {
        $page = 1;
        $billets = $this->billet->getBilletsTronquesVisible($page, 200);
        $nbPages = $this->billet->getNombrePages();
        if (isset($_COOKIE['no_splash'])) {
            $this->genererVue(array('billets' => $billets,
                'page' => $page,
                'nbPages' => $nbPages
            ));
        } else {
            $this->rediriger('accueil','splash');
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
        setcookie("no_splash", "1", $expire,'/');  // Paramatréage du cookie : setcookie(cookie_name, cookie_value, expiry_time)
        $this->genererVue();
    }

    public function forbidden()
    {
        $this->genererVue();
    }

}

