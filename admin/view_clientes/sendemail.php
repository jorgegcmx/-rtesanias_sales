<?php
$API_KEY = 'SG.DQreSp8JQPCW6MOn1vH8mQ.0A9gQRn6g-qQCzMNAtpStXBPvBpp4RzBmcQXl4QWO-A';
require '../libraries/Sendgrid/vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// https://github.com/sendgrid/sendgrid-php/releases

$idclientes=$_GET['idclientes']; 
$idpedido=$_GET['idpedido'];
$subT=0;

include_once '../pedidos/Classpedidos.php';	
$pedidos = new Classpedidos();                                         
$pedido = $pedidos->get_listapedidos_print($idclientes,$idpedido);                             
 while($fil = $pedido->fetchObject()){ 
  $subT=($fil->total)-($fil->iva);

    $contenido= ' <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="../css/tiket.css">
        </head>
        <body>
        <div align="center"  width="180px" height="180px" style="border-style: solid; border-radius: 25px" >           
            <img src="https://chrisxel.com/wp-content/uploads/2020/10/logo_chrisxel.png" >
            <h2>ChrisXel Cerámica</h2>
            <h4>Ticket de Compra #'. $fil->counter .'</h4>
            <h4>'. $fil->fecha .'</h4>
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
            while($det = $deta->fetchObject()){ 
                
    $contenido.=   ' <tr>
                <td class="producto">'. $det->nombre .'</td>
                <td class="cantidad">'. $det->cantidad .'</td>
                <td class="precio">$'. $det->costouni.'</td>
                <td class="precio">$'. $det->subtotal .'</td>                        
                </tr>';
            }
    $contenido.= ' <tr>
              <td colspan="2"></td>
              <td class="precio"><b>IVA:</b></td>
              <td class="precio"><b>$' .$fil->iva .'</b></td>                          
              </tr>
              <tr>
              <td colspan="2"></td>
              <td  class="precio"><b>SubTotal:</b></td>
              <td class="precio"><b>$'.$subT.'</b></td>                          
              </tr>
              <tr>
              <td colspan="2"></td>
              <td  class="precio"><b>Total:</b></td>
              <td class="precio" ><b>$'. $fil->total .'</b></td>                          
              </tr>
            </tbody>
         </table>   
         <p class="centrado">¡GRACIAS POR SU COMPRA!
         <br>www.chrisxel.com</p>    
         </div>              
        </body>
        </html> ';

  $emails = trim($fil->email);
  $email = new \SendGrid\Mail\Mail();
  $email->setFrom("inmpsaemail@gmail.com", "Ticket de Compra");
  $email->setSubject("Ticket de Compra");
  $email->addTo($emails, "Ticket");
  $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
  $email->addContent(
      "text/html",   $contenido  );
  $sendgrid = new \SendGrid($API_KEY);
  try {
      $response = $sendgrid->send($email);
      $response->statusCode() . "\n";
      $response->headers();
      $response->body() . "\n";
     // header('Location: vw_ventas.php?success');

  } catch (Exception $e) {
      echo 'Caught exception: ' . $e->getMessage() . "\n";
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
      confirmButtonText: 'ok'    
     }).then(resultado => {
        if (resultado.value) {
            let nombre = resultado.value;           
            window.location.href='vw_ventas.php';
        }
    });

</script>
</body>
</html>