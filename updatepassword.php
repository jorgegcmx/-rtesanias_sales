<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>SalesPoint</title>
  <link rel="icon" type="image/png" href="img/logo_top.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">          
  <form class="form-signin"   action="login_admin/update.php" method="post">
  <img class="mb-4" src="img/logo_top.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Ingresa tu nueva contraseña</h1>
  <?php if (isset($_GET['error'])) {?>		
        <p style="color:red">Error la contraseña no concide, intenta nuevamente!</p>      
  <?php }elseif(isset($_GET['password'])){ ?>
	<p style="color:green;"><a href=".">Todo salio bien inicia sesión</a></p> 
  <?php } ?>

    <?php if(isset($_GET['email'])){ echo "<input  name='id' type='hidden' value='".$_GET['email']."' >";}?>
	<div class="form-group">
    <label for="message-text" class="control-label"> contraseña</label>
	<input id="inputEmail" class="form-control" required  name="password1" type="password" >
     </div>
     <div class="form-group">
     <label for="message-text" class="control-label">Confirma tu contraseña</label>
	<input id="inputEmail" class="form-control" required name="password2" type="password" >
	</div>
	<button type="submit" name="btnfiltrar" class="btn btn-primary">Actualizar contraseña</button>			
 </form>
</body>
</html>
