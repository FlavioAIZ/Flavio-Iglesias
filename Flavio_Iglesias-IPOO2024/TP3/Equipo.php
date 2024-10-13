<?php

declare(strict_types=1);
require_once __DIR__ . "./Jugador.php";

class Equipo {
    private array $plantel_jugadores=[];
    private array $errores=[];
    private string $nombre;
    private string $ciudad;
    private int $partidos_jugados;
    private int $partidos_ganados;
    public int $maximoNumeroJugadores=10;
    
	public function __construct($nombre,$ciudad,$partidos_jugados,$partidos_ganados)
    {
		$this-> nombre = $nombre;
		$this-> ciudad = $ciudad;
		$this-> partidos_jugados = $partidos_jugados;
		$this-> partidos_ganados = $partidos_ganados;

        $this-> plantel_jugadores = [];
        $this-> errores=[];

        $this-> maximoNumeroJugadores=10;
	}

	public function getNombre() :string
    {
		return $this->nombre;
	}

	public function getCiudad() :string
    {
		return $this->ciudad;
	}

	public function getPartidosJugados() :int
    {
		return $this->partidos_jugados;
	}

	public function getPartidosGanados() :int
    {
		return $this->partidos_ganados;
	}

    public function getPlantelJugadores() :array
    {
        return $this->plantel_jugadores;
    }

    public function setNombre(string $nombre) :void
    {
        $this->nombre = $nombre;
    }

    public function setCiudad(string $ciudad) :void
    {
        $this->ciudad = $ciudad;
    }

    public function setPartidosJugados(int $partidos_jugados) :void
    {
        $this->partidos_jugados = $partidos_jugados;
    }

    public function setPartidosGanados(int $partidos_ganados) :void
    {
        $this->partidos_ganados = $partidos_ganados;
    }

    public function hayLugar(Equipo $equipo) :bool
    {
        if (count($equipo->getPlantelJugadores())<$equipo->maximoNumeroJugadores)
        {
            return true;
        } 
        return false;        
    }

    public function perteneceAlEquipo(Jugador $jugador,Equipo $equipo) :bool
    {
        if ($jugador->getEquipo()==$equipo)
        {
            return true;
        }
        return false;
    }

    public function estaEnPlantel (Jugador $jugador,Equipo $equipo) :bool
    {
        $jugadorBuscado=$jugador;
        foreach ($equipo->getPlantelJugadores() as $jugador)
        {
            if ($jugador->getEquipo()==$equipo)
            {
                return true;
            }
        }
        return false;
    }

    public function addJugador(Jugador $jugador,Equipo $equipo) :void
    {
        if ($equipo->hayLugar($equipo) and $equipo->perteneceAlEquipo($jugador,$equipo) and !$equipo->estaEnPlantel($jugador, $equipo))
        {
            $equipo->plantel_jugadores[]=$jugador;
        }
    }
    
    public function delJugador(int $DNI) :void
    {
        $posicion=0;
        foreach ($this->plantel_jugadores as $jugador)
        {
            $jugadorActual=$this->plantel_jugadores[$posicion];
            if ($jugadorActual->DNI==$DNI)
            {
                unset($plantel_jugadores[$posicion]);
            } else
            {
                $posicion+=1;
            }
        }
    }

    public function posicionPlantel (Jugador $jugador, Equipo $equipo)
    {

    }
    
    public function reemplazarJugador(Jugador $jugadorSale, Jugador $jugadorEntra, Equipo $equipo) :void
    {

    }


}