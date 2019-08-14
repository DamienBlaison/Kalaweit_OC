<?php

namespace Manager;


class Sso_token

{

    function __construct($p_login,$p_token,$bdd)
    {
        $this->login = $p_login;
        $this->token = $p_token;
        $this->bdd = $bdd;
    }

    function add(){

        $time_demand = date('Y-m-d H:i:s');
        $strotime = strtotime($time_demand);
        $strotime_end = $strotime + 86400;
        $time_end_token = date('Y-m-d H:i:s', $strotime_end);

        $reqprep = $this->bdd->prepare('INSERT INTO sso_password_token (ptok_token,ptok_request_ip,ptok_email,ptok_end) VALUES(:token,:time_demand,:email,:time_end_token)');
        $prepare =[
            ":token" => $this->token,
            ":time_demand" => $time_demand,
            ":time_end_token"=>$time_end_token,
            ":email" => $this->login
        ];

        $reqprep->execute($prepare);

    }

    function get_login(){

        $reqprep = $this->bdd->prepare('SELECT ptok_email FROM sso_password_token WHERE ptok_token = :token');

        $prepare = [
            ":token" => $this->token
        ];

        $reqprep->execute($prepare);

        return $login = $reqprep->fetch(\PDO::FETCH_ASSOC);

    }

    function delete(){

        $reqprep = $this->bdd->prepare("DELETE FROM sso_password_token WHERE ptok_token = :token");
        $prepare = [":token" => $this->token ];
        $reqprep->execute($prepare);

    }

    function clean(){

        $time_check = date('Y-m-d H:i:s');
        $strotime = strtotime($time_check);
        $strotime_end = $strotime - 86400;
        $time_end = date('Y-m-d H:i:s', $strotime_end);

        $reqprep = $this->bdd->prepare("DELETE FROM sso_password_token WHERE ptok_end <= :now ");
        $prepare = [":now" => $time_end];
        $reqprep->execute($prepare);

    }

}
 ?>
