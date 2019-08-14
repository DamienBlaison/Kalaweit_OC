<?php
namespace Model;

/**
 * Classe des animaux
 * Kalaweit Blaison
 */

class Asso_cause
{

      public $id                    = "";
      public $name                  = "";
      public $sexe                  = "";
      public $birth                 = "";
      public $death                 = "";
      public $date_death            = "";
      public $specie                = "";
      public $photo1                = "";
      public $photo2                = "";
      public $location              = "";
      public $captivity             = "";
      public $adoption              = "";
      public $visibility            = "";
      public $fr_description        = "";
      public $en_description        = "";
      public $sp_description        = "";

      /**
       * définition des getters()
       */

      function get_id()                   {return $this->id;}
      function get_name()                 {return $this->name;}
      function get_sexe()                 {return $this->sexe;}
      function get_birth()                {return $this->birth;}
      function get_death()                {return $this->death;}
      function get_date_death()           {return $this->date_death;}
      function get_specie()               {return $this->specie;}
      function get_photo1()               {return $this->photo1;}
      function get_photo2()               {return $this->photo2;}
      function get_location()             {return $this->location;}
      function get_captivity()            {return $this->captivity;}
      function get_adoption()             {return $this->adoption;}
      function get_visibility()           {return $this->visibility;}
      function get_fr_description()       {return $this->fr_description;}
      function get_en_description()       {return $this->en_description;}
      function get_sp_description()       {return $this->sp_description;}

      function get_all()
      {
            return $all = array(
                  "id"              =>    $this->id,
                  "name"            =>    $this->name,
                  "sexe"            =>    $this->sexe,
                  "birth"           =>    $this->birth,
                  "death"           =>    $this->death,
                  "date_death"      =>    $this->date_death,
                  "species"         =>    $this->species,
                  "photo1"          =>    $this->photo1,
                  "photo2"          =>    $this->photo2,
                  "location"        =>    $this->location,
                  "captivity"       =>    $this->captivity,
                  "adoption"        =>    $this->adoption,
                  "visibility"      =>    $this->visibility,
                  "fr_description"  =>    $this->fr_description,
                  "en_description"  =>    $this->en_description,
                  "sp_description"  =>    $this->sp_description
            );
      }

      /**
       * définition des setters()
       */

       function set_id($id)                           {return $this->id=$id;}
       function set_name($name)                       {return $this->name=$name;}
       function set_sexe($sexe)                       {return $this->sexe=$sexe;}
       function set_birth($birth)                     {return $this->birth=$birth;}
       function set_death($death)                     {return $this->death=$death;}
       function set_date_death($date_death)           {return $this->date_death=$date_death;}
       function set_specie($specie)                   {return $this->specie=$specie;}
       function set_photo1($photo1)                   {return $this->photo1=$photo1;}
       function set_photo2($photo2)                   {return $this->photo2=$photo2;}
       function set_location($location)               {return $this->location=$location;}
       function set_captivity($captivity)             {return $this->captivity=$captivity;}
       function set_adoption($adoption)               {return $this->adoption=$adoption;}
       function set_visibility($visibility)           {return $this->visibility=$visibility;}
       function set_fr_description($fr_description)   {return $this->fr_description=$fr_description;}
       function set_en_description($en_description)   {return $this->en_description=$en_description;}
       function set_sp_description($sp_description)   {return $this->sp_description=$sp_description;}

}
