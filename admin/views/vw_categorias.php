<?php require_once "header.php"; ?> 
<div class="row">
        <div class="col-lg-12">
          <div class="my-3 p-3 bg-white rounded shadow-sm">
        <!-- Button trigger modal -->
        <div align="right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Agregar nueva pieza</button>
        </div>          
        <h4 class="border-bottom border-gray pb-2 mb-0">Estilos</h4> 
        <div class="table-responsive">
            <table class="table" id="example">
            <thead>
                <tr>                
                <th>Estilos</th>                
                <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                  include_once '../categorias/Classe.php';	
                  $categorias = new Classe();                                         
                  $categoria = $categorias->get_categorias($idadmin);                             
                   while($fila = $categoria->fetchObject()){  
                ?>
                <tr>                
                <td><b><?php echo $fila->nombre; ?> </b></td>
              
                <td>
                <a href="#" data-toggle="modal" data-target="#exampleModal<?php echo $fila->idcategorias; ?>"><i class="fa fa-pencil"></i></a>
                <a href="../categorias/borrar.php?id=<?php echo $fila->idcategorias; ?>"  id="confirmacion"><i class="fa fa-trash-o"></i ></a>     
                </td>
                </tr> 

                <!-- Modal Edit users -->
                <div class="modal fade" id="exampleModal<?php echo $fila->idcategorias; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Información</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                                                  <form class="forms-sample" action="../categorias/agregar.php"
                                                            method="POST" enctype="multipart/form-data">

                                                            <input type="hidden" name="id"
                                                                value="<?php echo $fila->idcategorias; ?>">
                                                            <input type="hidden" name="idusuarios"
                                                                value="<?php echo $idadmin; ?>">
                                                                                                                  

                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Nombre</label>
                                                                <input type="text" value="<?php echo $fila->nombre; ?>"
                                                                    name="nombre" class="form-control"
                                                                    id="exampleInputName1" placeholder="CHE-01"
                                                                    required>
                                                            </div>                                                       
                                                            <button type="submit" name="editar"
                                                                class="btn btn-gradient-primary mr-2">Guardar</button>
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
        </div><!-- /.col-lg-4 -->
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
            <form class="forms-sample" action="../categorias/agregar.php" method="POST"   >
                    <input type="hidden" name="idusuarios" value="<?php echo $idadmin; ?>"> 
                    <div class="form-group">
                        <label for="exampleInputName1">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="exampleInputName1"
                            required>
                    </div>
                    <button type="submit"   class="btn btn-gradient-primary mr-2">Guardar
                    </button>
             </form>             
            </div>
            <div class="modal-footer">       
            </div>
            </div>
        </div>
        </div>
        <!-- Modal Nuevo -->
<?php require_once "footer.php"; ?>