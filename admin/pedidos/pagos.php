<?php
include_once 'Classpedidos.php';
$usu1 = new Classpedidos();

$idpedidos = $_POST["idpedidos"];
$importe = $_POST["importe"];
$fecha = date('Y-m-d');
$usu1->set_pago(null,$fecha,$importe,$idpedidos);
$sql = $usu1->add_pago();
header("Location:../view_clientes/vw_pedidos.php");