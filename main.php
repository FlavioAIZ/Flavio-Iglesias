<?php

    class players extends jugador
    {

        public $dniJugador;
        $nombreJugador;
        $alturaJugador;
        $fechaNacJugador;
        $puntosTotalesJugador;
        $equipoJugador;

    public function __construct($dniJugador,$nombreJugador, $alturaJugador, $fechaNacJugador, $puntosTotalesJugador, $equipoJugador)
    {
        parent::__construct($dniJugador, $nombreJugador, $alturaJugador, $fechaNacJugador, $puntosTotalesJugador);  
    }
}

    $ruta = "2024-TR-jugadores.CSV";
	$recurso = fopen( $ruta, "r" );
	$contador=0;
	
	while (!feof($recurso)) {
		$linea = fgets( $recurso );
		$jugadores[$contador]=explode(",",$linea);
		$contador++ ;		
	}
    fclose($recurso);

//   for ($cont=0;$cont<$contador;) {
//	    print_r (implode(",",$jugadores[$cont]));
//	    $cont++ ;
    }
    
    $ruta1 = "2024-TR-equipos.CSV";
	$recurso1 = fopen( $ruta1, "r" );
	$contador1=0;
	
	while (!feof($recurso1)) {
		$linea1 = fgets($recurso1);
        $equipos[$contador1]=explode(",",$linea1);
		$contador1++ ;		
	}

//	for ($cont1=0;$cont1<$contador1;) {
//		print_r (implode(",",$equipos[$cont1]));
//		$cont1++ ;
	}

// ->  ACLARACIONES IMPORTANTES <-
// ---------------------------------
// Para que no fallen las funciones ya que deben devolver un array retorne un array vacio,
// eso cuando creen la logica de la funcion reemplacenlo con los datos correctos.

// TIPS: las funciones y los metodos deben siempre realizar una sola accion,
// pensar como leer los csv, si en las funciones o crear una que se encargue de eso.
// cuando terminen analicen sus codigos, y vean si algo de lo que estan haciendo es repetitivo.


//Obtener un arreglo con el nombre del jugador o jugadores más altos (en caso de haber empate).
// -------------------------------------
function jugadoresMasAltos(): array
{
    $cont=0;
    while $cont<count($this->$jugadores))
    {
        $cont++ ;
        
    return [];
}
// Obtener un arreglo con el nombre del equipo o equipos con más partidos ganados.
function equiposMasGanadores(): array
{
    // aca va la logica de la funcion
    return [];
}
//: Obtener un arreglo con la lista con al menos 10 de los jugadores con más puntos.
function jugadoresConMasPuntos(): array
{
    // aca va la logica de la funcion
    return [];
}
// Obtener un arreglo con la altura promedio de jugadores por de cada equipo.
function alturaPromedio(): array
{
    // aca va la logica de la funcion
    return [];
}
// COMPLICADO: Obtener una lista del jugador o jugadores con más puntos en el o los equipos con más partidos perdidos.
function jugadoresMasPuntosPeorEquipo(): array
{
    // aca va la logica de la funcion
    return [];
}
