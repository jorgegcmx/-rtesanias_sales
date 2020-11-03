<?php require_once "header.php"; 
$idclientes=$_GET['idcliente'];
?> 
<div class="row">
        <div class="col-lg-12">
          <div class="my-3 p-3 bg-white rounded shadow-sm">
        <!-- Button trigger modal -->
        <div align="right">
          <form class="form-inline" method="GET" action="vw_ventas.php">
               <input type="hidden" class="form-control" name="idcliente" value="<?php echo $idclientes; ?>" >
            <div class="form-group mx-sm-3 mb-2">
                <input type="date" class="form-control" name="date1" required >
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <input type="date" class="form-control" name="date2" required >
              </div>
              <button type="submit" class="btn btn-primary mb-2">Buscar</button>
            </form>
        </div>          
        <h4 class="border-bottom border-gray pb-2 mb-0">Ventas</h4> 
        <div class="table-responsive">
            <table class="table" id="example">
            <thead>
                <tr>
                
                <th>Tipo</th> 
                <th>RFC</th>              
                <th>Venta</th>
                <th>Cliente</th>
                <th>email</th>
                <th>Fecha</th>
                <th>IVA</th>
                <th>Total</th>                
                 <th><?php 
                 if(isset($_GET['success'])){
                   echo " <i class='fa fa-envelope-o'style='background:rgb(40,180,99); color:#fff; margin:2px;' aria-hidden='true'> Envio exitoso</i>"; 
                 }
                 ?></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 include_once '../pedidos/Classpedidos.php';	
                 $pedidos = new Classpedidos();      
                 $suma=0;
                 $reporte=0;
                 if(isset($_GET["date1"]) && isset($_GET["date2"])){
                   $date1=$_GET["date1"];
                   $date2=$_GET["date2"];
                   $pedido = $pedidos->get_listapedidos_fecha($idclientes,$date1,$date2); 
                   $reporte=1;
                 }else{
                  $pedido = $pedidos->get_listapedidos($idclientes); 
                 }
                  while($fil = $pedido->fetchObject()){
                  $suma=$suma + $fil->total;     
                ?>
                <tr> 
               
                <td><?php 
                if($fil->status=='NF'){
                    echo '<span class="btn btn-secondary my-2 my-sm-0 btn-sm" >No Facturado</span>';
                  }elseif($fil->status=='F'){
                      echo "<span class='btn btn-warning my-2 my-sm-0 btn-sm'><a href='../pedidos/status.php?idpedidos=".$fil->idpedidos."&status=FA'>1.Por Facturar</a></span>";
                  }else{
                      echo "<span class='btn btn-primary my-2 my-sm-0 btn-sm'><a href='../pedidos/status.php?idpedidos=".$fil->idpedidos."&status=FA' style='color:white;'>Facturada</a></span>";
                  }                 
                ?>
                </td> 
                <td><?php echo $fil->rfc; ?></td>                             
                <td>#<?php echo $fil->counter; ?></td>  
                <td><?php echo $fil->nombrecliente; ?></td> 
                <td><?php echo $fil->email_cliente; ?></td>             
                <td><?php echo date("d-m-Y", strtotime($fil->fecha));  ?></td>
                <td>$<?php echo $fil->iva; ?></b></td> 
                <td>$<?php echo $fil->total; ?></b></td>                       
                <td>
                <a href="#" data-toggle="modal" data-target="#exampleModal<?php echo $fil->idpedidos; ?>" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                </td>
                </tr> 
                <!-- Modal Edit users -->
                <div class="modal fade" id="exampleModal<?php echo $fil->idpedidos; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Información</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <ul class="list-group mb-3">
                         <li class="list-group-item d-flex justify-content-between">
                           <b>Foto</b>  
                           <strong>Nombre</strong>
                           <b>Cant</b>
                           <b>Unit</b>
                           <b>Subtotal</b>
                           </li>                    
                          <?php 
                           include_once '../pedidos/Classpedidos.php';	
                           $detalle = new Classpedidos();                                         
                           $deta = $detalle->get_detalle_pedido($fil->idpedidos);                             
                           while($det = $deta->fetchObject()){   
                           ?>
                           <li class="list-group-item d-flex justify-content-between">
                            <img src="../articulos/<?php echo $det->img; ?>" class="rounded" width="80px"  height="50px" />  
                            <strong><?php echo $det->nombre; ?></strong>
                            <b><?php echo $det->cantidad; ?></b>
                            <b>$<?php echo $det->costouni; ?></b>
                            <b>$<?php echo $det->subtotal; ?></b>
                           </li>                    
                           <?php } ?>
                           <li class="list-group-item d-flex justify-content-between">
                           <b>IVA:</b>
                           <b>$<?php echo $fil->iva; ?></b>                         
                           </li>
                           <li class="list-group-item d-flex justify-content-between">
                           <b>SubTotal:</b>
                           <b>$<?php echo $fil->total-$fil->iva; ?></b>                         
                           </li>
                           <li class="list-group-item d-flex justify-content-between">
                           <b>Total:</b>
                           <b>$<?php echo $fil->total; ?></b>                         
                           </li>
                          </ul>  
                        </div>
                       <div class="modal-footer">                        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal Edit User --> 
             <?php } ?> 
            </tbody>
            </table>
            
            <?php 
            if($reporte==1){
                echo "<h1>EL Total de Ventas: $".$suma."</h1>"; 
            }                     
            ?>
            </div>
          </div>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      <hr class="featurette-divider">
       
<?php require_once "footer.php"; ?>