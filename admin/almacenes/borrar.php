<?php
include_once 'Classe.php';
$usu1 = new Classe();
$id = $_GET['id'];

$usu1->del_categorias($id);
header("Location:../views/vw_categorias.php");
