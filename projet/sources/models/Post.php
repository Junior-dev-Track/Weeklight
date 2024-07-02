<?php

namespace models;

use models\Database;

class Post
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    // Créer une nouvelle publication
    public function createPost($userId, $content)
    {
        $sql = "INSERT INTO posts (user_id, content) VALUES (?, ?)";
        $query = $this->database->pdo->prepare($sql);
        return $query->execute([$userId, $content]);
    }

    // Récupérer toutes les publications d'un utilisateur
    public function getUserPosts($userId)
    {
        $sql = "SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC";
        $query = $this->database->pdo->prepare($sql);
        $query->execute([$userId]);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
