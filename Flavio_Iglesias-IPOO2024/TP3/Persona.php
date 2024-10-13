><?php 

declare(strict_types=1);

class Persona {
    protected int $dni;
    protected string $nombre_completo;
    protected string $fecha_nacimiento;
   
	protected function __construct(string $nombre_completo,string $fecha_nacimiento,int $dni) {
		$this-> dni = $dni;
		$this-> nombre_completo = $nombre_completo;
		$this-> fecha_nacimiento = $fecha_nacimiento;		
	}

	public function getDNI() :int {
		return $this->dni;
	}

	public function getNombre() :string {
		return $this->nombre_completo;
	}

	public function getFechaNacimiento() :string {
		return $this->fecha_nacimiento;
	}

	public function setDNI (int $DNI) :void {
		$DNI = $this->dni;
	}

	public function setNombre (string $nombre_completo) :void {
		$nombre_completo = $this->nombre_completo;
	}

	public function setFechaNacimiento (string $fecha_nacimiento): void{
		$fecha_nNaciminiento = $this-> $fecha_nacimiento;
	}
}
?>