<?php
$idclientes=$_GET['idclientes']; 
$idpedido=$_GET['idpedido'];
?>
   
<?php
$nombre='';
if(isset($_GET['modulo'])){  
  if($_GET['modulo']=='in' & isset($_GET['salida'])=='ok'){
    $venta="Salida"; 
  }elseif($_GET['modulo']=='in' & isset($_GET['entrada'])=='ok'){
    $venta="Recepción";
  }elseif($_GET['modulo']=='pe'){
  $venta="Pedido";
  $nombre='Cliente: '.isset($_GET['nombre']);
  }
}else{
  $nombre='';
  $venta="Venta";
}
?>

<div align="center">
                          
                        <?php 
                          include_once '../pedidos/Classpedidos.php';	
                          $pedidos = new Classpedidos();                                         
                          $pedido = $pedidos->get_listapedidos_print($idclientes,$idpedido);                             
                           while($fil = $pedido->fetchObject()){   
                        ?>
                        
                          <h3 align="left"><?php echo $nombre; ?> </h3> 
                          <h3 align="right"> <?php echo $venta; ?># <?php echo $fil->counter; ?></h3>
                          <h4 align="right">Fecha: <?php echo date("d-m-Y", strtotime($fil->fecha));?><</h4>                                           
                          <table   width="100%"  height="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;border-color:#ddd;">
                          <thead>                     
                          <tr>                          
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
                           
                            <!--img src="../articulos/<?php echo $det->img; ?>" /-->                                     
                           
                           <td style="text-align: center;">
                           <?php echo $det->nombre; ?>                           
                           </td>
                           <td style="text-align: center;"><?php echo $det->cantidad; ?></td>
                           <td style="text-align: center;">$<?php echo $det->costouni; ?></td>
                           <td style="text-align: center;">$<?php echo $det->subtotal; ?></td>
                           </tr>
                           <?php } ?>
                           <tr>
                         
                           <td ></td>
                           <td ></td>
                           <td  style="text-align: center;"><b>IVA:</b></td>
                           <td  style="text-align: center;"><b>$<?php echo $fil->iva; ?></b></td>                          
                           </tr>
                           <tr>
                           
                           <td ></td>
                           <td ></td>
                           <td  style="text-align: center;"><b>SubTotal:</b></td>
                           <td  style="text-align: center;"><b>$<?php echo $fil->total-$fil->iva; ?></b></td>                          
                           </tr>
                           <tr>
                          
                           <td ></td>
                           <td></td>
                           <td  style="text-align: center;"><b>Total:</b></td>
                           <td  style="text-align: center;"><b>$<?php echo $fil->total; ?></b></td>                          
                           </tr>
                           </tbody>
                           </table>               
                                    
                        <?php } ?>                      
 </div>
