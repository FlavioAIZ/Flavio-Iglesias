<?php
    require_once "./empleado.php";
    
    

    class Administrativo extends Empleado {
        private $area;
        
        public function __construct($nombre_apellido,$nro_empleado,$dni,$fecha_inicio,$area) {
            parent::__construct($nombre_apellido,$nro_empleado,$dni,$fecha_inicio);
            $this-> area = $area;                    
        }

        public function setArea(string $area) :void {
            $this-> area=$area;            
        }

        public function getArea() :string {
            return $this->area;
        }
            
        public function calcularSueldo (int $cantDias) :float {
            $sector=array("Ventas"=>0.15,"Tesoreria"=>0.20,"Tesorería"=>0.20,"Recursos Humanos"=>0.10);
            $zona=$this->getArea();
            $sueldo_diario = $this->getValorDia();
            if (array_key_exists($zona, $sector)) {
                $incremento=$sector[$zona];
            } else {
                $incremento=0;
            }
            $this->setValorDia($sueldo_diario*(1+$incremento));            
            $sueld=(parent::calcularSueldo($cantDias));
            $this->setValorDia($sueldo_diario);
            return $sueld;
        }
    }
?>