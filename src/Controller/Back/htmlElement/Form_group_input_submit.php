<?php

namespace Controller\Back\htmlElement;

/** $boxcontent = ['<input type="text">input1</input>','<textarea></textarea>'];
*   $box = new \Controller\Back\htmlElement\Box('Box test','box-danger',$boxcontent);
*/
class Form_group_input_submit{

    protected $name;

    public function __construct(
        $p_name,
        $p_placeholder,
        $p_value = NULL,
        $p_class,

        $p_name_submit,
        $p_class_submit,
        $p_value_submit


    )

    {
        $this->placeholder = $p_placeholder;
        $this->name = $p_name;
        $this->value = $p_value;
        $this->class = $p_class;

        $this->name_submit = $p_name_submit;
        $this->class_submit = $p_class_submit;
        $this->value_submit = $p_value_submit;
    }

    public function render(){

    $form_group_input_submit= '';
    $form_group_input_submit.= '<div class = "col-md-9 mb10 mt10">';
    $form_group_input_submit.=      '<div class ="input-group">';
    $form_group_input_submit.=           '<input type="text" class="form-control" placeholder="'.$this->placeholder.'" name="'.$this->name.'" value="'.$this->value.'"></input>';
    $form_group_input_submit.=      '</div>';
    $form_group_input_submit.= '</div>';
    $form_group_input_submit.= '<div class="col-md-3 mt10">';
    $form_group_input_submit.=      '<input type="submit" class="'.$this->class_submit.'" value="'.$this->value_submit.'" name="'.$this->name_submit.'">';
    $form_group_input_submit.= '</div>';

    return $form_group_input_submit;

    }


}
