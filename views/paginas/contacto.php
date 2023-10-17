<main class="contenedor seccion">
        <h1>Contacto</h1>
        <?php if ($mensaje) {?>
            <p class="alerta exito"><?php echo $mensaje;?></p>
            <?php } ?>
        <picture>
            <source srcset="/build/img/destacada3.webp" type="image/webp">
            <source srcset="/build/img/destacada3.jpg" type="image/jpeg">
            <img src="/build/img/destacada3.jpg" loading="lazy" alt="imganen contacto">
        </picture>
        <h1>Llene el formulario de Contacto</h1>

    </main>
    <section class="contenedor seccion">
        <form class="formulario" method="POST" action="/contacto">
            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre" >Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

                                
                <label for="Mensaje" >Mensaje:</label>
                <textarea id="Mensaje" name="contacto[mensaje]" required></textarea>
                

            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <label for="seleccion">Vende o Compra</label>
                <select id="seleccion" name="contacto[tipo]" required>
                    <option selected disabled>--Seleccione--</option>
                    <option>Comprar</option>
                    <option>Vender</option>

                </select>
                <label for="Precio o Presupuesto" >Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="Precio o Presupuesto" name="contacto[precio]" required>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="tel">Telefono</label>
                    <input id="tel" value="telefono" type="radio" name="contacto[contacto]" required>
                    <label for="mail">E-mail</label>
                    <input id="mail" value="email" type="radio" name="contacto[contacto]" required>
                </div>

                <div id="contacto"></div>
                
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </section>