<?php
namespace Controller\Back;

/**
 *
 */
class Asso_adhesion
{

    function add () {

        $bdd = new \Manager\Connexion();
        $bdd = $bdd->getBdd();

        if (isset($_POST['adhesion_mnt']) &&  $_POST['adhesion_mnt'] > 0)

        {
            (new \Manager\Asso_adhesion($bdd))->add();
        }


        (new \Controller\Back\Component\Asso_adhesion\Box_add)->render();

    }

    function delete()

    {
        $bdd = new \Manager\Connexion();
        $bdd = $bdd->getBdd();

            (new \Manager\Asso_adhesion($bdd))->delete($_GET['adhesion_id']);

    }

    function update()

    {

        $p_render = [
            "add_adhesion"=>(new \Controller\Back\Component\Asso_adhesion\Asso_adhesion)->update()
        ];

        return (new \View\Back\Asso_adhesion\Asso_adhesion)->render_update($p_render);
            //(new \Manager\Asso_adhesion($bdd))->update($_GET['don_id']);

    }

    function get_list()

    {
        $p_render = (new \Controller\Back\Component\Asso_adhesion\Table_list_adhesion)->render();

        return (new \View\Back\Table\Table_filter)->render($p_render);

    }







}
