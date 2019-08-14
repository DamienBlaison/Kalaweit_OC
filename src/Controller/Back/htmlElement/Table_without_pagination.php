<?php

namespace Controller\Back\htmlElement;
/**
 *
 */
class Table_without_pagination
{

    public function __construct(
        $p_name,
        $p_data,
        $p_id,
        $p_link,
        $p_update,
        $p_delete,
        $p_print,
        $p_position_status,
        $p_add

        )

        {

        $this->name = $p_name;
        $this->data = $p_data;
        $this->id = $p_id;
        $this->link = $p_link;
        $this->update = $p_update;
        $this->delete = $p_delete;
        $this->print = $p_print;
        $this->position_status = $p_position_status;
        $this->add = $p_add;


        }



    // fonction pour afficher le contenu de la table avec une pagination en JS

    public function render(){

    $url = explode("/",$_SERVER['REQUEST_URI']);
    $from = $url["4"];



    // head du tableau

    $head = '<div class="table-responsive">';

    $head .= '<table id="table_'.$this->id.'" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="table_info">';
    $head .= '<thead>';
    $head .= '<tr role="row">';

    for ($i = 0; $i < count($this->data['head']); $i++) {

        if($i < 2){

            $head .= '<th style="display:none;" class="" tabindex="'.$i.'" aria-controls="control'.$i.'" rowspan="1" colspan="1" aria-sort="ascending">'.$this->data['head'][$i].'</th>';

        } else {

            $head .= '<th class="" tabindex="'.$i.'" aria-controls="control'.$i.'" rowspan="1" colspan="1" aria-sort="ascending">'.$this->data['head'][$i].'</th>';
        };

    };

    $head .= '</tr>';
    $head .= '</thead>';

    // body du tableau

    $body ='';

    $body .= "<tbody id='$this->id'>";

    foreach ($this->data['content'] as $key => $value) {

        $body .= '<tr role="row" class="odd">';

        foreach ($value as $k => $v) {

            if ($k == $this->position_status && $v == 'OK') { $print_access = true; } else { $print_access = false;};

            if($k < 2)

            {
                $body .= '<td style = "display:none;">'.$v.'</a></td>';
            } else  {

                $body .= '<td>'.$v.'</a></td>';
            }
        }

        $body .= '<td style = "width:135px;">';

        if($print_access == false){



        $body .=    '<a style="margin-right:5px;" href="'.$this->update.$value[0].'&from='.$from.'" class="btn btn-primary" id="update_'.$value[0].'"><i class="fa fa-edit"></i></a>';
        $body .=    '<a style="margin-right:5px;"href="'.$this->delete.$value[0].'" class="btn btn-danger" id="delete_'.$value[0].'" onclick ="return confirm(\'Etes vous sur de vouloir supprimer cet enregistrement\')"><i class="fa  fa-trash"></i></a>';

    } else {

        $body .=    '<a style="margin-right:5px;" href="" class="btn btn-default" id="update_'.$value[0].'" disabled><i class="fa fa-edit"></i></a>';
        $body .=    '<a style="margin-right:5px;"href="" class="btn btn-default" id="delete_'.$value[0].'" disabled><i class="fa  fa-trash"></i></a>';


    }

        $bdd = (new \Manager\Connexion())->getBdd();



        if($this->id == "Table_last_adhesion"){

            $name_receipt = (new \Manager\Receipt($bdd))->name_receipt_adhesion($value[0]);

        } else {

            $name_receipt = (new \Manager\Receipt($bdd))->name_receipt($value[0]);

        }

        if($print_access == true){

            if( $name_receipt != NULL){

                $body .=    '<a href="/www/Receipt/'.$name_receipt["rec_number"].'.pdf"  style="margin-right:5px;" class="btn btn-success" id="print_'.$value[0].'" ><i class="fa fa-print"></i></a>';

            } else {

                $body .=    '<a href="'.$this->print.$value[0].'"  style="margin-right:5px;" class="btn btn-warning" id="print_'.$value[0].'" ><i class="fa fa-print"></i></a>';
            }

        } else {

            $body .=    '<a href="#"  style="margin-right:5px;" class="btn btn-default" id="print_'.$value[0].'" disabled=disabled ><i class="fa fa-print"></i></a>';
        }


        $body .= '</td>';

        $body .= '</tr>';
    }

    $body .= '</tbody>';
    $body .= '</table>';
    $body .= '</div>';

    // view

    $view =  $head.$body;

    $box_table = (new \Controller\Back\htmlElement\Box($this->name,'box-primary',[$view],[12]))->render();

    return  $box_table;

    }

}
