<?php

declare(strict_types=1);

abstract class Vehiculo
{
    private string $modelo;
    private string $tipo;

    public function __construct(string $modelo, string $tipo)
    {
        $this->modelo=$modelo;
        $this->tipo=$tipo;
    }

    public function getModelo() :string
    {
        return $this->modelo;
    }

    public function getTipo() :string
    {
        return $this->tipo;
    }

    public function setModelo(string $modelo) :void
    {
        $this->modelo=$modelo;
    }

    public function setTipo(string $tipo) :void
    {
        $this->tipo=$tipo;
    }

    abstract protected function mostrardetalle() :string;

    abstract public function encenderVehiculo() :bool;

    abstract public function detenerVehiculo() :bool;
}