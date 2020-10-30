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
$sucursal = "0"; //para venta no aplica

if (isset($_POST["rfc"])) {
    $rfc = $_POST["rfc"];
    $nombrecliente = $_POST["nombrecliente"];
    $email_cliente = $_POST["email_cliente"];
} else {
    $rfc = null;

    if ($_POST["nombrecliente"] == "" & $_POST["email_cliente"] == "") {
        $nombrecliente = null;
        $email_cliente = null;
    } else {
        $nombrecliente = $_POST["nombrecliente"];
        $email_cliente = $_POST["email_cliente"];
    }

}

if (isset($_POST["tipo"]) == 0) {

    $total = $_POST["subtotal"];
    $status = 'NF';
} else {
    $total = $_POST["totalconiva"];
    $status = 'F';
    $iva = $_POST["iva"];
}



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

$carrito = $_SESSION["carrito"];
$lista = $carrito;
$save = new Classpedidos();
$save3 = new Classpedidos();

foreach ($carrito as $p) {
    $save->set_detalle_pedidos(null, $p->idproductos, $p->cantidad, $p->subtotal, $p->precio, $ultimo, $p->comentario);
    $sql = $save->add_detalle_pedidos();

    $save3->set_menos_venta($p->cantidad, $idcliente, $p->idproductos);
    $sql3 = $save3->insert_menos_venta();
}

unset($_SESSION['carrito']);
unset($_SESSION['idpedido']);
unset($_SESSION['importe']);
unset($_SESSION['tipo']);

$cambio=0;

$pagacon = $_POST["pagacon"];

if($pagacon != ''){
    $cambio=$pagacon-$total;
}
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
      title: 'Cambio: <?php echo$cambio; ?>',
      text: 'Continuar',
      icon: 'success',
      confirmButtonText: 'ok'
  })   
</script>
</body>
</html>