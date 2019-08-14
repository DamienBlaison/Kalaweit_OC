<?php

namespace View\Back\Member\Member;

/**
 *
 */
class Member
{

    function render($p_render){

        require_once(__DIR__.'/../../Head.php');//flag

        $render  = '';

        $render .= '<div class="container-fluid" style="padding-left:0px;">';
        $render .= '<section class="content">';
        $render .= '<div class="nav-tabs-custom">';
        $render .= '    <ul class="nav nav-tabs">';
        $render .= '        <li id="tab_pane_1" class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Informations générales</a></li>';
        $render .= '        <li id="tab_pane_2" class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Adhésion/Dons</a></li>';
        $render .= '        <li id="tab_pane_3" class=""><a href="#tab3" data-toggle="tab" aria-expanded="false">Reçu annuel</a></li>';
        $render .= '        <li id="tab_pane_4" class=""><a href="#tab4" data-toggle="tab" aria-expanded="false">Envoyer un Email</a></li>';
        $render .= '    </ul>';
        $render .= '<div class="tab-content col-md-12">';
        $render .= '    <div class="tab-pane active" id="tab1">'.$p_render["content_tab1"].' </div>';
        $render .= '    <div class="tab-pane " id="tab2">'.$p_render["content_tab2"].'</div>';
        $render .= '    <div class="tab-pane " id="tab3">'.$p_render["content_tab3"].'</div>';
        $render .= '    <div class="tab-pane " id="tab4">'.$p_render["content_tab4"].'</div>';
        $render .= '</div>';
        $render .= '</section>';
        $render .= '</div>';

        echo $render;

        echo '<script src="/Js/Back/Member.js"></script>';

        require_once( __DIR__ .'/../../Footer.php');

        $previous_url = explode('?',$_SERVER['HTTP_REFERER']);

        if ( ($previous_url[0] == '/www/Kalaweit/asso_donation/update') || ($previous_url[0] == '/www/Kalaweit/member/get') )

            {

                echo "<script>

                    document.getElementById('tab_pane_1').className = \" \";
                    document.getElementById('tab_pane_2').className = \"active\";
                    document.getElementById('tab1').className = \"tab-pane\";
                    document.getElementById('tab2').className = \"tab-pane active\";

                </script>";

            }
    }

}
