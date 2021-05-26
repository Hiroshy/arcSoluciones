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
 //obtenermos el id 
 $id_certificado=$_GET['id'];
 $info_certificado=new usuarios();
 $string="SELECT * FROM certificados_generados WHERE id_certificados='$id_certificado'";
 $info_certificado=$info_certificado->sqlquery($string);

 $id=$info_certificado[0]['id_certificados'];
 $nombre=$info_certificado[0]['nombre'];
 $curp=$info_certificado[0]['curp'];
 $ocupacion=$info_certificado[0]['puesto'];
 $puesto=$info_certificado[0]['ocupacion'];
 $curso=$info_certificado[0]['curso'];
 $finalizo=$info_certificado[0]['dia_finalizado'];
 $horas=$info_certificado[0]['horas'];
 $profesor=$info_certificado[0]['profesor'];
 $titulo_profesor=$info_certificado[0]['titulo_profesor'];
 $codSEP=$info_certificado[0]['codSEP'];
 $firma=$info_certificado[0]['firma'];
 $file=$info_certificado[0]['plantilla'];
 $id_empresa_dirigida=$info_certificado[0]['id_empresa_dirigida'];
 $dia_empezo_c=$info_certificado[0]['dia_empezo_c'];
 $dia_termino_c=$info_certificado[0]['dia_termino_c'];
 $area_tematica_curso=$info_certificado[0]['area_tematica_curso'];
 
 $repr_legal=$info_certificado[0]['repr_legal'];
 $repr_trabajadores=$info_certificado[0]['repr_trabajadores'];

 $dia_empezo_c=strtotime($dia_empezo_c);
 $dia_termino_c=strtotime($dia_termino_c);

 $sacar_empresa_logo=new usuarios();
 $string="SELECT logo FROM empresas WHERE id='$id_empresa_dirigida'";
 $sacar_empresa_logo=$sacar_empresa_logo->sqlquery($string);
 $empresa=$sacar_empresa_logo[0]['logo'];

 date_default_timezone_set("America/Mexico_City");
 setlocale(LC_TIME, "spanish");
 $creado_el=strftime("%A, %d de %B del %Y");

 
// Guardamos el contenido de contenido.php en la variable html

ob_start();
//require "$file";
require "ds3.php";
$html = ob_get_clean();

// Inicializamos dompdf
$dompdf = new Dompdf();
// Le pasamos el html a dompdf
$dompdf->loadHtml($html);
// Colocamos als propiedades de la hoja
$dompdf->setPaper("A4", "portrait");
// Escribimos el html en el PDF
$dompdf->render();
// Ponemos el PDF en el browser
$dompdf->stream("DC3_".$nombre.".pdf");

?>
