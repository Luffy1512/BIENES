<?php 
require 'includes/funciones.php';
incluirTemplate('header', $inicio = false, 'includes/templates' );
?>
    <!-- CONTENIDO PRINCIPAL -->
    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Destacada">
        </picture>

        <h2>Llene el formulario de Contacto</h2>

        <form action="" class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" placeholder="Tu Nombre">

                <label for="email">E-mail</label>
                <input type="email" id="email" placeholder="Tu E-mail">

                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" placeholder="Tu Teléfono">

                <label for="mensaje">Mensaje:</label>
                <textarea name="" id="mensaje" cols="30" rows="10"></textarea>

            </fieldset> 

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vende o Compra:</label>
                <select name="" id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" id="presupuesto" placeholder="Tu Precio o Presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>Como desea ser Contactado:</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <p>Si eligió teléfono, elija la fecha y la hora</p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00">
            
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">

        </form>
    </main>

    <?php 
    incluirTemplate('footer', $inicio = false, 'includes/templates' ); ?>