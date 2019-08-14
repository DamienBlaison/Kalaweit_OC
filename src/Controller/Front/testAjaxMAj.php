<?php
namespace Controller\Front;
/**
 *
 */
class Insert_gift
{
    function Insert_gift(){

        $bdd = new \Manager\Connexion();
        $bdd = $bdd->getBdd();

        $amount = $_POST["amount"];
        $id = htmlspecialchars($_POST["id"]);

        $reqprep = $bdd->prepare("INSERT INTO wf_theme (thm_name , thm_description) VALUES (:amount,:id)");

        $prepare = [
            ":amount" => $_amount,
            ":id" =>$id ]
            ;

        $reqprep->execute($prepare);
    }

}

 ?>
