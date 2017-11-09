<?php
namespace Blog\Modele;

use Blog\Framework\Modele;

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Commentaire extends Modele {

// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet) {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
                . ' where BIL_ID= :id';
        $commentaires = $this->executerRequete($sql, array('id'=>$idBillet));
        return $commentaires;
    }

    public function countCommentairesPerBillet($idBillet){
        $sql = 'SELECT COUNT(COM_ID) AS cpt'
            . 'from T_COMMENTAIRE'
            . ' where BIL_ID=:id';
        $nombreCommentairesperBillet = $this->executerRequete($sql, array('id'=>$idBillet))->fetch();
        return $nombreCommentairesperBillet['cpt'];
    }

    public function countCommentaires(){
        $sql = 'SELECT COUNT(COM_ID) AS cpt FROM T_COMMENTAIRE';
        $nombreCommentairesperBillet = $this->executerRequete($sql)->fetch();
        return $nombreCommentairesperBillet['cpt'];
    }

    public function getCommentaire($idCommentaire) {
        $sql = 'select COM_ID as id, COM_DATE as date, BIL_ID as bil_id,'
            . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
            . ' where COM_ID=:id';
        $commentaire = $this->executerRequete($sql, array('id'=>$idCommentaire))->fetch();
        return $commentaire;
    }

    public function ajouterCommentaire($auteur, $contenu, $idBillet) {
        var_dump($auteur,$contenu,$idBillet);
        $sql = 'insert into T_COMMENTAIRE(COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(:auteur, :contenu, :id)';
        //$date = date(DATE_W3C);
        $this->executerRequete($sql, array('auteur'=>$auteur,'contenu'=> $contenu, 'id'=>$idBillet));
    }

    //Ajout Pierre Signalement
    public function ajouterUnSignalement($id) {
        $sql = 'update T_COMMENTAIRE SET COM_SIGNALEMENT = COM_SIGNALEMENT + 1 WHERE COM_ID = :id';
        $this->executerRequete($sql, array('id'=>$id));
    }

    //Ajout Pierre
    public function getNombreSignalements ()
    {
        $sql = 'select count(*) as nbSignalements from T_COMMENTAIRE WHERE COM_SIGNALEMENT != 0';
        $reponse=$this->executerRequete($sql);
        $ligne = $reponse->fetch();
        return $ligne['nbSignalements'];
    }
}