<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login(Router $router) {

        $errores = [];
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $auth = new Admin($_POST);
            $errores = $auth->validar();

            if(empty($errores)) {
                //Autenticar usuario
                
                $resultado = $auth->verificar();


                if(!$resultado) {
                    $errores = Admin::getErrores();
                } else {
                //Verificar password
                
                $autenticado = $auth->verificarPassword($resultado);

                if($autenticado) {
                //Loguear usuario
                $auth->autenticar();

                } else {
                    //password incorrecto
                    $errores = Admin::getErrores();
                }
                }
            }

        }
        $router->render('auth/login',[
            'errores' => $errores

        ]);
    }
    public static function logout() {
        session_start();

        $_SESSION = [];

        header('Location: /');
        
    }

}