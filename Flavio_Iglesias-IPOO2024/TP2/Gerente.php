<?php

require_once "./empleado.php";

class Gerente extends Empleado {
    protected $cant_empleados;

    public function __construct($nombre_apellido,$nro_empleado,$dni,$fecha_inicio,$cant_empleados) {
        parent::__construct($nombre_apellido,$nro_empleado,$dni,$fecha_inicio);
        $this->cant_empleados = $cant_empleados;
    }
    
    public function setCantEmpleados (int $cant_empleados) :void {
        $this-> cant_empleados=$cant_empleados;
    }

    public function getCantEmpleados () :int {
        return $this->cant_empleados;
    }

    public function calcularSueldo (int $cantDias) :float {        
        $empleados=$this->getCantEmpleados();
        $sueld=0.01;
        $sueldo_diario = $this->getValorDia();
        $this->setValorDia($sueldo_diario*1.45);
        if ($empleados>20) {
            $incremento=25;
        } elseif ($empleados>10) {
            $incremento=17;
        } elseif ($empleados>4) {
            $incremento=10;
        } else {
            $incremento=0.00;
        }
        $sueld=parent::calcularSueldo($cantDias)*(1+$incremento/100);
        $sueld=round($sueld,2);
        $this->setValorDia($sueldo_diario);
        return $sueld;
    }
}