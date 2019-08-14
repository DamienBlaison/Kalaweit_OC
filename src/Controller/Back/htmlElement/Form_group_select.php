<?php

namespace Controller\Back\htmlElement;

class Form_group_select{


    protected $fontawesome ;
    protected $name;
    protected $option;
    protected $selected;
    protected $id;


    public function __construct($p_name,$p_option,$p_selected,$p_fontawesome,$p_return,$p_id = 'id_'){

        $this->fontawesome = $p_fontawesome;
        $this->name = $p_name;
        $this->selected = $p_selected;
        $this->option = $p_option;
        $this->return = $p_return;
        $this->id = $p_id;
    }

    public function render(){

        $option = "";
        $select_option="";

        $this->id = $this->name; 

        if($this->return == 'config'){

            foreach ($this->option as $key => $value) {

                if ( (is_array($value)) && isset($value["id_espece"])){



                        if($value['id_espece'] == $this->selected){ $selected = 'selected';} else {$selected =' ';};

                        $select_option .= '<option value="'.$value['id_espece'].'"'.$selected.'>'.$value['nom_francais'].' ( '.$value['nom_latin'].' ) '.'</option>';

                }

                else {



                    if($key == $this->selected){ $selected = 'selected';} else {$selected =' ';};

                    $select_option .= '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';

                }

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
    $form_group_select .= '<span class="input-group-addon"><i class="'.$this->fontawesome.'"></i></span>';
    $form_group_select .= '<select id="'.$this->id.'" class="form-control select2 " data-placeholder="" name="'.$this->name.'" style="width: 100%;" tabindex="-1" aria-hidden="true">';

    $form_group_select .= $select_option;

    $form_group_select .= '</select>';
    $form_group_select .=    '</div></br>';

    return $form_group_select;

    }

}
