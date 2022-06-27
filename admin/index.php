<?php 
/* ACCEDER SOLO SI EL USUARIO ESTA AUTENTICADO */
// Iniciamos la sesion
// session_start();
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

// $auth = $_SESSION['login'];
// if(!$auth){
//     header('Location: /');
// }

// APLICAMOS LA FUNCION ESTA AUTENTICADO
require '../includes/funciones.php'; // requerir las funciones aqui y comentar la de mas abajo
if(estaAutenticado() === false){
    header('Location: /');
}
// otra forma seria:
// $auth = estaAutenticado();
// if(!$auth){
//     header('Location: /');
// }


// Importar la conexion
require '../includes/config/database.php';
$db = conectarDB();

// Escribir el Query
$query = 'SELECT * FROM propiedades';

// Consultar la BD
$resultado = mysqli_query($db, $query);

// Mostrar un mensaje condicional
$registrado = $_GET['registrado'] ?? null; // si en la URL no existe la variable registrado pondremos que sea igual a nulo, sino nos dara un error


/* ELIMINAR REGISTRO */
// Comprobar y validar
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    // Una vez validado lo que recibimos por POST, ejecutamos la consulta SQL
    if($id){
        // Eliminar el archivo (imagen de la propiedad)
        $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);
        // echo $propiedad['imagen'];
        // exit;
        unlink('../imagenes/' . $propiedad['imagen']);

        // Eliminar la Propiedad
        $query = "DELETE FROM propiedades WHERE id = ${id}";
        // echo $query;
        $resultado = mysqli_query($db, $query);

        if($resultado){
            header('location: /admin?registrado=3'); // para mostrar un mensaje al usuario
        }
    }
    
}


// Incluir un templade
// require '../includes/funciones.php';
incluirTemplate('header', false, '../includes/templates');
?>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php if(intval($registrado) === 1): ?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>
        <!-- Nuevo mensaje para cuando actualizamos -->
        <?php elseif(intval($registrado) === 2): ?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        <!-- Nuevo mensaje para cuando eliminamos -->    
        <?php elseif(intval($registrado) === 3): ?>
            <p class="alerta exito">Anuncio Eliminado Correctamente</p>
        <?php endif ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <!-- TABLA PARA LISTAR LAS PROPIEDADES -->
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!-- Mostrar los resultados de la BD -->               
                <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
                <tr>
                    <td> <?php echo $propiedad['id']; ?> </td>
                    <td> <?php echo $propiedad['titulo']; ?> </td>
                    <td> <img src="../imagenes/<?php echo $propiedad['imagen'];?>" alt="" class="imagen-tabla"> </td>
                    <td> $ <?php echo $propiedad['precio']; ?> </td>
                    <td>
                        <!-- <a href="" class="boton-rojo-block">Eliminar</a> -->
                        <!-- CREAR FORMULARIO PARA EL BOTON ELIMINAR -->
                        <form method="POST">
                        <!-- hidden - nos permite enviar datos de forma oculta -->
                        <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <!-- TRAER EL ID DE LO QUE QUEREMOS ACTUALIZAR -->
                        <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'] ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

<?php 

// CERRAR LA CONEXION
mysqli_close($db);

incluirTemplate('footer', false, '../includes/templates');
?>