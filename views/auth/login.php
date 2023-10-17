<main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>
    <form method="POST" class="formulario">
    <fieldset>
                <legend>Informacion Personal</legend>

                

                <label for="E-mail" >E-mail</label>
                <input type="email" name="email" placeholder="Tu E-mail" id="E-mail">

                <label for="password" >Password</label>
                <input type="password" name="password" placeholder="Tu password" id="pasword">

    </fieldset>
    <?php foreach ($errores as $error) : ?>
        <div class="error alerta ">
            <?php echo $error; ?>
        </div>

    <?php endforeach ; ?>
    <input type="submit" class="boton boton-verde" value="Ingresar">
    </form>
    </main>