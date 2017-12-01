<?php

namespace Blog\Controleur;

use Blog\Framework\Controleur;
use Blog\Modele\Billet;
use Blog\Modele\Commentaire;

class ControleurAccueil extends Controleur
{

    private $billet;
    private $nombreCommentaireParBillet;

    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    // Affiche la liste de tous les billets du blog
    public function index()
    {
        $billets = $this->billet->getBilletsTronquesVisible(1, 200);

        //  $nombreCommentairesParBillet = $this->Commmentaire->countCommentairesPerBillet();
        $this->genererVue(array('billets' => $billets));
    }

}

