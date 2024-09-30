<?php

declare(strict_types=1);
require_once __DIR__ . "/Administrativo.php";


class TestAdministrativo
{
    public array $errors_log = [];
    public function testCreateAdministrativo(): void
    {

        $administrativo = new Administrativo(nombre_apellido: 'Alfonso Martinez', dni: 301112451, fecha_inicio: '10/11/2012', nro_empleado: 1, area: "Tesoreria");
        $this->errors_log["ERROR_CREATE_ADMINISTRATIVO"] = $administrativo instanceof Administrativo ? 1 : 0;
    }
    public function testGetAttributesTypes(): void
    {

        $administrativo = new Administrativo(nombre_apellido: 'Alfonso Martinez', dni: 301112451, fecha_inicio: '10/11/2012', nro_empleado: 1, area: "Tesoreria");
        $this->errors_log["ERROR_GET_TYPE_NRO_EMPLEADO"] = is_numeric($administrativo->getNroEmpleado()) ? 1 : 0;
        $this->errors_log["ERROR_GET_TYPE_NOMBRE_APELLIDO"] = is_string($administrativo->getNombreApellido()) ? 1 : 0;
        $this->errors_log["ERROR_GET_TYPE_FECHA_INICIO"] = is_string($administrativo->getFechaInicio()) ? 1 : 0;
        $this->errors_log["ERROR_GET_TYPE_VALOR_DIA"] = is_numeric($administrativo->getValorDia()) ? 1 : 0;
        $this->errors_log["ERROR_GET_TYPE_AREA"] = is_string($administrativo->getArea()) ? 1 : 0;
    }
    public function testSetAttributes(): void
    {

        $administrativo = new Administrativo(nombre_apellido: 'Alfonso Martinez', dni: 301112451, fecha_inicio: '10/11/2012', nro_empleado: 1, area: "Tesoreria");
        $oldDNI = $administrativo->getDni();
        $administrativo->setDNI(311112451);
        $this->errors_log["ERROR_SET_DNI"] = $oldDNI != $administrativo->getDNI() ? 1 : 0;

        $oldName = $administrativo->getNombreApellido();
        $administrativo->setNombreApellido('Alfonso Rodriguez');
        $this->errors_log["ERROR_SET_EMPLEADO_NOMBRE_APELLIDO"] = $oldName != $administrativo->getNombreApellido() ? 1 : 0;

        $old_inicio = $administrativo->getFechaInicio();
        $administrativo->setFechaInicio('10/02/1980');
        $this->errors_log["ERROR_SET_FECHA_INICIO"] = $old_inicio != $administrativo->getFechaInicio() ? 1 : 0;

        $old_area = $administrativo->getArea();
        $administrativo->setArea('Ventas');
        $this->errors_log["ERROR_SET_FECHA_INICIO"] = $old_area != $administrativo->getArea() ? 1 : 0;
    }

    public function testCalcularAntiguedad(): void
    {
        $administrativo = new Administrativo(nombre_apellido: 'Alfonso Martinez', dni: 301112451, fecha_inicio: '10/11/2012', nro_empleado: 1, area: "Tesoreria");
        $antiguedad = $administrativo->calcularAntiguedad();
        $this->errors_log["ERROR_Antiguedad"] = $antiguedad === 11 ? 1 : 0;
    }

    public function testCalcularSueldo(): void
    {
        $administrativo = new Administrativo(nombre_apellido: 'Alfonso Martinez', dni: 301112451, fecha_inicio: '10/11/2012', nro_empleado: 1, area: "Tesoreria");
        $sueldo = $administrativo->calcularSueldo(30);
        $this->errors_log["ERROR_CALCULAR_SUELDO_TESORERIA"] = $sueldo === 1198800.00 ? 1 : 0;

        $sueldo = $administrativo->calcularSueldo(-1);
        $this->errors_log["ERROR_CALCULAR_SUELDO_DIAS_FUERA_DEL_RANGO"] = $sueldo === 0.0 ? 1 : 0;

        $administrativo->setArea('Ventas');
        $sueldo = $administrativo->calcularSueldo(30);
        $this->errors_log["ERROR_CALCULAR_SUELDO_VENTAS"] = $sueldo === 1148850.00 ? 1 : 0;

        $administrativo->setArea('Recursos Humanos');
        $sueldo = $administrativo->calcularSueldo(30);
        $this->errors_log["ERROR_CALCULAR_SUELDO_RECURSOS_HUMANOS"] = $sueldo === 1098900.00 ? 1 : 0;

        // area por defecto
        $administrativo->setArea('Legales');
        $sueldo = $administrativo->calcularSueldo(30);

        $this->errors_log["ERROR_CALCULAR_SUELDO_DEFAULT"] = $sueldo === 999000.00 ? 1 : 0;
    }
}
