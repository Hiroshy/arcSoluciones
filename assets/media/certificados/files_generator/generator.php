<?php
require_once 'dompdf/autoload.inc.php';
include_once("../../../../admin-/modelo/bd.php");
include_once("../../../../admin-/modelo/info.class.php");
include_once("../../../../admin-/modelo/interesado.class.php");
include_once("../../../../admin-/modelo/categoria.class.php");
include_once("../../../../admin-/modelo/producto.class.php");
include_once("../../../../admin-/modelo/usuarios.class.php");
// reference the Dompdf namespace
use Dompdf\Dompdf;
 date_default_timezone_set("America/Mexico_City");
 setlocale(LC_TIME, "spanish");
 $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 //obtenermos el id 
 $id_certificado=$_GET['id'];
 
 $info_certificado=new usuarios(); 
 $productos_query=new usuarios();
 
 $string="SELECT * FROM certificados_generados WHERE id_certificados='$id_certificado'";
 $info_certificado=$info_certificado->sqlquery($string);

 $id=$info_certificado[0]['id_certificados'];
 $nombre=$info_certificado[0]['nombre'];
 $curso=$info_certificado[0]['curso'];
 $finalizo=$info_certificado[0]['dia_finalizado'];
 $el_dia=date("d", strtotime($info_certificado[0]['dia_termino_c']));
 $el_mes=date("n", strtotime($info_certificado[0]['dia_termino_c']));
 $el_mes=$meses[$el_mes-1];
 $el_ano=date("Y", strtotime($info_certificado[0]['dia_termino_c']));
 $horas=$info_certificado[0]['horas'];
 $profesor=$info_certificado[0]['profesor'];
 $titulo_profesor=$info_certificado[0]['titulo_profesor'];
 $codSEP=$info_certificado[0]['codSEP'];
 $firma=$info_certificado[0]['firma'];
 $file=$info_certificado[0]['plantilla'];
 $insignia=$info_certificado[0]['id_curso'];
 

 $string="SELECT sello FROM `producto` WHERE id=$insignia";
 $producto_=$productos_query->sqlquery($string);
 
 $insignia_sello=$producto_[0]['sello']; 


 $creado_el=strftime("%d de %B del %Y");
 $el_dia_creado=date("d");
 $el_mes_creado=date("n");
 $el_mes_creado=$meses[$el_mes_creado-1]; 
 $el_ano_creado=date("Y");
 
// Guardamos el contenido de contenido.php en la variable html

ob_start();
require "$file";

$html = ob_get_clean();
// Inicializamos dompdf
$dompdf = new Dompdf();
$dompdf->set_option('dpi', 256);
// Le pasamos el html a dompdf
$dompdf->loadHtml($html);
// Colocamos als propiedades de la hoja
$dompdf->setPaper("letter", "landscape");
// Escribimos el html en el PDF
$dompdf->render();
// Ponemos el PDF en el browser
$dompdf->stream($nombre."_Reconocimiento.pdf");


?>
