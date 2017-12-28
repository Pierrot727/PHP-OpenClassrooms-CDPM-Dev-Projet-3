<?php

namespace Blog\Modele;

use Blog\Framework\Modele;

/**
 * Modélise un utilisateur du blog
 *
 * @author Baptiste Pesquet
 */
class Utilisateur extends Modele
{
    /**
     * Vérifie qu'un utilisateur existe dans la BD
     *
     * @param string $login Le login
     * @param string $mdp Le mot de passe
     * @return boolean Vrai si l'utilisateur existe, faux sinon
     */
    public function connecter($login, $mdp)
    {
        $sql = "SELECT UTIL_ID , UTIL_MDP FROM T_UTILISATEUR WHERE UTIL_LOGIN= :utilLogin";
        $utilisateur = $this->executerRequete($sql, array('utilLogin' => $login));

        if ($utilisateur->rowCount() == 1) {
            $utilisateur = $utilisateur->fetch();
            if (password_verify($mdp, $utilisateur["UTIL_MDP"])) {
                return true;
            } else {
                return false;
            }


        } else {
            return false;
        };
    }

    /**
     * Renvoie un utilisateur existant dans la BD
     *
     * @param string $login Le login
     * @param string $mdp Le mot de passe
     * @return mixed L'utilisateur
     * @throws \Exception Si aucun utilisateur ne correspond aux paramètres
     */
    public function getUtilisateur($login)
    {
        $sql = "SELECT UTIL_ID AS idUtilisateur, UTIL_LOGIN AS login, UTIL_MDP AS mdp, UTIL_GRADE AS grade ,UTIL_NOM AS nom, UTIL_PRENOM AS prenom, UTIL_DNAISSANCE AS naissance, UTIL_EMAIL AS email, UTIL_ACCES AS acces FROM T_UTILISATEUR WHERE UTIL_LOGIN= :login";
        $utilisateur = $this->executerRequete($sql, array('login' => $login));
        if ($utilisateur->rowCount() == 1)
            return $utilisateur->fetch(); // Accès à la première ligne de résultat
        else
            throw new \Exception("Aucun utilisateur ne correspond aux identifiants fournis");
    }

    public function getUtilisateurs()
    {
        $sql = "SELECT UTIL_ID AS id, UTIL_LOGIN AS login, UTIL_NOM AS nom, UTIL_PRENOM AS prenom, UTIL_DNAISSANCE AS naissance, UTIL_EMAIL AS email, UTIL_GRADE AS grade, UTIL_ACCES AS acces  FROM `t_utilisateur`";
        $utilisateurs = $this->executerRequete($sql, array());
        return $utilisateurs;
    }

    /**
     * Modification d'un utilisateur existant - pierre
     */
    public function modificationPassword($id, $mdp)
    {

        $pass_hache = password_hash($mdp, PASSWORD_BCRYPT);


        $sql = 'UPDATE T_UTILISATEUR SET UTIL_MDP= :mdp WHERE UTIL_ID = :id';

        return $this->executerRequete($sql, array(
                'id' => $id,
                'mdp' => $pass_hache
            ))->rowCount() == 1;
    }

    /**
     *
     * Enregistrement d'un utilisateur
     * @param string $login Login
     * @param string $mdp
     * @param string $nom
     * @param string $prenom
     * @param string $dateNaissance
     * @param string $email
     * @return bool
     */
    public function inscription($login, $mdp, $nom, $prenom, $dateNaissance, $email)
    {
        $pass_hache = password_hash($mdp, PASSWORD_BCRYPT);
        $email_verifie = $email;
        $sql = 'INSERT INTO T_UTILISATEUR SET UTIL_LOGIN= :login, UTIL_MDP= :mdp, UTIL_NOM= :nom, UTIL_PRENOM= :prenom, UTIL_DNAISSANCE= :dateNaissance, UTIL_EMAIL= :email';
        return $this->executerRequete($sql, array(
                'login' => $login,
                'mdp' => $pass_hache,
                'nom' => $nom,
                'prenom' => $prenom,
                'dateNaissance' => $dateNaissance,
                'email' => $email_verifie
            ))->rowCount() == 1;

    }

    public function utilisateurModifier($mdp, $nom, $prenom, $dateNaissance, $email) {
        $pass_hache = password_hash($mdp, PASSWORD_BCRYPT);
        $email_verifie = $email;
        $sql = 'UPDATE T_UTILISATEUR SET UTIL_MDP= :mdp, UTIL_NOM= :nom, UTIL_PRENOM= :prenom, UTIL_DNAISSANCE= :dateNaissance, UTIL_EMAIL= :email';
        return $this->executerRequete($sql, array(
                'mdp' => $pass_hache,
                'nom' => $nom,
                'prenom' => $prenom,
                'dateNaissance' => $dateNaissance,
                'email' => $email_verifie
            ))->rowCount() == 1;

    }

    public function utilisateurSupprimer($id) {
        $sql = 'DELETE FROM `t_utilisateur` WHERE UTIL_ID = :utilId';

        return $this->executerRequete($sql, array(
                'utilId' => $id,
            ))->rowCount() == 1;
    }

    public function utilisateurModerateur($id) {
        $sql = 'UPDATE t_utilisateur SET UTIL_GRADE="Moderateur" WHERE UTIL_ID= :utilId';
        return $this->executerRequete($sql, array(
                'utilId' => $id,
            ))->rowCount() == 1;
    }

    public function utilisateurAdministrateur($id) {
        $sql = 'UPDATE t_utilisateur SET UTIL_GRADE="Administrateur" WHERE UTIL_ID= :utilId';
        return $this->executerRequete($sql, array(
                'utilId' => $id,
            ))->rowCount() == 1;
    }

    public function utilisateurDegrade($id) {
    $sql = 'UPDATE t_utilisateur SET UTIL_GRADE="Utilisateur" WHERE UTIL_ID= :utilId';
    return $this->executerRequete($sql, array(
            'utilId' => $id,
        ))->rowCount() == 1;
}

//    /*
//     *
//     */
//    public function verifier_email ($email) {
//
//        //Vérication regex si email contient un "@" $1 et un "." $2 et que les trois derniers caractéres sont alphanumérique $3, et i pour ignorer la casse
//        if (preg_match("#.+(@).+(\.+)\w{2,4}$#", $email)) {
//            return
//        } else {
//
//        }
//    }
//*/

}