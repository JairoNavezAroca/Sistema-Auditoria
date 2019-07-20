<?php 
  include("..//conexion2.php");
  session_start();
  $IdAuditoria = $_SESSION['id'];
  /**/
  $res = $conexion->query("select * from auditoria where IdAuditoria = $IdAuditoria");
  $Auditoria = $res->fetchAll(PDO::FETCH_OBJ);
  $Auditoria = $Auditoria[0];
  /**/
  $res = $conexion->query("select * from detalleobjetos d inner join ObjetoAuditable o on o.IdObjeto = d.IdObjeto where  IdAuditoria = $IdAuditoria");
  $ObjetosAuditables = $res->fetchAll(PDO::FETCH_OBJ);
	
 ?>
<h1 class="text-center card-header">Identificación del Objeto Auditable</h1>
<br>

<h3 class="font-weight-bold">1.Titulo de la Auditoria:</h3>
	<h4 class="pt-2 ml-4"><?php echo $Auditoria->Titulo; ?></h4>
<br>
<h3 class="font-weight-bold">2.Objeto(s) auditable(s):</h3>
	<?php 
		foreach ($ObjetosAuditables as $Objeto) {
			?>
				<h4 class="pt-2 ml-4"><?php echo $Objeto->Descripcion; ?></h4>
			 <?php
		}
	 ?>
<br>
<h3 class="font-weight-bold">3.Motivos para realizar la auditoria:</h3>
<?php echo $Auditoria->Motivos; ?>
<?php 
	/*
	<h4 class="pt-2 ml-4">La auditoría que se va a realizar en el departamento de Bienestar estudiantil del Colegio de Alto Rendimiento de La Libertad, es sumamente importante para la correcta utilización de las aplicaciones ofimáticas, ya que proporcionará las directrices necesarias para que los procesos de manipulación de información sean confiables y con un buen nivel de seguridad e eficiencia. Además se evaluará el hardware implementado en dicha área y que el software ofimático requerido cumpla con los requerimientos de licencias, entre otros.
	Existen cinco características para analizar los entornos ofimáticos de este departamento:
	</h4>
		<h4 class="pt-2 ml-5">*Las aplicaciones se distribuyen por las diferentes oficinas del departamento en lugar de centralizarse en una única ubicación.
		</h4>
		<h4 class="pt-2 ml-5">*La responsabilidad de llevar el control de ciertas funcionalidades de las aplicaciones recae sobre usuarios no dedicados profesionalmente a la informática, quienes pueden no comprender la importancia de estos y su correcta utilización.
		</h4>
		<h4 class="pt-2 ml-5">*El proceso de adquisición de hardware y aplicaciones puede no estar siguiendo un correcto plan.
		</h4>
		<h4 class="pt-2 ml-5">*La gestión de inventario dentro de la entidad puede no estar funcionando correctamente.
		</h4>
		<h4 class="pt-2 ml-5">Como consecuencia de esto se ha generado diversas problemáticas: Adquisiciones poco planeadas, utilización de copias ilegales de software, incorrecto control de inventario e ineficiente distribución de aplicaciones.
		</h4>
	<h4 class="pt-2 ml-4">
		El desarrollo de está auditoria además tiene como objetivo revisar y verificar que las unidades de cómputo estén siendo utilizados con los objetivos que presenta dicha entidad, observar que el lugar de ubicación de los mismo sea el más indicado, y verificar que el personal le esté dando un correcto uso.
		Por otro lado, verificar que la información es flexible, ágil y veraz, y que el diseño del área de trabajo, así como el ambiente del mismo sean las más óptimas.
	</h4>
	*/
?>