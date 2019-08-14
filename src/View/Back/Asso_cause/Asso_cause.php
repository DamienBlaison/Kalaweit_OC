<?php
namespace View\Back\Asso_cause;

/**
 *
 */
class Asso_cause
{

        function render($p_render){

            require_once(__DIR__.'/../Head.php');//flag

            $render  = '';
            $render .= '<div class="container-fluid" style="padding-left:0px;">';
            $render .= '<section class="content">';
            $render .= '<div class="nav-tabs-custom">';
            $render .= '    <ul class="nav nav-tabs">';
            $render .= '        <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Informations générales</a></li>';
            $render .= '        <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Dons</a></li>';
            $render .= '        <li class=""><a href="#tab3" data-toggle="tab" aria-expanded="false">Photos</a></li>';
            $render .= '    </ul>';
            $render .= '<div class="tab-content col-md-12">';
            $render .= '    <div class="tab-pane active" id="tab1">'.$p_render["content_tab1"].' </div>';
            $render .= '    <div class="tab-pane " id="tab2">'.$p_render["content_tab2"].'</div>';
            $render .= '    <div class="tab-pane " id="tab3">'.$p_render["content_tab3"].'</div>';
            $render .= '</div>';
            $render .= '</section>';
            $render .= '</div>';

            echo $render;

            echo '<script src="/Js/Back/Asso_cause_donation.js"></script>';
            require_once( __DIR__ .'/../Footer.php');



        }

}
