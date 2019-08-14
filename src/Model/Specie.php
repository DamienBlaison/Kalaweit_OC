<?php
namespace Model;

/**
 *
 * @author jeromeklam
 *
 */
class Specie
{

    /**
     * Identifiant de l'espece
     * @var integer
     */
    protected $id = null;

    /**
     * Nom francais de l'espece
     * @var string
     */
    protected $name = null;

    /**
     * Nom latin de l'espece
     * @var string
     */
    protected $name_latin = null;

    /**
     * Constructeur
     */
    public function __construct($p_id = null, $p_name = null, $p_name_latin = null)
    {
        $this->id   = $p_id;
        $this->name = $p_name;
        $this->name_latin = $p_name_latin;
    }

    /**
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

}
