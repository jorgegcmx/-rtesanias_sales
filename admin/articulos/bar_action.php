<?php
include_once 'Product.php';
$p = new Product();

$codigo = trim($_POST['codigo']);
$valida=0;
include_once '../articulos/Classe.php';
$articulos = new Classe();
$articulo = $articulos->get_articulo_codebar($codigo);
while ($fil = $articulo->fetchObject()) {
    $valida=$valida+1;
    echo $p->idproductos = $fil->idarticulos;
    echo $p->categoria = $fil->idcategoria;
    echo $p->img = $fil->img;
    echo $p->nombre = $fil->nombre;
    echo $p->precio = $fil->precio_menudeo;
    echo $p->cantidad = 1;
    echo $p->comentario = "null";
    echo $p->subtotal = $p->precio * $p->cantidad;
}

if($valida>=1){
    session_start();
    if (isset($_SESSION["carrito"])) {
        $carrito = $_SESSION["carrito"];
    } else {
        $carrito = array();
    }
    array_push($carrito, $p);
    $_SESSION["carrito"] = $carrito;
    echo json_encode($_SESSION["carrito"]);
}else{
    echo json_encode("error");
}

