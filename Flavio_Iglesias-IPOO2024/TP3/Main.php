<?php

declare(strict_types=1);
require_once __DIR__ . "/TestEquipo.php";

class Main
{
    private TestEquipo $testEquipo;



    public function run()
    {
        $this->testearClases();
        $this->imprimirTest($this->testEquipo, "Equipo");
    }
    public function testearClases(): void
    {
        $this->testEquipo = new TestEquipo();
        $this->testEquipo->testCrearEquipo();
        $this->testEquipo->testAddJugador();
        $this->testEquipo->testDelJugador();
        $this->testEquipo->testModificarJugador();
        $this->testEquipo->testGuardarErrores();
        $this->testEquipo->testMetodosEquipo();
        $this->testEquipo->testTiposMetodos();
        $this->testEquipo->testSetMetodos();
    }

    public function imprimirTest(Object $resultados, string $class): void
    {
        echo "\nREVISANDO LA/S CLASE/S\n-------------------------\nCLASE \e[1;37;46m " . strtoupper($class) . " \e[0m\n\n";

        $errores = $resultados->errors_log;

        $cont_assert = 0;
        foreach ($errores as $key => $value) {

            $cont_assert += $value;
            $mensaje = $value != 0 ? "\e[1;37;42m SIN ERRORES \e[0m  ✅" : "\e[1;37;41m REV. CODIGO \e[0m  😢";

            $test_name = str_replace("ERROR_", "", $key);
            $test_name = str_replace("_", " ", $test_name);

            echo "revisando " . str_pad($test_name, 40, " ") . " resultado \t: $mensaje \n";
        }
        echo "\nSobre " . count($errores) . " tests, tuviste $cont_assert aciertos ";
        echo count($errores) === $cont_assert ? " \nTest Pasados con exitos\n" : "\nAun faltan corregir logica sigue intentando\n";
    }
}

(new Main())->run();
