<?php 
    class Empleado {
        private $nombre_apellido;
        private $nro_empleado;
        private $dni;
        private $fecha_inicio;
        private $valor_dia = 30000;

        public function __construct($nombre_apellido,$nro_empleado,$dni,$fecha_inicio,$valor_dia) {
            $this-> nombre_apellido = $nombre_apellido;
            $this-> nro_empleado = $nro_empleado;
            $this-> dni = $dni;
            $this-> fecha_inicio = $fecha_inicio;
            $this-> valor_dia = $valor_dia;
        }

        public function setNombreApellido(string $nombre_apellido) :void {
            $this->nombre_apellido = $nombre_apellido;
        }

        public function setDNI(string $dni) :void {
            $this-> dni = $dni;
        }

        public function setFechaInicio(string $fecha_inicio) :void {
            $this-> fecha_inicio = $fecha_inicio;
        }

        public function setValorDia(float $valor_dia) :void {
            $this-> valor_dia = $valor_dia;
        }

        public function getNombreApellido() :string {
            return $this-> nombre_apellido;
        }

        protected function getDNI() :string {
            return $this-> dni;
        }

        public function getFechaInicio() :string {
            return $this-> fecha_inicio;
        }

        public function getNroEmpleado() {
            return $this-> nro_empleado;
        }

        protected function getValorDia() {
            return $this-> valor_dia;
        }

        public function calcularAntiguedad() :int {
            $fecha_ingreso=$this->getFechaInicio();
            $anio_actual = intval(date('Y'));
            $mes_actual = intval(date('m'));
            $dia_actual = intval(date('d'));
            $anio_inicio= intval(substr($fecha_ingreso, 6, 4));
            $anio_antiguedad=$anio_actual-$anio_inicio;
            $mes_inicio= intval(substr($fecha_ingreso, 3, 2));
            $dia_inicio= intval(substr($fecha_ingreso, 0, 2));
            if ($mes_inicio<$mes_actual) {
                $anio_antiguedad +=1;
            }
            elseif ($mes_inicio==$mes_actual and $dia_inicio <= $dia_actual) {
                $anio_antiguedad +=1;
            }
            return $anio_antiguedad;
        }

        protected function calcularSueldo (int $cantDias) :float {
            if ($cantDias<0 or $cantDias>30) {
                return false;
            }
            $antiguedad=$this->calcularAntiguedad();
            $sueldo=0.01;
            $sueldo_diario = $this->getValorDia();
            $sueldo=$cantDias*$sueldo_diario*(1+($antiguedad/100));
            return $sueldo;
        }
    }
?>