<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>

<div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Editar horario </h5>
                        </div>
                        <form action="<?php echo base_url(); ?>tablas/actualizar_horarios_grupos/<?php echo $IDHORARIO_GRU; ?>" method="post" role="form" >
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id grupo</label>
                                  <input type="text" class="form-control" placeholder="Id de grupo" id="idgrupos" name="idgrupos" value="<?php echo $IDGRUPOS; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Dia</label>
                                  <input type="text" class="form-control" placeholder="dia" id="diahorario" name="diahorario" value="<?php echo $DIAHORARIO; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Hora</label>
                                  <input type="text" class="form-control" placeholder="Hora" id="horashorario" name="horashorario" value="<?php echo $HORASHORARIO; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Id aula</label>
                                  <input type="text" class="form-control" placeholder="Id Aula" id="idaula" name="idaula" value="<?php echo $IDAULA; ?>">
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