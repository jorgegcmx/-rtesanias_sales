<?php require_once "header.php"; ?> 

<div class="row">
        <div class="col-lg-10">
          <div class="my-3 p-3 bg-white rounded shadow-sm">
     
        <div align="right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Agregar nueva pieza</button>
        </div>          
        <h4 class="border-bottom border-gray pb-2 mb-0">Calalogo</h4> 
        <div class="table-responsive">
            <table class="table" id="example">
            <thead>
                <tr>    
                <th>Estilo</th>            
                <th>Codigo</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Mayoreo</th>
                <th>Menudeo</th>
                <th>Medidas</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 include_once '../articulos/Classe.php';	
                 $articulos = new Classe();

                  if(isset($_GET['idcat'])){
                    $idcat=$_GET['idcat'];
                    $articulo = $articulos->get_articulo_categoria($idadmin,$idcat); 
                  }else{
                    $articulo = $articulos->get_articulo($idadmin); 
                  }                              


                 while($fil = $articulo->fetchObject()){  
                ?>
                <tr>
                    <td><b><?php echo $fil->nombre; ?></b></td>
                    <td><?php echo $fil->idarticulos; ?><?php echo $fil->codigo; ?></td>
                    <td>               
                    <img src="../articulos/<?php echo $fil->img; ?>" class="rounded" width="150px"  height="90px" >
                    </td>
                    <td><b><?php echo $fil->nombrearticulo; ?> </b></td>
                    <td>$<?php echo $fil->precio_mayoreo; ?></td>
                    <td>$<?php echo $fil->precio_menudeo; ?></td>
                    <td><?php echo $fil->descripcion; ?></td>
                    <td>
                    <a href="#" data-toggle="modal" data-target="#exampleModal<?php echo $fil->idarticulos; ?>"><i class="fa fa-pencil"></i></a>
                    <a href="../articulos/borrar.php?id=<?php echo $fil->idarticulos; ?>&img=<?php echo $fil->img; ?>"  class="confirmacion"><i class="fa fa-trash-o"></i ></a>     
                    </td>
                    </tr> 

                <!-- Modal Edit users -->
                <div class="modal fade" id="exampleModal<?php echo $fil->idarticulos; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Información</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form class="forms-sample" action="../articulos/agregar.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $fil->idarticulos; ?>">
                        <input type="hidden" name="idusuarios" value="<?php echo $idadmin; ?>">
                        <input type="hidden" name="imganterior" value="<?php echo $fil->img; ?>">

                        <div class="form-group">
                        <label for="exampleInputCity1">Imagen</label>
                        <img src="../articulos/<?php echo $fil->img; ?>" class="img-thumbnail" alt="Cinque Terre">
                        <input type="file" name="img" class="form-control">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Codigo del
                            Ariculo</label>
                        <input type="text" value="<?php echo $fil->codigo; ?>" name="codigo" class="form-control"
                            placeholder="CHE-01" required>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail3">Nombre</label>
                        <input type="text" value="<?php echo $fil->nombrearticulo; ?>" name="nombre" class="form-control"
                            placeholder="" required>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword4">Precio
                            Mayoreo</label>
                        <input type="number" value="<?php echo $fil->precio_mayoreo; ?>" name="precio_mayoreo"
                            class="form-control" placeholder="$" required>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword4">Precio
                            Menudeo</label>
                        <input type="number" value="<?php echo $fil->precio_menudeo; ?>" name="precio_menudeo"
                            class="form-control" placeholder="$" required>
                        </div>
                        <div class="form-group">
                        <label for="exampleSelectGender">Categoria</label>
                        <select name="idcategoria" class="form-control" required>
                            <option></option>
                                   <?php 
                                    include_once '../articulos/Classe.php';	
                                    $categorias = new Classe();
                                    $categori = $categorias->get_categorias($idadmin);
                                    while($data=$categori->fetchObject()){ 
                                    ?>
                            <option value="<?php echo $data->idcategorias; ?>"
                            <?php
                            if ($fil->idcategoria == $data->idcategorias){
                            ?>
                             selected
                            <?php
                             }                                 
                            ?>            
                            >
                            <?php echo $data->nombre; ?>
                            </option>
                            <?php } ?>
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="exampleTextarea1">Descripción</label>
                        <input value="<?php echo $fil->descripcion; ?>" name="descripcion" class="form-control" required>
                        </div>
                        <button  name="editar" class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
                        </form>
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
        </div><!-- /.col-lg-12 -->
        
        <div class="col-lg-2">  
        <br>
        <br> 
        <br>          
        <h4 class="border-bottom border-gray pb-2 mb-0">Estilos</h4> 
        <div class="table-responsive">
        <ul class="list-group">
             <?php                 
                  $categorias = new Classe();                                         
                  $categoria = $categorias->get_categorias($idadmin);                             
                   while($fila = $categoria->fetchObject()){  
                ?>
                 <li class="list-group-item"> <a href="vw_catalogo.php?idcat=<?php echo $fila->idcategorias; ?>"><?php echo $fila->nombre; ?></a></li>
            
              <?php } ?>
           </ul> 
          </div>
        </div><!-- /.col-lg-12 -->
      </div><!-- /.row -->
      <hr class="featurette-divider">
        <!-- Modal Nuevo -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="forms-sample" action="../articulos/agregar.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idusuarios" value="<?php echo $idadmin; ?>">
                <div class="form-group">
                  <label for="exampleInputCity1">Imagen</label>
                  <input type="file" name="img" class="form-control" id="exampleInputCity1" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Codigo del Ariculo</label>
                  <input type="text" name="codigo" class="form-control" id="exampleInputName1" placeholder="CHE-01" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail3">Nombre</label>
                  <input type="text" name="nombre" class="form-control" id="exampleInputEmail3" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">Precio Mayoreo</label>
                  <input type="number" name="precio_mayoreo" class="form-control" placeholder="$" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">Precio Menudeo</label>
                  <input type="number" name="precio_menudeo" class="form-control" placeholder="$" required>
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Categoria</label>
                  <select name="idcategoria" class="form-control" id="exampleSelectGender" required>
                    <option></option>
                    <?php 
                    include_once '../articulos/Classe.php';	
                    $categorias = new Classe();
                    $categori = $categorias->get_categorias($idadmin);
                    while($data=$categori->fetchObject()){ 
                      ?>
                    <option value="<?php echo $data->idcategorias; ?>">
                      <?php echo $data->nombre; ?>
                    </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Descripción</label>
                  <textarea name="descripcion" class="form-control" id="exampleTextarea1" rows="4" required></textarea>
                </div>
                <button type="submit" name="guardar" class="btn btn-lg btn-primary btn-block">Guardar
                </button>
                </form>             
            </div>            
            </div>
        </div>
        </div>
        <!-- Modal Nuevo -->
<?php require_once "footer.php"; ?>