<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>

<div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Editar materia </h5>
                        </div>
                        <form action="<?php echo base_url(); ?>tablas/actualizar_materias/<?php echo $IDMATERIA; ?>" method="post" role="form" >
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Codigo materia</label>
                                  <input type="text" class="form-control" placeholder="codigo materia" id="codmateria" name="codmateria" value="<?php echo $CODMATERIA; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Nivel de materia</label>
                                  <input type="text" class="form-control" placeholder="Nivel de materia" id="nivelmateria" name="nivelmateria" value="<?php echo $NIVELMATERIA; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Nombre de materia</label>
                                  <input type="text" class="form-control" placeholder="Nombre de materia" id="nommateria" name="nommateria" value="<?php echo $NOMMATERIA; ?>">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Requisito</label>
                                  <input type="text" class="form-control" placeholder="Requisito" id="requisito" name="requisito" value="<?php echo $REQUISITO; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id carrera</label>
                                  <input type="text" class="form-control" placeholder="id carrera" id="idcarrera" name="idcarrera" value="<?php echo $IDCARRERA; ?>">
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