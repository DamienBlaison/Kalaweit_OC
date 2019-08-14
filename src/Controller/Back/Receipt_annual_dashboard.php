<?php

namespace Controller\Back ;

class Receipt_annual_dashboard{

    function run(){

        include( __DIR__ .'/../../../config/config.php');

        if($config['host']['host'] == 'localhost'){

        exec("cd /Users/damienblaison/Desktop/kalaweit/src/Controller/Back ; php Receipt_annual_generation.php > /dev/null &");

        }

        else {

        exec("cd /var/www/admin-pp/src/Controller/Back ; php Receipt_annual_generation.php > /dev/null &");

        }
    }

    function dashboard(){

        $content =[

            "Receipt_generation_progress" => (new \Controller\Back\htmlElement\Progress_bar())->render(0,100,"Receipt_annual_generation_progress")

        ];

        (new \View\Back\Receipt\Receipt_annual_dashboard())->render($content);
    }

};
