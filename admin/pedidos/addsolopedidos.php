<?php
include_once 'Classpedidos.php';
$usu1 = new Classpedidos();
include_once '../articulos/Product.php';
$p = new Product();

session_start();

$id = null;
$iva = 0;
$total = 0;
$fecha = date('Y-m-d');
$idcliente = $_POST["idcliente"];
$modulo = "PD";
$total = $_POST["total"];
$sucursal = $_POST["sucursal"];
$status = 'P';

$rfc = '0000000000';
$nombrecliente = $_POST["nombrecliente"];
$email_cliente = $_POST["email_cliente"];

$contador = new Classpedidos();
$conta = $contador->get_pedido_cunter($idcliente, $modulo);
while ($cont = $conta->fetchObject()) {
    $counter = $cont->num;
}

$usu1->set_pedidos($id, $fecha, $total, $idcliente, $status, $iva, $modulo, $counter, $sucursal, $rfc, $nombrecliente, $email_cliente);
$sql = $usu1->add_pedidos();

$id = new Classpedidos();
$dato = $id->get_pedido($idcliente);
while ($data = $dato->fetchObject()) {
    $ultimo = $data->id;
}

$carrito = $_SESSION["carrito_pedidos"];
$lista = $carrito;
$save = new Classpedidos();

foreach ($carrito as $p) {
    $save->set_detalle_pedidos(null, $p->idproductos, $p->cantidad, $p->subtotal, $p->precio, $ultimo, $p->comentario);
    $sql = $save->add_detalle_pedidos();
}

unset($_SESSION['carrito_pedidos']);
unset($_SESSION['idpedido']);
unset($_SESSION['importe']);
unset($_SESSION['tipo']);

echo '<script type="text/javascript">
			     alert("Guardado Correctamente");
				 window.location.href="../view_clientes/vw_addpedidos.php";
	 </script>';
