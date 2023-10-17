<?php

namespace Model;

class Vendedores extends ActiveRecord {

    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        
    }
    public function validar() {

        
        if(!$this->nombre) {
            self::$errores [] = "Debes agregar un nombre";
        }
        if(!$this->apellido) {
            self::$errores [] = "Debes agregar apellido";
        }
        if(!$this->telefono) {
            self::$errores [] = "Debes agregar telefono";
        }
        if(!preg_match('/[0-9]{10}/', $this->telefono)) {
            self::$errores [] = "El telefono no es valido";
        }

        return self::$errores;
    }
}