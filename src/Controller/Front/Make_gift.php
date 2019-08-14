<?php
namespace Controller\Front;
/**
 *
 */
class Make_gift{

    function render(){

        $aside = (new \View\Front\Aside())->render();

        $content = [ "aside" => $aside];

        return (new \View\Front\Make_gift())->render($content);

    }

}

 ?>
