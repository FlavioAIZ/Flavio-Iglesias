<?php

declare (strict_types=1);
require_once "./Producto.php";

class Mueble extends Producto
{
    protected string $material;
    
    public function __construct(int $id, string $nombre, float $precio, string $material)
    {
        parent::__construct($id, $nombre, $precio, $rubro=3); //rubro=3 -> Mueble
        $this->material=$material;
    }

    public function getMaterial() :string
    {
        return $this->material;
    }

    public function setMaterial(string $material) :void
    {
        $this->material=$material;
    }

    public function guardar()
    {
        echo "Guardar articulo de la sección Mueble";
    }

    public function modificar()
    {
        echo "Modificar artículo de la sección Mueble";
    }

    public function eliminar()
    {
        echo "eliminar articulo de la sección Mueble";
    }

    public function calcularDescuento() :void
    {
        if ($this->getMaterial()=="pino")
        {
            $this->setPrecioConDescuento($this->getPrecio()*0.93);
        } 
    }

    public function mostrarMueble() :void
    {
        echo "Código: ".$this->id." Nombre: ".$this->nombre." precio: ".$this->precio." precio c/descto: ".$this->precioConDescuento." material: ".$this->material."\n";
    }

    public function getRubro() :int
    {
        return $this->rubro;
    }
       
}

?>