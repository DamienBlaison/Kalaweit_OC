<?php
namespace Controller\Front;
/**
 *
 */
class Context
{
    function render(){

        $aside = (new \View\Front\Aside())->render();

        $content = [ "aside" => $aside];

        return (new \View\Front\Context())->render($content);

    }

}

 ?>
