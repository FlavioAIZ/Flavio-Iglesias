<?php

declare (strict_types=1);
require_once __DIR__ ."/Ropa.php";
require_once __DIR__ ."/Tecnologia.php";
require_once __DIR__ ."/Mueble.php";

class Carrito
{
    protected array $carrito;

    public function __construct()
    {
        $this->carrito=[];
    }

    public function agregarProductos(Producto $producto) :void
    {
        $this->carrito[]=$producto;
    }

    public function mostrarProductos() :void
    {
        foreach ($this->carrito as $producto)
            if ($producto->getRubro()==1)
            {
                $producto->mostrarRopa();
            }
            elseif ($producto->getRubro()==2)
            {
                $producto->mostrarTecnologia();
            }
            elseif ($producto->getRubro()==3)
            {
                $producto->mostrarMueble();
            }
    }
}

?>