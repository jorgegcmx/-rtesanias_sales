<?php
include_once 'Classpedidos.php';
$usu1 = new Classpedidos();

$idpedidos = $_GET["idpedidos"];
$status = $_GET["status"];
$usu1->set_pedidos_update_status($idpedidos, $status);
$sql = $usu1->add_pedidos_update_status();

echo"
<script>
window.history.go(-1);
</script>
";
//header("Location:../views/view_pedidos.php");