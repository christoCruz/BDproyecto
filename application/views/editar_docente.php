<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>
<!-- Modal de Agregar -->
<div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Editar Docente </h5>
                        </div>
                        <form action="<?php echo base_url(); ?>tablas/actualizar_docente/<?php echo $IDDOCENTE; ?>" method="post" role="form" >
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Nombre del docente</label>
                                  <input type="text" class="form-control" placeholder="Nombre del docente" id="nomdocente" name="nomdocente" value="<?php echo $NOMDOCENTE; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Apellido del docente</label>
                                  <input type="text" class="form-control" placeholder="Apellido del docente" id="apedocente" name="apedocente" value="<?php echo $APEDOCENTE; ?>">
                                </div>
                              </div>
                            </div>
                          </div>
                            <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>proefesion del docente</label>
                                  <input type="text" class="form-control" placeholder="profesion" id="profdocente" name="profdocente" value="<?php echo $PROFDOCENTE; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Estado de docente</label>
                                  <input type="text" class="form-control" placeholder="Estado" id="estdocente" name="estdocente" value="<?php echo $ESTDOCENTE; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Tipo de contrato</label>
                                  <input type="text" class="form-control" placeholder="tipo de contrato" id="tipocontrato" name="tipocontrato" value="<?php echo $TIPOCONTRATO; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Fecha de infreso del docente</label>
                                  <input type="text" class="form-control" placeholder="Fecha" id="ingredocente" name="ingredocente" value="<?php echo $INGREDOCENTE; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Correo</label>
                                  <input type="text" class="form-control" placeholder="correo" id="correodocente" name="correodocente" value="<?php echo $CORREODOCENTE; ?>">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id departamento</label>
                                  <input type="text" class="form-control" placeholder="Id departamento" id="iddepto" name="iddepto" value="<?php echo $IDDEPTO; ?>">
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