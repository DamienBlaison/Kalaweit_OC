<?php
namespace Controller\Transverse;
/**
 *
 */
trait Get_param_request
{
    function get_param_request()
    {

        $array_param_request = [];

        $param_request = explode('?', $_SERVER['REQUEST_URI']);

        if(isset($param_request[1])){

        $param_request = explode('&', $param_request[1]);

        foreach ($param_request as $key => $value) {

            $data_param_request = explode('=' , htmlspecialchars($value));

            if(isset($data_param_request[1]) && $data_param_request[1] != NULL){

                if($data_param_request[0] == 'p'){$v = $data_param_request[1];}

                else {

                $v = '%'.$data_param_request[1].'%';

                }

                $array = [

                    $data_param_request[0] => $v


                ];

                $array_param_request = array_merge($array_param_request, $array);

            }

        }

    }

        $pagination = explode('?',$_SERVER['REQUEST_URI']);
        $pagination = explode('/',$pagination[0]);
        $pagination = array_pop($pagination);

        $data = [$array_param_request,$pagination];

        return $data;
    }
}
