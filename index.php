<!-- 01.CREAR UN NUEVO ARCHIVO 'usuario.php' - IR A 'usuario.php' -->
<!-- 02.HASHEAR PASSWORD - IR A 'usuario.php' -->
<!-- 03.CREANDO UN FORMULARIO PARA AUTENTICAR - IR A 'login.php' -->
<!-- 04.VALIDACIONES AL FORMULARIO - IR A 'login.php' [AUTENTICAR EL USUARIO] -->
<!-- 05.REVISAR SI UN USUARIO EXISTE O NO - IR A 'login.php' [REVISAR SI EXISTE EL USUARIO] -->
<!-- 06.REVISAR SI EL PASSWORD ES CORRECTO O NO - IR A 'login.php' [REVISAR SI EL PASSWORD ES CORRECTO] -->
<!-- 07.INICIAR SESION Y LA SUPER GLOBAL $_SESSION - IR A 'login.php' [EL USUARIO ESTA AUTENTICADO] -->
<!-- 08.PROTEGER LAS PAGINAS SEGUN SEA NECESARIO - IR A 'includes/funciones.php' [PROTEGER PAGINAS] -->
<!-- 09.CERRAR SESION - IR A 'templates/header.php' [CERRAR SESION] -->
<!-- 10.AGREGAR UN BOTON DE INICIAR SESION - IR A 'templates/header.php' [BOTON INICIAR SESION] -->
<?php  
require 'includes/funciones.php';
incluirTemplate('header', $inicio = true, 'includes/templates');
?>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="contenedor seccion">
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
    </main>
    
    <!-- PROPIEDADES -->
    <section class="seccion contenedor">
        <h2>Casas y Departamentos en Venta</h2>

        <?php 
        $limite = 3;
        // incluirTemplate('propiedades', $inicio = true, 'includes/templates' ); 
        include 'includes/templates/propiedades.php';
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <!-- CONTACTO -->
    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario y un asesor se pondrá en contacto contigo a la brevedad.</p>
        <a href="contacto.php" class="boton-amarillo-contacto">Contactános</a>
    </section>

    <!-- BLOG -->
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>15/12/2021</span> por: <span>Admin</span></p>
                        <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>
            </article>
        </section>

        <!-- TESTIMONIALES -->
        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis espectativas.
                </blockquote>
                <p>- Luis R. Lobo</p>
            </div>
        </section>
    </div>

    <?php 
    incluirTemplate('footer', $inicio = true, 'includes/templates' ); ?>