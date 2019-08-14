<?php namespace Manager;
/**
*
*/
class Receipt_annual
{

    use \Controller\Transverse\Get_param_request;

    function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function add($id){

        $check_id = htmlspecialchars($id);

        $bdd = (new \Manager\Connexion())->getBdd();

        // indexation des numeros de recus

        $member = (new \Model\Member());
        $cli_info = (new \Manager\Member($bdd))->get($member,$check_id);
        $country = (new \Manager\Crm_country())->get($bdd,$cli_info["cnty_id"]);

        $receipt_details = (new \Manager\Receipt($bdd))->details_donations_year_by_member($check_id);
        $receipt_resume = (new \Manager\Receipt($bdd))->resume_donations_year_by_member($check_id);

        /* initialisation de tableaux avec la traduction des elements en francais à afficher */

        $mois = array('','janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
        $jours = array('dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi');

        $suffixe = '_'.str_replace(['/',' '],'-',$cli_info["cli_firstname"]).'_'.str_replace(['/',' '],'-',$cli_info["cli_lastname"]);

        $req = "SELECT MAX(rec_number) FROM asso_receipt WHERE rec_number LIKE 'R_fisc_%'";

        $prefixe = "R_fisc_".date('Y')."_";

        $rec_number = ($this->bdd->query($req));

        $receipt_number = $rec_number->fetch(\PDO::FETCH_NUM);

        if($receipt_number[0] != NULL){

            $max = explode('_',$receipt_number[0]);

            $receipt_num = intval($max[3]);

        } else { $receipt_num = 1000; };

        $check = $this->bdd->prepare(" SELECT rec_number From asso_receipt WHERE cli_id = :cli_id AND rec_number LIKE 'R_fisc%'");

        $prepare_check = [":cli_id"=> htmlspecialchars($check_id)];

        $check->execute($prepare_check);

        $check_receipt = $check->fetch();

        if($check_receipt == NULL){

        $insert = $this->bdd->prepare(" INSERT INTO asso_receipt (brk_id,cli_id,rec_ts,rec_year,rec_number,rec_mnt) VALUES (2,:cli_id,:rec_ts,:rec_year,:rec_number,:rec_mnt)");

        $receipt_num_to_insert = $receipt_num + 1;

        $rec_number = $prefixe.$receipt_num_to_insert.$suffixe;

        $prepare2 =[

            ":cli_id" => $check_id,
            ":rec_ts" => date('Y-m-d G:i:s'),
            ":rec_year" => date('Y'),
            ":rec_number" => $rec_number,
            ":rec_mnt" => $receipt_resume[0]["sum(don_mnt)"]
        ];
        //echo'<pre>';
        //var_dump($prepare2);

        //echo'</pre>';

        $insert->execute($prepare2);

        $content = [
            "cli_info" => $cli_info,
            "receipt_details" => $receipt_details,
            "resume" => $receipt_resume,
            "receipt_number" => $rec_number,
            "date" =>  $jours[date('w')].' '.date('j').' '.$mois[date('n')].' '.date('Y'),
            "country" => $country
        ];

            //return (new \View\Back\Receipt\Receipt_annual($content))->render("open");
            return (new \View\Back\Receipt\Receipt_annual($content))->render("close");

        } else {

            echo "\n";
            echo '_______________________________________________________________________________________________';
            echo "\n";

            echo "\e[31mRecu ".$check_receipt[0].'.pdf déja créé';


        }

    }

    function get_all_ids_to_receipt(){

        $reqprep = $this->bdd->prepare(" SELECT crm_client.cli_id FROM crm_client LEFT JOIN asso_donation on asso_donation.cli_id = crm_client.cli_id WHERE YEAR(asso_donation.don_ts) = :year_receipt AND asso_donation.don_status = 'OK' GROUP BY crm_client.cli_id");
        $prepare = [":year_receipt"=> date('Y') - 1];
        $reqprep->execute($prepare);

        $array_ids_to_receipt = $reqprep->FetchAll(\PDO::FETCH_ASSOC);

        return $array_ids_to_receipt;
    }

    function create_counter($count){
        $reqprep  = $this->bdd->prepare("INSERT INTO asso_job (job_type , job_count) VALUES ('RECEIPT_ANNUAL', :count)");
        $prepare = [":count" => $count];
        $reqprep->execute($prepare);
    }
    function maj_counter($counter){

        $reqprep  = $this->bdd->prepare("UPDATE asso_job SET job_ok = :counter WHERE job_type = 'RECEIPT_ANNUAL'");
        $prepare = [":counter" => $counter];
        $reqprep->execute($prepare);

    }


    function get_achievment(){

        $reqprep  = $this->bdd->prepare("SELECT job_ok, job_count FROM asso_job WHERE job_type = 'RECEIPT_ANNUAL'");
        $prepare =[];
        $reqprep->execute($prepare);
        $data = $reqprep->FetchAll(\PDO::FETCH_ASSOC);

        if(isset($data[0]["job_count"])){

            if( $data[0]["job_count"] > 0){

                $achievment = ($data[0]["job_ok"]/$data[0]["job_count"]) * 100;

                $achievment = round($achievment,0);

            } else { $achievment = 0; }

        } else {

            $achievment = 0;
        }

        return $achievment;

    }

}
