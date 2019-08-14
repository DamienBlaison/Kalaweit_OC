<?php
namespace View\Back\Annual_report\Component;

class Donation_one_shot

{

    function render($id,$title,$data,$col){
        $data_json = json_encode($data);

        $chartJs  = '';

        $chartJs .= '<section class="col-md-'.$col.'">';
        $chartJs .= '<div class="box box-primary">';
        $chartJs .= '        <div class="box-header with-border">';
        $chartJs .= '          <h3 class="box-title">'.$title.'</h3>';
        $chartJs .= '          <div class="box-tools pull-right">';
        $chartJs .= '            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>';
        $chartJs .= '            </button>';
        $chartJs .= '            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>';
        $chartJs .= '          </div>';
        $chartJs .= '        </div>';
        $chartJs .= '        <div class="box-body">';
        $chartJs .= '          <div class="chart">';
        $chartJs .= '            <canvas id="'.$id.'" width="300" height="300"></canvas>';
        $chartJs .= '          </div>';
        $chartJs .= '        </div>';
        $chartJs .= '        <!-- /.box-body -->';
        $chartJs .= '      </div>';
        $chartJs .= '      </section>';

        $chartJs .= "<script type='text/javascript'>
                        var id = '$id';
                        var data = '$data_json';
                    </script>";
    
        $chartJs .= "<script src='/Js/Back/Annual_report.js'></script>";


        return $chartJs;
    }

}
