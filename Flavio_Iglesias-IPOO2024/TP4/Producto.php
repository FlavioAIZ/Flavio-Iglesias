<?php

declare (strict_types=1);
require_once __DIR__ ."/Gestionable.php";

abstract class Producto implements Gestionable
{
    protected int $id;
    protected string $nombre;
    protected float $precio;
    protected int $rubro;
    protected float $precioConDescuento;

    public function __construct(int $id, string $nombre, float $precio, $rubro)
    {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->precio=$precio;
        $this->rubro=$rubro;
        $this->precioConDescuento=$precio;
    }

    public function getId() :int
    {
        return $this->id;
    }

    public function getNombre() :string
    {
        return $this->nombre;
    }
    
    public function getPrecio() :float
    {
        return $this->precio;
    }

    public function getRubro() :int
    {
        return $this->rubro;
    }

    public function setId (int $id) :void
    {
        $this->id=$id;
    }

    public function setNombre (string $nombre) :void
    {
        $this->nombre=$nombre;
    }

    public function setPrecio (float $precio) :void
    {
        $this->precio=$precio;
    }

    public function setRubro (int $rubro) :void
    {
        $this->rubro=$rubro;
    }

    public function getPrecioConDescuento() :float
    {
        return $this->precioConDescuento;
    }

    public function setPrecioConDescuento(float $precioConDescuento) :void
    {
        $this->precioConDescuento=$precioConDescuento;
    }

    protected abstract function calcularDescuento() :void;
}

?>