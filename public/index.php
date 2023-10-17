<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use Controllers\PaginasController;
use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;

$router = new Router();


//Zona privada
$router-> get('/admin', [PropiedadController::class,'index']); 
$router-> get('/propiedades/crear', [PropiedadController::class,'crear']); 
$router-> post('/propiedades/crear', [PropiedadController::class,'crear']); 
$router-> get('/propiedades/actualizar', [PropiedadController::class,'actualizar']); 
$router-> post('/propiedades/actualizar', [PropiedadController::class,'actualizar']); 
$router-> post('/propiedades/eliminar', [PropiedadController::class,'eliminar']); 

$router-> get('/vendedores/crear', [VendedorController::class,'crear']); 
$router-> post('/vendedores/crear', [VendedorController::class,'crear']); 
$router-> get('/vendedores/actualizar', [VendedorController::class,'actualizar']); 
$router-> post('/vendedores/actualizar', [VendedorController::class,'actualizar']); 
$router-> post('/vendedores/eliminar', [PropiedadController::class,'eliminar']); 

//Zona publica
$router-> get('/', [PaginasController::class,'index']); 
$router-> get('/nosotros', [PaginasController::class,'nosotros']); 
$router-> get('/anuncios', [PaginasController::class,'anuncios']); 
$router-> get('/anuncio', [PaginasController::class,'anuncio']); 
$router-> get('/blog', [PaginasController::class,'blog']); 
$router-> get('/contacto', [PaginasController::class,'contacto']); 
$router-> post('/contacto', [PaginasController::class,'contacto']); 
$router-> get('/entrada', [PaginasController::class,'entrada']); 
$router-> post('/cerrarsesion', [PaginasController::class,'cerrarsesion']); 

//Login
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);



$router->comprobarRutas();