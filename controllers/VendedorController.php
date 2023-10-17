<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class VendedorController {
    public static function crear(Router $router) {

        $vendedor = new Vendedores();
        $errores = Vendedores::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            

            $vendedor = new Vendedores($_POST['vendedor']);
        
            $errores = $vendedor -> validar();
            
            if (empty($errores)) {
                
                $vendedor-> guardar(); 
                
                }
        
        
        }

        $router->render('/vendedores/crear',[
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);

     }

     public static function actualizar(Router $router) {

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
        header('Location: /admin ');
        }

        $vendedor = Vendedores::find($id);

        $errores = Vendedores::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['vendedor'];
            $vendedor->sincronizar($args);
        
            //Validacion 
        
            $errores = $vendedor->validar();
        
            //Revisar que el arreglo de errores este vacio para agregar a la base de datos
            if (empty($errores)) {
               
                $vendedor -> guardar(); 
            }  
        }


        $router->render('vendedores/actualizar',[
            'vendedor' => $vendedor,    
            'errores' => $errores

        ]);
     }

     public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if($id) {
        
                $tipo = $_POST['tipo'];
                if(validarTipo($tipo)) {
                    $vendedor = Vendedores::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }

    // public static function eliminar() {

    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     $id = $_GET['id'];
    //     $id = filter_var($id, FILTER_VALIDATE_INT);

    //     if ($id) {
        
    //     $tipo = $_POST['tipo'];
    //     debuguear($tipo);
    //     $vendedor = Vendedores::find($id);
    //     $vendedor->eliminar();
    //     }
    //     }
        



    // }


 }



?>