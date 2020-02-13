<?php

namespace App\Models;

use PDO;

class Post
{
    public static function getAll()
    {
        $host = 'localhost';
        $dbname = 'mvc';
        $userName = 'root';
        $password = '';

        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $userName, $password);
            $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
