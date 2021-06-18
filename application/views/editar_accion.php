<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>

<!-- Modal Modificar -->
<div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Accion </h5>
            </div>
            <form action="<?php echo base_url(); ?>tablas/actualizar_accion/<?php echo $IDACCION; ?>" method="post" role="form" >
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Fecha de inicio</label>
                        <input type="date" value="<?php echo $FECHAINICIO; ?>" class="form-control datepicker" placeholder="Num. aula" id="fechainicio" name="fechainicio">
                      </div>
                    </div>
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Fecha de fin</label>
                        <input type="date" value="<?php echo $FECHAFINAL; ?>" class="form-control datepicker" placeholder="Num. aula" id="fechafinal" name="fechafinal">
                      </div>
                    </div>
                  </div>
                <div class="modal-footer">
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Editar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>