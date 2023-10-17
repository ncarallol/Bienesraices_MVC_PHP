<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    

    $auth = $_SESSION['login'] ?? false;

    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo bienes raices">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="menu">
                </div>
                <nav class="navegacion">
                    <a class="navegacion-texto" href="nosotros.php">Nosotros</a>
                    <a class="navegacion-texto" href="anuncios.php">Anuncios</a>
                    <a class="navegacion-texto" href="blog.php">Blog</a>
                    <a class="navegacion-texto" href="contacto.php">Contacto</a>
                    <?php if ($auth):?>
                        <a class="navegacion-texto" href="cerrar-sesion.php">Cerrar Sesion</a>


                    <?php endif ?>
                </nav>
                

            </div>
             <?php
             if ($inicio) echo '
            <h1 clas> Venta de Casas y Departamentos exclusivos de Lujo</h1> ' ;

            ?>

        </div>
        
    </header>