<fieldset>
                    <legend>Informacion General</legend>

                    <label for="nombre">Nombre:</label>
                    <input type="text" name="vendedor[nombre]" id="nombre" placeholder="Nombre del vendedor" value="<?php echo s($vendedor->nombre); ?>">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="vendedor[apellido]" id="apellido" placeholder="Apellido del vendedor" value="<?php echo s($vendedor->apellido); ?>">
                    <label for="telefono">Telefono:</label>
                    <input type="number" name="vendedor[telefono]" id="telefono" placeholder="Telefono del vendedor" value="<?php echo s($vendedor->telefono); ?>">
</fieldset>
<?php foreach ($errores as $error): ?>

<div class="alerta error">
<?php echo $error; ?>
</div>


<?php endforeach; ?>