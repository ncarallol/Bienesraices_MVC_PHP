<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {
    public static function index(Router $router) {

        $propiedades = Propiedad::all();
        $vendedores = Vendedores::all();

        //Muestra mensaje condicional cuando se crea una propiedad
        $resultado = $_GET['resultado'] ?? null;
        
        $router->render('propiedades/admin', [

            'vendedores' => $vendedores,
            'propiedades' => $propiedades,
            'resultado' => $resultado
            
        ]);
        
    }
    public static function crear(Router $router) {

        $propiedad =  new Propiedad();
        $vendedores = Vendedores::all();
        
        //Arreglo para errores
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //crear una nueva instancia
            $propiedad = new Propiedad($_POST['propiedad']);
            
            // Crear Carpeta
            $carpetaImagenes = '../../imagenes/';
            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }
    
            // Crear Nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
            //setear la imagen 
            //Realiza un rezise a la imagen con intervecion
            
            if($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
            }
    
            $errores = $propiedad-> validar();
    
            //Revisar que el arreglo de errores este vacio para agregar a la base de datos
    
            if (empty($errores)) {
                // Crear Carpeta
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                
                //Guardar la imagen en el servidor
    
                $image->save(CARPETA_IMAGENES . $nombreImagen);
    
                //Guardar en la base de datos
                $propiedad-> guardar();   
                }
    
            
        }
        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores

        ]);
    }
    public static function actualizar(Router $router) {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /admin ');
        }

        $vendedores = Vendedores::all();
        //Crear una consulta para extraer datos de las propiedades
        $propiedad = Propiedad::find($id);

        //Arreglo para errores
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['propiedad'];

            
            $propiedad->sincronizar($args);
           
        
            //Validacion 
        
            $errores = $propiedad->validar();
        
            //Subida de imagenes
            // Crear Nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        
            //setear la imagen 
            //Realiza un rezise a la imagen con intervecion
            if($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
            }
            
            //Revisar que el arreglo de errores este vacio para agregar a la base de datos
            if (empty($errores)) {
                if($_FILES['propiedad']['tmp_name']['imagen']) {
                //Almacenar la imagen
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                
                }
                $propiedad -> guardar(); 
            }  
        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if($id) {

                if (validarTipo($_POST['tipo'])) {

                    if($_POST['tipo'] == 'propiedad') {
                        $propiedad = Propiedad::find($id);
                        $propiedad->eliminar();
                    }
                    else if($_POST['tipo'] == 'vendedor') {
                        $vendedor = Vendedores::find($id);
                        $vendedor->eliminar();
                    }
                }
        
            }
        }
    }
}
 