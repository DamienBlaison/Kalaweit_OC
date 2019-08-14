<?php
namespace Controller\Front;
/**
 *
 */
class Home
{
    function render(){

        $aside = (new \View\Front\Aside())->render();

        $content = [ "aside" => $aside];

        return (new \View\Front\Home())->render($content);

    }

}
