<?php
namespace Controller\Front;
/**
 *
 */
class Deforestation
{
    function render(){

        $aside = (new \View\Front\Aside())->render();

        $content = [ "aside" => $aside];

        return (new \View\Front\Deforestation())->render($content);

    }

}

 ?>
