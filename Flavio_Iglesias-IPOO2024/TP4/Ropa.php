<?php

declare (strict_types=1);
require_once "./Producto.php";

class Ropa extends Producto
{
    protected string $talla;
    protected bool $temporadaDeRebajas=false;

    public function __construct(int $id, string $nombre, float $precio, string $talla)
    {
        parent::__construct($id, $nombre, $precio, $rubro=1);
        $this->talla=$talla;
        $this->temporadaDeRebajas=false;
    }

    public function getTalla() :string
    {
        return $this->talla;
    }

    public function setTalla(string $talla) :void
    {
        $this->talla=$talla;
    }

    public function guardar()
    {
        echo "Guardar articulo de la sección ropa";
    }

    public function modificar()
    {
        echo "Modificar artículo de la sección ropa";
    }

    public function eliminar()
    {
        echo "eliminar articulo de la sección ropa";
    }

    public function esTemporadaDeRebajas() :bool
    {
        return $this->temporadaDeRebajas;
    }

    public function setTemporadaDeRebajas() :void
    {
        $TemporadaDeRebajas=true;
    }

    public function quitarTemporadaDeRebajas() :void
    {
        $TemporadaDeRebajas=false;
    }

    public function calcularDescuento() :void
    {
        if ($this->temporadaDeRebajas)
        {
            $this->setPrecioConDescuento($this->getPrecio()*0.9);
        } 
    }

    public function mostrarRopa() :void
    {
        echo "Código: ".$this->id." Nombre: ".$this->nombre." precio: ".$this->precio." precio c/descto: ".$this->precioConDescuento." talla: ".$this->talla."\n";
    }
    
    public function getRubro() :int
    {
        return $this->rubro;
    }    
}

?>