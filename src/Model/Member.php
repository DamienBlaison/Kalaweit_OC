<?php

namespace Model;
/**
 * class des animaux
 * blaison Kalaweit
 */

class Member
{

      /**
       * définition des variables de classe
       */
      public $id = "";
      public $id_type = "";
      public $firstname = "";
      public $lastname = "";
      public $kind_of_donor = "";
      public $send_receipt = "";
      public $sponsor = "";
      public $language = "";
      public $address = "";
      public $zip = "";
      public $city = "";
      public $country = "";
      public $phone = "";
      public $phone2 = "";
      public $email = "";
      public $old_email = "";
      public $comment = "";
      public $mdp ="";
      public $last_adhesion = "";
      public $parrain_by = "";

      /**
       * définition des getters()
       */
      function get_id(){return $this->id;}
      function get_firstname(){return $this->firstname;}
      function get_lastname(){return $this->lastname;}
      function get_kind_of_donor(){return $this->kind_of_donor;}
      function get_send_receipt(){return $this->send_receipt;}
      function get_sponsor(){return $this->sponsor;}
      function get_language(){return $this->language;}
      function get_address(){return $this->address;}
      function get_zip(){return $this->zip;}
      function get_city(){return $this->city;}
      function get_country(){return $this->country;}
      function get_phone(){return $this->phone;}
      function get_phone2(){return $this->phone2;}
      function get_email(){return $this->email;}
      function get_old_email(){return $this->old_email;}
      function get_comment(){return $this->comment;}

      /**
       * définition des setters()
       */
       function set_id($id){return $this->id=$id;}
       function set_id_type($id_type){return $this->id_type=$id_type;}
       function set_firstname($firstname){return $this->firstname=$firstname;}
       function set_lastname($lastname){return $this->lastname=$lastname;}
       function set_kind_of_donor($kind_of_donor){return $this->kind_of_donor=$kind_of_donor;}
       function set_send_receipt($send_receipt){return $this->send_receipt=$send_receipt;}
       function set_sponsor($sponsor){return $this->sponsor=$sponsor;}
       function set_language($language){return $this->language=$language;}
       function set_address($address){return $this->address=$address;}
       function set_zip($zip){return $this->zip=$zip;}
       function set_city($city){return $this->city=$city;}
       function set_country($country){return $this->country=$country;}
       function set_phone1($phone1){return $this->phone1=$phone1;}
       function set_phone2($phone2){return $this->phone2=$phone2;}
       function set_email($email){return $this->email=$email;}
       function set_old_email($old_email){return $this->old_email=$old_email;}
       function set_comment($comment){return $this->comment=$comment;}
       function set_mdp($mdp){return $this->mdp=$mdp;}
       function set_last_adhesion($last_adhesion){return $this->last_adhesion=$last_adhesion;}
       function set_last_gift($last_gift){return $this->last_gift=$last_gift;}
       function set_parrain_by($parrain_by){return $this->parrain_by=$parrain_by;}
       function set_id_devise($id_devise){return $this->$id_devise=$id_devise;}
       function set_stopped_gift($stopped_gift){return $this->$stopped_gift=$stopped_gift;}
}
 ?>
