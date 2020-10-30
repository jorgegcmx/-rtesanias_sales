
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <style>
    div.container{
    text-align: center;
    }
    </style>


<script language="javascript">
function imprimir()
{ 
    if ((navigator.appName == "Netscape")) {
        window.print() ;
       }else{            
     var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
     document.body.insertAdjacentHTML('beforeEnd', WebBrowser); WebBrowser1.ExecWB(6, -1); WebBrowser1.outerHTML = "";
       }
 
    setTimeout("window.location.href='vw_catalogo.php'",100);
     		 
}
</script>
</head>
<body  onload="imprimir();">
<table>
    <tr>
        <th colspan='10'><font size=20><?php echo $_GET['nombre']; ?></font></th>
    </tr>
    <tr>
        <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>


    </tr>
    <tr>
        <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>


    </tr>
    <tr>
        <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>


    </tr>
    <tr>
        <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>


    </tr>
    <tr>
        <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>


    </tr>
    <tr>
        <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>


    </tr>
    <tr>
        <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
    </tr>
    <tr>
        <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>


    </tr>
    <tr>
        <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
    </tr>
    <tr>
        <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>
       <td>
        <div class="container">
        <div class="top-right"><b><font size=8>$<?php echo $costo = $_GET['costo']; ?></font></b></div>
         <?php
$ourParamId = $_GET['id'];
echo '<img width="200px" height="200px"  src="QR.php?id=' . $ourParamId . '" />';
?>
         </div>
       </td>


    </tr>
</table>

</body>
</html>