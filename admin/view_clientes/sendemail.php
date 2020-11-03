<?php

// Comment out the above line if not using Composer
// https://github.com/sendgrid/sendgrid-php/releases

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../libraries/PhpMailer/Exception.php';
require '../libraries/PhpMailer/PHPMailer.php';
require '../libraries/PhpMailer/SMTP.php';


$idclientes = $_GET['idclientes'];
$idpedido = $_GET['idpedido'];
$subT = 0;

include_once '../pedidos/Classpedidos.php';
$pedidos = new Classpedidos();
$pedido = $pedidos->get_listapedidos_print($idclientes, $idpedido);
while ($fil = $pedido->fetchObject()) {
    $subT = ($fil->total) - ($fil->iva);

    $contenido = ' <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="../css/tiket.css">
        </head>
        <body>
        <div align="center"  width="180px" height="180px" style="border-style: solid; border-radius: 25px" >
            <img src="https://tucatalogoweb.com/venta/img/logo_top.png" >
            <h2>@rtesanias Point</h2>
            <h4>Ticket de Compra #' . $fil->counter . '</h4>
            <h4>' . date("d-m-Y", strtotime($fil->fecha))  . '</h4>
        <table>
          <thead>
              <tr class="centrado">
                  <th class="producto">Articulo</th>
                  <th class="cantidad">Cantidad</th>
                  <th class="precio">CostUni</th>
                  <th class="precio">SubTotal</th>
               </tr>
          </thead>
          <tbody>
            ';
    $detalle = new Classpedidos();
    $deta = $detalle->get_detalle_pedido($fil->idpedidos);
    while ($det = $deta->fetchObject()) {

    $contenido .= ' <tr>
                <td class="producto">' . $det->nombre . '</td>
                <td class="cantidad">' . $det->cantidad . '</td>
                <td class="precio">$' . $det->costouni . '</td>
                <td class="precio">$' . $det->subtotal . '</td>
                </tr>';
    }
    $contenido .= ' <tr>
              <td colspan="2"></td>
              <td class="precio"><b>IVA:</b></td>
              <td class="precio"><b>$' . $fil->iva . '</b></td>
              </tr>
              <tr>
              <td colspan="2"></td>
              <td  class="precio"><b>SubTotal:</b></td>
              <td class="precio"><b>$' . $subT . '</b></td>
              </tr>
              <tr>
              <td colspan="2"></td>
              <td  class="precio"><b>Total:</b></td>
              <td class="precio" ><b>$' . $fil->total . '</b></td>
              </tr>
            </tbody>
         </table>
         <p class="centrado">¡GRACIAS POR SU COMPRA!
         <br>
         contacto Artesanias Point</p>
         </div>
        </body>
        </html> ';

    //$emails = $fil->email;
    //$email = new \SendGrid\Mail\Mail();
    //$email->setFrom("schoolgcmx@gmail.com", "Ticket de Compra");
    //$email->setSubject("Ticket de Compra");
    //$email->addTo($emails, "Alumno");
    //$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
    //$email->addContent(
    //    "text/html", $contenido);
    //$sendgrid = new \SendGrid($API_KEY);
    //try {
        //$response = $sendgrid->send($email);
        //$response->statusCode() . "\n";
        //$response->headers();
        //$response->body() . "\n";
        // header('Location: vw_ventas.php?success');

    //} catch (Exception $e) {
    //    echo 'Caught exception: ' . $e->getMessage() . "\n";
    //}
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'tucatalogowebartesanias@gmail.com';    // SMTP username
        $mail->Password   = '';                         // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('tucatalogowebartesanias@gmail.com', '@rtesanias');
        $mail->addAddress($fil->email);                               // Add a recipient
        $mail->addReplyTo('tucatalogowebartesanias@gmail.com', 'venta');
    
    
        // Content
        $mail->isHTML(true);                                           // Set email format to HTML
        $mail->Subject = 'Tiket de Compra';
        $mail->Body    = $contenido;
        $mail->AltBody = 'Gracias por su compra';
    
        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type='text/javascript'>

  Swal.fire({
      title: 'Ticket enviado!',
      text: 'Continuar',
      icon: 'success',
      confirmButtonText: 'ok',
      allowOutsideClick: false
     }).then(resultado => {
        if (resultado.value) {
            let nombre = resultado.value;
            window.location.href='vw_ventas.php';
        }
    });

</script>
</body>
</html>
