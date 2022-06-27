<?php 

// APLICAMOS LA FUNCION ESTA AUTENTICADO
require '../../includes/funciones.php'; // requerir las funciones aqui y comentar la de mas abajo
if(estaAutenticado() === false){
    header('Location: /');
}


// Conexion a la Base de Datos
require '../../includes/config/database.php';

$db = conectarDB();

$errores = []; // LISTA DE ERRORES PARA VALIDAR EL FORMULARIO

// VARIABLES VACIAS PARA CREAR CAMPOS CON VALORES PREVIOS
$titulo = "";
$precio = "";
$imagen = "";
$descripcion = "";
$habitaciones = "";
$wc = "";
$estacionamiento = "";
$vendedorId = "";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $titulo = mysqli_real_escape_string( $db, $_POST["titulo"]);
    $precio = mysqli_real_escape_string( $db, $_POST["precio"]);
    $descripcion = mysqli_real_escape_string( $db, $_POST["descripcion"]);
    $habitaciones = mysqli_real_escape_string( $db, $_POST["habitaciones"]);
    $wc = mysqli_real_escape_string( $db, $_POST["wc"]);
    $estacionamiento = mysqli_real_escape_string( $db, $_POST["estacionamiento"]);
    $vendedorId = mysqli_real_escape_string( $db, $_POST["vendedor"]);
    $creado = date("Y/m/d"); 

    // Asignar FILES a una variable $imagen
    $imagen = $_FILES['imagen'];
   
    // VALIDAR EL FORMULARIO
    if(!$titulo) {
        $errores[] = "Añade un Título";
    }

    if(!$precio) {
        $errores[] = "El Precio es Obligatorio";
    }

    if(strlen($descripcion) < 50) {
        $errores[] = "La Descripción es Obligatorio y debe contener como minimo 50 caracteres";
    }

    if(!$habitaciones) {
        $errores[] = "El número de Habitaciones es Obligatorio";
    }

    if(!$wc) {
        $errores[] = "El número de Baños es Obligatorio";
    }

    if(!$estacionamiento) {
        $errores[] = "El número de Lugares de Estacionamiento es Obligatorio";
    }

    if(!$vendedorId) {
        $errores[] = "Elige un Vendedor";
    }
    if(!$imagen['name'] || $imagen['error']) { // Agregamos $imagen['error'] porque PHP puede subir maximo 2megas en archivos si es mas pesado no te sale error y pasa el filtro pero la imagen no se sube
        $errores[] = "La Imagen es Obligatoria";
    }

    // Validar las Imagenes por Tamaño (Ejm. 100 kb Maximo)
    $medida = 9000 * 100; // Formula para pasar de bytes a kilobytes

    if($imagen['size'] > $medida) {
        $errores[] = "La Imagen es Demasiado Grande";
    }

    // INSERTAR LOS DATOS EN CASO DE PASAR LA VALIDACION DEL FORMULARIO
    if(empty($errores)) {

        /* SUBIDA DE ARCHIVOS */
        // Crear la carpeta
        $carpetaImagenes = '../../imagenes/';
        if(!is_dir($carpetaImagenes)) { // verificar si existe la carpeta
            mkdir($carpetaImagenes); // mkdir - sirve para crear carpetas
        }

        $nombreImagen = md5(uniqid(rand(), true )) . ".jpg"; 
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        
        $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId' ) ";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header("Location: /admin?registrado=1");
        }
    }
}

// CONSULTA PARA OBTENER LOS VENDEDORES
$consulta = 'SELECT * FROM vendedores';
$resultado = mysqli_query($db, $consulta);




// require '../../includes/funciones.php';
incluirTemplate('header');
?>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <!-- MOSTRAR INFORMACION DE LA VALIDACION DEL FORMULARIO EN EL HTML -->
        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <!-- FORMULARIO PARA CREAR PROPIEDADES -->
        <form action="" class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titutlo">Título:</label>
                <input type="text" id="titulo" placeholder="Título Propiedad" name="titulo" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" placeholder="Precio Propiedad" name="precio" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" placeholder="Ej: 3" min="1" max="9" name="habitaciones" value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" placeholder="Ej: 3" min="1" max="9" name="wc" value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" name="estacionamiento" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="">-- Selecciona un Vendedor --</option>
                    <?php while($row = mysqli_fetch_assoc($resultado)) : ?>
                        <option <?php echo $vendedorId === $row['id'] ? 'selected' : ''; ?>   value="<?php echo $row['id']; ?>"> <?php echo $row['nombre'] . " " . $row['apellido']; ?></option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
incluirTemplate('footer');
?>