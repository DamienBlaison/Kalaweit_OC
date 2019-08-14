<?php
namespace Manager;

/**
 * Ile manager
 *
 * @author jeromeklam
 */
class Crm_country
{

    /**
     * Retourne tous les pays
     *
     * @return array(\Model\country)
     */


     public function getAll(\PDO $bdd){

        $country = $bdd->query("SELECT * FROM crm_country");

        $country  = $country ->fetchAll(\PDO::FETCH_ASSOC);

        return $country ;
     }

     public function get($bdd,$id){

         $country = $bdd->query("SELECT cnty_name FROM crm_country  WHERE cnty_id  = $id" );

         $country  = $country ->fetch(\PDO::FETCH_ASSOC);

         return $country ;


     }
}
