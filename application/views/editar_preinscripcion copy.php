<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>

<div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Editar preinscripcion </h5>
                        </div>
                        <form action="<?php echo base_url(); ?>tablas/actualizar_preinscripcion/<?php echo $IDPREINSCRIPCION; ?>" method="post" role="form" >
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id estudiante</label>
                                  <input type="text" class="form-control" placeholder="id estudiante" id="idestudiante" name="idestudiante" value="<?php echo $IDESTUDIANTE; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Id materia</label>
                                  <input type="text" class="form-control" placeholder="id materia" id="idmateria" name="idmateria" value="<?php echo $IDMATERIA; ?>">
                                </div>
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