<?php

namespace Blog\Modele;

use Blog\Framework\Modele;

/**
 * Fournit les services d'accès aux genres musicaux
 *
 * @author Baptiste Pesquet
 */
class Commentaire extends Modele
{

// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet)
    {
        $sql = 'select COM_ID as id, COM_DATE as date,'
            . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
            . ' where BIL_ID= :id';
        $commentaires = $this->executerRequete($sql, array('id' => $idBillet));
        return $commentaires;
    }


    public function getCommentairesTronques()
    {
        $sql = 'SELECT t_billet.BIL_ID AS id, t_billet.BIL_TITRE AS titre, t_commentaire.COM_ID AS idc, t_commentaire.COM_CONTENU AS contenu, t_commentaire.COM_SIGNALEMENT AS signalement FROM t_commentaire, t_billet WHERE t_billet.BIL_ID = t_commentaire.BIL_ID';
        $CommentairesTronques = $this->executerRequete($sql, array());

        return $CommentairesTronques->fetchall();
    }


    public function getCommentaire($idCommentaire)
    {
        $sql = 'select COM_ID as id, COM_DATE as date, BIL_ID as bil_id,'
            . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
            . ' where COM_ID=:id';
        $commentaire = $this->executerRequete($sql, array('id' => $idCommentaire))->fetch();
        return $commentaire;
    }

    public function countCommentaires()
    {
        $sql = 'SELECT COUNT(COM_ID) AS cpt FROM T_COMMENTAIRE';
        $nombreCommentairesPerBillet = $this->executerRequete($sql)->fetch();
        return $nombreCommentairesPerBillet['cpt'];
    }

    public function ajouterCommentaire($auteur, $contenu, $idBillet)
    {
        $sql = 'INSERT INTO T_COMMENTAIRE(COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' VALUES(:auteur, :contenu, :id)';
        //$date = date(DATE_W3C);
        $this->executerRequete($sql, array('auteur' => $auteur, 'contenu' => $contenu, 'id' => $idBillet));
    }

    public function editerCommentaire ($auteur, $contenu, $idCommentaire) {
        $sql = 'UPDATE T_COMMENTAIRE SET COM_AUTEUR = :auteur, COM_CONTENU = :contenu WHERE COM_ID = :idc'
            . ' VALUES(:auteur, :contenu, :id)';
        $this->executerRequete($sql, array('auteur' => $auteur, 'contenu' => $contenu, 'idc' => $idCommentaire));
    }

    public function supprimerCommentaire($idCommentaire){
        $sql = 'DELETE FROM `t_commentaire` WHERE COM_ID = :idCommentaire';

        return $this->executerRequete($sql, array(
                'idCommentaire' => $idCommentaire,
            ))->rowCount() == 1;
    }


    public function ajouterUnSignalement($id)
    {
        $sql = 'UPDATE T_COMMENTAIRE SET COM_SIGNALEMENT = COM_SIGNALEMENT + 1 WHERE COM_ID = :id';
        $this->executerRequete($sql, array('id' => $id));
    }

    public function supprimerSignalement($id)
    {
        $sql = 'UPDATE T_COMMENTAIRE SET COM_SIGNALEMENT = 0 WHERE COM_ID = :id';
        $this->executerRequete($sql, array('id' => $id));
    }

    //Ajout Pierre
    public function getNombreSignalements()
    {
        $sql = 'SELECT count(*) AS nbSignalements FROM T_COMMENTAIRE WHERE COM_SIGNALEMENT != 0';
        $reponse = $this->executerRequete($sql);
        $ligne = $reponse->fetch();
        return $ligne['nbSignalements'];
    }
}