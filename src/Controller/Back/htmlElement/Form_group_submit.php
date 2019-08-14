<?php

namespace Controller\Back\htmlElement;

/** $boxcontent = ['<input type="text">input1</input>','<textarea></textarea>'];
*   $box = new \Controller\Back\htmlElement\Box('Box test','box-danger',$boxcontent);
*/
class Form_group_submit{

    protected $name;

    public function __construct(

        $p_name_submit,
        $p_class_submit,
        $p_value_submit


    )

    {

        $this->name_submit = $p_name_submit;
        $this->class_submit = $p_class_submit;
        $this->value_submit = $p_value_submit;
    }

    public function render(){

    $form_group_submit= '';


    $form_group_submit.=      '<input id="'.$this->name_submit.'" type="submit" class="'.$this->class_submit.' col-md-12" value="'.$this->value_submit.'" name="'.$this->name_submit.'">';


    return $form_group_submit;

    }


}
