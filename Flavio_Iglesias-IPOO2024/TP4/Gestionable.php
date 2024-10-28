<?php

declare(strict_types=1);

interface Gestionable
{
    public function guardar();

    public function modificar();

    public function eliminar();
}

?>