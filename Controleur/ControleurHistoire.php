<?php

namespace Blog\Controleur;

use Blog\Framework\Controleur;
use Blog\Modele\Utilisateur;
use Blog\Modele\Histoire;


class ControleurHistoire extends Controleur
{
    private $utilisateur;
    private $histoire;

    public function __construct()
    {
        $this->utilisateur = new Utilisateur();
        $this->histoire = new Histoire();
    }

    public function index()
    {
        $auteur = $this->histoire->auteur();
        $this->genererVue(array('auteur' => $auteur));
    }

}