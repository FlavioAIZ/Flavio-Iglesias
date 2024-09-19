<?php

    require("./Jugador.php");
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
    $masalto=[];
    $masAlto=JugadorMasAlto($jugadores);
    echo "El jugador mas alto es: ".$masAlto[0],""
?>