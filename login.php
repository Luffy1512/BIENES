<?php 
/* Importar la Conexión */
require 'includes/config/database.php';
$db = conectarDB();

/* AUTENTICAR EL USUARIO */

$errores = [];

// Agregar el name a los inputs para trabajar con POST y agregar el method POST al formulario
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';

    // Creamos las variables que van a contener lo que viene en el POST y validamos que sea lo que esperamos
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];

    // Sanitisamos las variables 
    $email = mysqli_real_escape_string($db, $email);
    $password = mysqli_real_escape_string($db, $password);

    // Validacion de errores (crear un arreglo vacio de forma global)
    if(!$email) {
        $errores[] = "El correo es Obligatrio o no es válido";
    }
    if(!$password) {
        $errores[] = "El Password es Obligatrio";
    }
    // echo '<pre>';
    // var_dump($errores);
    // echo '</pre>';
    // Agregarlo al HTML

    /* REVISAR SI EXISTE EL USUARIO */
    if(empty($errores)){
        // echo 'Vacio';
        $query = "SELECT * FROM usuarios WHERE email = '${email}' ";
        // var_dump($query);
        $resultado = mysqli_query($db, $query);
        // echo '<pre>';
        // var_dump($resultado); // Esto nos devuelve un objeto, cuando existe un resultado o coincidencia ["num_rows"] = 1
        // echo '</pre>';

        if( $resultado->num_rows ){
            // echo 'si existe';

            /* REVISAR SI EL PASSWORD ES CORRECTO */
            $usuario = mysqli_fetch_assoc($resultado);
            // echo '<pre>';
            // var_dump($usuario);
            // echo '</pre>';

            // Verfificar si el password es correcto o no
            $autenticado = password_verify($password, $usuario['password']); // toma dos argumentos (password que el usuario ingreso, el password hasheado traido desde la BD)
            // var_dump($autenticado);

            if($autenticado) {
                /* EL USUARIO ESTA AUTENTICADO */
                session_start(); // debes iniciar la sesion con esta funcion para tener acceso a la super global $_SESSION

                // Llenar el arreglo de la sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location: /admin');

                // Ya tengo creada la sesion. Ahora si el usuario esta autenticado que pueda acceder al administrador sino que lo redireccione a la pagina de inicio - Ir a 'admin/index.php'

                // echo '<pre>';
                // var_dump($_SESSION);
                // echo '</pre>';

            } else {
                $errores[] = "El Password es incorrecto";
            }
        } else {
            $errores[] = "El Usuario no existe";
        }
    }
}

// Incluye el header
require 'includes/funciones.php';
incluirTemplate('header', $inicio = false, 'includes/templates' );
?>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <!-- Agregar el Arreglo de Errores -->
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form action="" class="formulario" method="POST">
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Tu Email" id="email">

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu Password" id="password">
            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main>

    <?php 
    incluirTemplate('footer', $inicio = false, 'includes/templates' ); ?>