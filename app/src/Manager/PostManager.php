<?php

namespace App\Manager;

use App\Entity\Post;
use Cacofony\BaseClasse\BaseManager;

class PostManager extends BaseManager
{
    public function findAllPosts()
    {
        $query = 'SELECT * FROM posts';
        $stmnt = $this->pdo->query($query);

        $results = $stmnt->fetchAll();

        $postArray = [];

        foreach ($results as $post) {
            array_push($postArray, new Post($post));
        }
        return $postArray;
    }

    public function findById(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id=:id");
        $stmt->execute(['id' => $id]);
        $post = $stmt->fetch();
        return new Post($post);
    }

    public function delete(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        var_dump($stmt->rowCount());
        if($stmt === true) {
            var_dump("Data deleted successfully");
            return "Data deleted successfully";
        } else {
            var_dump("FAILED to execute DELETE query");
            return "FAILED to execute DELETE query";
        }
    }

    public function add(string $title, $content,  )
    {
        $stmt = $this->pdo->prepare('INSERT INTO posts(title, content, authorId) VALUES(?, ?, ?)');
        $stmt->execute(array($title, $content, $authorId));
    }
}

