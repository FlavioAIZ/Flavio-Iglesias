<?php

class Jugador {
	public $nombre;
	public $altura;
}

function cargarJugadores() : array {

	$ruta = "data.csv";
	$recurso = fopen( $ruta, "r" );

	$resultado = [];

	while( !feof( $recurso ) ) {

		$datosDelJugador = fgetcsv( $recurso );

		$instancia = new Jugador();

		$instancia->nombre = $datosDelJugador[ 0 ];
		$instancia->altura = floatval( $datosDelJugador[ 1 ] );

		$resultado[] = $instancia;
	};

	fclose( $recurso );

	return $resultado;
}

function jugadorMasBajo() {

	# se refiere a la altura mas chica encontrada hasta el momento
	$alturaPatron = -1;

	foreach( cargarJugadores() as $jugador ) {
		print_r( $jugador );
		if( $alturaPatron < 0 ) {
			echo "recien ahora tomo una altura patron : " . $jugador->altura . "\n";
			$alturaPatron = $jugador->altura;
		} else {
			echo "hago el analisis : " . $jugador->altura . " < " . $alturaPatron . "\n";
			if( $jugador->altura < $alturaPatron ) {
				echo "ENCONTRE UN NUEVO JUGADOR MAS BAJO \n";
				$alturaPatron = $jugador->altura;
			};
		};
	};

	echo "LA ALTURA PATRON ES : " . $alturaPatron . "\n";

	$resultado = [];

	foreach( cargarJugadores() as $jugador ) {
		if( $jugador->altura == $alturaPatron ) {
			$resultado[] = $jugador;
		};
	};

	return $resultado;
}


print_r( jugadorMasBajo() );
