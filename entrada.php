<?php 
require 'includes/funciones.php';
incluirTemplate('header', $inicio = false, 'includes/templates' );
?>
    <!-- CONTENIDO PRINCIPAL -->
    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">

            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen Destacada">
        </picture>

        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit explicabo repellat ratione magnam quam pariatur numquam velit voluptate illum. Officia a aliquam officiis magni dolorum dolorem architecto, placeat labore neque.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis itaque iusto labore blanditiis pariatur aliquam asperiores veniam nemo, aliquid sapiente rerum officia omnis eos voluptatibus nulla facere inventore quo sed!
            </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit explicabo repellat ratione magnam quam pariatur numquam velit voluptate illum. Officia a aliquam officiis magni dolorum dolorem architecto, placeat labore neque.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis itaque iusto labore blanditiis pariatur aliquam asperiores veniam nemo, aliquid sapiente rerum officia omnis eos voluptatibus nulla facere inventore quo sed!</p>
        </div>
    </main>

    <?php 
    incluirTemplate('footer', $inicio = false, 'includes/templates' ); ?>