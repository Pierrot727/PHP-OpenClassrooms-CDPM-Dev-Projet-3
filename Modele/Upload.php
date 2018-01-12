<?php

namespace Blog\Modele;

use Blog\Framework\Modele;

/**
 * Upload des fichiers images pour les profils & les scénes
 *
 * @author Pierre-emmanuel Laporte
 */
class Upload extends Modele
{


    /**
     * Upload
     *
     * @author Pierre-emmanuel Laporte
     *
     *
     * @param $id
     * @param string $param
     *
     * @return string
     */
    public function upload($id,$param = "photo")
    {
        $target_dir = "Contenu/images/uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["files"]["tmp_name"]);
            if ($check !== false) {
                $message = "Le fichier est une image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $message = "Le fichier n'est pas une image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $message = "Désolé, le fichier existe déjà.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["file"]["size"] > 5000000) {
            $message = "Désolé, le fichier est trop gros.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $message = "Désolé, seul les types JPG, JPEG, PNG & GIF files sont acceptés.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return $erreur = $message . " donc, votre fichier n'a pas été uploadé.";

            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                if ($param = "photo") {
                    $sql = 'UPDATE T_UTILISATEUR SET UTIL_PHOTO= :photo WHERE UTIL_ID= :id';
                    $upload = $this->executerRequete($sql, array(
                            'photo' => basename($_FILES["file"]["name"]),
                            'id' => $id,
                        ))->rowCount() == 1;
                }
                return $message = "Le fichier " . basename($_FILES["file"]["name"]) . " a été uploadé.";
            } else {
                return $message = "Désolé, il y a eu une erreur pendant l'upload.";

            }
        }
    }

}