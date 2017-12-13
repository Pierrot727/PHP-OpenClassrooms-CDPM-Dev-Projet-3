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
        $this->genererVue(array('billets' => $billets,
            'page' => $page,
            'nbPages' => $nbPages
        ));
    }


    public function page()
    {
        $page = $this->requete->getParametre("id");
        $billets = $this->billet->getBilletsTronquesVisible($page, 200);
        var_dump($billets->fetchAll());
        $nbPages = $this->billet->getNombrePages();
        $this->genererVue(array('billets' => $billets,
            'page' => $page,
            'nbPages' => $nbPages
        ), 'index');
    }

public function forbidden() {
        $this->genererVue();
}

}

