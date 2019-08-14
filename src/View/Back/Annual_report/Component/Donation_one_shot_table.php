<?php
namespace View\Back\Annual_report\Component;

class Donation_one_shot_table

{

    function render($id,$title,$data){

        //////////////////////////////////////////////////////////////////////////////////

        // LES DATA DOIVENT ETRE DU TYPE //

        //$data = [['animaux',2,2,3,4,5,6,8,6,5,0,0,0],['foret',2,3,6,7,8,8,4,6,0,0,1,1]];

        //////////////////////////////////////////////////////////////////////////////////

        $head = ['Type de don','janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre', 'Total'];

        $table  = '<div class=" table-responsive">';
        $table .=   '<table class="table table-bordered table-striped dataTable" role="grid">';
        $table .=       '<thead class="">';
        $table .=           '<tr role="row">';

        //////////////////////////////////////////////////////////////////////////////////

                            // creation du header du tableau //

        //////////////////////////////////////////////////////////////////////////////////

        foreach ($head as $key => $value) {

            $table .=           '<th>'.$value.'</th>';
        }

        $table .=           '</tr>';
        $table .=       '</thead>';

        //////////////////////////////////////////////////////////////////////////////////

                            // creation du body du tableau //

        // on récupère les infos du tableau $data et on y rajoute une colonne totale avec
        //la en utilisant la focntion intval pour convertir les entree en nombre

        //////////////////////////////////////////////////////////////////////////////////

        $table .=       '<tbody>';

        foreach ($data as $key) {

            $table .=       '<tr>';

            $sum = 0;

            foreach ($key as $k => $v) {

                if (is_null($v)) {

                    $table .=       '<td> 0 </td>';


                } else {

                    $table .=       '<td>'.$v.'</td>';

                    $sum = intval($sum) + intval($v);

                }
            }
            $table .=       '<td>'.$sum.'</td>';
            $table .=       '</tr>';

        }

        $table .=       '</tbody>';
        $table .=   '</table>';
        $table .= '</div>';

        //////////////////////////////////////////////////////////////////////////////////

                            // creation de la valeur de retour //

        //on instancie une box et on lui passe les elements de la table

        //////////////////////////////////////////////////////////////////////////////////

        return (new \Controller\Back\htmlElement\Box($title,'box-primary',[$table],''))->render();

    }

}
