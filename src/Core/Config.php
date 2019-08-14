<?php
namespace Core;

/**
 *
 * @author jeromeklam
 *
 */
class Config
{

    /**
     * Instance
     * @var \Core\Config
     */
    protected static $instance = null;

    /**
     * Fichier de configuration
     * @var string
     */
    protected $file = null;

    /**
     * Configuration chargée ?
     * @var boolean
     */
    protected $loaded = false;

    /**
     * La config
     * @var array
     */
    protected $config = [];

    /**
     * Constructeur protégé, on doit passer par getInstance, principe Singleton
     */
    protected function __construct(string $p_file = null)
    {
        $this->file = $p_file;
    }

    /**
     * Retourne une instance qui sera unique, principe Singleton
     *
     * @return \Core\Config
     */
    public static function getInstance(string $p_file = null)
    {
        if (self::$instance === null) {
            self::$instance = new self($p_file);
        }
        return self::$instance;
    }

    /**
     * Charge la configuration
     */
    protected function load()
    {
        if (is_file($this->file)) {
            $this->config = @include($this->file);
        } else {
            throw new \Exception(sprintf('Fichier de configuration %s introuvable !', $this->file));
        }
        $this->loaded = true;
    }

    /**
     * Get key value
     *
     * @param string $p_key
     */
    public function get(string $p_key, $p_default = false)
    {
        if (!$this->loaded) {
            $this->load();
        }
        if (array_key_exists($p_key, $this->config)) {
            return $this->config[$p_key];
        }
        return $p_default;
    }
}
