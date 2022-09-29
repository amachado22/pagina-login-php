<?php 
    define('USER', 'root');
    define('PASSWORD', '');
    define('HOST', '127.0.0.1');
    define('DATABASE', 'login2');
    try {
        $connection = new PDO('mysql:host='.HOST.';dbname='. DATABASE, USER, PASSWORD);
        echo "<script>console.log('Connected successfully')</script>";

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
?>