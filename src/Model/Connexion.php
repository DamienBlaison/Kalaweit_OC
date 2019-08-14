<?php

class Connexion

{
    public $host = 'localhost';
    public $user = "root";
    public $pass = "root";
    public $db   = 'kalaweit';

    function getBdd(){

    $bdd = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user,$pass);

    return $bdd;

    }

}


?>
