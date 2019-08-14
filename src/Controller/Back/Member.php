<?php

/**** classe permettant la gestion des infos liées au membres ****/
namespace Controller\Back;

class Member
{
    /** méthode de gestion d'un membre **/

    function get(){

        $p_render = [

        "content_tab1" => $content_tab1 = (new  \Controller\Back\Component\Member\Member_info)->render(),


        "content_tab2" => $content_tab2 =

        (new  \Controller\Back\Component\Member\Member_adhesion)->render().
        (new  \Controller\Back\Component\Member\Member_donation_asso)->render().
        (new  \Controller\Back\Component\Member\Member_donation)->render().
        (new  \Controller\Back\Component\Member\Member_donation_forest)->render().
        (new  \Controller\Back\Component\Member\Member_donation_dulan)->render(),

        "content_tab3" => $content_tab3 = (new  \Controller\Back\Component\Member\Member_receipt_annual)->render(),

        "content_tab4" => $content_tab4 = (new \Controller\Back\Component\Member\Member_send_mail)->render(),

    ];

        return     (new \View\Back\Member\Member\Member)->render($p_render);
    }

    /** méthode de gestion liste des membres **/

    function get_list()

    {
        $p_render = (new \Controller\Back\Component\Member\Table_member)->render();

        return (new \View\Back\Table\Table_filter)->render($p_render);

    }

    /** méthode d ajout d'un membre **/

    function add(){



        $p_render = [

        "content_tab1" => $content_tab1 = (new  \Controller\Back\Component\Member\Member_info)->render(),
        "content_tab2" => $content_tab2 = '',
        "content_tab3" => $content_tab3 = '',
        "content_tab4" => $content_tab4 = ''


    ];

        return     (new \View\Back\Member\Member\Member)->render($p_render);

    }

    /** méthode de suppression d'un membre **/

    function delete(){

        $bdd = (new \Manager\Connexion)->getBdd();

        return (new \Manager\Member($bdd))->delete();

    }


}
