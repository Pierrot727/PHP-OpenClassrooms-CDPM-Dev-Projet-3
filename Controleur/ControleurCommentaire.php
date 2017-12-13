<?php
namespace Blog\Controleur;

use Blog\Framework\Controleur;
use Blog\Modele\Billet;
use Blog\Modele\Commentaire;

/**
 * Contrôleur des actions liées aux billets
 *
 * @author Baptiste Pesquet
 */
class ControleurCommentaire extends Controleur {


    private $commentaire;

    /**
     * Constructeur 
     */
    public function __construct() {
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un billet
    public function index() {
    }

    // Signalement
    public function signaler() {
        $idCommentaire = $this->requete->getParametre("id");
        $com = $this->commentaire->getCommentaire($idCommentaire);
        $this->commentaire->ajouterUnSignalement($idCommentaire);
        $this->rediriger("billet","index/" . $com['bil_id']);

    }
}

