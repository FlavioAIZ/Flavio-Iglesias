<?php

declare(strict_types=1);
require_once __DIR__ . "/TestAdministrativo.php";
require_once __DIR__ . "/TestGerente.php";
class Main
{
    private TestAdministrativo $testAdm;
    private TestGerente $testGte;


    public function run()
    {
        $this->testearClases();
        $this->imprimirTest($this->testAdm, 'Administrativo');
        $this->imprimirTest($this->testGte, "Gerente");
    }
    public function testearClases(): void
    {
        $this->testGte = new TestGerente();
        $this->testGte->testCreateGerente();
        $this->testGte->testGetAttributesTypes();
        $this->testGte->testSetAttributes();
        $this->testGte->testCalcularAntiguedad();
        $this->testGte->testCalcularSueldo();

        $this->testAdm = new TestAdministrativo();
        $this->testAdm->testCreateAdministrativo();
        $this->testAdm->testGetAttributesTypes();
        $this->testAdm->testSetAttributes();
        $this->testAdm->testCalcularAntiguedad();
        $this->testAdm->testCalcularSueldo();
    }

    public function imprimirTest(Object $resultados, string $class): void
    {
        echo "\nREVISANDO LAS CLASES\n-------------------------\nCLASE \e[1;37;46m " . strtoupper($class) . " \e[0m\n\n";

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
