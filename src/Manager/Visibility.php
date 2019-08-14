<?php  namespace Manager;

/**
 * Ile manager
 *
 * @author jeromeklam
 */
class Visibility
{

    /**
     * Retourne toutes les îles
     *
     * @return array(\Model\Vidsibility)
     */
    public function getAll()
    {

        include( __DIR__ .'/../../config/config.php');

        return $config['visibility'];
    }
}
