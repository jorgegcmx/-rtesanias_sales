<?php
include_once 'Product.php';
$p = new Product();

$p->idproductos = $_GET['txtidproductos'];

$p->categoria = "San Marcos 2020";

$p->img = $_GET['txtimg'];

$p->nombre = $_GET['txtnombre'];

$p->precio = $_GET['txtprecio'];

$p->cantidad = 1;

$p->comentario = "Feria 2020 ";

$p->subtotal = $p->precio * $p->cantidad;

session_start();

if (isset($_SESSION["carrito"])) {
    $carrito = $_SESSION["carrito"];
} else {
    $carrito = array();
}
array_push($carrito, $p);
$_SESSION["carrito"] = $carrito;
echo json_encode($_SESSION["carrito"]);
/*
echo '<script type="text/javascript">
window.location.href="../view_clientes/";
</script>';*/
