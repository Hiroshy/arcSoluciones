<?php
// include autoloader
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// Guardamos el contenido de contenido.php en la variable html
ob_start();
require "index.php";
$html = ob_get_clean();
// Inicializamos dompdf
$dompdf = new Dompdf();

// Le pasamos el html a dompdf
$dompdf->loadHtml($html);
// Colocamos als propiedades de la hoja
$dompdf->setPaper("letter", "landscape");
// Escribimos el html en el PDF
$dompdf->render();
// Ponemos el PDF en el browser
$dompdf->stream();


?>