<script type="text/javascript">
  LaFuncionMagica();
  function LaFuncionMagica(){
    var pagina = "Partes/Riesgos.php";
    idControladorx = "#Riesgos_Riesgos";
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
        $(idControladorx).empty();
        $(idControladorx).append(data);
      }
    });
  }
</script>

<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel" >
 
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!--First slide-->
    <div class="carousel-item active">
      <div class="d-block w-100">
          <div class="container" style="padding-top: 50px;">
              
             <div class=" row">
                <div class="col-md-6">
                    <select class="mdb-select md-form" id="Riesgos_Riesgos" name="Riesgos_Activo" form="formularioRiesgos">
                    </select>
                </div>
             </div>

             <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                    <label for="Amenazas">Amenazas y vulnerabilidades</label>
                    <textarea class="form-control" id="Amenazas" rows="2" id="Riesgos_Amenaza" name="Riesgos_Amenaza" form="formularioRiesgos"></textarea>
                  </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                    <label for="Impacto">Impacto</label>
                    <textarea class="form-control" rows="2" id="Riesgos_Impacto" name="Riesgos_Impacto" form="formularioRiesgos"></textarea>
                  </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-3">
                   <div class="form-group">
                    <label for="Probabilidad">Probabilidad de Ocurrencia (%)</label>
                    <input type="text" id="Riesgos_Probabilidad" class="form-control" required="" name="Riesgos_Probabilidad" form="formularioRiesgos">
                  </div>
               </div>
             </div>

          </div>
      </div>
      
    </div>
    <!--/First slide-->
    

  </div>
  <!--/.Slides-->
  
</div>
<!--/.Carousel Wrapper-->

