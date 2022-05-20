<?php

class Product {
    private $Id_pro;
    private $Cod_producto;
    private $Descripcion;
    private $Precio;
    private $Stock;

    public function __construct(){}

    public function __GET($param){ return $this->$param;}
    public function __SET($parm,$data){return $this->$param = $data;}
}