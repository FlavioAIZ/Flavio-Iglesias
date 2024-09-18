><?php 
class jugador {
    private $dni;
    private $nombre;
    private $altura;
    private $fechaNac;
    private $puntosTotales;
	private $equipo;

	public function __construct($nombre,$fechaNac,$equipo,$altura,$dni,$puntosTotales) {
		$this-> dni = $dni;
		$this-> nombre = $nombre;
		$this-> altura = $altura;
		$this-> fechaNac = $fechaNac;
		$this-> equipo = $equipo;
		$this-> puntosTotales = $puntosTotales;
	}

	public function dniJugador() {
		return $this->dni;
	}

	public function nombreJugador() {
		return $this->nombre;
	}

	public function alturaJugador() {
		return $this->altura;
	}

	public function fechaNacJugador() {
		return $this->fechaNac;
	}

	public function puntosTotalesJugador() {
		return $this->puntosTotales;
	}

	public function equipoJugador() {
		return $this->equipo;
	}
}
?>