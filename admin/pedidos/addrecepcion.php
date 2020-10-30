<?php
include_once 'Classpedidos.php';
$usu1 = new Classpedidos();
include_once '../articulos/Product.php';
$p = new Product();

session_start();

$id = null;
$fecha = date('Y-m-d');
$total = 0;
$idcliente = $_POST["idcliente"];
$iva = 0;
$modulo = $_POST["modulo"];
$status = 'R';
$total = $_POST["subtotal"];
$almacen = $_POST["almacen"];
$sucursal = "0"; //para venta no aplica

$rfc = '0000000000';
$nombrecliente = '0000000000';
$email_cliente = '0000000000';

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

$carrito = $_SESSION["carrito_recepcion"];
$lista = $carrito;
$save = new Classpedidos();
$save2 = new Classpedidos();
$save3 = new Classpedidos();

foreach ($carrito as $p) {
    $idinventario = null;
    $usu2 = new Classpedidos();
    $existe = $usu2->valida_existencia($p->idproductos, $almacen);
    while ($exis = $existe->fetchObject()) {
        $idinventario = $exis->idinventario;
    }

    $save3->set_recepcion($idinventario, $p->idproductos, $almacen, $p->cantidad, $idcliente);
    $sql3 = $save3->insert_recepcion();

    $save->set_detalle_pedidos(null, $p->idproductos, $p->cantidad, $p->subtotal, $p->precio, $ultimo, $p->comentario);
    $sql = $save->add_detalle_pedidos();
}

unset($_SESSION['carrito_recepcion']);
unset($_SESSION['idpedido']);
unset($_SESSION['importe']);
unset($_SESSION['tipo']);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type='text/javascript'>                
  Swal.fire({
      title: 'Se guardo la recepción',
      text: 'Continuar',
      icon: 'success',
      confirmButtonText: 'ok'    
     }).then(resultado => {
        if (resultado.value) {
           window.location.href='../view_clientes/vw_entradas.php';
        }
    });
</script>
</body>
</html>