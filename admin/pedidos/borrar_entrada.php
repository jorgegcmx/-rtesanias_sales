<?php
echo $id = $_GET['id'];
include_once 'Classpedidos.php';
$usu1 = new Classpedidos();
$usu1->del_pedidos($id);

if(isset($_GET['entrada'])){
    header("Location:../view_clientes/vw_entradas.php");
}else{
    header("Location:../view_clientes/vw_salidas.php");
}
