<?php

require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

use PhpOffice\PhpWord\TemplateProcessor;

$templateWord = new TemplateProcessor('PlantillaReporte.docx');
 
$nombre = "Sandra S.L.";
$direccion = "Mi dirección";
$municipio = "Mrd";
$provincia = "Bdj";
$cp = "02541";
$telefono = "24536784";
include("llenarReporte.php")

// --- Asignamos valores a la plantilla
//$templateWord->setValue('nombre_empresa',$nombre);
//$templateWord->setValue('direccion_empresa',$direccion);
//$templateWord->setValue('municipio_empresa',$municipio);
//$templateWord->setValue('provincia_empresa',$provincia);
//$templateWord->setValue('cp_empresa',$cp);
//$templateWord->setValue('telefono_empresa',$telefono);

// --- Guardamos el documento
$templateWord->saveAs('ReporteAuditoria.docx');

header("Content-Disposition: attachment; filename=ReporteAuditoria.docx; charset=iso-8859-1");
echo file_get_contents('ReporteAuditoria.docx');
        
?>