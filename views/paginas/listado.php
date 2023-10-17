<main class="contenedor seccion">
<h1 >Casas y Departamentos en Venta</h1>
        <div class="casas">
        <?php foreach ($propiedades as $propiedad) { ?>
            <div class="columna">

            <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen ?>" alt="">

                <div class="descripcion">
                    <h2><?php echo $propiedad->titulo ?></h2>
                    <p> <?php echo $propiedad->descripcion ?></p>
                    <p class="precio">$<?php echo $propiedad->precio ?></p>
                    <ul class="iconos-casas">
                        <li>
                            <img src="/build/img/icono_wc.svg" alt="bano" loading="lazy">
                            <p><?php echo $propiedad->wc ?></p>
                        </li>
                        <li>
                            <img src="/build/img/icono_estacionamiento.svg" alt="bano" loading="lazy">
                            <p><?php echo $propiedad->estacionamiento ?></p>
                        </li>
                        <li>
                            <img src="/build/img/icono_dormitorio.svg" alt="bano" loading="lazy">
                            <p><?php echo $propiedad->habitaciones?></p>
                        </li>
                    </ul>
                    <a class="boton-amarillo-block" href="/anuncio?id=<?php echo $propiedad->id ?>">Ver Propiedad</a>
                </div>
            </div><!--.Cada Anuncio-->
            <?php } ?>
        </main>

            