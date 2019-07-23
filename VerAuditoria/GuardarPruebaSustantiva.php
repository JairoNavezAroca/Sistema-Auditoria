<?php 
	
	if(isset($_POST["CI"]))
	{
			//$ConteoGeneral=explode(",", $_POST["CG"]);
			//$ConteoIndividual=explode(",", $_POST["CI"]);
			$ConteoGeneral= $_POST["CG"];
			$ConteoIndividual=$_POST["CI"];
			$Auditado=$_POST["Auditado"];
			$Fecha=$_POST["Fecha"];
			$Institucion=$_POST["Institucion"];
			$IdPrueba=$_POST["IdPrueba"];
			$Respuestas=$_POST["Respuestas"];

			$NormasG=$_POST["NG"];
			$PorcG=$_POST["PORC"];

			

			include("..//conexion.php");
			$sql = "INSERT INTO PruebaCumplimientoRealizada(Auditado,FechaEjecucion,institucion,IdPrueba,ConteoGeneral,ConteoIndividual,Normas,PorcG,Respuestas) VALUES('".$Auditado."','".$Fecha."','".$Institucion."','".$IdPrueba."','".$ConteoGeneral."','".$ConteoIndividual."','".$NormasG."','".$PorcG."','".$Respuestas."')";
			if($conexion->query($sql))
			{
				?> <h5>Registro Exitoso!</h5> <?php
			}else
				{
					?> <h5>Error en Registro :(</h5> <?php
				}
			
	}
 ?>