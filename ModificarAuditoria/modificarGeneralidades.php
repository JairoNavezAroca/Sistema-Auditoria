<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Generalidades de la Auditoria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- AQUI ADENTRO ESTÁ TODA LA INFO -->

        <?php include("generalidades.php"); ?>

        <form action="Modificar.php" id="formulario" method="POST" novalidate>
        </form>
        
        <!-- AQUI -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-sm">Guardar Cambios</button>
        <input type="submit" name="" form="formulario">
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->