<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>

 <div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Editar registro de estudiante </h5>
                        </div>
                        <form action="<?php echo base_url(); ?>tablas/actualizar_registro_estudiante/<?php echo $IDREGISTROESTU; ?>" method="post" role="form" >
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id inscripcion</label>
                                  <input type="text" class="form-control" placeholder="id inscripcion" id="idincripcion" name="idincripcion" value="<?php echo $IDINCRIPCION; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>estado de materia</label>
                                  <input type="text" class="form-control" placeholder="estado de materia" id="estadomateria" name="estadomateria" value="<?php echo $ESTADOMATERIA; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>nota de materia</label>
                                  <input type="text" class="form-control" placeholder="nota" id="notamateria" name="notamateria" value="<?php echo $NOTAMATERIA; ?>">
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