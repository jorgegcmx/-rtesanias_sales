<?php require_once "header.php"; ?> 
<br>
<div class="row" style="background:#e7e7e7">
        <div class="col-lg-8" >        
        <div class="my-3 p-3 bg-white rounded shadow-sm">                
        <h4 class="border-bottom">Registro de Pedidos</h4> 
        <div class="btn-group btn-group-toggle" data-toggle="buttons" >
        <label class="btn btn-success" >
            <a href="vw_addpedidos.php?cost=men"  style="color:white" ><b> Menudeo</b></a>
        </label>
        <label class="btn btn-warning">
            <a href="vw_addpedidos.php?cost=may"  style="color:white" ><b> Mayoreo</b></a>
        </label>
        <label class="btn btn-info">
            <a href="vw_addpedidos.php?cost=otr"   style="color:white" ><b> Otro</b></a>
        </label>
        </div>
      
    <hr>
    <p class="respuesta">
        <hr>
        <div class="table-responsive">
            <table class="table" id="example">
            <thead>
                <tr>                           
                <th>Imagen</th>
                <th>Nombre</th>                
                <th>
                <?php
                if(isset($_GET['cost'])){                
                if($_GET['cost']=='men'){
                    echo "<b style='background:#28A745; color:white;'>Menudeo</b>";
                } elseif($_GET['cost']=='may'){
                    echo "<b style='background:#FFC107; color:white;'>Mayoreo</b>";
                }else{
                  echo "<b style='background:#17A2B8; color:white;'> Otro Costo </b>";
                 }  
                }else{
                  echo "<b style='background:#28A745; color:white;'>Menudeo</b>";
                }                
                ?>
                </th>
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
                <img src="../articulos/<?php echo $fil->img; ?>" class="rounded" width="70px"  height="50px" >
                </td>
                <td><b><?php echo $fil->nombrearticulo; ?> </b></td>
                <td>
                <form class="formulario"  method='post' >
                <?php
                if(isset($_GET['cost'])){                
                if($_GET['cost']=='men'){
                    echo "<input type='number' readonly class='form-control fondo' name='txtprecio' value='". $fil->precio_menudeo ."' >";
                } elseif($_GET['cost']=='may'){
                    echo "<input type='number' readonly class='form-control fondo' name='txtprecio' value='". $fil->precio_mayoreo ."' >";
                }else{
                  echo "<input type='number' placeholder='0.0' class='form-control fondo' size='5'  name='txtprecio' required >";
                 }  
                } else{
                  echo "<input type='number' readonly class='form-control fondo' name='txtprecio' value='". $fil->precio_menudeo ."' >";
                }               
                ?></td>
                <td>               
                <div  class="btn btn-default">
                <b>
                <?php                 
                $stock_count =0;
                $cant_stock = new Classe();
                $stock = $cant_stock->get_stock($idclientes,$fil->idarticulos);
                while($st = $stock->fetchObject()){ 
                   $stock_count = $st->cantidad;
                }
                
                if($stock_count ===0){
                  echo "<b style='color:red;'>0</b>";
                }else{
                  echo "<b>".$stock_count."</b>";
                }    
                ?>  
                 </b>       
                 </div>                 
                 </td>
                 <td>                   
                   <input type='hidden' name='txtstock' value="<?php echo $stock_count; ?>">
					         <input type='hidden' name='txtidproductos' value="<?php echo $fil->idarticulos; ?>">
                    <input type='hidden' name='txtcategoria' value="<?php echo $fil->nombre; ?>">
                    <input type='hidden' name='txtimg' value="<?php echo $fil->img; ?>">
				          	<input type='hidden' name='txtnombre' value="<?php echo $fil->nombrearticulo; ?>">                    								                                                              
                    <input  type="number" class="form-control fondo" size='5'   required name='txtcantidad'>
                    <input  type="hidden" class="form-control fondo" size='5'  name='txtcomentario' value="salespoint">                   
                </td> 
                <td>
                <button type="submit"  name='btnanadir' 
                    class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>                  
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
      <div class="col-md-4 order-md-2 mb-4" >
        <div id="divid">
        <br>
        <br>
       <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="badge badge-secondary badge-pill" >Numero de Piezas en Pedido</span>
        <span class="badge badge-secondary badge-pill">
                   <?php
                   if(!isset($_SESSION['carrito_pedidos'])){
                    echo $counter=0;
                    }else{
                    $counter=$_SESSION["carrito_pedidos"]; 
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
                    if(isset($_SESSION["carrito_pedidos"])){
                    $carrito=$_SESSION["carrito_pedidos"];
                ?>
            <?php           
             $cantArticulos=0;
             $i=0;
           foreach( $carrito as $p){
            ?>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
          <a href="../articulos/eliminpedido.php?idcar=<?php echo $i; ?>"  id="confirmacion" ><b>X</b></a> 
          <h5>(<b><?php echo $p->cantidad; ?></b>)</h5> 
          <div>                   
            <h6 class="my-0"><?php echo $p->nombre; ?></h6>            
            <small class="text-muted">Unit <b> $<?php echo $p->precio; ?></b></small>           
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
         <li class="list-group-item d-flex justify-content-between">
          <span>Total</span>
          <strong>$ <?php if($total!=0){echo  $subtotal=($total);}else{}  ?></strong>
         </li>        
          <form action='../pedidos/addsolopedidos.php' method='post'>
          <li class="list-group-item d-flex justify-content-between"> 
           <input type='hidden' class='form-control'value='<?php echo $idclientes; ?>' name='idcliente'>
           <input type='hidden' class='form-control'value='<?php echo $subtotal; ?>' name='total'>                              
          </li>       
          <li  class="list-group-item d-flex justify-content-between">
          <label>Pedido a otra sucursal </label> 
          <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />          
          </li>
          <div  id="content" style="display: none;">
          <span class="badge badge-secondary badge-pill" >Selecciona la sucursal </span> 
          <select class="form-control form-control-sm" name="sucursal" id="sucursal_1">
            <?php         
                $clientes = new Classe();                                         
                $cliente = $clientes->get_clientes($idadmin);                             
                while($fil = $cliente->fetchObject()){ 
                if($fil->idclientes<>$idclientes){
            ?>
            <option value="<?php echo $fil->idclientes; ?>"><?php echo $fil->razon_social; ?></option>
            <?php 
                }
              }
            ?>
            </select>
           </div>
            <div id="content2" style="display: block;">
            <select class="form-control form-control-sm" name="sucursal" id="sucursal_2">
            <?php         
                $clientes = new Classe();                                         
                $cliente = $clientes->get_clientes($idadmin);                             
                while($fil = $cliente->fetchObject()){ 
                if($fil->idclientes==$idclientes){
            ?>
            <option value="<?php echo $fil->idclientes; ?>"><?php echo $fil->razon_social; ?></option>
            <?php 
                }
              }
            ?>
            </select>
            </div>
            <input  type='text' class='form-control form-control-sm'  name="nombrecliente" placeholder="nombre del cliente" required >
            <input  type='text' class='form-control form-control-sm'  name="email_cliente" placeholder="email" required >            
            
            <li class="list-group-item d-flex justify-content-between">
            <input type='submit' class='btn btn-primary'  value='Generar'>					
            </li>
        </form> 
        <?php       
        }           
        ?>
      </ul>
      </div>
      </div>
     
      </div><!-- /.row --> 
<hr class="featurette-divider"> 
<?php require_once "footer.php"; ?>