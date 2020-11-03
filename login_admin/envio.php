<?php
$dominio = "https://tucatalogoweb.com/venta/";

include_once 'Usuario.php';
$usu1 = new Usuario();

if (isset($_POST['btnfiltrar'])) {
    $correo = trim($_POST['correo']);
    $datos = $usu1->get_admin($correo);

    /*Si es administrador */
    if ($datos == false) {
        header("Location:../formrecuperar.php?error");
    } else {
        while ($fila = $datos->fetchObject()) {
            $email = $fila->email;
        }
    }

    if ($email != '') {
        $contenido = $dominio . "updatepassword.php?email=" . md5($email);
        $cabeceras = 'From: tucatalogowebartesanias@gmail.com' . "\r\n" .
        'Reply-To: tucatalogowebartesanias@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        mail($email, "clic en el siguiente enlace para restabecer la contraseña", $contenido, $cabeceras);
        header("Location:../formrecuperar.php?ok");
    } else {
       header("Location:../formrecuperar.php?error");
    }
}
//Scorpions1@jorge1 send grid pasword