<?php

namespace database;

use PDO;
use PDOException;

function db()
{
    $host     = 'localhost'; // Because MySQL is running on the same computer as the web server
    $database = 'MVC_project'; // Name of the database you use (you need first to CREATE DATABASE in MySQL)
    $user     = 'root'; // Default username to connect to MySQL is root
    $password = ''; // Default password to connect to MySQL is empty

    try {
        $db =  new PDO("mysql:host=$host;dbname=$database", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
