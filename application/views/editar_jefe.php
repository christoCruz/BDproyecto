<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>

<div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Editar Jefe </h5>
                        </div>
                        <form action="<?php echo base_url(); ?>tablas/actualizar_jefe/<?php echo $IDJEFE; ?>" method="post" role="form" >
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Correo</label>
                                  <input type="text" class="form-control" placeholder="Correo" id="correojefe" name="correojefe" value="<?php echo $CORREOJEFE; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Nombre jefe</label>
                                  <input type="text" class="form-control" placeholder="Nombre jefe" id="nomjefe" name="nomjefe" value="<?php echo $NOMJEFE; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Apellido jefe</label>
                                  <input type="text" class="form-control" placeholder="Apellido" id="apejefe" name="apejefe" value="<?php echo $APEJEFE; ?>">
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