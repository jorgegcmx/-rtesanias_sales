<?php 
include_once '../articulos/Product.php';
$p = new Product();
session_start();

if(!isset($_SESSION['idclientes'])){
  header("Location:../../");
}
$idadmin=$_SESSION['idusuarios_admin'];
$idclientes=$_SESSION['idclientes']; 
$email=$_SESSION['email_cliente'];
$contacto=$_SESSION['telefono_admin'];
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
            <a class="nav-link" href="vw_almacen.php"><span class="sr-only"></span>
            <i class="fa fa-building-o" aria-hidden="true"></i>
            Almacen</a>
          </li>   
          <li class="nav-item active">
            <a class="nav-link" href="vw_inventario.php"><span class="sr-only"></span>
            <i class="fa fa-bar-chart" aria-hidden="true"></i>
            Inventario
            </a>
          </li>  
          <li class="nav-item active">
            <a class="nav-link" href="vw_entradas.php"><span class="sr-only"></span>
            <i class="fa fa-sign-in" aria-hidden="true"></i>
            Entradas</a>
          </li>         
          <li class="nav-item active">
            <a class="nav-link" href="vw_addpedidos.php"><span class="sr-only"></span>
            <i class="fa fa-file-o" aria-hidden="true"></i>
             Generar Pedido</a>
          </li>        
         
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pedidos Registrados</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="vw_pedidos.php">Tus Pedidos</a>
          <a class="dropdown-item" href="#">Pedidos de Sucursal</a>    
        </div>
      </li>
          <li class="nav-item active">
            <a class="nav-link" href="vw_ventas.php"><span class="sr-only"></span>
            <i class="fa fa-list" aria-hidden="true"></i>
            Ventas Registradas</a>
          </li>  
          <li class="nav-item active">
            <a class="btn btn-outline-primary my-2 my-sm-0" style="background:#28B463; color:white; border-color:white;" href="."><span class="sr-only"></span>
            <i class="fa fa-credit-card" aria-hidden="true"></i>
             Vender
             </a>
          </li>   
        </ul>
        <a class="btn btn-outline-primary my-2 my-sm-0" style="color: beige; border-color:beige ;" href="../../login/logout.php"<?php echo $_SESSION['idclientes']; ?>>Salir</a>
      </div>
    </nav>
  </header>
   <main role="main"> 
   <div role="main" class="container">