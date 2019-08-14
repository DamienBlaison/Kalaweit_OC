<?php
namespace Controller\Transverse;
/**
*
*/
trait Get_param_post
{
    function get_param_post()
    {

        $param_post = "" ;
        $array_prepare = [];

        foreach ($_POST as $key => $value) {

            if ($value != NULL){

                $param_post .= $key.' = :'.$key.' , ' ;
                $set_array = [ ":$key" => htmlspecialchars($value) ];

                $array_prepare = array_merge($array_prepare ,$set_array);

            }

            else {

                $param_post .= $key.' = :'.$key.' , ' ;

                $array_prepare = array_merge($array_prepare ,[":$key" => ' ']);    // code...
            }


        }

        $param_post = substr($param_post, 0 , -2);

        $id = ["id" => htmlspecialchars($_GET["id"])];


        $array_prepare = array_merge($array_prepare, [":id" => htmlspecialchars($_GET["id"])]);

        $array_param_post = [$param_post,$array_prepare];

        return $array_param_post;

    }
    function get_param_post_update_member()
    {
        $into_cli           = "";
        $set_cli            = "";
        $prepare_cli        = [];

        $into_clid          = "";
        $set_clid           = "";
        $prepare_clid       = [];

        $array_set_cli_data =[];

        foreach ($_POST as $key => $value) {

            $test_key = substr($key,0,6);

            if ($test_key === 'clitd_'){

                $clitd_id = explode('_',$key);

                $field_clitd_id = $clitd_id[1];
                $field_cld_valc = htmlspecialchars($value);

                $set_cli_data = ["clitd_id" =>$field_clitd_id, "cld_valc"=>$field_cld_valc];
                $array_set_cli_data []= $set_cli_data;

            } else {

                if(($test_key != 'num_fo')){

                    $into_cli .= $key.', ';
                    $set_cli  .= ':'.$key.', ';
                    $set_array_cli = [ ":$key" => htmlspecialchars($value) ];
                    $prepare_cli = array_merge($prepare_cli ,$set_array_cli);
                }
            }

        }

        $array_param_post_cli = [

            "p_into_cli"    => $into_cli,
            "p_set_cli"     => $set_cli,
            "p_prepare_cli" => $prepare_cli

        ];

        $array_param_post = ["array_param_post_clid" => $array_set_cli_data, "array_param_post_cli" => $array_param_post_cli];

        return $array_param_post;
    }
    function get_param_post_add_member()
    {

        $into_cli           = "";
        $set_cli            = "";
        $prepare_cli        = [];

        $into_clid          = "";
        $set_clid           = "";
        $prepare_clid       = [];

        $array_set_cli_data =[];

        foreach ($_POST as $key => $value) {

            $test_key = substr($key,0,6);

            if ($test_key === 'clitd_'){

                $clitd_id = explode('_',$key);

                $field_clitd_id = $clitd_id[1];
                $field_cld_valc = htmlspecialchars($value);

                $set_cli_data = ["clitd_id" =>$field_clitd_id, "cld_valc"=>$field_cld_valc];
                $array_set_cli_data []= $set_cli_data;

            } else {

                if(($test_key != 'num_fo')){

                    $into_cli .= $key.', ';
                    $set_cli  .= ':'.$key.', ';
                    $set_array_cli = [ ":$key" => htmlspecialchars($value) ];
                    $prepare_cli = array_merge($prepare_cli ,$set_array_cli);

                }
            }

        }

        $into_cli = rtrim($into_cli," ,");
        $set_cli  = rtrim($set_cli," ,");

        $array_param_post_cli = [

            "p_into_cli"    => $into_cli,
            "p_set_cli"     => $set_cli,
            "p_prepare_cli" => $prepare_cli

        ];

        $array_param_post = ["array_param_post_clid" => $array_set_cli_data, "array_param_post_cli" => $array_param_post_cli];

        return $array_param_post;

    }


}
