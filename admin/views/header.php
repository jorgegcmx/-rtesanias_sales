<?php
session_start();
if(!isset($_SESSION['idusuarios'])){
  header("Location:../../");
}

$idadmin=$_SESSION['idusuarios']; 
$email=$_SESSION['email'];
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>@rtesanias</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--Icons-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom styles for this template -->
  <link href="../css/carousel.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">@rtesanias</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">          
          <li class="nav-item active">
            <a class="nav-link" href="index.php"><span class="sr-only"></span>Sucursales</a>
          </li> 
          <li class="nav-item active">
            <a class="nav-link" href="vw_categorias.php"><span class="sr-only"></span>Categorias</a>
          </li> 
          <li class="nav-item active">
            <a class="nav-link" href="vw_catalogo.php"><span class="sr-only"></span>Catalogo de Piezas</a>
          </li>         
        </ul>
        <a class="btn btn-outline-primary my-2 my-sm-0" style="color: beige; border-color:beige ;" href="../../login_admin/logout.php"<?php echo $_SESSION['idusuarios']; ?>>Salir</a>
      </div>
    </nav>
  </header>
   <main role="main"> 
   <div role="main" class="container">