<?php
namespace Manager;

/**
 * Ile manager
 *
 * @author jeromeklam
 */
class Crm_client_category
{

    /**
     * Retourne toutes les langues
     *
     * @return array(\Model\Crm_client_category)
     */


     public function getAll(\PDO $bdd){

        $Type = $bdd->query("SELECT * FROM crm_client_category");

        $Type = $Type->fetchAll(\PDO::FETCH_ASSOC);

        return $Type;
     }
}
