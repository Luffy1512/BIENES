<!-- FOOTER -->
<footer class="footer seccion">
        <div class="contenedor contenido-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>
        <!-- Obtener el año actual con php -->
        <?php 
            $fecha = date('Y');
        ?>
        <p class="copyright">Todos los derechos Reservados <?php echo $fecha ?> &copy;</p>
    </footer>

    <!-- Agregar el archivo de JavaScript -->
    <script src="/build/js/bundle.min.js"></script>
</body>
</php>