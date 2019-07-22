<script type="text/javascript">
  LaFuncionMagica();
  function LaFuncionMagica(){
    var pagina = "Partes/Proyecto.php";
    idControlador = "#Proyecto_Responsable";
    $.ajax({
      type: "POST",
      url: pagina,
      data: "",
      dataType: "html",
      beforeSend: function(){ },
      error: function(){
        alert("Error, Intente nuevamente");
      },
      success: function(data){
        $(idControlador).empty();
        $(idControlador).append(data);
      }
    });
  }
</script>

          <div class="container" style="padding-top: 50px;">
              
             <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                    <label for="Actividad">Descripción de Actividad</label>
                    <textarea class="form-control" id="AmenazActividadas" rows="2" name="Proyecto_DescripcionAct" id="Proyecto_DescripcionAct" form="formularioProyecto"></textarea>
                  </div>
               </div>
             </div>

             <div class="row justify-content-around">
               <div class="col-md-5">
                   <div class="md-form">
                      <input placeholder="Seleccionar Fecha" type="text" id="Proyecto_Fecha_Inicio" class="form-control datepicker" name="Proyecto_Fecha_Inicio" form="formularioProyecto">
                      <label for="Fecha_Inicio">Fecha de Inicio</label>
                    </div>
               </div>

               <div class="col-md-5">
                   <div class="md-form">
                      <input placeholder="Seleccionar Fecha" type="text" id="Proyecto_Fecha_Final" class="form-control datepicker" name="Proyecto_Fecha_Final" form="formularioProyecto">
                      <label for="Fecha_Final">Fecha Final</label>
                   </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-3">
                   <div class="form-group">
                    <label for="Probabilidad">Cantidad de Días</label>
                    <input type="number" id="Probabilidad" class="form-control" required="" name="Proyecto_HorasCantidad" id="Proyecto_HorasCantidad" form="formularioProyecto">
                  </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-6">
                 <select class="browser-default custom-select" id="Proyecto_Responsable" name="Proyecto_Responsable" form="formularioProyecto">
                 </select>
               </div>
             </div>


          </div>
     