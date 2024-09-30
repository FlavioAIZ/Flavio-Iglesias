<?php

declare(strict_types=1);
require_once __DIR__ . "/Gerente.php";


class TestGerente
{
    public array $errors_log = [];
    public function testCreateGerente(): void
    {

        $Gerente = new Gerente(nombre_apellido: 'Alfonso Martinez', dni: 301112451, fecha_inicio: '10/11/2012', nro_empleado: 1, cant_empleados: 5);
        $this->errors_log["ERROR_CREATE_GERENTE"] = $Gerente instanceof Gerente ? 1 : 0;
    }
    public function testGetAttributesTypes(): void
    {

        $Gerente = new Gerente(nombre_apellido: 'Alfonso Martinez', dni: 301112451, fecha_inicio: '10/11/2012', nro_empleado: 1, cant_empleados: 5);
        $this->errors_log["ERROR_GET_TYPE_NRO_EMPLEADO"] = is_numeric($Gerente->getNroEmpleado()) ? 1 : 0;
        $this->errors_log["ERROR_GET_TYPE_NOMBRE_APELLIDO"] = is_string($Gerente->getNombreApellido()) ? 1 : 0;
        $this->errors_log["ERROR_GET_TYPE_FECHA_INICIO"] = is_string($Gerente->getFechaInicio()) ? 1 : 0;
        $this->errors_log["ERROR_GET_TYPE_VALOR_DIA"] = is_numeric($Gerente->getValorDia()) ? 1 : 0;
        $this->errors_log["ERROR_GET_TYPE_CANT_EMPLEADOS"] = is_numeric($Gerente->getCantEmpleados()) ? 1 : 0;
    }
    public function testSetAttributes(): void
    {

        $Gerente = new Gerente(nombre_apellido: 'Alfonso Martinez', dni: 301112451, fecha_inicio: '10/11/2012', nro_empleado: 1, cant_empleados: 5);
        $oldDNI = $Gerente->getDni();
        $Gerente->setDNI(25455141);
        $this->errors_log["ERROR_SET_DNI"] = $oldDNI != $Gerente->getDNI() ? 1 : 0;

        $oldName = $Gerente->getNombreApellido();
        $Gerente->setNombreApellido('Alfonso Rodriguez');
        $this->errors_log["ERROR_SET_EMPLEADO_NOMBRE_APELLIDO"] = $oldName != $Gerente->getNombreApellido() ? 1 : 0;

        $old_inicio = $Gerente->getFechaInicio();
        $Gerente->setFechaInicio('10/02/1980');
        $this->errors_log["ERROR_SET_FECHA_INICIO"] = $old_inicio != $Gerente->getFechaInicio() ? 1 : 0;

        $old_area = $Gerente->getCantEmpleados();
        $Gerente->setCantEmpleados(11);
        $this->errors_log["ERROR_SET_FECHA_INICIO"] = $old_area != $Gerente->getCantEmpleados() ? 1 : 0;
    }

    public function testCalcularAntiguedad(): void
    {
        $Gerente = new Gerente(nombre_apellido: 'Alfonso Martinez', dni: 301112451, fecha_inicio: '10/11/2012', nro_empleado: 1, cant_empleados: 5);
        $antiguedad = $Gerente->calcularAntiguedad();
        $this->errors_log["ERROR_Antiguedad"] = $antiguedad === 11 ? 1 : 0;
    }

    public function testCalcularSueldo(): void
    {
        $Gerente = new Gerente(nombre_apellido: 'Alfonso Martinez', dni: 301112451, fecha_inicio: '10/11/2012', nro_empleado: 1, cant_empleados: 5);

        $sueldo = $Gerente->calcularSueldo(30);
        $this->errors_log["ERROR_CALCULAR_SUELDO_EMPLEADOS_5_A_10"] = (int)$sueldo === 1593405 ? 1 : 0;

        $sueldo = $Gerente->calcularSueldo(-1);

        $this->errors_log["ERROR_CALCULAR_SUELDO_DIAS_FUERA_DEL_RANGO"] = $sueldo === 0.0 ? 1 : 0;

        $Gerente->setCantEmpleados(11);
        $sueldo = $Gerente->calcularSueldo(30);
        $this->errors_log["ERROR_CALCULAR_SUELDO_EMPLEADOS_11_A_20"] = $sueldo === 1694803.50 ? 1 : 0;

        $Gerente->setCantEmpleados(21);
        $sueldo = $Gerente->calcularSueldo(30);
        $this->errors_log["ERROR_CALCULAR_SUELDO_EMPLEADOS_+20"] = $sueldo === 1810687.50 ? 1 : 0;

        // area por defecto
        $Gerente->setCantEmpleados(4);
        $sueldo = $Gerente->calcularSueldo(30);
        $this->errors_log["ERROR_CALCULAR_SUELDO_EMPLEADOS_MENOS_DE_5"] = (int) $sueldo === 1448550 ? 1 : 0;
    }
}
