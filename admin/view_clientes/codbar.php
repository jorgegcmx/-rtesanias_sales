<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script language="javascript">
function imprimir()
{ 
    if ((navigator.appName == "Netscape")) {
        window.print() ;
       }else{            
     var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
     document.body.insertAdjacentHTML('beforeEnd', WebBrowser); WebBrowser1.ExecWB(6, -1); WebBrowser1.outerHTML = "";
       }
 
    setTimeout("window.location.href='vw_inventario.php'",100);
     		 
}
</script>
</head>

<body onload="imprimir();">
  <div align="center"><?php echo $_GET['cod'];?></div>

   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>
   <svg id="barcode"></svg>

    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.3/dist/JsBarcode.all.min.js"></script>
    <script>
  
     JsBarcode("#barcode", "<?php echo $_GET['cod'];?>", {
  format: "codabar",
  width:"2",
  height:"25"
});
    </script>
</body>

</html>