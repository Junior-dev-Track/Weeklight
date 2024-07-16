<?php

namespace models;

use models\Database;


class Post
{
    private $database;
    private $uploadDir = 'uploads/';

    public function __construct()
    {
        $this->database = new Database();
    }

    public function createPost($id, $content, $link = null, $image = null)
    {
        $imagePath = null;
        if (is_array($image) && $image['error'] === UPLOAD_ERR_OK) {
            $imagePath = $this->uploadImage($image);
        }

        $sql = "INSERT INTO posts (user_id, content, link, image) VALUES (?, ?, ?, ?)";
        $query = $this->database->pdo->prepare($sql);
        return $query->execute([$id, $content, $link, $imagePath]);
    }


    private function uploadImage($image)
    {
        $uploadDir = 'uploads/';
        $fileName = uniqid() . '_' . basename($image['name']);
        $uploadPath = $uploadDir . $fileName;
        $imageFileType = strtolower(pathinfo($uploadPath, PATHINFO_EXTENSION));

        // Vérifier le type de fichier
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedTypes)) {
            throw new \Exception("Seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.");
        }

        // Vérifier la taille du fichier (5MB max)
        if ($image['size'] > 5000000) {
            throw new \Exception("Désolé, votre fichier est trop volumineux.");
        }

        if (move_uploaded_file($image['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/' . $uploadPath)) {
            return $uploadPath;
        }

        throw new \Exception("Désolé, une erreur s'est produite lors du téléchargement de votre fichier.");
    }


    public function getUserPosts($id)
    {
        $sql = "SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC";
        $query = $this->database->pdo->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
