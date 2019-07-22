<!-- Central Modal Small -->
<div class="modal fade" id="entregable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Entregables</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- AQUI ADENTRO ESTÁ TODA LA INFO -->

       <div class="container">
         <div class="row justify-content-around">
           <div class="col-md-5">
             <div class="form-group">
                    <label for="nombreEntregable">Descripción de Entregable</label>
                    <textarea class="form-control" form="formularioEntregables" id="nombreEntregable" name="nombreEntregable" rows="2"></textarea>
              </div>
           </div>

           <div class="col-md-5">
             <form class="md-form">
                        <div class="file-field">
                          <div class="d-flex justify-content-center">
                            <div class="btn btn-mdb-color btn-rounded float-left">
                              <span>Cargar Documento</span>
                              <input type="file" id="Doc" form="formularioEntregables" id="archivoEntregable" name="archivoEntregable">
                            </div>
                          </div>
                        </div>
              </form>
           </div>
         </div>
       </div>

        <!-- AQUI -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
        <form action="_entregables.php" id="formularioEntregables" method="POST" novalidate>
          <input type="submit" name="" value="Guardar Cambios" class="btn btn-primary btn-sm">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->