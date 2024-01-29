<?php

class FileImageUploader {
    private $targetDirectory;
    private $maxSize = 2000000;
    private $allowedExtensions = ['jpg', 'png', 'jpeg'];
    private $errorMessage;

    public function __construct($targetDirectory = "uploads/") {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload($file, $name) {


        if ($file['error'] != UPLOAD_ERR_OK) {
            $this->errorMessage = "Erreur lors de l'upload du fichier.";
            return false;
        }

        if ($file['size'] > $this->maxSize) {
            $this->errorMessage = "Le fichier est trop volumineux.";
            return false;
        }

        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $this->allowedExtensions)) {
            $this->errorMessage = "Extension de fichier non autorisée.";
            return false;
        }

        $destination = $this->targetDirectory . $name . '.' . $fileExtension;
        if (file_exists($destination)) {
            $this->errorMessage = "Un fichier avec le même nom existe déjà.";
            return false;
        }

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return $destination;
        } else {
            $this->errorMessage = "Erreur lors de la sauvegarde du fichier.";
            return false;
        }
    }

    public function getErrorMessage() {
        return $this->errorMessage;
    }
}
