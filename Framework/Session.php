<?php

namespace Blog\Framework;

/**
 * Classe modélisant la session.
 * Encapsule la superglobale PHP $_SESSION.
 *
 * @author Baptiste Pesquet
 */
class Session
{

    const FLASH_TYPE_WARNING = 'warning';
    const FLASH_TYPE_SUCCESS = 'success';

    /**
     * Constructeur.
     * Démarre ou restaure la session
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Détruit la session actuelle
     */
    public function detruire()
    {
        session_destroy();
    }

    public function setMessageFlash($type, $mess)
    {
        $this->setAttribut('flash_type', $type);
        $this->setAttribut('flash_message', $mess);
    }

    /**
     * Ajoute un attribut à la session
     *
     * @param string $nom Nom de l'attribut
     * @param string $valeur Valeur de l'attribut
     */
    public function setAttribut($nom, $valeur)
    {
        $_SESSION[$nom] = $valeur;
    }

    public function getMessageFlash()
    {
        $flash = [];
        if ($this->existeAttribut("flash_type")) {
            $flash['message'] = $this->deleteAttribut('flash_message');
            $flash['type'] = $this->deleteAttribut('flash_type');
        }
        return $flash;
    }

    /**
     * Renvoie vrai si l'attribut existe dans la session
     *
     * @param string $nom Nom de l'attribut
     * @return bool Vrai si l'attribut existe et sa valeur n'est pas vide
     */
    public function existeAttribut($nom)
    {
        return (isset($_SESSION[$nom]) && $_SESSION[$nom] != "");
    }

    public function deleteAttribut($nom)
    {
        $attr = null;

        if ($this->existeAttribut($nom)) {
            $attr = $_SESSION[$nom];
            unset($_SESSION[$nom]);
        }
        return $attr;
    }

    /**
     * Renvoie la valeur de l'attribut demandé
     *
     * @param string $nom Nom de l'attribut
     * @return string Valeur de l'attribut
     * @throws Exception Si l'attribut n'existe pas dans la session
     */
    public function getAttribut($nom)
    {
        if ($this->existeAttribut($nom)) {
            return $_SESSION[$nom];
        } else {
            throw new Exception("Attribut '$nom' absent de la session");
        }
    }

}