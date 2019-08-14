<?php

namespace Controller\Back\htmlElement;
/**
 *
 */

class Table_import
{

    public function __construct($p_content,$p_box_title,$p_box_statut,$col_md,$id)

        {
        $this->data = $p_content;
        $this->p_box_title = $p_box_title;
        $this->p_box_statut = $p_box_statut;
        $this->col_md = $col_md;
        $this->id = 'result_import_'.$id;
        }



    // fonction pour afficher le contenu de la table avec une pagination en JS

    public function render(){

    // head du tableau
    $head = '<br><div class="col-md-12 result_import">';


    $head .= '<div class="table-responsive">';

    $head .= '<table id="table_'.$this->id.'" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="table_info">';
    $head .= '<thead style=""" class="thead-dark">';
    $head .= '<tr role="row">';

    $data_head = $this->data[0];

    foreach ($data_head as $key => $value) {

        $head .= '<th style="">'.$value.'</th>';

    }

    if($this->p_box_statut == 'box-danger'){
    $head .= '<th>Action</th>';
    }

    $head .= '</tr>';
    $head .= '</thead>';

    // body du tableau

    $body ='';

    $body .= "<tbody id='$this->id'>";

    foreach ($this->data[1] as $key => $value) {

    $body .= '<tr role="row" class="odd">';



    foreach ($value as $k => $v) {
        $body .=    '<td id='.$k.'_'.$key.' style="">'.$v;
        $body .=    '</td>';
    }

    if($this->p_box_statut == 'box-danger'){

    $body .= '<td><a href="/www/Kalaweit/member/list/1?cli_lastname='.$value["B"].'" target="_blank" id= "plus_'.$key.'" class="btn btn-default col-md-12 "> <i class="fa fa-search "></i></a></td>';

    }

    $body .= '</tr>';
    };

    $body .= '</tbody>';
    $body .= '</table>';
    $body .= '<br>';
    $body .= '</div>';
    $body .= '</div>';
    $body .= '<br>';

    // view

    $view =  [$head.$body];

     return (new \Controller\Back\htmlElement\Box($this->p_box_title,$this->p_box_statut,$view,$this->col_md))->render();

}

}
