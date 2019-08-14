<?php
namespace Controller\Front;
/**
 *
 */
class Sumatra{

    function render(){

        $aside = (new \View\Front\Aside())->render();

        $content = [ "aside" => $aside];

        return (new \View\Front\Sumatra())->render($content);

    }

}

 ?>
