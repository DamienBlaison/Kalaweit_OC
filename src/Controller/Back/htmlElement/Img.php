<?php
namespace Controller\Back\htmlElement;

class Img
{

    function __construct($p_src,$p_name,$p_class,$p_style ="")
    {
        $this->src      = $p_src;
        $this->name     = $p_name;
        $this->class    = $p_class;
        $this->style    = $p_style;
    }

    function render(){

        $img =' <img src="'.$this->src.'" alt="'.$this->name.'" class="'.$this->class.'" style="'.$this->style.'" >';
        return $img;
    }
}
