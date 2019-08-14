<?php

namespace Controller\Back\htmlElement;
/**
 *
 */
class Tab
{



/**
*    $$p_tab_menu =
*
*    [
*        ["title"=>"Titre1", "content"=>"content1"],
*        ["title"=>'Titre2', "content"=>"Content2"]
*
*/

public function __construct($p_tab_menu_title,$p_tab_menu ){

    $this->tab_menu_title = $p_tab_menu_title;
    $p_tab_menu = $p_tab_menu;
    $this->tab_menu= $p_tab_menu ;



}

function render(){
$tab = '';

$tab_header = '';
$tab_content = '';


    foreach ($this->tab_menu as $key => $value) {



        if($key == 0)

        {
            $aria_expended = 'aria-expanded="true"';
            $active = 'class="active"';
        }

        else

        {
            $aria_expended = 'aria-expanded="false"';
            $active='';
        }

        $tab_header  .= '<li '.$active.'><a href="#tab'.$key.'" data-toggle="tab"'.$aria_expended.'>'.$value['title'].'</a></li>';
        $tab_header  .= ' <!-- /.tab-header -->';




        foreach ($value as $key_content => $value_content) {

            if($key_content !== "title"){

                if($key == 0){$tab_active = ' active';} else {$tab_active = '';};

                $tab_content  .= '        <div class="tab-pane'.$tab_active.'" id="tab'.$key.'">';

                $tab_content .= $value_content ;
            };


        }

    };

$tab .= '<div class="nav-tabs-custom">';
$tab .= '    <ul class="nav nav-tabs">';

$tab  = $tab . $tab_header;

$tab .= '        <li class="pull-right header"><i class="fa fa-th"></i>'.$this->tab_menu_title.'</li>';
$tab .= '    </ul>';


$tab .= '    <div class="tab-content">';
$tab .=  $tab_content;
$tab .= ' <!-- /.nav-tabs-content -->';
$tab .= ' </div>';

$tab .= ' </div>';
$tab .= ' <!-- /.nav-tabs-custom -->';

return $tab;

}
