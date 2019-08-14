<?php

namespace Controller\Back\htmlElement;
/**
 *
 */

class Table_import_ajax
{
    public function __construct($p_content,$id)

        {
        $this->data = $p_content;
        $this->id = 'result_import_'.$id;
        }

        function render(){

        $head = '';

        $head .= '<table id="table_'.$this->id.'" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="table_info">';
        $head .= '<thead style=""" class="thead-dark">';
        $head .= '<tr role="row">';

        $data_head = $this->data[0];

        foreach ($data_head as $key => $value) {

            $head .= '<th style="">'.$value.'</th>';

        }

        if($this->id == 'result_import_ko'){
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

        if($this->id == 'result_import_ko'){

        $body .= '<td><a href="/www/Kalaweit/member/list/1?cli_lastname='.$value["B"].'" target="_blank" id= "plus_'.$key.'" class="btn btn-default col-md-12 "> <i class="fa fa-search "></i></a></td>';

        }

        $body .= '</tr>';
        };

        $body .= '</tbody>';
        $body .= '</table>';

        return $head.$body;
    }

}
