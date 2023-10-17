<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate (string $nombre,bool $inicio = false) {

    include TEMPLATES_URL . "/$nombre.php";
}

function estaAutenticado () {
    session_start();
    

    if (!$_SESSION['login']) {
        header('Location: /');
    }
    
}
function debuguear($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";

    exit;
}
//Escapar el HTML de los forms

function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

//Validar tipo de contenido
function validarTipo($tipo) {
    $tipos = ['propiedad', 'vendedor'] ;
    return in_array($tipo, $tipos);

}