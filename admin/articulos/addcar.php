<?php
include_once 'Product.php';
$p = new Product();

$stock = $_POST['txtstock'];
$cant = $_POST['txtcantidad'];

if ($stock < $cant) {
    echo '<script type="text/javascript">
    alert("Error! la cantidad a venta supera la existencia!");
    setTimeout( window.location.href="../view_clientes/",100);
    </script>';
} else {

    $p->idproductos = $_POST['txtidproductos'];

    $p->categoria = $_POST['txtcategoria'];

    $p->img = $_POST['txtimg'];

    $p->nombre = $_POST['txtnombre'];

    $p->precio = $_POST['txtprecio'];

    $p->cantidad = $_POST['txtcantidad'];

    $p->comentario = $p->categoria . " (" . $_POST['txtcomentario'] . ")";

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

}
