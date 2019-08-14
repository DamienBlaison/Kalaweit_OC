<?php namespace Controller\Back;

class Progress
{

    function Receipt_annual_generation_progress(){

        $bdd = (new \Manager\Connexion())->getBdd();

        return (new \Manager\Receipt_annual($bdd))->get_achievment();
    }

}


?>
