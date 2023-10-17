<?php

namespace Model;

class ActiveRecord {
    
    //BASE DE DATOS

    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    //Errores 
    protected static $errores = [];

    // DEFINIR LA CONEXION A LA DB

    public static function setDB($database) {
        self::$db = $database;
    }
    
    public function guardar() {
        if (!is_null($this->id)) {
            //ACTUALIZAR
            $this->actualizar();
        }
        else {
            //Crear
            $this->crear();
        }
    }

    public function crear(){

        //Sanitizar los datos del form

        $atributos = $this->sanitizarAtributos();

               

        // debuguear($string);

        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ( ' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ' ) ";
        
        $resultado = self::$db->query($query);

        //Mensaje de exito o error
        if($resultado) {
            header('Location: /admin?resultado=1'); //solo funciona si todavia no hay html
        }        
    }

    public function actualizar() {

        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = " UPDATE " . static::$tabla . " SET ";
        $query .= ( join(', ', $valores));
        $query .= "WHERE id= '" . self::$db->escape_string($this->id) . "' ";
        $query .= "LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado) {
            header('Location: /admin?resultado=2'); //solo funciona si todavia no hay html
            }   
    }
    public function eliminar() {
        //Eliminar Propiedad
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado) {
        $this->borrarImagen();
        header('location: /admin?resultado=3');
        }
    }
    //Identificar los atributos de la bd
    public function atributos() {
        $atributos = [];

        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;

        }
        return $atributos;
    }

    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];

        

        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        
        return $sanitizado;
    }
    //Subida de archivos
    public function setImagen($imagen) {
        //Eliminar la imagen previa
        if(!is_null($this->id)) {
            $this->borrarImagen();            
        }

        //Asignar al atributo de imagen el nombre de la imagen
        if($imagen) {
            $this->imagen = $imagen;
        }
    }
    //Eliminar archivos
    public function borrarImagen() {
        
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
            if($existeArchivo) {
                unlink(CARPETA_IMAGENES . $this->imagen);
            }      
    }

    //Validacion

    public static function getErrores() {
        return static::$errores;
    }
    
    public function validar() {
            static::$errores =[];
            return static::$errores;
    }

    //Lista todos los registros
    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);

        return $resultado;  
    }

    //Listar cantidad de registros
    public static function get($cantidad) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);

        return $resultado;  
    }    
    // Busca un registro por su id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";
        
        $resultado = self::consultarSQL($query);
        
        return array_shift($resultado);
    }


    public static function consultarSQL($query) {
        //Comsultar la DB
        $resultado = self::$db->query($query);

        //Iterar resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);

        }
        //Liberar memoria
        $resultado->free(); 

        //Retornar los resultados
        return $array;

    }

    protected static function crearObjeto($registro) {
        $objeto = new static;

        

        foreach ($registro as $key => $value) {
            if(property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }

        }
        return $objeto;

    }

    //Sincroniza el objeto en memoria con los cambioas realizados por el usuario
    public function sincronizar($args = []) {
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }

    }
    

}