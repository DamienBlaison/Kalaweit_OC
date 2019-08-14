<?php

namespace Controller\Back\htmlElement;

class Form_group_input_file{

    public function __construct($p_name,$p_class,$p_max_size){



        $this->name = $p_name;
        $this->class = $p_class;
        $this->max_size = $p_max_size;

    }

    public function render(){

        $form_group_input_file = '';
        $form_group_input_file.= '<div>';
        $form_group_input_file.= '      <label for="'.$this->name.'" class="'.$this->class.'" style =" margin-bottom:13px;" >Télécharger un fichier</label>';
        $form_group_input_file.= '      <input id="'.$this->name.'" type="file" name="'.$this->name.'" style="display:none;">';
        $form_group_input_file.= '</div>';

    return $form_group_input_file;

    }


}
