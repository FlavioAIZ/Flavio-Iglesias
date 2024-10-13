<?php

declare(strict_types=1);
require_once __DIR__ . "/Jugador.php";

class Equipo {
    protected array $plantel_jugadores=[];
    public array $Errores=[];
    private string $nombre;
    private string $ciudad;
    private int $partidos_jugados;
    private int $partidos_ganados;
    const maximoNumeroJugadores=10;
    
	public function __construct($nombre,$ciudad,$partidos_jugados,$partidos_ganados)
    {
		$this-> nombre = $nombre;
		$this-> ciudad = $ciudad;
		$this-> partidos_jugados = $partidos_jugados;
		$this-> partidos_ganados = $partidos_ganados;

        $this-> plantel_jugadores = [];       
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
        if (count($equipo->plantel_jugadores)<self::maximoNumeroJugadores)
        {
            return true;
        } 
        self::marcarError('No hay diponibilidad para agregar un nuevo jugador en el equipo '.$equipo.'.'); 
        return false;        
    }

    public function perteneceAlEquipo(Jugador $jugador,Equipo $equipo) :bool
    {
        $jug=$jugador->getNombreCompleto();
        $equi=$equipo->getNombre();
        if ($jugador->getEquipo()==$equipo)
        {
            return true;
        }
        self::marcarError('El jugador '.$jug.' no pertence al equipo '.$equi.'.'); 
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
        $nombreJugador=$jugador->getNombreCompleto();
        $nombreEquipo=$this->nombre;
        self::marcarError('El jugador '.$nombreJugador.' no es parte del plantel del equipo '.$nombreEquipo.'.'); 
        return false;
    }

    public function getJugadores()
    {
        return $this->plantel_jugadores;
    }

    public function addJugador(Jugador $jugador) :void
    {
        $equipoActual=$jugador->getEquipo();
        if (self::hayLugar($equipoActual) and $equipoActual->perteneceAlEquipo($jugador,$equipoActual) and !$equipoActual->estaEnPlantel($jugador, $equipoActual))
        {
            $this->plantel_jugadores[]=$jugador;
        }
    }
    
    public function delJugador(int $DNI) :void
    {
        $posicion=0;
        foreach ($this->plantel_jugadores as $jugador)
        {
            if ($jugador->getDNI()==$DNI)
            {
                unset($this->plantel_jugadores[$posicion]);
                return;
            } 
        }
        self::marcarError('El jugador con DNI:'.$DNI.' no es parte del plantel del equipo.'); 
    }

    public function posicionPlantel (int $DNI) :int
    {
        $posicion=0;
        foreach ($this->plantel_jugadores as $jugador)
        {
            if (isset($this->plantel_jugadores[$posicion]))
            {
                $jugadorActual=self::getPlantelJugadores()[$posicion];
                if ($jugadorActual->getDNI()==$jugador->dni)
                {
                    return $posicion;
                } 
            }
        }
        return $posicion+1;
    }
    
    public function reemplazarJugador(int $dni, Jugador $new_jugador) :void
    {
        $posicionPlantel=self::posicionPlantel($dni);
        $jugadorSale=self::getPlantelJugadores()[$posicionPlantel];
        $jugadorEntra=$new_jugador->getNombreCompleto();
        $equipo=$jugadorSale->getEquipo();
        if ($posicionPlantel==self::maximoNumeroJugadores+1) 
        {
            self::marcarError('El jugador '.$jugadorEntra.' no es parte del plantel del equipo '.$this->nombre.'.');            
        } elseif (self::perteneceAlEquipo($new_jugador,$equipo))
        {
            $this->plantel_jugadores[$posicionPlantel]=$new_jugador;
        } else
        {
            self::marcarError('El jugador '.$jugadorEntra.' no pertenece al equipo '.$this->nombre.'.');            
        }
    }

    public function marcarError(string $mensaje) :void
    {
        $this->Errores[]=$mensaje;
    }

    public function mostrarErrores() :void
    {
        for ($N=0;$N<count(self::$Errores);$N++)
        {
            echo self::$Errores[$N].PHP_EOL;
        }
    }

    public function getEquipoxDNI(int $dni) :Equipo
    {
        foreach ($this->getPlantelJugadores() as $jugador)
        {
            if ($jugador->getDNI()==$dni)
            {
                $equi=($jugador->getEquipo());                
            }
        }
    return $equi;
    }
}
?>