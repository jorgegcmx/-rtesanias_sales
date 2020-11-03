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
          
  <form class="form-signin"  action="login_admin/envio.php" method="post">
  <img class="mb-4" src="img/logo_top.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Ingresa tu email para recuperar tu contraseña</h1>
  <?php if (isset($_GET['ok'])) {?>
               <p  style="color:green">Se envio un email para restablecer tu contraseña!</p>
               <p style="color:green" >Revisa tu email</p>     
             <?php }elseif(isset($_GET['error'])){?>    
              <p style="color:red">Error el email no se encuentra registrado en el sistema</p> 
  <?php }?>
  <label for="inputEmail" class="sr-only">Email</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="correo" required autofocus> 
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnfiltrar">Recuperar</button> 
  </form>
</body>
</html>
