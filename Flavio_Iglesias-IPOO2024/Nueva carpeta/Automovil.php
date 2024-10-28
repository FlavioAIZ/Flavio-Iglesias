<?php

declare (strict_types=1);
require_once __DIR__ ."/Vehiculo.php";

class Automovil extends Vehiculo
{
    public $encendido=false;

    public function __construct(string $modelo, string $tipo)
    {
        parent::__construct($modelo, $tipo);
    }

    public function mostrardetalle(): string
    {
        $mensaje="\n\nModelo: ".($this->getModelo())." y tipo ".($this->getTipo())." clase: " .$this::class." \n";
                return $mensaje;
    }
    
    public function encenderVehiculo(): bool
    {
        if ($this->encendido)
        {
            return false;
        }
        $this->encendido=true;
        return true;
    }

    public function detenerVehiculo(): bool
    {
        if($this->encendido)
        {
        return false;
        }
        $this->encendido = false;
        return true;
    }
}

$coche=new Automovil(modelo:"Renault", tipo:"Duster");
echo ($coche->mostrardetalle());
$esta_en_marcha= $coche->encenderVehiculo();
if ($esta_en_marcha)
{
    echo "Vehiculo encendido\n";   
} else
{
    echo "El vehículo ya estaba encendido\n";
}
$esta_en_marcha=$coche->detenerVehiculo();
if (!$esta_en_marcha)
{
    echo "Vehiculo detenido\n";   
} else
{
    echo "El vehículo ya estaba detenido\n";
}