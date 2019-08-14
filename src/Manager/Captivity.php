<?php  namespace Manager;

/**
 * Ile manager
 *
 * @author jeromeklam
 */
class Captivity
{

    /**
     * Retourne toutes les îles
     *
     * @return array(\Model\Ile)
     */
    public function getAll()
    {

        include( __DIR__ .'/../../config/config.php');

        return $config['captivity'];
        
    }
}
