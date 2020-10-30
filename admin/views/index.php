<?php require_once "header.php"; ?> 
<br>
      <div class="row">
        <div class="col-lg-12">                
        <div align="right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Agregar nueva sucursal</button>
        </div>  

    <h4 class="border-bottom border-gray pb-2 mb-0">Sucursales</h4>   
    <div class="my-3 p-3 bg-white rounded shadow-sm">             
            <?php 
             include_once '../clientes/Classe.php';	
             $clientes = new Classe();                                         
             $cliente = $clientes->get_clientes($idadmin);                             
             while($fil = $cliente->fetchObject()){   
            ?>
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">     
            <div><b> Email de Usuario:</b> <?php echo $fil->email_cliente; ?></div> 
            <div><b>Contraseña:</b> <?php echo $fil->contrasena_cliente; ?></div>               
        </div>   
        <div class="d-flex justify-content-between align-items-center w-100">
              <div><b>Nombre: </b><?php echo $fil->razon_social; ?></div>                   
              <a href="../clientes/borrar_cliente.php?id=<?php echo $fil->idclientes; ?>"><i class="fa fa-trash-o"></i ></a>                       
        </div>
        <div class="d-flex justify-content-between align-items-center w-100">     
              <div><b> Pais: </b><?php echo $fil->pais; ?></div>                           
              <a href="#" data-toggle="modal" data-target="#exampleModal<?php echo $fil->idclientes; ?>"><i class="fa fa-pencil"></i></a>
        </div>
      <span class="d-block"> <b>Municipio:</b>  <?php echo $fil->municipio; ?></span>
      <span class="d-block"><b>Estado: </b>  <?php echo $fil->estado; ?></span>
      <span class="d-block"><b>Dirección: </b>  <?php echo $fil->direccion; ?></span>
      <span class="d-block"><b>Telefono: </b>  <?php echo $fil->telefono; ?></span>
      </div>
     </div>  
<!-- Modal-->
  <div class="modal fade" id="exampleModal<?php echo $fil->idclientes; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-signin" action="../clientes/agregar.php" method="POST">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $fil->idclientes; ?>">
                    <div class="form-group">
                        <input type="email" name="email_cliente" class="form-control" placeholder="email"
                            value="<?php echo $fil->email_cliente; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="contrasena_cliente" class="form-control" placeholder="contraseña"
                            value="<?php echo $fil->email_cliente; ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" name="contrasena_cliente2" class="form-control"
                            placeholder="Repirte la contraseña" value="<?php echo $fil->email_cliente; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="telefono" class="form-control" placeholder="Telefono"
                            value="<?php echo $fil->telefono; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="direccion" class="form-control"
                            class="form-control form-control-lg fondo" value="<?php echo $fil->direccion; ?>"
                            placeholder="Direccion" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="pais" class="form-control" placeholder="Pais"
                            value="<?php echo $fil->pais; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="estado" class="form-control" placeholder="Estado"
                            value="<?php echo $fil->estado; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="municipio" class="form-control" placeholder="Municipio"
                            value="<?php echo $fil->municipio; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="rfc" value='0000000000'>
                    </div>
                    <div class="form-group">
                        <input type="text" name="razon_social" class="form-control" placeholder="Nobre del Negocio"
                            value="<?php echo $fil->razon_social; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="idusuarios_admin" value="<?php echo $idadmin ;?>">
                    </div>
                    <div class="mb-4">
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-lg btn-primary btn-block" name="edit" type="submit">Registrar</button>
                    </div>            
            </form>
      </div>     
    </div>
  </div>
</div>
<!-- Modal-->
                         
            <?php } ?>
            </div>
          </div>       
      </div><!-- /.row -->


<!-- Modal Nuevo -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>      </div>
            <div class="modal-body">
               <form class="form-signin" action="../clientes/agregar.php" method="POST">
                  <div class="form-group">
                    <input type="email"    name="email_cliente"  class="form-control" placeholder="email" required>
                  </div>
                  <div class="form-group">
                    <input type="password"  name="contrasena_cliente"  class="form-control" placeholder="contraseña" >
                    </div>
                  <div class="form-group">
                    <input type="password"  name="contrasena_cliente2"  class="form-control" placeholder="Repirte la contraseña" required>
                  </div>
                  <div class="form-group">
                    <input type="number"  name="telefono"  class="form-control" placeholder="Telefono" required>
                  </div>
                  <div class="form-group">
                    <input type="text"   name="direccion"  class="form-control" class="form-control form-control-lg fondo"  placeholder="Direccion" required>
                  </div>
                  <div class="form-group">
                    <input type="text"  name="pais"  class="form-control"  placeholder="Pais" required>
                  </div>
                  <div class="form-group">
                    <input type="text"  name="estado"  class="form-control"  placeholder="Estado" required>
                  </div>
                  <div class="form-group">
                    <input type="text"  name="municipio"  class="form-control"  placeholder="Municipio" required>
                  </div>
                  <div class="form-group">
                    <input type="hidden"  name="rfc" value='0000000000' >
                  </div>
                  <div class="form-group">
                    <input type="text"  name="razon_social"  class="form-control"  placeholder="Nobre del Negocio" required>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="idusuarios_admin" value="<?php echo $idadmin ;?>">
                  </div>                
                  <div class="mb-4">                  
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
                  </div>                
                  </div>
                </form>      
              </div>
      <div class="modal-footer">       
      </div>
    </div>
  </div>
</div>
<!-- Modal Nuevo -->
 
 <?php require_once "footer.php"; ?>