<?php
/* classe  permmettant la création de fichier excel */
namespace Controller\Back;

/* import des traits du package */

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export_Excel
{

    /* methode permettant de renvoyer un tableau excel */

    function export_excel($p_tab)

    {
        /* initialisation du nom du fichier a créer */

        $name = htmlspecialchars($_GET["export_name"]);

        //$filename = '/www/'.$name.'.xlsx';

        /* instanciation de l'objet Spreadsheet */

        $spreadsheet = new Spreadsheet();

        //echo'<pre>';
        //var_dump($spreadsheet);
        //echo'</pre>';

        /* application de la méthode getActiveSheet()->fromArray permmettant de remplir le fichier excel à partir d'un tableau */

        /*creation de l'entete du tableau */

        $spreadsheet->getActiveSheet()->fromArray($p_tab["head"],NULL,'A1');

        //echo'<pre>';
        //var_dump($spreadsheet);
        //echo'</pre>';

        /* cretaion du corps du tableau */

        $spreadsheet->getActiveSheet()->fromArray($p_tab["content"],NULL,'A2');

        //echo'<pre>';
        //var_dump($spreadsheet);
        //echo'</pre>';


        /* instanciation d'un objet XLSX en parametre */


        $writer = new Xlsx($spreadsheet);

        //var_dump($writer);

        /* ecriture du fichier */

        //$writer->save($name.'.xlsx');
        $writer->save( __DIR__ .'/../../../Ged/Export_Excel/Export_'.$name.'.xlsx');


    }
}
