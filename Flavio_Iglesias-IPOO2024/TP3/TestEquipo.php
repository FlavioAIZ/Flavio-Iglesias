<?php

declare(strict_types=1);
require_once __DIR__ . "/Equipo.php";
require_once __DIR__ . "/Jugador.php";
class TestEquipo
{
    private Equipo $equipo;
    public array $errors_log = [];


    public function testCrearEquipo(): void
    {
        $this->equipo = new Equipo(
            ciudad: "Viedma",
            nombre: "Deportivo Viedma",
            partidos_jugados: 10,
            partidos_ganados: 8
        );

        $this->errors_log["ERROR_CREAR_EQUIPO"] = $this->equipo instanceof Equipo ? 1 : 0;
    }
    public function testAddJugador(): void
    {
        $jugador1 = new Jugador(
            nombre_completo: "Armando Redes",
            fecha_nacimiento: "10-01-1981",
            dni: 297415444,
            cant_puntos: 50,
            equipo: $this->equipo
        );
        $this->equipo->addJugador($jugador1);
        $this->errors_log["ERROR_AGREGAR_JUGADOR"] = $this->buscarJugador($jugador1->getDNI()) ? 1 : 0;
        $this->equipo->addJugador($jugador1);
        $this->errors_log["ERROR_AGREGAR_JUGADOR_QUE_YA_EXISTE"] = $this->buscarJugador($jugador1->getDNI()) ? 1 : 0;
    }
    public function testDelJugador(): void
    {
        $jugador1 = new Jugador(
            nombre_completo: "Armando Redes",
            fecha_nacimiento: "10-01-1981",
            dni: 297415444,
            cant_puntos: 50,
            equipo: $this->equipo
        );
        $this->equipo->delJugador($jugador1->getDNI());
        $this->errors_log["ERROR_ELIMINAR_JUGADOR"] = !$this->buscarJugador($jugador1->getDNI()) ? 1 : 0;
        $this->equipo->delJugador($jugador1->getDNI());
        $this->errors_log["ERROR_ELIMINAR_JUGADOR_QUE_NO_EXISTE"] = !$this->buscarJugador($jugador1->getDNI()) ? 1 : 0;
    }

    public function testModificarJugador(): void
    {
        $jugador1 = new Jugador(
            nombre_completo: "Armando Redes",
            fecha_nacimiento: "10-01-1981",
            dni: 297415444,
            cant_puntos: 50,
            equipo: $this->equipo
        );
        $jugador2 = new Jugador(
            nombre_completo: "Esteban Estirado",
            fecha_nacimiento: "11-09-1990",
            dni: 38141211,
            cant_puntos: 43,
            equipo: $this->equipo
        );
        $this->equipo->addJugador($jugador1);

        $this->equipo->reemplazarJugador(dni: $jugador1->getDNI(), new_jugador: $jugador2);
        $this->errors_log["ERROR_REEMPLAZAR_JUGADOR"] = $this->buscarJugador($jugador2->getDNI()) ? 1 : 0;
        $this->equipo->reemplazarJugador(dni: $jugador1->getDNI(), new_jugador: $jugador2);
        $this->errors_log["ERROR_REEMPLAZAR_JUGADOR_QUE_NO_EXISTE"] = !$this->buscarJugador($jugador1->getDNI()) ? 1 : 0;
    }
    public function testTiposMetodos(): void
    {

        $this->errors_log["ERROR_GET_TYPE_GET_CIUDAD"] = is_string($this->equipo->getCiudad()) ? 1 : 0;
        $this->errors_log["ERROR_GET_TYPE_GET_NOMBRE"] = is_string($this->equipo->getNombre()) ? 1 : 0;
        $this->errors_log["ERROR_GET_TYPE_GET_PARTIDOS_GANADOS"] = is_numeric($this->equipo->getPartidosGanados()) ? 1 : 0;
        $this->errors_log["ERROR_GET_TYPE_GET_PARTIDOS_JUGADORS"] = is_numeric($this->equipo->getPartidosJugados()) ? 1 : 0;
    }

    public function testGuardarErrores(): void
    {
        $this->errors_log["ERROR_GUARDAR_ERRORES"] = count($this->equipo->Errores) >= 3 ? 1 : 0;
    }

    public function testMetodosEquipo(): void
    {
        $metodos = get_class_methods($this->equipo);
        $this->errors_log["ERROR_METODOS_CREADOS"] = count($metodos) >= 14 ? 1 : 0;
    }
    public function buscarJugador(int $dni): bool
    {
        foreach ($this->equipo->getJugadores() as $jugador) {
            if ($jugador->getDNI() === $dni) {
                return true;
            }
        }
        return false;
    }

    public function testSetMetodos()
    {
        $old_nombre = $this->equipo->getNombre();
        $this->equipo->setNombre("Otro Nombre");
        $old_cuidad = $this->equipo->getCiudad();
        $this->equipo->setCiudad("Otra Ciudad");
        $old_part_ganados = $this->equipo->getPartidosGanados();
        $this->equipo->setPartidosGanados(60);
        $old_part_jugados = $this->equipo->getPartidosJugados();
        $this->equipo->setPartidosJugados(70);
        $this->errors_log["ERROR_SET_CIUDAD"] = $this->equipo->getCiudad() !== $old_cuidad ? 1 : 0;
        $this->errors_log["ERROR_SET_NOMBRE"] = $this->equipo->getNombre() !== $old_nombre ? 1 : 0;
        $this->errors_log["ERROR_SET_PARTIDOS_GANADOS"] = $this->equipo->getPartidosGanados() !== $old_part_ganados ? 1 : 0;
        $this->errors_log["ERROR_SET_PARTIDOS_JUGADORS"] = $this->equipo->getPartidosJugados() !== $old_part_jugados ? 1 : 0;
    }
}
