<?php
include_once 'Classe.php';
$usu1 = new Classe();

$id = $_GET['id'];
$img = $_GET['img'];

if (is_file($img)) {
    chmod($img, 0777);
    if (!unlink($img)) {
        echo false;
    }

}

$usu1->del_articulo($id);
header("Location:../views/vw_catalogo.php");
