<?php
namespace Controller\Front;
/**
 *
 */
class History
{
    function render(){

        $aside = (new \View\Front\Aside())->render();

        $content = [ "aside" => $aside];

        return (new \View\Front\History())->render($content);

    }

}

 ?>
