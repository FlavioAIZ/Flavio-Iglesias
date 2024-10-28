<?php

declare (strict_types=1);
require_once __DIR__ ."/Carrito.php";

$carrito=new Carrito();
$carrito->agregarProductos(new Ropa(1, "Camisa", 10000, "XL"));
$carrito->agregarProductos(new Ropa(2,"Jean",12000,"46"));
$carrito->agregarProductos(new Mueble(3,"mesa",250000,"pino"));
$carrito->agregarProductos(new Tecnologia(4, "auriculares",45000,"6 meses"));
$carrito->mostrarProductos()

?>