<?php

namespace Controller\Front;

/**
*
*/
class Validate_gift_gibbon
{

    function render()
    {

        $reqprep = $bdd = new \Manager\Connexion();
        $bdd = $bdd->getBdd();

        $reqprep = $bdd->prepare("UPDATE asso_donation SET don_status = 'WAIT' WHERE don_id = :don_id");

        $prepare =[":don_id"=> htmlspecialchars($_GET['don_id'])];

        $reqprep->execute($prepare);

    }
}
