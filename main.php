<?php

    require("./Jugador.php") ;
    require("./Equipo.php");
    $ruta = "./2024-TR-jugadores.csv";
    $recurso = fopen( $ruta, "r" );
        $jugadores=[];

	    while (!feof($recurso))
        {
            $lista=fgetcsv($recurso,1000,",");
            $jugador= new jugador($lista[0],$lista[1],$lista[2],$lista[3],$lista[4],$lista[5]);
            $jugadores[]=$jugador;
        }
    fclose($recurso);

    $ruta = "./2024-TR-equipos.csv";
    $recurso = fopen( $ruta, "r" );
        $equipos=[];

        while (!feof($recurso))
        {
            $lista=fgetcsv($recurso,1000,",");
            $equipo= new equipo($lista[0],$lista[1],$lista[2],$lista[3]);
            $equipos[]=$equipo;
        }
    fclose($recurso);

    function jugadorMasAlto($jugadores) :array
    {
        $maxAltura = 0;
        $jugadoresMasAltos = [];
    
        foreach ($jugadores as $jugador)
        {
            if ($jugador->alturaJugador() > $maxAltura) 
            {
                $maxAltura = $jugador->alturaJugador();
                $jugadoresMasAltos = [$jugador->nombreJugador()];
            } 
            elseif ($jugador->alturaJugador() === $maxAltura)
            {
                $jugadoresMasAltos[] = $jugador->nombreJugador();
            }
        }
        return $jugadoresMasAltos;
    }

    function EquipoMasGanador($equipos) :array
    {
        $maxPartidosGanados = 0;
        $equiposMasGanadores = [];
    
        foreach ($equipos as $equipo)
        {
            if ($equipo->partidosGanadosEquipo() > $maxPartidosGanados) 
            {
                $maxPartidosGanados = $equipo->partidosGanadosEquipo();
                $equiposMasGanadores = [$equipo->nombreEquipo()];
            } 
            elseif ($equipo->partidosGanadosEquipo() === $maxPartidosGanados)
            {
                $equiposMasGanadores[] = $equipo->nombreEquipo();
            }
        }
        return $equiposMasGanadores;
    }

    function jugadoresMasPuntos($jugadores):array
    {
        usort($jugadores, function($a, $b) 
            {
                return $b->puntosTotalesJugador() <=> $a->puntosTotalesJugador();
            }
        );
        $jMP=[];
        $jMP=array_slice($jugadores,0,10);
        return $jMP;
    }
   









    $masalto=[];
    $masAlto=JugadorMasAlto($jugadores);
    $rep=count($masAlto);
    for ($i = 0; $i < $rep; $i++)
    {
        echo "\nEl jugador mas alto es: ".$masAlto[0],"\n\n";
    }
    
    $masGanador=[];
    $masGanador=EquipoMasGanador($equipos);
    $rep=count($masGanador);
    $cuenta=0;
    for ($i = 0; $i < $rep; $i++);
    {
        echo "El equipo mas ganador es: ".$masGanador[$cuenta]."\n\n";
        $cuenta++;
    }

    $masPuntos=[];
    $masPuntos=jugadoresMasPuntos($jugadores);
    $rep=count($masPuntos);
    $cuenta=0;
    while ($cuenta < $rep)
    {
        echo "Jugador: ".$masPuntos[$cuenta]->nombreJugador()."--> Puntaje Total: ".$masPuntos[$cuenta]->puntosTotalesJugador()."\n";
        $cuenta++;
    }
?>