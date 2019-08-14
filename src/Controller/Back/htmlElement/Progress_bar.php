<?php
namespace Controller\Back\htmlElement;

/**
 *
 */
class Progress_bar

{
    function render($position,$count,$id){

        $progress = ($position / $count) * 100;

        $progress_round = round($progress,0);

        $render = '

        <div class="progress">
            <div id="'.$id.'" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="'.$progress_round.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$progress_round.'%">
            </div>
        </div>';

        return $render;

    }
}

 ?>
