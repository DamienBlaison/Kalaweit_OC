<?php
namespace Core;

/**
 * Classe de gestion de la requête
 * @author jeromeklam
 */
class Request
{

    /**
     * Instance
     * @var \Core\Request
     */
    protected static $instance = null;

    /**
     * Paramètres
     * @var array
     */
    protected $params = [];

    /**
     * Constructeur
     */
    protected function __construct()
    {
        $this->params = array_merge($_GET, $_POST);
    }

    /**
     * Instance de la classe
     *
     * @return \Core\Request
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Retourne tous les paramètres
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Get URI
     *
     * @return string
     */
    public function getUri()
    {
        return $_SERVER['REQUEST_URI'];
    }
}
