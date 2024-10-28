<?php

declare (strict_types=1);
require_once "./Producto.php";

class Tecnologia extends Producto
{
    protected string $garantia;
    
    public function __construct(int $id, string $nombre, float $precio, string $garantia)
    {
        parent::__construct($id, $nombre, $precio, $rubro=2); //rubro=2 -> Tecnologia
        $this->garantia=$garantia;
    }

    public function getGarantia() :string
    {
        return $this->garantia;
    }

    public function setGarantia(string $garantia) :void
    {
        $this->garantia=$garantia;
    }

    public function guardar()
    {
        echo "Guardar articulo de la sección Tecnología";
    }

    public function modificar()
    {
        echo "Modificar artículo de la sección Tecnología";
    }

    public function eliminar()
    {
        echo "eliminar articulo de la sección Tecnología";
    }

    public function calcularDescuento() :void
    {
        if ($this->esUltimoDomingoDelMes())
        {
            $this->setPrecioConDescuento($this->getPrecio()*0.85);
        } 
    }

    function esUltimoDomingoDelMes()
    {  
        // * * * * * * * * funcion obtenida de internet * * * * * * * * * * * * 
        // tambien podria haber dejado una variable para que se actualice como hice en ropa con esTemporadaDeRebajas
        $fecha_actual = date('Y-m-d');
    
         // Obtener el primer día del próximo mes
         $primer_dia_proximo_mes = date('Y-m-01', strtotime('+1 month'));
        
         // Retroceder al último domingo del mes actual
        $ultimo_domingo = date('Y-m-d', strtotime('last sunday', strtotime($primer_dia_proximo_mes)));
     
         // Comprobar si hoy es el último domingo del mes
         return (date('Y-m-d') == $ultimo_domingo);
    }

    public function mostrarTecnologia() :void
    {
        echo "Código: ".$this->id." Nombre: ".$this->nombre." precio: ".$this->precio." precio c/descto: ".$this->precioConDescuento." garantia: ".$this->garantia."\n";
    }
    
    public function getRubro() :int
    {
        return $this->rubro;
    }
}

?>