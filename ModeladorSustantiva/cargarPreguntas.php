
	<option value="" disabled selected>Pregunta Relacionada</option>
					
					<?php 
						include("..//conexion.php");
						$IdPrueba=$_POST["IdPrueba"];
						$sql = "SELECT IdDetalle,Pregunta FROM detallepruebacumplimiento WHERE IdPrueba=$IdPrueba";
						$sql = $conexion->query($sql);
							while($row=mysqli_fetch_array($sql))
							{
								
					?>
		 					<option value="<?php echo $row[0] ?>"  ><?php echo $row[1]; ?></option>

					<?php
							}

					?>
								  
