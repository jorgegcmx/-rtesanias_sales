<?php
$id = $_GET['id'];
include_once 'Classpedidos.php';
$usu1 = new Classpedidos();
$usu1->del_pedidos($id);
header("Location:../view_clientes/vw_ventas.php");
