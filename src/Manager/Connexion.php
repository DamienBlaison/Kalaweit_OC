<?php
namespace Manager;

class Connexion

{
    function getBdd(){

        include( __DIR__ .'/../../config/config.php');

        $server = $config["host"]["host"];

        $host = $config["Connexion"][$server]["host"];
        $user = $config["Connexion"][$server]["user"];
        $pass = $config["Connexion"][$server]["pass"];
        $db   = $config["Connexion"][$server]["db"];

        $bdd = new \PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);

        return $bdd;

    }

}
