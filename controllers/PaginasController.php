<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index(Router $router) {
        $inicio = true;
        $propiedades = Propiedad::get(3);
        $router->render('paginas/index',[
            'propiedades' => $propiedades,
            'inicio' => $inicio


        ]);
    }
    public static function nosotros(Router $router) {
        

        $router->render('paginas/nosotros',[

        ]);
    }
    public static function anuncios(Router $router) {
        
        $propiedades = Propiedad::all();

        $router->render('paginas/anuncios',[
            'propiedades' => $propiedades

        ]);
    }
    public static function blog(Router $router) {
        

        $router->render('paginas/blog',[

        ]);
    }
    public static function contacto(Router $router) {
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $datos = $_POST['contacto'];
            
            
            //Crear una nueva instancia
            $mail = new PHPMailer();
        try {
            $mail->isSMTP();
            $mail->Host       = $_ENV['EMAIL_HOST'];                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $_ENV['EMAIL_USER'];                     //SMTP username
            $mail->Password   = $_ENV['EMAIL_PASS'];                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = $_ENV['EMAIL_PORT'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'bienesraices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            $contenido = '<html> <p>Tienes un nuevo msj</p>';
            $contenido .= '<p>Nombre: ' . $datos['nombre'] . ' </p> ';          
            $contenido .= '<p> ' . $datos['mensaje'] . ' </p> ';
            $contenido .= '<p> El cliente quiere ' . $datos['tipo'];
            $contenido .=  ' a un precio de $' . $datos['precio'] . ' </p> ';
            $contenido .= '<p>Quiere ser contactado mediante ' . $datos['contacto'] . ' </p> ';
            if ($datos['contacto'] === 'telefono') {
            
            $contenido .= '<p>Telefono: ' . $datos['telefono'] . ' </p> ';
            $contenido .= '<p> ' . $datos['fecha'] . ' </p> ';
            $contenido .= '<p> ' . $datos['hora'] . ' </p> ';

            } else {
            $contenido .= '<p>Email: ' . $datos['email'] . ' </p> ';

            }
            
            $contenido .='</html>';
            $mail->Body    = $contenido;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
                $mensaje = 'Message has been sent';
            } catch (Exception $e) {
                $mensaje =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        
        $router->render('paginas/contacto',[
            'mensaje' => $mensaje


        ]);
    }
    public static function entrada(Router $router) {
        

        $router->render('paginas/entrada',[

        ]);
    }
    public static function anuncio(Router $router) {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header( 'Location: /');
        }

        $propiedad = Propiedad::find($id);
        

        $router->render('paginas/anuncio',[
            'propiedad' => $propiedad

        ]);
    }

}