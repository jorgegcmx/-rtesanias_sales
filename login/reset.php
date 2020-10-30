<?php
include_once 'Usuario.php';
$usu1 = new Usuario();

if(isset($_POST['email'])){
$datos=$usu1->get_email($_POST['email']);
}
while($fila = $datos->fetchObject()){ 
?> 

<?php
$direccion=$fila->email;
$contrasena=$fila->contrasena;
?> 

<?php
     }
  ?> 

<?php
$contenido="Usuario;".$direccion."\nContraseña:".$contrasena;
mail($direccion,"Recuperar contraseña",$contenido);

 echo'<script type="text/javascript">
			     alert("Enviado con Exito revisa tu Correo electronico ");
				 window.location.href="../login_admin.php";
				 </script>';
  ?> 