<?php require_once "header.php"; ?> 
<br>
<div class="row" style="background:#104271">
        <div class="col-lg-8" >        
        <div class="my-3 p-3 bg-white rounded shadow-sm">                
        <h4 class="border-bottom">Inventario</h4> 
        <div class="table-responsive">
            <table class="table" id="example">
            <thead>
                <tr>
                <th>QR </th>               
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
                 $articulo = $articulos->get_articulo($idadmin,$idclientes);
                 while($fil = $articulo->fetchObject()){  
                ?>
                <tr>
                <td>
                   <div style=" text-align: center"> 
                    <form action="printQR.php" method="get">
                    <input type="hidden" name="id" value="http://tucatalogoweb.com/admin/articulos/addsale.php?txtidproductos=<?php echo $fil->idarticulos;?>@txtimg=<?php echo $fil->img; ?>@txtnombre=<?php echo $fil->nombrearticulo; ?>@txtprecio=<?php echo $fil->precio_menudeo; ?>">
                    <input type="hidden" name="costo" value="<?php echo $fil->precio_menudeo; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $fil->nombrearticulo; ?>">
                    <button  type="submit"> 
                      <img src="img/qr.png" >
                    </button>
                    </form> 
                  
                    <a type="button" href="codbar.php?cod=<?php echo  $fil->idarticulos.''.$fil->codigo; ?>&nombre=<?php echo $fil->nombrearticulo; ?>">
                    <img src="img/barcode.png">
                   </a>                                               
                    </div> 
                </td>               
                <td>               
                <img src="../articulos/<?php echo $fil->img; ?>" class="rounded" width="100px"  height="70px" >
                </td>
                <td><b><?php echo $fil->nombrearticulo; ?> </b></td>
                <td>$<?php echo $fil->precio_menudeo; ?></td>
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
                   <form class="formulario_inventario"  method='post'>
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
      <div class="col-md-4 order-md-2 mb-4">  
      <div id="divid_inventario">
      <br>
      <br>   
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="badge badge-secondary badge-pill" >Entrada a Almacen</span>
        <span class="badge badge-secondary badge-pill">
                   <?php
                   if(!isset($_SESSION['carrito_recepcion'])){
                    echo $counter=0;
                  }else{
                    $counter=$_SESSION["carrito_recepcion"]; 
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
            if(isset($_SESSION["carrito_recepcion"])){
            $carrito=$_SESSION["carrito_recepcion"];
            ?>
            <?php           
             $cantArticulos=0;
             $i=0;
             foreach( $carrito as $p){
            ?>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
          <a href="../articulos/eliminrecepcion.php?idcar=<?php echo $i; ?>"  id="confirmacion" ><b>X</b></a> 
          <h5>(<b><?php echo $p->cantidad; ?></b>)</h5> 
          <div>                   
            <h6 class="my-0"><?php echo $p->nombre; ?></h6>            
            <small class="text-muted">Unit <b> $<?php echo $p->precio; ?></b></small>
           
          </div>
          <div>
            <span class="text-muted">$<?php echo $p->subtotal; ?></span>
          </div>         
          
            <?php 
						$i++;
            $total+=$p->subtotal;
            $cantArticulos= $cantArticulos+ $p->cantidad;
            ?>
            <?php   
              }                   
              ?> 
          </li>  

         <li class="list-group-item d-flex justify-content-between">
          <span>Total</span>
          <strong>$ <?php if($total!=0){echo  $subtotal=($total);}else{}  ?></strong>
         </li>        
         <form action='../pedidos/addrecepcion.php' method='post'>
        <li class="list-group-item d-flex justify-content-between">                	
           <input type='hidden' class='form-control'value='<?php echo $IVA; ?>' name='iva'>
           <input type='hidden' class='form-control'value='IN' name='modulo'>
           <input type='hidden' class='form-control'value='<?php echo $idclientes; ?>' name='idcliente'>
           <input type='hidden' class='form-control'value='<?php echo $subtotal; ?>' name='subtotal'>                              
        </li>
        <li class="list-group-item d-flex justify-content-between">
        <select class="form-control form-control-sm" name="almacen">
        <?php         
            $almacen = new Classe();                
            $alma = $almacen->get_almacenes($idclientes);                  
            while($al = $alma->fetchObject()){  
        ?>
        <option value="<?php echo $al->idalmacen; ?>"><?php echo $al->nombrealmacen; ?></option>
        <?php 
            }
        ?>
       </select>				
        </li>
        <li class="list-group-item d-flex justify-content-between">
        <input type='submit' class='btn btn-primary'  value='Recibir mercancia'>					
        </li>
        </form> 
        <?php       
        }           
        ?>

      </ul>
       </div> 
     </div>
    </div><!-- /.row -->  
<?php require_once "footer.php"; ?>