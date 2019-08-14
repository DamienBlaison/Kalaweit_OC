<?php

    require_once(__DIR__ .'/../../../vendor/autoload.php');

    ini_set('memory_limit', '1024M');

    (new \Controller\Back\Receipt_annual())->generate();
