<main class="contenedor  seccion">
        <h1><?php echo $propiedad->titulo; ?></h1>
            <div class="imagen-anuncio">
                <img loading="lazy"  src="imagenes/<?php echo $propiedad->imagen; ?>" alt="" >
            
        
        <p class="precio">$<?php echo $propiedad->precio; ?></p>
                    <ul class="iconos-casas">
                        <li>
                            <img src="/build/img/icono_wc.svg" alt="bano" loading="lazy">
                            <p><?php echo $propiedad->wc; ?></p>
                        </li>
                        <li>
                            <img src="/build/img/icono_estacionamiento.svg" alt="bano" loading="lazy">
                            <p><?php echo $propiedad->estacionamiento; ?></p>
                        </li>
                        <li>
                            <img src="/build/img/icono_dormitorio.svg" alt="bano" loading="lazy">
                            <p><?php echo $propiedad->habitaciones; ?></p>
                        </li>
                    </ul>
                    <P><?php echo $propiedad->descripcion; ?>
                    </p>
                    </div>
                   

    </main>