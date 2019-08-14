<?php

namespace Controller\Front\htmlElement;

/** $boxcontent = ['<input type="text">input1</input>','<btn></btn>'];
*   $box = new \Controller\Back\htmlElement\Box('Box test','box-danger',$boxcontent);
*/
class Form_group_btn{

    protected $name;

    public function __construct($p_type,$p_class,$p_name,$p_value){

        $this->class    = $p_class;
        $this->type     = $p_type;
        $this->name     = $p_name;
        $this->value    = $p_value;

    }

    public function render(){

    $form_group_btn  =  '<div class=" btn-toolbar justify-content-end">';
    $form_group_btn .=     '<input type="'.$this->type.'" class=" '.$this->class.'" value="'.$this->value.'" name="'.$this->name.'">';
    $form_group_btn .=  '</div>';

    return $form_group_btn;

    }


}
