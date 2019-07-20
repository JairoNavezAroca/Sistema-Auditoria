<script type="text/javascript">
  LaFuncionMagica("Rubros");
  LaFuncionMagica("ObjetosAuditables");
  LaFuncionMagica("EquipoAuditor");
  LaFuncionMagica("MarcosInternacionales");
  LaFuncionMagica("MarcosNacionales");
  LaFuncionMagica("IdEmpresa");
  LaFuncionMagica("JefeId");
  function LaFuncionMagica(idControlador){
    var pagina = "Partes/" + idControlador + ".php";
    idControlador = "#" + idControlador;
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

  function ObtenerDatosEmpresa(){
    var pagina = "Partes/DatosEmpresa.php";
    var id = document.getElementById("IdEmpresa");
    if(id.value != -1){
      $.ajax({
        type: "POST",
        url: pagina,
        data: "id=" + id.value,
        dataType: "html",
        beforeSend: function(){ },
        error: function(){
          alert("Error, Intente nuevamente");
        },
        success: function(data){
          var array = data.split('&');
          var NombreEmpresa = document.getElementById("NombreEmpresa");
          NombreEmpresa.value = array[0];
          var Mision = document.getElementById("Mision");
          Mision.Value = array[1];
          var Vision = document.getElementById("Vision");
          Vision.value = array[2];
          var Estrategias = document.getElementById("Estrategias");
          Estrategias.value = array[3];
          var Ubicacion = document.getElementById("Ubicacion");
          Ubicacion.value = array[4];
        }
      });
    }
    else{
        var NombreEmpresa = document.getElementById("NombreEmpresa");
        NombreEmpresa.value = "";
        var Mision = document.getElementById("Mision");
        Mision.Value = "";
        var Vision = document.getElementById("Vision");
        Vision.value = "";
        var Estrategias = document.getElementById("Estrategias");
        Estrategias.value = "";
        var Ubicacion = document.getElementById("Ubicacion");
        Ubicacion.value = "";

    }
  }

</script>

<form action="sd.asd" method="POST">
<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel" style="margin-top: 50px;">
 
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!--First slide-->
    <div class="carousel-item active">
      <div class="d-block w-100">
          <div class="container" style="padding-top: 50px;">
             
             <div class="row justify-content-center mt-2">
                <H2 class ="text-center">Generalidades de la Entidad/Empresa</H2>
             </div>

             <hr>

             <div class="row">
                <div class="col-md-6">
                    <div class="md-form">
                      <select class="mdb-select md-form colorful-select dropdown-primary" searchable="Search here.." id="IdEmpresa" name="IdEmpresa" form="formulario" onChange="return ObtenerDatosEmpresa()">
                      </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <select class="mdb-select md-form" id="Rubros" name="Rubro" form="formulario">
                    </select>
                </div>
             </div>
             <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                    <label >Nombre de la Empresa</label>
                    <input type="text" class="form-control" id="NombreEmpresa" name="NombreEmpresa" form="formulario" >
                  </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                    <label>Misión</label>
                    <textarea class="form-control" rows="2" id="Mision" name="Mision" form="formulario"></textarea>
                  </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                    <label>Visión</label>
                    <textarea class="form-control" rows="2" id="Vision" name="Vision" form="formulario"></textarea>
                  </div>
               </div>
             </div>

               <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                    <label for="Estrategias">Estrategias</label>
                    <textarea class="form-control" rows="8" id="Estrategias" name="Estrategias" form="formulario"></textarea>
                  </div>
               </div>
             </div>


              <div class="row">
                   <div class="col-md-12">
                      <div class="md-form">
                        <input type="text" class="form-control" required="" id="Ubicacion" name="Ubicacion" form="formulario">
                        <label for="Ubicación">Ubicación Geográfica</label>
                       </div>  
                   </div> 
              </div>

              <div class="row justify-content-center">
                <div class="col-md-4">
                      <form class="md-form">
                        <div class="file-field">
                          <div class="d-flex justify-content-center">
                            <div class="btn btn-mdb-color btn-rounded float-left">
                              <span>Cargar Organigrama</span>
                              <input type="file" id="Organigrama" name="Organigrama" form="formulario">
                            </div>
                          </div>
                        </div>
                      </form>
                </div>
              </div>

              <div class="row justify-content-center">
                  <div class="col-md-2">
                    <a type="button" class="btn btn-primary" data-slide="next"
                      href="#carousel-example-1z" role="button"
                    >Siguiente</a>
                  </div>
              </div>

              <br><br><br>

          </div>
      </div>
      
    </div>
    <!--/First slide-->
    <!--Second slide-->
    <div class="carousel-item">
            <div class="d-block w-100">
          <div class="container" style="padding-top: 50px;">
             
             <div class="row justify-content-center mt-2">
                <H2 class ="text-center">Datos Generales</H2>
             </div>

             <hr>

             <div class=" row">
                <div class="col-md-6">
                    <div class="md-form">
                      <input type="text"class="form-control" required="" id="Titulo" name="Titulo" form="formulario">
                      <label for="Título">Título de la Auditoría</label>
                    </div>
                </div>
             </div>

             <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                    <label for="Motivos">Motivos para realizar la auditoria</label>
                    <textarea class="form-control" id="Motivos" rows="2" id="Motivos" name="Motivos" form="formulario"></textarea>
                  </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-12">
                    <select class="mdb-select md-form colorful-select dropdown-primary" multiple searchable="Search here.." id="ObjetosAuditables" name="ObjetosAuditables[]" form="formulario">
                    </select>
               </div>
             </div>

              
              <div class="row justify-content-center">
                  <div class="col-md-2">
                    <a type="button" class="btn btn-primary" data-slide="prev"
                      href="#carousel-example-1z" role="button"
                    >Atrás</a>
                  </div>
                  <div class="col-sm-2"></div>
                  <div class="col-md-2">
                    <a type="button" class="btn btn-primary" data-slide="next"
                      href="#carousel-example-1z" role="button"
                    >Siguiente</a>
                  </div>
              </div>

              <br><br><br>

          </div>
      </div>
    </div>
    <!--/Second slide-->
    <!--Third slide-->
    <div class="carousel-item">
        <div class="d-block w-100">
          <div class="container" style="padding-top: 50px;">
             <div class="row justify-content-center mt-2">
                <H2 class ="text-center">Selección del equipo auditor</H2>
             </div>

             <hr>

             <div class=" row">
                <div class="col-md-6">
                    <div class="md-form">
                      <select class="mdb-select md-form colorful-select dropdown-primary"  size="3" searchable="Search here.." id="JefeId" name="JefeId" form="formulario">
                      </select>
                    </div>
                </div>
             </div>


             <div class="row">
               <div class="col-md-12">
                    <select class="mdb-select md-form colorful-select dropdown-primary"  size="3" multiple searchable="Search here.." id="EquipoAuditor" name="EquipoAuditor[]" form="formulario">
                    </select>
               </div>
             </div>

              
              <div class="row justify-content-center">
                  <div class="col-md-2">
                    <a type="button" class="btn btn-primary" data-slide="prev"
                      href="#carousel-example-1z" role="button"
                    >Atrás</a>
                  </div>
                  <div class="col-sm-2"></div>
                  <div class="col-md-2">
                    <a type="button" class="btn btn-primary" data-slide="next"
                      href="#carousel-example-1z" role="button"
                    >Siguiente</a>
                  </div>
              </div>

              <br><br><br>

          </div>
      </div>
    </div>
    <!--/Third slide-->


  <!--Fourth slide-->
    <div class="carousel-item">
        <div class="d-block w-100">
          <div class="container" style="padding-top: 50px;">
             <div class="row justify-content-center mt-2">
                <H2 class ="text-center">Marco Referencial Internacional</H2>
             </div>

            <br>
             <div class="row">
               <div class="col-md-12">
                    <select class="mdb-select md-form colorful-select dropdown-primary" multiple searchable="Search here.." id="MarcosInternacionales" name="MarcosInternacionales[]" form="formulario">
                    </select>
               </div>
             </div>

            <!-- Editable table -->
            <div class="card">
              <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Agregadas</h3>
              <div class="card-body">
                <div id="table" class="table-editable">
                  <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
                        class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                  <table class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                      <tr>
                        <th class="text-center">Código</th>
                        <th class="text-center">Descripción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="pt-3-half" contenteditable="true">APO13.02</td>
                        <td class="pt-3-half" contenteditable="true">Definir y gestionar un plan de tratamiento del riesgo de la seguridad de la información.</td>
                        <td class="pt-3-half">
                          <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up"
                                aria-hidden="true"></i></a></span>
                          <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down"
                                aria-hidden="true"></i></a></span>
                        </td>
                        <td>
                          <span class="table-remove"><button type="button"
                              class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                        </td>
                      </tr>
                      <!-- This is our clonable table line -->
                      <tr>
                        <td class="pt-3-half" contenteditable="true">EDM04.01</td>
                        <td class="pt-3-half" contenteditable="true">Evaluar la gestión de Recursos</td>
                        <td class="pt-3-half">
                          <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up"
                                aria-hidden="true"></i></a></span>
                          <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down"
                                aria-hidden="true"></i></a></span>
                        </td>
                        <td>
                          <span class="table-remove"><button type="button"
                              class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                        </td>
                      </tr>
                      <!-- This is our clonable table line -->
                      <tr>
                        <td class="pt-3-half" contenteditable="true">DSS04</td>
                        <td class="pt-3-half" contenteditable="true">Gestionar la continuidad</td>
                        
                        <td class="pt-3-half">
                          <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up"
                                aria-hidden="true"></i></a></span>
                          <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down"
                                aria-hidden="true"></i></a></span>
                        </td>
                        <td>
                          <span class="table-remove"><button type="button"
                              class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                        </td>
                      </tr>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- Editable table -->             
            <br><br>
              <div class="row justify-content-center">
                  <div class="col-md-2">
                    <a type="button" class="btn btn-primary" data-slide="prev"
                      href="#carousel-example-1z" role="button"
                    >Atrás</a>
                  </div>
                  <div class="col-sm-2"></div>
                  <div class="col-md-2">
                    <a type="button" class="btn btn-primary" data-slide="next"
                      href="#carousel-example-1z" role="button"
                    >Siguiente</a>
                  </div>
              </div>

              <br><br><br><br><br><br><br><br>

          </div>
      </div>
    </div>


  <!--Fiveth slide-->
    <div class="carousel-item">
        <div class="d-block w-100">
          <div class="container" style="padding-top: 50px;">
             
             <div class="row justify-content-center mt-2">
                <H2 class ="text-center">Marco Referencial Nacional</H2>
             </div>

             <br>
             
             <div class="row">
               <div class="col-md-12">
                    <select class="mdb-select md-form colorful-select dropdown-primary" multiple searchable="Search here.." id="MarcosNacionales" name="MarcosNacionales[]" form="formulario">
                    </select>
               </div>
             </div>

            <!-- Editable table -->
            <div class="card">
              <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Agregadas</h3>
              <div class="card-body">
                <div id="table" class="table-editable">
                  <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
                        class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                  <table class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                      <tr>
                        <th class="text-center">Código</th>
                        <th class="text-center">Descripción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="pt-3-half" contenteditable="true">NTP-ISO/IEC 17799</td>
                        <td class="pt-3-half" contenteditable="true">Tecnología de Información.Código de Buenas prácticas para la gestión de Seguridad.</td>
                        <td class="pt-3-half">
                          <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up"
                                aria-hidden="true"></i></a></span>
                          <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down"
                                aria-hidden="true"></i></a></span>
                        </td>
                        <td>
                          <span class="table-remove"><button type="button"
                              class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- Editable table -->             
            <br><br>
              <div class="row justify-content-center">
                  <div class="col-md-2">
                    <a type="button" class="btn btn-primary" data-slide="prev"
                      href="#carousel-example-1z" role="button"
                    >Atrás</a>
                  </div>
                  <div class="col-sm-2"></div>
                  <div class="col-md-2">
                    <a type="button" class="btn btn-primary" data-slide="next"
                      href="#carousel-example-1z" role="button"
                    >Siguiente</a>
                  </div>
              </div>

              <br><br><br><br><br><br><br><br>

          </div>
      </div>
    </div>
 <!--/.Fiveth-->

    <!--Sixth slide-->
    <div class="carousel-item ">
      <div class="d-block w-100">
          <div class="container" style="padding-top: 50px;">
             
             <div class="row justify-content-center mt-2">
                <H2 class ="text-center">Marco Referencial institucional</H2>
             </div>

             <hr>

             
              <div class="row justify-content-center">
                <div class="col-md-4">
                      <form class="md-form">
                        <div class="file-field">
                          <div class="d-flex justify-content-center">
                            <div class="btn btn-mdb-color btn-rounded float-left">
                              <span>Cargar MOF</span>
                              <input type="file" id="Mof" name="Mof" form="formulario">
                            </div>
                          </div>
                        </div>
                      </form>
                </div>
              </div>

                            <div class="row justify-content-center">
                <div class="col-md-4">
                      <form class="md-form">
                        <div class="file-field">
                          <div class="d-flex justify-content-center">
                            <div class="btn btn-mdb-color btn-rounded float-left">
                              <span>Cargar ROF</span>
                              <input type="file" id="Rof" name="Rof" form="formulario">
                            </div>
                          </div>
                        </div>
                      </form>
                </div>
              </div>

              <div class="row justify-content-center">
                  <div class="col-md-3">
                    <a type="button" class="btn btn-primary" data-slide="prev"
                      href="../PanelAdmin/main.php" role="button">
                    Registrar Nueva Auditoria</a>
                    <input type="submit" name="" form="formulario">
                  </div>
              </div>

              <br><br><br>

          </div>
      </div>
      
    </div>
    <!--/Sixth slide-->

  </div>
  <!--/.Slides-->
  
</div>
<!--/.Carousel Wrapper-->

</form>
