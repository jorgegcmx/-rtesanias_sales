<?php
$index = $_GET['idcar'];
session_start();

if (isset($_SESSION["carrito_pedidos"])) {
    $carrito = $_SESSION["carrito_pedidos"];
    unset($carrito[$index]);
    $carrito = array_values($carrito);
    $_SESSION["carrito_pedidos"] = $carrito;

    if (count($carrito) == 0) {
        unset($_SESSION["carrito_pedidos"]);
    }
}
header("location:../view_clientes/vw_addpedidos.php");