<?php

namespace Controller\Back\htmlElement;

class Box
{

    protected $box_title;
    protected $box_statut;
    protected $box_content;


    public function __construct($p_box_title,$p_box_statut,$p_box_content,$col_md){

        $this->box_title = $p_box_title;
        $this->box_statut = $p_box_statut;
        $this->box_content = $p_box_content;
        $this->col_md = $col_md;

    }

    function render(){

        $box            = '';
        $box_content    = '';

        foreach ($this->box_content as $key => $value) {

            $bootstrap = $this->col_md;

            if(isset($bootstrap[0])){

                $class = $bootstrap[$key];
            }

            else

            {
                $class = '' ;
            };

            $box_content.= '<div class="col-md-'.$class.'">'.$value.'</div>';
        }

        $box.='    <div id="'.str_replace(' ','_',$this->box_title).'"class="box '.$this->box_statut.'">';
        $box.='         <div class="box-header with-border">';
        $box.='             <h3 class="box-title">'.$this->box_title.'</h3>';

        $box.='         </div><!-- /.box-header -->';

        $box.='         <div class="box-body">';

        $box.=                  $box_content;

        $box.='         </div><!-- /.box-body -->';
        $box.='    </div>';


        return $box;
    }

}
