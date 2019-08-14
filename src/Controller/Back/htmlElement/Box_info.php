<?php namespace Controller\Back\htmlElement;


class Box_info
{
    public function __construct($p_data,$p_title,$p_icon,$p_color = 'bg-aqua'){

        $this->data = $p_data;
        $this->title = $p_title;
        $this->icon = $p_icon;
        $this->color = $p_color;

    }

    function render()
    {

    $render ='    <div class="small-box '.$this->color.'">';
    $render .='      <div class="inner">';
    $render .='        <h3>'.$this->data.'</h3>';
    $render .='        <p>'.$this->title.'</p>';
    $render .='      </div>';
    $render .='      <div class="icon">';
    $render .='        <i class="'.$this->icon.'"></i>';
    $render .='      </div>';
    $render .='    </div>';

    return $render;

    }
}
