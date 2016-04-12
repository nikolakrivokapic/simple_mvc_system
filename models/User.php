<?php

require_once('Database.php');

// User class for communication with User table in db
class User {

    // Check if User already exists

    public static function exists($email) {
        $pdo = Database::getConnection();
        $sql = 'SELECT COUNT(*) from user WHERE email = :email';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

     // Creates new User

    public static function create($name, $email, $password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $pdo = Database::getConnection();
        $sql = "INSERT INTO user (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result;
    }


    // get specific User from DB, returns single user object

    public static function getUser($email){
        $pdo = Database::getConnection();
        $sth = $pdo->prepare('SELECT * FROM user WHERE email = :email LIMIT 1');
        $sth->bindParam(':email', $email);
        $sth->execute();
        $user = $sth->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    // search function
    // $search is the search query string
    // returns results array

    public static function search($search) {
        $pdo = Database::getConnection();
        $sth = $pdo->prepare('SELECT id, name, email FROM user WHERE email LIKE ? OR name LIKE ? ORDER BY ID DESC');
        $search = "%" . $search . "%";
        $sth->bindParam(1, $search, PDO::PARAM_STR);
        $sth->bindParam(2, $search, PDO::PARAM_STR);
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}

?>