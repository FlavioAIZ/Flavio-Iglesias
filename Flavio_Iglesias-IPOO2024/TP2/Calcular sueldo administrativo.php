public function calcularSueldo (int $cantDias) :float {
            if ($cantDias<0 or $cantDias>30) {
                return false;
            }
            $sector=$this->getArea();
            $antiguedad = $this->calcularAntiguedad();
            $sueldo=0.01;
            $sueldo_diario = $this->getValorDia();
            if ($sector=='Ventas') {
                $sueldo_diario=$sueldo_diario*1.15;
            }
            elseif ($sector=='Tesorería') {
                $sueldo_diario=$sueldo_diario*1.20;
            }
            elseif ($sector=='Recursos Humanos') {
                $sueldo_diario=$sueldo_diario*1.10;
            }
            $sueldo=$cantDias*$sueldo_diario*(1+($antiguedad/100));
            return $sueldo;
        }