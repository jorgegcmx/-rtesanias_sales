<?php

$id = $_GET['id'];

include_once 'Classpedidos.php';
$usu1 = new Classpedidos();

$usu1->del_pedidos($id);
header("Location:../views_clientes/vw_pedidos.php");
