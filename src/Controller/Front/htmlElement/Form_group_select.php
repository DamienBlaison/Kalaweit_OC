<?php

namespace Controller\Front\htmlElement;

class Form_group_select{


    protected $fontawesome ;
    protected $name;
    protected $option;
    protected $selected;


    public function __construct($p_name,$p_option,$p_selected,$p_fontawesome,$p_return){

        $this->fontawesome = $p_fontawesome;
        $this->name = $p_name;
        $this->selected = $p_selected;
        $this->option = $p_option;
        $this->return = $p_return;
    }

    public function render(){

        $option = "";
        $select_option="";

        if($this->return == 'config'){

            foreach ($this->option as $key => $value) {

                if($key == $this->selected){ $selected = 'selected';} else {$selected =' ';};

                $select_option .= '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';

            }

        }


        else

        {

            foreach ($this->option as $key => $value) {

            if($value[$this->name] == $this->selected){ $selected = 'selected';} else {$selected =' ';};

            $select_option .= '<option value="'.$value[$this->name].'"'.$selected.'>'.$value[$this->return].'</option>';

            }
        }

    $form_group_select = '';

    $form_group_select .= '<div class="input-group">';
    $form_group_select .= '<div class="input-group-prepend">
                                <label class="input-group-text" for="'.$this->name.'"><i class="'.$this->fontawesome.'"></i></label>
                            </div>';
    $form_group_select .= ' <select class="custom-select" id="'.$this->name.'" name="'.$this->name.'">';

    $form_group_select .= $select_option;

    $form_group_select .= '</select>';
    $form_group_select .=    '</div></br>';

    return $form_group_select;

    }

}
