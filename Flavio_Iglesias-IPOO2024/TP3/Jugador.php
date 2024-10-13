<?php

declare(strict_types=1);
require_once __DIR__ . "./Persona.php";

class Jugador extends Persona {
    protected int $cant_puntos;
    protected Equipo $equipo;

    public function __construct(string $nombre_completo,string $fecha_nacimiento, $dni, int $cant_puntos,Equipo $equipo) {
            parent::__construct($nombre_completo, $fecha_nacimiento, $dni);
            $this -> cant_puntos = $cant_puntos;
            $this -> equipo = $equipo;
    }

    public function getCantidadPuntos () :int {
        return $this->cant_puntos;
    }

    public function getEquipo() :Equipo {
        return $this->equipo;
    }

    protected function setCantidadPuntos (int $cant_puntos) :void {
        $this->cant_puntos=$cant_puntos;
    }

    protected function setEquipo (Equipo $equipo) :void {
        $this->equipo=$equipo;
    }
}