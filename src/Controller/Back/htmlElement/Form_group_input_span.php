<?php

namespace Controller\Back\htmlElement;

/** $boxcontent = ['<input type="text">input1</input>','<textarea></textarea>'];
*   $box = new \Controller\Back\htmlElement\Box('Box test','box-danger',$boxcontent);
*/
class Form_group_input_span{

    protected $name;

    public function __construct($p_name,$p_fontawesome){

        $this->fontawesome = $p_fontawesome;
        $this->name = $p_name;


    }

    public function render(){

    $form_group_input = '';

    $form_group_input.=     '<span id="'.$this->name.'" class="btn btn-default" style="width:100%";><i class="'.$this->fontawesome.'"></i></span>';
    $form_group_input.= '</br>';

    return $form_group_input;

    }


}
