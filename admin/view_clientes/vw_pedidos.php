<?php require_once "header.php"; ?> 
<div class="row">
        <div class="col-lg-12">
          <div class="my-3 p-3 bg-white rounded shadow-sm">
        <!-- Button trigger modal -->
        <div align="right">
          <form class="form-inline" method="POST" action="vw_pedidos.php">
            <div class="form-group mx-sm-3 mb-2">
                <input type="date" class="form-control" name="date1" required >
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <input type="date" class="form-control" name="date2" required >
              </div>
              <button type="submit" class="btn btn-primary mb-2">Buscar</button>
            </form>
        </div>          
        <h4 class="border-bottom border-gray pb-2 mb-0">Pedidos</h4> 
        <div class="table-responsive">
            <table class="table" id="example">
            <thead>
                <tr>
                <th>Pedido</th>
                <th></th> 
                <th>Nombre</th>
                <th>Email</th>               
                <th>Fecha</th>                
                <th>Total</th> 
                <th>Anticipo</th>               
                <th></th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 include_once '../pedidos/Classpedidos.php';	
                 $pedidos = new Classpedidos();                 
                 if(isset($_POST["date1"]) && isset($_POST["date2"])){
                   $date1=$_POST["date1"];
                   $date2=$_POST["date2"];
                  $pedido = $pedidos->get_listapedidos_fecha_pedidos($idclientes,$date1,$date2); 
                 }else{
                  $pedido = $pedidos->get_listapedidos_pedidos($idclientes); 
                 }
                 $tot=0;
                 while($fil = $pedido->fetchObject()){  
                ?>
                <tr> 
                <td>#<?php echo $fil->counter; ?></td> 
                <td>
                <a href="../pedidos/borrar.php?id=<?php echo $fil->idpedidos ?>" class="btn btn-outline-danger confirmacion" ><i class="fa fa-trash-o"></i ></a>
                <?php 
                if($fil->status=='P'){
                 // echo '<span class="btn btn-warning my-2 my-sm-0" >Pendiente</span>';
                 }               
                ?></td>  
                <td><?php echo $fil->nombrecliente; ?></td> 
                <td><?php echo $fil->email_cliente; ?></td>                          
                <td><?php echo date("d-m-Y", strtotime($fil->fecha));  ?></td>                
                <td> <span class="badge badge-primary badge-pill">$<?php $tot=$fil->total; echo $fil->total; ?></span></td>
                <td> 
                <ul class="list-group">
                  <?php
                  $itemsaldo=0; 
                  $pagos = new Classpedidos(); 
                  $pago = $pagos->get_pagos($fil->idpedidos);                             
                  while($pa = $pago->fetchObject()){
                    
                  ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center" style="padding: .5px .5px !important;">
                    <?php echo  date("d-m-Y", strtotime($pa->fecha_pago)); ?>
                    <span class="badge badge-primary badge-pill">$ <?php echo $pa->importe_pago; ?></span>
                  </li>                  
                  <?php
                   $itemsaldo=$itemsaldo+$pa->importe_pago;
                   } 
                  ?>
                   <li class="list-group-item d-flex justify-content-between align-items-center" style="padding: .5px .5px !important;">
                    Saldo
                    <?php 
                    if($tot==$itemsaldo){
                    ?>  
                    <span class="badge badge-success badge-pill">$ <?php echo $tot-$itemsaldo; ?></span>
                    <?php 
                    }else{
                    ?>
                    <span class="badge badge-warning badge-pill">$ <?php echo $tot-$itemsaldo; ?></span>
                    <?php   
                    }
                    ?>
                  </li>                 
                </ul>
                </td>                       
                <td>
                <a href="#" data-toggle="modal" data-target="#exampleModal<?php echo $fil->idpedidos; ?>" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                <a href="print_info.php?idpedido=<?php echo $fil->idpedidos; ?>&idclientes=<?php echo $idclientes; ?>&modulo=pe&nombre=<?php echo $fil->nombrecliente; ?>" class="btn btn-outline-info" ><i class="fa fa-print"></i ></a>     
                </td>
                 <td>
                <a href="#" data-toggle="modal" data-target="#exampleModalPago<?php echo $fil->idpedidos; ?>" class="btn btn-outline-info">$+</a>
                </td>
                </tr> 
                <!-- Modal add pay-->
                <div class="modal fade" id="exampleModalPago<?php echo $fil->idpedidos; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agrega el Importe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       <form class="form-inline" action="../pedidos/pagos.php"  method="POST"> 
                          <input type="hidden" name="idpedidos" value="<?php echo $fil->idpedidos ?>">                                     
                          <input type="number" step="any" class="form-control" name="importe" placeholder="$0.00">  
                          <br>                    
                          <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                       </form>
                       </div>                       
                    </div>
                  </div>
                </div>
                <!-- Modal end pay -->

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
            </div>
          </div>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      <hr class="featurette-divider">
       
<?php require_once "footer.php"; ?>