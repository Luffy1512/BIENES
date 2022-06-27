<?php 
require 'includes/funciones.php';
incluirTemplate('header', $inicio = false, 'includes/templates' );
?>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="contenedor seccion">
        <h1>Casas y Departamentos en Venta</h1>

        <?php 
        $limite = 999;
        // incluirTemplate('propiedades', $inicio = true, 'includes/templates' ); 
        include 'includes/templates/propiedades.php';
        ?>

    </main>

    <?php 
    incluirTemplate('footer', $inicio = false, 'includes/templates' ); ?>