<?php require_once "header.php"; ?> 
<br>
<div class="row" style="background:#104271">
        <div class="col-lg-12">
          <div class="my-3 p-3 bg-white rounded shadow-sm">
        <!-- Button trigger modal -->
        <div align="right">
          <form class="form-inline" method="POST" action="vw_entradas.php">
            <div class="form-group mx-sm-3 mb-2">
                <input type="date" class="form-control" name="date1" required >
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <input type="date" class="form-control" name="date2" required >
              </div>
              <button type="submit" class="btn btn-primary mb-2">Buscar</button>
            </form>
        </div>          
        <h4 class="border-bottom border-gray pb-2 mb-0">Entrdas</h4> 
        <div class="table-responsive">
            <table class="table" id="example">
            <thead>
                <tr>
                <th>Tipo</th> 
                <th>Entrada</th>
                <th>Fecha</th>             
                <th>Total</th>                
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
                   $pedido = $pedidos->get_listapedidos_fecha_entrada($idclientes,$date1,$date2); 
                 }else{
                   $pedido = $pedidos->get_listapedidos_entrada($idclientes); 
                 }
                  while($fil = $pedido->fetchObject()){  
                ?>
                <tr> 
                <td><?php 
                if($fil->status=='R'){
                  echo '<span class="btn btn-secondary my-2 my-sm-0" >Entrada Inventario</span>';
                }                
                ?></td>                             
                <td>#<?php echo $fil->counter; ?></td>              
                <td><?php  echo date("d-m-Y", strtotime($fil->fecha));  ?></td>  
                <td>$<?php echo $fil->total; ?></b></td>                       
                <td>
                <a href="#" data-toggle="modal" data-target="#exampleModal<?php echo $fil->idpedidos; ?>"><i class="fa fa-eye"></i></a>
                <a href="printPDF.php?idpedido=<?php echo $fil->idpedidos; ?>&idclientes=<?php echo $idclientes; ?>&modulo=in"  ><i class="fa fa-print"></i ></a>     
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