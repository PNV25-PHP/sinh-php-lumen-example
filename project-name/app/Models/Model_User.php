<?php

namespace App\Models;

use PDO;
use PDOException;

class Model_User
{
    private $dbCallback;

    public function __construct($dbCallback)
    {
        $this->dbCallback = $dbCallback;
    }

    public function checkCredentials($email, $password)
    {
        $db = call_user_func($this->dbCallback);

        try {
            echo "hihi";
            $stmt = $db->prepare("SELECT * FROM User WHERE Email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            if ($user && password_verify($password, $user['HashPassword'])) {
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "lol";
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
