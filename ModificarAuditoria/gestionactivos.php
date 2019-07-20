<!-- Central Modal Small -->
<div class="modal fade" id="activos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Registro de Nuevo Activo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- AQUI ADENTRO ESTÁ TODA LA INFO -->

        <?php include("activos.php"); ?>

        <!-- AQUI -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
        <form action="_activos.php" id="formularioActivos" method="POST" novalidate>
          <input type="submit" name="" value="Guardar Cambios" class="btn btn-primary btn-sm">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->