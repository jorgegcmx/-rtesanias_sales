<?php
include_once 'Product.php';
$p = new Product();

$p->idproductos = $_POST['txtidproductos'];

$p->categoria = $_POST['txtcategoria'];

$p->img = $_POST['txtimg'];

$p->nombre = $_POST['txtnombre'];

$p->precio = $_POST['txtprecio'];

$p->cantidad = $_POST['txtcantidad'];

$p->comentario = $p->categoria . " (" . $_POST['txtcomentario'] . ")";

$p->subtotal = $p->precio * $p->cantidad;

session_start();

if (isset($_SESSION["carrito_pedidos"])) {
    $carrito = $_SESSION["carrito_pedidos"];
} else {
    $carrito = array();
}
array_push($carrito, $p);
$_SESSION["carrito_pedidos"] = $carrito;

echo json_encode($_SESSION["carrito_pedidos"]);
/*
echo '<script type="text/javascript">
           window.location.href="../view_clientes/vw_addpedidos.php";
     </script>';*/
