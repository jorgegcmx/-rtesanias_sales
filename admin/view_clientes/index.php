<?php require_once "header.php"; ?> 
<br>
<div class="row" style="background:rgb(40,180,99); ">
        <div class="col-lg-8">
          <div class="my-3 p-3 bg-white rounded shadow-sm">
        <!-- Button trigger modal -->
                
        <h4 class="border-bottom">Punto de Venta</h4> 
        <div class="table-responsive">
            <table class="table" id="example">
            <thead>
                <tr>                            
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Menudeo</th>
                <th>STOCK</th>
                <th>Cantidad</th>
                <th></th>               
                </tr>
             </thead>
             <tbody>
                <?php 
                 include_once '../articulos/Classe.php';	
                 $articulos = new Classe();
                 $articulo = $articulos->get_articulo($idadmin);
                 while($fil = $articulo->fetchObject()){  
                ?>
                <tr>                              
                <td>               
                <img src="../articulos/<?php echo $fil->img; ?>" class="rounded" width="100px"  height="70px" >
                </td>
                <td><b><?php echo $fil->nombrearticulo; ?> </b></td>
                <td>$<?php echo $fil->precio_menudeo; ?></td>
                <td>               
                <div  class="btn btn-default">
                <?php 
               $stock_count =0;
               $cant_stock = new Classe();
               $stock = $cant_stock->get_stock($idclientes,$fil->idarticulos);
               while($st = $stock->fetchObject()){ 
                  $stock_count = $st->cantidad;
               }
               
               if($stock_count == 0){
                 echo "<b style='color:red;'>0</b>";
               }elseif($stock_count ==''){
                echo "<b style='color:red;'>0</b>";
               } else{
                echo "<b>".$stock_count."</b>";
               }   
                ?>         
                </div>                 
                </td>
                <td>
                   <form class="formulario_venta" action='../articulos/addcar.php' method='post' >
                   <input type='hidden' name='txtstock' value="<?php echo $stock_count; ?>">
								    <input type='hidden' name='txtidproductos' value="<?php echo $fil->idarticulos; ?>">
                    <input type='hidden' name='txtcategoria' value="<?php echo $fil->nombre; ?>">
                    <input type='hidden' name='txtimg' value="<?php echo $fil->img; ?>">
								    <input type='hidden' name='txtnombre' value="<?php echo $fil->nombrearticulo; ?>">
								    <input type='hidden' name='txtprecio' value="<?php  echo $fil->precio_menudeo; ?>">									                                                              
                    <input  type="number" class="form-control fondo" size='5'   required name='txtcantidad'>
                    <input  type="hidden" class="form-control fondo" size='5'  name='txtcomentario' value="salespoint">                   
                </td> 
                <td>
                <button type="submit"  name='btnanadir' class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>                  
                </button>
                </form>
                </td>             
                </tr>                
             <?php } ?>  
            </tbody>
            </table>
            </div>
          </div>
        </div><!-- /.col-lg-8 -->
        <hr class="featurette-divider">
      <div class="col-md-4 order-md-2 mb-4">
        <br>       
        <form id="formulario_barcode" action="../articulos/bar_action.php" method="post">
        <input  type="number" class="form-control fondo" size='10' id="codigo" name='codigo' >
        </form>
        <br>
      <div id="divid_venta">       
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span  style="color:white">Venta</span>
        <span class="badge badge-secondary badge-pill">
                   <?php
                   if(!isset($_SESSION['carrito'])){
                    echo $counter=0;
                  }else{
                    $counter=$_SESSION["carrito"]; 
                    //var_dump($counter);
                    echo  array_sum(array_column($counter, 'cantidad'));
                    //echo count($counter, COUNT_RECURSIVE);  
                  }                   
                  ?>
        </span>
      </h4>
      <ul class="list-group mb-3">
      <?php
        $IVA=0;
        $subtotal=0;
        $total=0;
      if(isset($_SESSION["carrito"])){
	    $carrito=$_SESSION["carrito"];
      ?>
            <?php           
             $cantArticulos=0;
             $i=0;
           foreach( $carrito as $p){
            ?>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
          <a href="../articulos/eliminarprocar.php?idcar=<?php echo $i; ?>"  id="confirmacion" ><b>X</b></a>  
          <div>
            <h6 class="my-0"><?php echo $p->nombre; ?></h6>            
            <small class="text-muted">Unit <b> $<?php echo $p->precio; ?></b></small>
            <small class="text-muted">Cantidad <b><?php echo $p->cantidad; ?></b></small>
          </div>
          <div>
          <span class="text-muted">$<?php echo $p->subtotal; ?></span>
          </div>         
           </li>
            <?php 
						$i++;
            $total+=$p->subtotal;
            $cantArticulos= $cantArticulos+ $p->cantidad;
            ?>
          <?php   
            }                   
            ?>
         <div id="contentimpuesto" style="display: none;">
         <li class="list-group-item d-flex justify-content-between">
          <span>IVA</span>
          <strong>$ <?php if($total!=0){echo $IVA=($total * 0.16);}else{}  ?></strong>
         </li> 
         <li class="list-group-item d-flex justify-content-between">
          <span>SubTotal</span>
          <strong>$ <?php if($total!=0){echo  $subtotal=($total);}else{}  ?></strong>
         </li> 
         </div>

         
          <div id="importesiniva" style="display: block;">
          <li class="list-group-item d-flex justify-content-between">
          <span><b>Total</b></span>
          <strong>$ <?php if($total!=0){echo  $subtotal=($total);}else{}  ?></strong>
          </li>
          </div>
          <div id="importeconiva" style="display: none;">
          <li class="list-group-item d-flex justify-content-between">
          <span><b>Total</b></span>
          <strong >$ <?php echo $subtotal + $IVA;  ?></strong>
          </li>  
          </div>            
        
         <form action='../pedidos/addpedidos.php' method='post'>
          <li class="list-group-item d-flex justify-content-between">  
                 
          <div>
          <input type="checkbox"  id="tipo" name="tipo"  onchange="javascript:showContentVenta()" />   
            <label class="form-check-label" for="exampleRadios1">
              Factura
            </label>				
					 <div class='col-sm-10'>
           <input type='hidden' class='form-control'value='<?php echo $IVA; ?>' name='iva'>
           <input type='hidden' class='form-control'value='V' name='modulo'>
           <input type='hidden' class='form-control'value='<?php echo $idclientes; ?>' name='idcliente'>
           <input type='hidden' class='form-control'value='<?php echo $subtotal; ?>' name='subtotal'>
           <input type='hidden' class='form-control'value='<?php echo $subtotal + $IVA; ?>' name='totalconiva'>
					 </div>	
          </div>                    
        </li>
        <li class="list-group-item d-flex justify-content-between">
         <div id="contentventa" style="display: none;">
         <input  type='text' class='form-control form-control-sm' id="rfc"  name="rfc" placeholder="RFC"  >
        </div>
        </li>
        <li class="list-group-item"><label for=""><b>Datos de Cliente para tikect</b></label></li>
        <li class="list-group-item d-flex justify-content-between">            			
        <input  type='text' class='form-control form-control-sm' id="cliente"  name="nombrecliente" placeholder="nombre del cliente" >
        <input  type='text' class='form-control form-control-sm' id="email" name="email_cliente" placeholder="email" > 			
        </li>
        <li  class="list-group-item">
        <input  type="number" class="form-control fondo" size='10' step="any"  name='pagacon' placeholder="Paga Con?">
        </li >
        <li class="list-group-item d-flex justify-content-between">
        <input type='submit' class='btn btn-success'  value='Cerrar venta'>					
        </li>
        </form> 
        <?php    
        
        }           
        ?>
      </ul>
      </div>
      </div>
      </div><!-- /.row -->   
<script src="../js/focus.js"></script>
<?php require_once "footer.php"; ?>