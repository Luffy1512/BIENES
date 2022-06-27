<?php
require __DIR__ . '/../../vendor/autoload.php';
// use Dotenv;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// echo '<pre>';
// var_dump($_ENV);
// echo '</pre>';


function conectarDB() : mysqli {
    $db = mysqli_connect(
        $_ENV['DB_HOST'], 
        $_ENV['DB_USER'], 
        $_ENV['DB_PASS'], 
        $_ENV['DB_BD']);
    
    if (!$db){
        echo 'Error no se pudo conectar';
        exit; // para detener la ejecucion del codigo en caso de que la conexion no se establesca
    } 
    return $db;    
}

// conectarDB();