<?php 
/* CERRAR SESION */
// var_dump($_SESSION);
if(!isset($_SESSION)){
    session_start(); // Si no esta iniciado que inicie sesion
}

$auth = $_SESSION['login'] ?? false; // places holder
// var_dump($auth);

// Si $auth esta como true agregamos un enlace de 'cerrar sesion' en la navegacion. Ir mas abajo en el HTML

?>

<!DOCTYPE php>
<php lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <!-- Agregar el app.css -->
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
     <header class="header <?php echo $inicio ?  'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <!-- MENU RESPONSIVE -->
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="Icono Dark Mode">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        
                        <?php if($auth): ?>
                            <a href="/cerrar-sesion.php">Cerrar Sesión</a>
                            <a href="admin/">ADMIN</a>
                            <!-- Crear e ir al archivo cerrar-sesion.php -->
                        
                        <!-- BOTON INICIAR SESION -->
                        <?php else: ?>
                            <a href="login.php">Iniciar Sesión</a>                       
                        <?php endif; ?>
                    </nav>
                </div>
                
            </div> <!-- .barra -->
            
            <h1> <?php echo $inicio ? 'Venta de Casas y Departamentos Exclusivos de Lujo' : ''; ?> </h1>
            
        </div>
    </header>