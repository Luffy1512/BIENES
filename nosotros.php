<?php 
require 'includes/funciones.php';
incluirTemplate('header', $inicio = false, 'includes/templates' );
?>
    <!-- CONTENIDO PRINCIPAL -->
    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div>
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Imagen sobre nosotros">
                </picture>
            </div>
            <div>
                <!-- utilizamos esta etiqueta cuando estamos citando el contenido -->
                <blockquote>
                    25 AÑos de Experiencia
                </blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit explicabo repellat ratione magnam quam pariatur numquam velit voluptate illum. Officia a aliquam officiis magni dolorum dolorem architecto, placeat labore neque.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis itaque iusto labore blanditiis pariatur aliquam asperiores veniam nemo, aliquid sapiente rerum officia omnis eos voluptatibus nulla facere inventore quo sed!
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit explicabo repellat ratione magnam quam pariatur numquam velit voluptate illum. Officia a aliquam officiis magni dolorum dolorem architecto, placeat labore neque.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis itaque iusto labore blanditiis pariatur aliquam asperiores veniam nemo, aliquid sapiente rerum officia omnis eos voluptatibus nulla facere inventore quo sed!</p>
            </div>
            
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <!-- Seccion Iconos -->
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa reiciendis asperiores ipsum culpa, minus accusantium fugit natus, ratione sint architecto placeat atque at amet vitae sunt distinctio earum dolore. Fuga!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa reiciendis asperiores ipsum culpa, minus accusantium fugit natus, ratione sint architecto placeat atque at amet vitae sunt distinctio earum dolore. Fuga!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa reiciendis asperiores ipsum culpa, minus accusantium fugit natus, ratione sint architecto placeat atque at amet vitae sunt distinctio earum dolore. Fuga!</p>
            </div>
        </div>
    </section>

    <?php 
    incluirTemplate('footer', $inicio = false, 'includes/templates' ); ?>