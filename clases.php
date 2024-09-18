><?php 
class jugador {
    private $dni;
    private $nombre;
    private $altura;
    private $fechaNac;
    private $puntosTotales;
	private $equipo;

	public function __construct($nombre,$fechaNac,$equipo,$altura,$dni,$puntosTotales) {
		$this-> dni = new $dni;
		$this-> nombre = new $nombre;
		$this-> altura = new $altura;
		$this-> fechaNac = new $fechaNac;
		$this-> equipo = new $equipo;
		$this-> puntosTotales = new $puntosTotales;
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

class equipo {
    private $nombreEq;
    private $ciudadEq;
    private $partidosJugEq;
    private $partidosGanEq;
    
	public function __construct($nombreEq,$ciudadEq,$partidosJugEq,$partidosGanEq) {
		$this-> nombreEq = new $nombreEq;
		$this-> ciudadEq = new $ciudadEq;
		$this-> partidosJugEq = new $partidosJugEq;
		$this-> partidosGanEq = new $partidosGanEq;
	}

	public function nombreEquipo() {
		return $this->nombreEq;
	}

	public function ciudadEquipo() {
		return $this->ciudadEq;
	}

	public function partidosJugadosEquipo() {
		return $this->partidosJugEq;
	}

	public function partidosGanadosEquipo() {
		return $this->partidosGanEq;
	}
}

?>