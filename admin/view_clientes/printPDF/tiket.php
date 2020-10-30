<?php
$medidaTicket = 180;

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/tiket.css">
   
</head>

<body>
    <div class="ticket centrado" style="border-style: solid; border-radius: 25px">
        <h2>ChrisXel Cerámica</h2>
        <h4>Ticket de venta #12</h4>
        <h4>2020-02-05 00:12:22</h4>
        <?php
        # Recuerda que este arreglo puede venir de cualquier lugar; aquí lo defino manualmente para simplificar
        # Puedes obtenerlo de una base de datos, por ejemplo: https://parzibyte.me/blog/2019/07/17/php-bases-de-datos-ejemplos-tutoriales-conexion/

        $productos = [
            [
                "cantidad" => 31,
                "descripcion" => "Cheetos verdes 80 g",
                "precio" => 123,
            ],
            [
                "cantidad" => 12,
                "descripcion" => "Teclado HyperX",
                "precio" => 1233,
            ],
            [
                "cantidad" => 12,
                "descripcion" => "Mouse Logitech ASD123",
                "precio" => 841,
            ],
            [
                "cantidad" => 15,
                "descripcion" => "Monitor Samsung 123",
                "precio" => 3546,
            ],
        ];
        ?>

        <table>
            <thead>
                <tr class="centrado">
                    <th class="cantidad">CANT</th>
                    <th class="producto">PRODUCTO</th>
                    <th class="precio">$$</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($productos as $producto) {
                    $total += $producto["cantidad"] * $producto["precio"];
                ?>
                    <tr>
                        <td class="cantidad"><?php echo number_format($producto["cantidad"], 2) ?></td>
                        <td class="producto"><?php echo $producto["descripcion"] ?></td>
                        <td class="precio">$<?php echo number_format($producto["precio"], 2) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tr>
                <td class="cantidad"></td>
                <td class="producto">
                    <strong>TOTAL</strong>
                </td>
                <td class="precio">
                    $<?php echo number_format($total, 2) ?>
                </td>
            </tr>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
            <br>parzibyte.me</p>
    </div>
</body>
</html>