<main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php 
        
        if ($resultado) {
        if($resultado == 1) :?>

        <p class="alerta exito">Creado correctamente</p>

        <?php elseif ($resultado == 2) :  ?>

        <p class="alerta exito">Actualizado correctamente</p>

        <?php elseif ($resultado == 3) :  ?>

        <p class="alerta error w-100">Eliminado correctamente</p>

        <?php endif ?>
        <?php } ?>

        <a href="/propiedades/crear" class="boton boton-verde">Nueva Propiedad
        </a>
        <a href="/vendedores/crear" class="boton boton-amarillo">Nuevo(a) Vendedor
        </a>
        
        <h2>Propiedades</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($propiedades as $propiedad) : ?>

                <tr>
                    <td><?php echo $propiedad->id?></td>
                    <td><?php echo $propiedad->titulo?></td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen?>" class="imagen-admin"></td>
                    <td>$<?php echo $propiedad->precio?></td>
                    <td>
                        <a href="/propiedades/actualizar?id=<?php echo $propiedad->id?>" class="boton-amarillo-block">Actualizar</a>

                        <form method="POST" action="/propiedades/eliminar">
                        
                        <input type="hidden" value="<?php echo $propiedad->id ?>" name="id">
                        <input type="hidden" value="propiedad" name="tipo">
                        <input type="submit" value="Eliminar" class="boton boton-rojo-block w-100">
                        </form>
                        
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($vendedores as $vendedor) : ?>

                <tr>
                    <td><?php echo $vendedor->id?></td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido?></td>
                    <td><?php echo $vendedor->telefono?></td>
                    <td>
                        <a href="/vendedores/actualizar?id=<?php echo $vendedor->id?>" class="boton-amarillo-block">Actualizar</a>

                        <form method="POST" action="/vendedores/eliminar">
                        
                        <input type="hidden" value="<?php echo $vendedor->id ?>" name="id">
                        <input type="hidden" value="vendedor" name="tipo">
                        <input type="submit" value="Eliminar" class="boton boton-rojo-block w-100">
                        </form>
                        
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</main>