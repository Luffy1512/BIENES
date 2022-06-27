<?php 
// Importar la conexion
// require 'includes/config/database.php';
require __DIR__ . '/../config/database.php';
$db = conectarDB();

// Escribir el Query
$query = "SELECT * FROM propiedades LIMIT ${limite}";

// Obtener Resultado
$resultado = mysqli_query($db, $query);

// while($row = mysqli_fetch_assoc($resultado)) {
//     echo '<pre>';
//     var_dump($row);
//     echo '</pre>';
// }

?>

<div class="contenedor-anuncios">
    <?php while($row = mysqli_fetch_assoc($resultado)): ?>
    <div class="anuncio">
        <img loading="lazy" width="200" height="300" src="imagenes/<?php echo $row['imagen']; ?>" alt="anuncio">
        <div class="contenido-anuncio">
            <h3> <?php echo $row['titulo']; ?> </h3>
            <p> <?php echo $row['descripcion']; ?> </p>
            <p class="precio">$<?php echo $row['precio']; ?> </p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono_wc">
                    <p> <?php echo $row['wc']; ?> </p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono_estacionamiento">
                    <p> <?php echo $row['estacionamiento']; ?> </p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono_dormitorio">
                    <p> <?php echo $row['habitaciones']; ?> </p>
                </li>
            </ul>
            <!-- BOTON DE PROPIEDADES -->
            <a href="anuncio.php?id=<?php echo $row['id'] ?>" class="boton boton-amarillo">Ver Propiedad</a>
        </div> <!-- .contenido-anuncio -->
    </div> <!-- .anuncio -->
    <?php endwhile; ?>
</div> <!-- .contenedor-anuncios -->
<?php 
// CERRAR LA CONEXION
mysqli_close($db);
?>