<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>

   <div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Editar usuario </h5>
                        </div>
                        <form action="<?php echo base_url(); ?>tablas/actualizar_usuario/<?php echo $IDUSUARIO; ?>" method="post" role="form" >
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Usuario</label>
                                  <input type="text" class="form-control" placeholder="usuario" id="usuario" name="usuario" value="<?php echo $USUARIO; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Contraseña</label>
                                  <input type="text" class="form-control" placeholder="contraseña" id="password" name="password" value="<?php echo $PASSWORD; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>tipo de usuario</label>
                                  <input type="text" class="form-control" placeholder="tipo usuario" id="tipousuairo" name="tipousuairo" value="<?php echo $TIPOUSUARIO; ?>">
                                </div>
                              </div>
                            <div class="row">
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Estado de usuario</label>
                                  <input type="text" class="form-control" placeholder="estado de usuario" id="estadousuario" name="estadousuario" value="<?php echo $ESTADOUSUARIO; ?>">
                                </div>
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