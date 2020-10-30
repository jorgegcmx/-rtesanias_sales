<?php require_once "header.php"; ?> 
<div class="row">
        <div class="col-lg-12">
        <div class="my-3 p-3 bg-white rounded shadow-sm">                
        <h4 class="border-bottom border-gray pb-2 mb-0">Almacen</h4> 
        <div class="table-responsive">
            <table class="table" id="example">
            <thead>
                <tr>
                <th>Nombre</th>                 
                </tr>
            </thead>
            <tbody>
                <?php 
                  include_once '../almacenes/Classe.php';	
                  $almacen = new Classe();                
                  $alma = $almacen->get_almacenes($idclientes);                  
                  while($al = $alma->fetchObject()){  
                ?>
                <tr>                                             
                <td>#<?php echo $al->nombrealmacen; ?></td>              
                </tr>             
               <?php } ?> 
            </tbody>
            </table>
            </div>
          </div>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      <hr class="featurette-divider">       
<?php require_once "footer.php"; ?>