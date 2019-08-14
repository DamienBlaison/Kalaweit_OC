<?php

namespace Controller\Back\htmlElement;
/**
 *
 */

class Table_requester
{

    public function __construct(
        $p_content
        )
        {
        $this->data = $p_content;
        $this->id = 'result_request';
        }

    // fonction pour afficher le contenu de la table avec une pagination en JS

    public function render(){

    // head du tableau
    $head = '<br><div class="col-md-12 result_request">';


    $head .= '<div class="table-responsive">';

    $head .= '<table id="table_'.$this->id.'" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="table_info">';
    $head .= '<thead style=""" class="thead-dark">';
    $head .= '<tr role="row">';

    foreach ($this->data[0] as $key => $value) {
        $head .= '<th style="">'.$key.'</th>';

    }

    $head .= '</tr>';
    $head .= '</thead>';

    // body du tableau

    $body ='';

    $body .= "<tbody id='$this->id'>";

    foreach ($this->data as $key => $value) {

    $body .= '<tr role="row" class="odd">';

    foreach ($value as $k => $v) {
        $body .=    '<td style="">'.$v;
        $body .=    '</td>';
    }

    $body .= '</tr>';

    if($key % 10 == 0 && $key != 0){

        $body .= '<thead style=""" class="thead-dark">';
        $body .= '<tr role="row">';

        foreach ($this->data[0] as $k2 => $v2) {
            $body .= '<th style="">'.$k2.'</th>';

        }

        $body .= '</tr>';
        $body .= '</thead>';

    }

    }

    $body .= '</tbody>';
    $body .= '</table>';
    $body .= '</div>';
    $body .= '</div>';

    // view

    $view =  $head.$body;

    //$box_table = (new \Controller\Back\htmlElement\Box($this->name,'box-primary',[$view],[12]))->render();

    //return  $box_table;

    return $view;

    }


}
