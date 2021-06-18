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
                <h5 class="modal-title">Editar Aulas </h5>
            </div>
            <form action="<?php echo base_url(); ?>tablas/actualizar_aulas/<?php echo $IDAULA; ?>" method="post" role="form" >
                <div class="modal-body">
                  <div class="row">
                  <div class="col-md-4 pr-1">
                    <div class="form-group">
                      <label>NUMERO DE AULA</label>
                      <input type="text" class="form-control" placeholder="Num. aula" id="numaula" name="numaula" value="<?php echo $NUMAULA; ?>">
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