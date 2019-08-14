<?php
namespace Manager;

/**
 * Ile manager
 *
 * @author jeromeklam
 */
class Asso_payment_type
{

     public function getAll(\PDO $bdd)
     {

        $asso_payement_type = $bdd->query("SELECT * FROM asso_payment_type ");
        $data = $asso_payement_type->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }
}
