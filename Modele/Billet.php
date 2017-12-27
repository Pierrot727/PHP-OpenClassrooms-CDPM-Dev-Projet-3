<?php

namespace Blog\Modele;

use Blog\Framework\Modele;

/**
 * Fournit les services d'accès aux genres musicaux
 *
 */
class Billet extends Modele
{

    const MAX_PER_PAGE = 3;
    const STATUT_HIDDEN = 'NON';
    const STATUT_VISIBLE = 'OUI';


    /*
     * Renvoie le début tronqué d'un billet pour l'admin (initialement) la valeur de la troncature est $limit
     */

    /** Renvoie la liste des billets du blog
     *
     * @return PDOStatement La liste des billets
     */
    public function getBillets($page = 1)
    {

        $sql = 'select BIL_ID as id, BIL_DATE as date,'
            . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
            . ' order by BIL_ID desc';
        $billets = $this->executerRequete($sql, array(), self::MAX_PER_PAGE, ($page - 1) * self::MAX_PER_PAGE);
        return $billets;
    }

    /*
     * Renvoie le début tronqué d'un billet pour l'admin (initialement) la valeur de la troncature est $limit
    */

    public function getBilletsVisible($page = 1)
    {

        $sql = 'select BIL_ID as id, BIL_DATE as date,'
            . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
            . ' WHERE BIL_VISIBLE= "OUI"'
            . ' order by BIL_ID desc';
        $billets = $this->executerRequete($sql, array(), self::MAX_PER_PAGE, ($page - 1) * self::MAX_PER_PAGE);
        return $billets;
    }

    public function getBilletsTronques($page = 1, $limit = 50)
    {
        $valeur = intval($limit);
        $sql = 'select billet.BIL_ID AS id, billet.BIL_CONTENU as contenu, billet.BIL_TITRE as titre, billet.BIL_DATE as date, billet.BIL_VISIBLE as visible, COUNT(com.COM_ID) as cptCom, SUM(com.COM_SIGNALEMENT) as cptSig'
            . ' from T_BILLET as billet'
            . ' LEFT JOIN T_COMMENTAIRE com ON com.BIL_ID = billet.BIL_ID'
            . ' GROUP BY billet.BIL_ID'
            . ' order by billet.BIL_ID desc';
        $billetsTronques = $this->executerRequete($sql, array(), self::MAX_PER_PAGE, ($page - 1) * self::MAX_PER_PAGE);
        return $billetsTronques;
    }

    public function getBilletsTronquesVisible($page = 1, $left = 50)
    {
        $valeur = intval($left);
        $sql = 'select billet.BIL_ID AS id, LEFT (billet.BIL_CONTENU, :left) as contenu, billet.BIL_TITRE as titre, billet.BIL_PHOTO as photo, billet.BIL_DATE as date, billet.BIL_VISIBLE as visible, COUNT(com.COM_ID) as cptCom'
            . ' from T_BILLET as billet'
            . ' LEFT JOIN T_COMMENTAIRE com ON com.BIL_ID = billet.BIL_ID'
            . ' WHERE BIL_VISIBLE= "OUI"'
            . ' GROUP BY billet.BIL_ID'
            . ' order by billet.BIL_ID desc'
            . ' LIMIT :limit OFFSET :offset';
        $billetsTronquesVisible = $this->executerRequete($sql, array(
                'left' => $left,
                'limit' => self::MAX_PER_PAGE,
                'offset' => ($page - 1) * self::MAX_PER_PAGE)
        );
        return $billetsTronquesVisible;
    }

    /** Renvoie les informations sur un billet
     *
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getBillet($idBillet)
    {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
            . ' BIL_TITRE as titre, BIL_CONTENU as contenu, BIL_PHOTO as photo from T_BILLET'
            . ' where BIL_ID= :billetID';
        $billet = $this->executerRequete($sql, array('billetID' => $idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }

    public function getNombrePages()
    {
        return ceil($this->getNombreBillets() / self::MAX_PER_PAGE);
    }

    /**
     * Renvoie le nombre total de billets
     *
     * @return int Le nombre de billets
     */
    public function getNombreBillets()
    {
        $sql = 'SELECT count(*) AS nbBillets FROM T_BILLET';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch(); // Le résultat comporte toujours 1 ligne
        return $ligne['nbBillets'];
    }

    public function billetCreer($dateBillet, $titreBillet, $photoBillet, $contenuBillet)
    {
        $sql = 'INSERT INTO T_BILLET SET BIL_DATE= :dateBillet, BIL_TITRE= :titreBillet, BIL_PHOTO= :photoBillet, BIL_CONTENU= :contenuBillet';
        return $this->executerRequete($sql, array(
                'dateBillet' => $dateBillet,
                'titreBillet' => $titreBillet,
                'photoBillet' => $photoBillet,
                'contenuBillet' => $contenuBillet
            ))->rowCount() == 1;
    }

    public function billetModifier($idBillet, $dateBillet, $titreBillet, $photoBillet, $contenuBillet)
    {
        $sql = 'UPDATE T_BILLET SET BIL_DATE= :dateBillet, BIL_TITRE= :titreBillet, BIL_PHOTO = :photoBillet, BIL_CONTENU= :contenuBillet WHERE BIL_ID=:id';
        return $this->executerRequete($sql, array(
                'dateBillet' => $dateBillet,
                'titreBillet' => $titreBillet,
                'photoBillet' => $photoBillet,
                'contenuBillet' => $contenuBillet,
                'id' => $idBillet
            ))->rowCount() == 1;
    }

    public function billetSupprimer($idBillet)
    {
        $sql = 'DELETE FROM `t_billet` WHERE BIL_ID = :numeroBillet';

        return $this->executerRequete($sql, array(
                'numeroBillet' => $idBillet,
            ))->rowCount() == 1;
    }

    public function billetsSupprimer($idBillets)
    {
        $sql = 'DELETE FROM `t_billet` WHERE BIL_ID IN (:numeroBillets)';


        return $this->executerRequete($sql, array(
                'numeroBillets' => implode($idBillets, ','),
            ))->rowCount() == 1;
    }

    public function billetVisible($idBillets, $statut = self::STATUT_HIDDEN)
    {
        $sql = 'UPDATE T_BILLET SET BIL_VISIBLE= :visibleBillet WHERE BIL_ID=:id';

        return $this->executerRequete($sql, array(
                'visibleBillet' => $statut,
                'id' => $idBillets,
            ))->rowCount() == 1;

    }

    public function formatDate($billet){
        $dateModifie = IntlDateFormatter::formatObject(new DateTime($billet['date']),IntlDateFormatter::LONG);
    return $dateModifie;
    }

}