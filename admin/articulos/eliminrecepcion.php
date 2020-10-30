<?php
$index = $_GET['idcar'];
session_start();

if (isset($_SESSION["carrito_recepcion"])) {
    $carrito = $_SESSION["carrito_recepcion"];
    unset($carrito[$index]);
    $carrito = array_values($carrito);
    $_SESSION["carrito_recepcion"] = $carrito;

    if (count($carrito) == 0) {
        unset($_SESSION["carrito_recepcion"]);
    }
}
header("location:../view_clientes/vw_inventario.php");