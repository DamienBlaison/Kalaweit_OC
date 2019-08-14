<?php namespace Controller\Front;

/**
 *
 */
class Deconnexion
{
    function destroy(){

    $_SESSION = array();
    header('location: /www/home');

    }
}
