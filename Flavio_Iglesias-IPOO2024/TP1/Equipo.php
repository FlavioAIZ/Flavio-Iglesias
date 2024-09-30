<?php

class Equipo {
    private $nombreEq;
    private $ciudadEq;
    private $partidosJugEq;
    private $partidosGanEq;
    
	public function __construct($nombreEq,$ciudadEq,$partidosJugEq,$partidosGanEq) {
		$this-> nombreEq = $nombreEq;
		$this-> ciudadEq = $ciudadEq;
		$this-> partidosJugEq = $partidosJugEq;
		$this-> partidosGanEq = $partidosGanEq;
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