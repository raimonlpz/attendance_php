<?php
    $host = 'localhost';
    $db = 'attendance_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo 'Hello Database';

    } catch(PDOException $err) {
        throw new PDOException($err->getMessage());
    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new Crud($pdo);
    $user = new User($pdo);

    /* test */
    $user->insertUser('admin', 'password');
?>