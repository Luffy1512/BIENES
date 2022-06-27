<?php
require 'app.php';

function incluirTemplate ( $nombre, $inicio = false, $url = TEMPLATES_URL) {
    include $url . "/$nombre.php";
} 

/* PROTEGER PAGINAS */
// Por ejemplo si copio la URL de la pagina modificar.php tendre acceso a ella, entonces tengo que copiar el codigo de la clase anterior para verificar si el usuario esta autenticado pero estariamos duplicando codigo. Para ello crearemos la siguiente funcion:
function estaAutenticado() : bool {
    session_start();

    $auth = $_SESSION['login'];
    if($auth){
       return true;
    }
    return false;
}

// Aplicar la funcion donde creamos necesario