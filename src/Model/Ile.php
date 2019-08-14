<?php
namespace Model;

/**
 *
 * @author jeromeklam
 *
 */
class Ile
{

    /**
     * Identifiant de l'île
     * @var integer
     */
    protected $id = null;

    /**
     * Nom de l'île
     * @var string
     */
    protected $name = null;

    /**
     * Constructeur
     */
    public function __construct($p_id = null, $p_name = null)
    {
        $this->id   = $p_id;
        $this->name = $p_name;
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
