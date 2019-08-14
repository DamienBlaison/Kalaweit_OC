<?php

include ('./../vendor/autoload.php');

ini_set('date.timezone', 'Europe/Berlin');



/**
 * Le fichier php qui permet d'intégrer toutes les sources dont l'autoloader
 * Le but de l'autoloader est de ne plus avoir besoin de faire de include, require
 * Par contre il faut préfixer les classes par le chemin
 */

session_start();

//ini_set('error_reporting', E_ALL | E_STRICT );
//ini_set('log_errors', 'On');
ini_set('display_errors', 'On');
//ini_set('error_log',' /kunden/homepages/12/d744344652/htdocs/p5/logs');
//ini_set('max_execution_time','3600000');

//phpinfo();

/**
 * Récupération de la configuration
 * C'est l'autoloader qui va inclure le fichier
 * On utilise son chemin
 */

$config = \Core\Config::getInstance('./../config/config.php');

/**
 * On instancie une application qui va se charger de tout gérer, on lui passe la config locale
 * @var \Core\Application $application
 */


$application = new \Core\Application($config);



/**
 * Lancement autour d'une exception pour gérer les erreurs
 */

try {
    /**
     * La classe application va se charger du tout...
     */

    $application->handle();


} catch (\Exception $ex) {
    var_export($ex);

}
