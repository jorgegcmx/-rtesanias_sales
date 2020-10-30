<?php
include "../views/phpqrcode/qrlib.php";

$tempDir = EXAMPLE_TMP_SERVERPATH;

echo $param = str_replace("@", "&",$_GET['id']);
 
// we need to be sure ours script does not output anything!!!
// otherwise it will break up PNG binary!

ob_start("callback");

// here DB request or some processing
$codeText =$param;

// end of processing here
$debugLog = ob_get_contents();
ob_end_clean();

// outputs image directly into browser, as PNG stream
QRcode::png($codeText);



?>