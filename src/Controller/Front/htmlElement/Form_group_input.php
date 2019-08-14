<?php

namespace Controller\Front\htmlElement;

/** $boxcontent = ['<input type="text">input1</input>','<textarea></textarea>'];
*   $box = new \Controller\Back\htmlElement\Box('Box test','box-danger',$boxcontent);
*/
class Form_group_input{

    protected $name;

    public function __construct($p_name,$p_type,$p_placeholder,$p_value = NULL,$p_fontawesome,$p_require=''){

        $this->fontawesome = $p_fontawesome;
        $this->type = $p_type;
        $this->placeholder = $p_placeholder;
        $this->name = $p_name;
        $this->value = $p_value;
        $this->require = $p_require;

    }

    public function render(){

    $form_group_input = '';
    $form_group_input.= '<div class="input-group flex-nowrap">';
    $form_group_input.=     '<div class="input-group-prepend"><span class="input-group-text"><i class="'.$this->fontawesome.'"></i></div>';
    $form_group_input.=     '<input type="'.$this->type.'" class="form-control" placeholder="'.$this->placeholder.'" name="'.$this->name.'" value="'.$this->value.'"'.$this->require.'></input>';
    $form_group_input.= '</div></br>';

    return $form_group_input;

    }


}
