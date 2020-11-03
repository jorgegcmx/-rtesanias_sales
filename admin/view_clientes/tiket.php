<?php
$idclientes = $_GET['idclientes'];
$idpedido = $_GET['idpedido'];
$subT = 0;
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/tiket.css">   
</head>
<body>
<?php 
include_once '../pedidos/Classpedidos.php';
$pedidos = new Classpedidos();
$pedido = $pedidos->get_listapedidos_print($idclientes, $idpedido);
while ($fil = $pedido->fetchObject()) {
    $subT = ($fil->total) - ($fil->iva);
?>
    <div class="ticket centrado" align="center">
        <h4>@rtesanias</h4>
        <h5>Ticket de venta:# <?php echo $fil->counter;?></h5>
        <h5>Fecha<?php echo date("d-m-Y", strtotime($fil->fecha)); ?></h5>      
        <table>
            <thead>
                <tr class="centrado">
                  <th class="producto">Articulo</th>
                  <th class="cantidad">Cantidad</th>
                  <th class="precio">CostUni</th>
                  <th class="precio">SubTotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $detalle = new Classpedidos();
                $deta = $detalle->get_detalle_pedido($fil->idpedidos);
                while ($det = $deta->fetchObject()) {
                ?>
                    <tr>
                    <td class="producto"><?php echo  $det->nombre ?></td>
                    <td class="cantidad"><?php echo $det->cantidad ?></td>
                    <td class="precio">$<?php echo $det->costouni ?></td>
                    <td class="precio">$<?php echo $det->subtotal ?></td>
                    </tr>
                <?php } ?>
           
            <tr>
                <td></td>
                <td class="cantidad"></td>
                <td class="producto">
                    <strong>Iva</strong>
                </td>
                <td class="precio">
                    $<?php echo $fil->iva ; ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="cantidad"></td>
                <td class="producto">
                    <strong>Subtotal</strong>
                </td>
                <td class="precio">
                    $<?php echo $subT; ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="cantidad"></td>
                <td class="producto">
                    <strong>TOTAL</strong>
                </td>
                <td class="precio">
                    $<?php echo $fil->total; ?>
                </td>
            </tr>
            </tbody>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
            <br>@rtesanias</p>
    </div>
    <?php
    }
    ?>
</body>
</html>