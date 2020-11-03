<?php
include_once "../libraries/vendor/autoload.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->setPaper('A4', 'portrait');
ob_start();
include "printPDF.php";
$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();