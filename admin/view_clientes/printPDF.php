<?php
$idclientes=$_GET['idclientes']; 
$idpedido=$_GET['idpedido'];
?>
<html>

<head>
<meta charset="utf-8">
<title>SalesPoint</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--Icons-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom styles for this template -->
  <link href="../css/carousel.css" rel="stylesheet">    
<?php

if(isset($_GET['modulo'])){  
  if($_GET['modulo']=='in'){
  $venta="Recepción";
  $ruta="vw_entradas.php";
  }elseif($_GET['modulo']=='pe'){
  $venta="Pedido";
  $ruta="vw_pedidos.php";

  }
}else{
  $ruta="vw_ventas.php";
  $venta="Venta";
}
?>


</head>
<body >
<table class="table table-striped" >
                      <thead>
                        <tr>                         
                          <th><?php echo $venta; ?></th>
                          <th>Fecha</th>                          
                          <th></th>                                                                            
                        </tr>
                      </thead>
                      <tbody>                           
                        <?php 
                          include_once '../pedidos/Classpedidos.php';	
                          $pedidos = new Classpedidos();                                         
                          $pedido = $pedidos->get_listapedidos_print($idclientes,$idpedido);                             
                           while($fil = $pedido->fetchObject()){   
                        ?>
                        <tr>
                          <td>#<?php echo $fil->idpedidos; ?></td>
                          <td><?php echo $fil->fecha; ?></td>
                         </tr>
                         <tr>
                          <td colspan="3">                  
                          <table class="table">
                          <thead>
                          <b>
                          <tr>
                          <th></th>
                          <th>Piezas</th>
                          <th>Cantidad</th>
                          <th>UniCost</th>
                          <th>Subtotal</th>
                          </tr>                       
                          </thead>
                          <tbody>
                          <?php 
                           include_once '../pedidos/Classpedidos.php';	
                           $detalle = new Classpedidos();                                                                    
                           $deta = $detalle->get_detalle_pedido($fil->idpedidos);                             
                           while($det = $deta->fetchObject()){   
                           ?>
                           <tr>
                           <td>
                          <img src="../articulos/<?php echo $det->img; ?>" class="rounded" width="60px"  height="30px" />                                     
                           </td>
                           <td><?php echo $det->nombre; ?>                           
                           </td>
                           <td><?php echo $det->cantidad; ?></td>
                           <td>$<?php echo $det->costouni; ?></td>
                           <td>$<?php echo $det->subtotal; ?></td>
                           </tr>
                           <?php } ?>
                           <tr>
                           <td colspan="3"></td>
                           <td><b>IVA:</b></td>
                           <td><b>$<?php echo $fil->iva; ?></b></td>                          
                           </tr>
                           <tr>
                           <td colspan="3"></td>
                           <td><b>SubTotal:</b></td>
                           <td><b>$<?php echo $fil->total-$fil->iva; ?></b></td>                          
                           </tr>
                           <tr>
                           <td colspan="3"></td>
                           <td><b>Total:</b></td>
                           <td><b>$<?php echo $fil->total; ?></b></td>                          
                           </tr>
                           </tbody>
                           </table>               
                          </td>                                       
                          </tr>
                          <tr>
                          </tbody>
                          </table>            
                        <?php } ?>                      
                      </tbody>
                    </table>
         </body>                    
</html>