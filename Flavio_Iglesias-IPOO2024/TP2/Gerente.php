<?php

require "Empleado.php";

class Gerente extends Empleado {
    private $cant_empleados;

    public function __construct($nombre_apellido,$nro_empleado,$dni,$fecha_inicio,$valor_dia,$cant_empleados) {
        parent::__construct($nombre_apellido,$nro_empleado,$dni,$fecha_inicio,$valor_dia);
        $this->cant_empleados = $cant_empleados;
    }
    
    public function setCantEmpleados (int $cant_empleados) :void {
        $this-> cant_empleados=$cant_empleados;
    }

    public function getCantEmpleados () :int {
        return $this->cant_empleados;
    }

    protected function calcularSueldo (int $cantDias) :float {
        if ($cantDias<0 or $cantDias>30) {
            return false;
        }
        $antiguedad = $this->calcularAntiguedad();
        $empleados=$this->getCantEmpleados();
        $sueldo=0.01;
        $sueldo_diario = $this->getValorDia();
        if ($empleados>20) {
            $sueldo_diario=$sueldo_diario*(1+((45+25)/100));
        }
        elseif ($empleados>10) {
            $sueldo_diario=$sueldo_diario*(1+((45+17)/100));
        }
        elseif ($empleados>4) {
            $sueldo_diario=$sueldo_diario*(1+((45+10)/100));
        }
        else {
            $sueldo_diario=$sueldo_diario*(1+((45)/100));
        }
        $sueldo=$cantDias*$sueldo_diario*(1+($antiguedad/100));
        return $sueldo;
    }
}