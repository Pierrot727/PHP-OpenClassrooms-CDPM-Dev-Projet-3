<?php

namespace Blog\Framework;


/**
 * Classe abstraite Controleur
 * Fournit des services communs aux classes Controleur dérivées
 *
 * @version 1.0
 * @author Baptiste Pesquet
 */
abstract class Controleur
{

    /**
     * @var Requete $requete Requête entrante
     */
    protected $requete;
    /** Action à réaliser */
    private $action;

    /**
     * Définit la requête entrante
     *
     * @param Requete $requete Requete entrante
     */
    public function setRequete(Requete $requete)
    {
        $this->requete = $requete;
    }

    /**
     * Exécute l'action à réaliser.
     * Appelle la méthode portant le même nom que l'action sur l'objet Controleur courant
     *
     * @throws Exception Si l'action n'existe pas dans la classe Controleur courante
     */
    public function executerAction($action)
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        } else {
            $classeControleur = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $classeControleur");
        }
    }

    /**
     * Méthode abstraite correspondant à l'action par défaut
     * Oblige les classes dérivées à implémenter cette action par défaut
     */
    public abstract function index();

    /**
     * Génère la vue associée au contrôleur courant
     *
     * @param array $donneesVue Données nécessaires pour la génération de la vue
     */
    protected function genererVue($donneesVue = array(), $action = null)
    {
        $vue = $this->getVueFromAction($action);
        $vue->generer(array_merge($donneesVue, ['flash' => $this->requete->getSession()->getMessageFlash()]));
    }

    /**
     * @param $action
     * @return Vue
     */
    protected function getVueFromAction($action)
    {
        if ($action) {
            $this->action = $action;
        }
        $classeControleur = get_class($this);
        $controleur = str_replace("Blog\\Controleur\\Controleur", "", $classeControleur);

        // Instanciation et génération de la vue
        $vue = new Vue($this->action, $controleur);
        return $vue;
    }

    protected function genererVueAdmin($donneesVue = array(), $action = null)
    {
        $vue = $this->getVueFromAction($action);
        $vue->genererAdmin(array_merge($donneesVue, ['flash' => $this->requete->getSession()->getMessageFlash()]));
    }

    protected function setFlash($type, $message)
    {
        $this->requete->getSession()->setMessageFlash($type, $message);
    }



    protected function isAuthentificated(){
        return $this->requete->getSession()->existeAttribut("login");
    }

    /**
     * Effectue une redirection vers un contrôleur et une action spécifiques
     *
     * @param string $controleur Contrôleur
     * @param type $action Action Action
     */
    protected function rediriger($controleur, $action = null)
    {
        $racineWeb = Configuration::get("racineWeb", "/");
        // Redirection vers l'URL racine_site/controleur/action

        header("Location:" . $racineWeb . $controleur . "/" . $action);
    }
}
