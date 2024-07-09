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

    public function createPost($id, $content)
    {
        $sql = "INSERT INTO posts (user_id, content) VALUES (?, ?)";
        $query = $this->database->pdo->prepare($sql);
        return $query->execute([$id, $content]);
    }

    public function getUserPosts($id)
    {
        $sql = "SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC";
        $query = $this->database->pdo->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
