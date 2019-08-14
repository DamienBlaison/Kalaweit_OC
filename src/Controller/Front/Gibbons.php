<?php
namespace Controller\Front;
/**
 *
 */
class Gibbons
{
    function render(){

        $aside = (new \View\Front\Aside())->render();

        $content = [ "aside" => $aside];

        return (new \View\Front\Gibbons())->render($content);

    }

}

 ?>
