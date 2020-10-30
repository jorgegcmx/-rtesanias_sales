<?php
     
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
                    <td class="precio">'. $det->costouni.'</td>
                    <td class="precio">'. $det->subtotal .'</td>                        
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

?>