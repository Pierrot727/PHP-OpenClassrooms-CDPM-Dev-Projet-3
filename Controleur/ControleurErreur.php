<?php

namespace Blog\Controleur;

use Blog\Framework\Controleur;
use Blog\Modele\Erreur;

class ControleurErreur extends Controleur
{

    private $Erreur;

    public function __construct()
    {
        $this->Erreur = new Erreur();
    }

    // Affiche la liste de tous les billets du blog
    public function index()
    {
        $this->genererVue(array('msgErreur' =>
            'Login ou mot de passe incorrects'), "index");
    }

}
