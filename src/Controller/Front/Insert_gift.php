<?php

namespace Controller\Front;

/**
*
*/
class Insert_gift
{

    function render()
    {

        $url = $_SERVER['REQUEST_URI'];
        $params = explode('?',$url);

        $datas = explode('&',$params[1]);

        $transaction = explode('-',$datas[0]);

        if ($transaction[0] == 'transaction=Adhesion'){

            $bdd = new \Manager\Connexion();
            $bdd = $bdd->getBdd();

            $reqprep = $bdd->prepare("INSERT INTO asso_adhesion (brk_id ,cli_id,adhesion_ts,adhesion_status,adhesion_mnt,ptyp_id) VALUES (2,:cli_id,:adhesion_ts,'WAIT',:amount,1)");

            $prepare = [
                ":cli_id" =>$transaction[1],
                ":adhesion_ts" =>date("Y-m-d H:i:s"),
                ":amount" => htmlspecialchars($_GET["amount"]),
            ];

            $reqprep->execute($prepare);

        }

        if ($transaction[0] == 'transaction=gift_one_shot'){

            $bdd = new \Manager\Connexion();
            $bdd = $bdd->getBdd();

            $reqprep = $bdd->prepare("INSERT INTO asso_donation (brk_id ,cli_id,cau_id,don_ts,don_status,don_mnt,ptyp_id) VALUES (2,:cli_id,704,:don_ts,'WAIT',:amount,1)");

            $prepare = [
                ":cli_id" =>$transaction[1],
                ":don_ts" =>date("Y-m-d H:i:s"),
                ":amount" => htmlspecialchars($_GET["amount"]),
            ];

            $reqprep->execute($prepare);

        }


        if ($transaction[0] == 'transaction=gift_one_shot_gibbon'){

            $bdd = new \Manager\Connexion();
            $bdd = $bdd->getBdd();

            $reqprep = $bdd->prepare("INSERT INTO asso_donation (brk_id ,cli_id,cau_id,don_ts,don_status,don_mnt,ptyp_id) VALUES (2,:cli_id,:cau_id,:don_ts,'TEMP',:amount,1)");

            $prepare = [
                ":cli_id" =>$transaction[1],
                ":cau_id" => $transaction[2],
                ":don_ts" => $ts = date("Y-m-d H:i:s"),
                ":amount" => htmlspecialchars($_GET["amount"]),
             ];

            $reqprep->execute($prepare);

            $recup_id_don = $bdd->prepare("SELECT don_id FROM asso_donation WHERE don_ts = :don_ts AND cli_id = :cli_id");
            $prepare_recup_id_don = [ "don_ts" => $ts, ":cli_id" => $transaction[1]];
            $recup_id_don->execute($prepare_recup_id_don);


            return json_encode($recup_id_don->fetch(\PDO::FETCH_ASSOC));

        }

        if ($transaction[0] == 'transaction=gift_one_shot_forest'){

            $bdd = new \Manager\Connexion();
            $bdd = $bdd->getBdd();

            $reqprep = $bdd->prepare("INSERT INTO asso_donation (brk_id ,cli_id,cau_id,don_ts,don_status,don_mnt,ptyp_id) VALUES (2,:cli_id,703,:don_ts,'WAIT',:amount,1)");

            $prepare = [
                ":cli_id" =>$transaction[1],
                ":don_ts" =>date("Y-m-d H:i:s"),
                ":amount" => htmlspecialchars($_GET["amount"]),
            ];

            $reqprep->execute($prepare);

        }

        if ($transaction[0] == 'transaction=gift_one_shot_dulan'){

            $bdd = new \Manager\Connexion();
            $bdd = $bdd->getBdd();

            $reqprep = $bdd->prepare("INSERT INTO asso_donation (brk_id ,cli_id,cau_id,don_ts,don_status,don_mnt,ptyp_id) VALUES (2,:cli_id,700,:don_ts,'WAIT',:amount,1)");

            $prepare = [
                ":cli_id" =>$transaction[1],
                ":don_ts" =>date("Y-m-d H:i:s"),
                ":amount" => htmlspecialchars($_GET["amount"]),
            ];

            $reqprep->execute($prepare);

        }

    }
}
