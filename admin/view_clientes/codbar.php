
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  
<script>
function printDiv(printdiv) {
     var contenido= document.getElementById(printdiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;
     document.body.innerHTML = contenido;
     window.print();
     document.body.innerHTML = contenidoOriginal;
}
</script>
</head>

<body>

<a href="#" onclick="printDiv('areaImprimir')"> Imprimir</a>

<div id="areaImprimir">
  <div align="center"><?php echo $_GET['nombre'];?></div>
<table>
<tr>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>

</tr>
<tr>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
</tr>
<tr>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>
<th><label>$<?php echo $_GET['cost'];?></label></th>

</tr>
<tr>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
<td><svg id="barcode"></svg></td>
</tr>
</table>  
</div>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.3/dist/JsBarcode.all.min.js"></script>
<script   src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="  crossorigin="anonymous"></script>
<script>  
  JsBarcode("#barcode", "<?php echo $_GET['cod'];?>", {
  format: "codabar",
 // width:"3",
  height:"30",
  displayValue:false
});
</script>
</body>
</html>