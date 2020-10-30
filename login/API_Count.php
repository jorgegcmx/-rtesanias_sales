<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'Usuario.php';
$usu1 = new Usuario();
$datos = $usu1->get_user_count(null);
$num =$datos->rowCount();

if($num>0){
    
$users_arr=array();

     while($row = $datos->fetch(PDO::FETCH_ASSOC)){
     extract($row); 
     $users_item=array(
         'email_cliente'=>$email_cliente,
         'municipio'=>$municipio,
         'razon_social'=>$razon_social,
         'admin'=>$email,
         'img'=>$img
         );
         array_push($users_arr, $users_item);
     }
     echo json_encode($users_arr);
}else{
    
}
?>