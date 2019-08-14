<?php

namespace Manager;

class File
{

    function __construct($p_dir,$p_file_to_upload,$p_extension,$p_size)
    {
        $this->dir              = $p_dir;                      // string
        $this->file_to_upload   = $p_file_to_upload;           // string
        $this->extension        = $p_extension;                // array ['png','jpeg',...]
        $this->size             = $p_size;
    }

    function upload_file($table,$field,$id,$p_id){

        // ********************** definition du dossier cible  ************************** //

        $target_dir = $this->dir;


        // ********************** definition du nom du fichier cible  ******************* //

        $target_file = $target_dir . basename($_FILES[$this->file_to_upload]["name"]);

        // ********************** definition d'un marqueur pour la verification des elements ******************* //

        $uploadOk = 1;

        // ********************** récupération de l extension du fichier ******************* //

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // ********************** Verification de l existence du fichier sur le serveur ******************* //


        if (file_exists($target_file)) {

            echo "<script> alert('Sorry, file already exists')</script>";
            $uploadOk = 0;
        }

        // ********************** vérification de la taille du fichier ******************* //


        if ($_FILES[$this->file_to_upload]["size"] > $this->size) {
            echo "<script>alert('Sorry, your file is too large.')</script>";
            $uploadOk = 0;
        }

        // ********************** vérification du type de fichier ******************* //
        $ext = 0;

        foreach ($this->extension as $key => $value) {

            $temp = $imageFileType != $value ;

            if( $temp === TRUE ){ $ext = $ext + 0 ; } else { $ext = $ext + 1 ; };

        }


        if ( $ext == 0 )

        {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
            $uploadOk = 0;
        }

        // ********************** vérification si tout est ok ******************* //
        if ($uploadOk == 0) {

            echo "<script> alert('Sorry, your file was not uploaded.')</script>";

        } else {

            if (move_uploaded_file($_FILES[$this->file_to_upload]["tmp_name"], '..'.$target_file)) {

                echo "<script> alert('The file has been uploaded.')</script>";

            } else {
                echo "<script> alert('Sorry, there was an error uploading your file.')</script>";
            }
        }

        // ********************** Maj de l'enrgistrement de la référence du fichier en bdd ******************* //

        $bdd = (new \Manager\Connexion())->getBdd();

        $reqprep = $bdd->prepare( " UPDATE $table SET $field = '$target_file' WHERE $id = :id");
        $prepare = [ ":id" => $p_id];

        $reqprep->execute($prepare);

    }

}
