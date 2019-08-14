<?php
namespace Manager;

class Donation_type
{

    /**
     * Retourne toutes les types de dons
     *
     * @return array(\Model\Donation_type)
     */

     public function getAll()
     {

        include( __DIR__ .'/../../config/config.php');

        return $config['donation_type'];

     }
}
