<?php
namespace Controller\Front;
/**
 *
 */
class Borneo{

    function render(){

        $aside = (new \View\Front\Aside())->render();

        $content = [ "aside" => $aside];

        return (new \View\Front\Borneo())->render($content);

    }

}

 ?>
