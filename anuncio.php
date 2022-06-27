<?php 
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if(!$id){
    header('location: /');
}

// Importar la conexion
require __DIR__ . '/includes/config/database.php';
$db = conectarDB();

// Escribir el Query
$query = "SELECT * FROM propiedades WHERE id = ${id} ";
// echo $query;

// Obtener Resultado
$resultado = mysqli_query($db, $query);
// Como solo tenemos un resultado no sera necesario iterar
$row = mysqli_fetch_assoc($resultado);

require 'includes/funciones.php';
incluirTemplate('header', $inicio = false, 'includes/templates' );
?>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta Frente al Bosque</h1>
        <img loading="lazy" src="imagenes/<?php echo $row['imagen']; ?>" alt="Imagen Destacada">

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $row['precio']; ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono_wc">
                    <p><?php echo $row['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono_estacionamiento">
                    <p><?php echo $row['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono_dormitorio">
                    <p><?php echo $row['habitaciones']; ?></p>
                </li>
            </ul>

            <p><?php echo $row['descripcion']; ?></p>
        </div>
    </main>

    <?php 
    // CERRAR LA CONEXION
    mysqli_close($db);
    incluirTemplate('footer', $inicio = false, 'includes/templates' ); ?>