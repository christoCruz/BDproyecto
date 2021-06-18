<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>

<div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Editar horas sociales </h5>
                        </div>
                        <form action="<?php echo base_url(); ?>tablas/actualizar_horas_sociales/<?php echo $IDHORASSOCIALES; ?>" method="post" role="form" >
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
                                  <label>Nombre del proyecto</label>
                                  <input type="text" class="form-control" placeholder="nombre del proyecto" id="nomproyecto" name="nomproyecto" value="<?php echo $NOMPROYECTO; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Duracion del proyecto</label>
                                  <input type="text" class="form-control" placeholder="Duracion" id="duracionproyec" name="duracionproyec" value="<?php echo $DURACIONPROYEC; ?>">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Estado del proyecto</label>
                                  <input type="text" class="form-control" placeholder="Estado del proyeto" id="estadoproyecto" name="estadoproyecto" value="<?php echo $ESTADOPROYECTO; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Ante-proyecto</label>
                                  <input type="text" class="form-control" placeholder="Ante-proyecto" id="anteproyecto" name="anteproyecto" value="<?php echo $ANTEPROYECTO; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Estado de ante proyecto</label>
                                  <input type="text" class="form-control" placeholder="Estado ante-proyecto" id="estadoanteproyecto" name="estadoanteproyecto" value="<?php echo $ESTADOANTEPROYECTO; ?>">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Comentario</label>
                                  <input type="text" class="form-control" placeholder="Comentario" id="comentariopro" name="comentariopro" value="<?php echo $COMENTARIOPRO; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Id docente</label>
                                  <input type="text" class="form-control" placeholder="Id docente" id="iddocente" name="iddocente" value="<?php echo $IDDOCENTE; ?>">
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