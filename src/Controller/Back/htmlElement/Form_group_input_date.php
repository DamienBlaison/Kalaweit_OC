<?php

namespace Controller\Back\htmlElement;

/** $boxcontent = ['<input type="text">input1</input>','<textarea></textarea>'];
*   $box = new \Controller\Back\htmlElement\Box('Box test','box-danger',$boxcontent);
*/
class Form_group_input_date{

    protected $name;

    public function __construct($p_name,$p_placeholder,$p_value = NULL,$p_fontawesome,$p_label){

        $this->fontawesome = $p_fontawesome;
        $this->placeholder = $p_placeholder;
        $this->name = $p_name;
        $this->value = $p_value;
        $this->label = $p_label;

    }

    public function render(){

    $form_group_input = '';
    $form_group_input .= '<label>'.$this->label.'</label>';
    $form_group_input .= '<div class="input-group">';
    $form_group_input .=     '<span class="input-group-addon"><i class="'.$this->fontawesome.'"></i></span>';
    $form_group_input .=     '<input type="date" class="form-control" placeholder="'.$this->placeholder.'" name="'.$this->name.'" value="'.$this->value.'"></input>';
    $form_group_input .= '</div></br>';

    return $form_group_input;

    }


}
