<?php  namespace Manager;
/**
 *
 */
class Request
{

    function __construct($p_bdd)
    {
        $this->bdd = $p_bdd;
    }

    function render($p_request){

        $reqprep = $this->bdd->prepare("$p_request");

        $prepare = [];

        $reqprep->execute($prepare);

        $return = [

            "data" => $reqprep->fetchAll(\PDO::FETCH_ASSOC),
            "count" => $reqprep->rowcount(),
            "error" => $reqprep->errorInfo()

        ];

        return $return;


    }



}
