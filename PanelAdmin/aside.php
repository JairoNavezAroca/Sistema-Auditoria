<style>
   .tema:hover{
    border: solid 1px #2196f3;
 } 
    .tema{
    border: solid 1px white;
    border-radius: 4%;
    height:50px;
    margin-left: 1px;
    margin-right: 1px;
 } 

</style>

<script>
  function visto(id){
    var t1='#';
    t1=t1.concat(String(id));
    $(".noVisto").addClass('white-text');
    $(t1).removeClass('white-text');
    $(t1).addClass('green-text');
  }
</script>


<div class="container mt-4" id="titulo">
           <div class="row align-items-center justify-content-center" >

            <div class="col-sm-12 text-center teal-text" >
                <i class="fas fa-dna fa-2x" id="icono" ></i>
            </div>

            <div class="col-sd-12 black-text">
                <h3>Biología</h3>
            </div>
                              
          </div>
          <hr class="blue">
  </div>

<div id="cuerpo">
                        <!--Accordion wrapper-->
              <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true" >

                <!-- Accordion card -->
                <div id="card" class="mb-2">

                  <!-- Card header -->
                  <div class="primary-color" role="tab" id="headingOne1">
                    <div class="container-fluid">
                      <a class="row collapsed align-items-center white-text" data-toggle="collapse" data-parent="#accordionEx" href="#sub"
                      aria-expanded="false" aria-controls="sub" style="height: 50px;">
                        <div class="col-8">
                          I - UNIDAD
                        </div>
                        <div class="col-2">
                         0%
                        </div>
                        <div class="col-1">
                          <i class="fas fa-angle-down rotate-icon"></i>
                        </div>
                      </a>
                    </div>
                  </div>

                  <!-- Card body -->
                  <div id="sub" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx">
                    <div id="body" class="grey lighten-4 pb-1 pt-2">
                      
                      <h5 style="font-weight: bold; text-align: center;" >Teorías sobre el origen y la evolución de la vida</h5>

                      <div class="container-fluid">
                       
                        <div class="row white mb-2 tema align-items-center">
                          <div class="col-8" style=" cursor: pointer; color: black;" onclick="visto('viendo1')">
                            Introduccion
                          </div>

                          <div class="col-2" style=" cursor: pointer;" onclick="visto('viendo1')" >
                              <i class="fas fa-eye green-text noVisto" id="viendo1" ></i>
                          </div>

                          <div class="form-check col-2">
                              <input type="checkbox" class="form-check-input" id="materialUnchecked">
                              <label class="form-check-label" for="materialUnchecked">
                          </div>
                        </div>

                         <div class="row white mb-2 tema align-items-center">
                          <div class="col-8" style="cursor: pointer;" onclick="visto('viendo2')">
                            Teorías sobre el origen de la vida
                          </div>

                          <div class="col-2" style=" cursor: pointer;" onclick="visto('viendo2')">
                              <i class="fas fa-eye white-text noVisto" id="viendo2"></i>
                          </div>

                           <div class="form-check col-2">
                              <input type="checkbox" class="form-check-input" id="2">
                              <label class="form-check-label" for="2">
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <!-- Accordion card -->

                <!-- Accordion card -->
                <div id="card">

                  <!-- Card header -->
                  <div class="primary-color" role="tab" id="headingOne2" >
                    <div class="container-fluid">
                      <a class="row collapsed align-items-center white-text" data-toggle="collapse" data-parent="#accordionEx" href="#sub2"
                      aria-expanded="false" aria-controls="sub2" style="height: 50px;">
                        <div class="col-8">
                          II - UNIDAD
                        </div>
                        <div class="col-2">
                         0%
                        </div>
                        <div class="col-1">
                          <i class="fas fa-angle-down rotate-icon"></i>
                        </div>
                      </a>
                    </div>
                  </div>

                  <!-- Card body -->
                  <div id="sub2" class="collapse" role="tabpanel" aria-labelledby="headingOne2" data-parent="#accordionEx">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                      wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                      eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                      assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                      nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                      farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                      labore sustainable VHS.
                    </div>
                  </div>

                </div>

              

              </div>
              <!-- Accordion wrapper -->
  </div>