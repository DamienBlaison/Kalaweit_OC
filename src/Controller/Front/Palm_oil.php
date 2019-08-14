<?php
namespace Controller\Front;
/**
 *
 */
class Palm_oil
{
    function render(){

        $aside = (new \View\Front\Aside())->render();

        $content = [ "aside" => $aside];

        return (new \View\Front\Palm_oil())->render($content);

    }

}

 ?>
