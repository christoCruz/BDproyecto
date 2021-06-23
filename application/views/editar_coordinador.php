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
                          <h5 class="modal-title">Editar Coordinador </h5>
                        </div>
                        <form action="<?php echo base_url(); ?>tablas/actualizar_coordinador/<?php echo $IDCOORDINADOR; ?>" method="post" role="form" >
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id carrera</label>
                                  <select  id="idcarrera" name="idcarrera" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Carrera --</option>
                                    <?php
                                       $querycc= $this->db->query("SELECT * FROM CARRERA ");
                                            foreach ($querycc->result() as $cc){
                                                ?>
                                        <option value="<?php echo $cc->IDCARRERA ?>"  <?php if($IDCARRERA==$cc->IDCARRERA){  echo 'selected="selected"';} ?>><?php echo $cc->NOMCARRERA?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Correo</label>
                                  <input type="text" class="form-control" placeholder="correo" id="correocoor" name="correocoor" value="<?php echo $CORREOCOOR; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 ">
                                <div class="form-group">
                                  <label>Nombre coordinador</label>
                                  <input type="text" class="form-control" placeholder="Nombre del coordinador" id="nomcoor" name="nomcoor" value="<?php echo $NOMCOOR; ?>">
                                </div>
                              </div>
                              
                            </div>
                            <div class="row">
                              <div class="col-md-4 ">
                                <div class="form-group">
                                  <label>Apellido</label>
                                  <input type="text" class="form-control" placeholder="apellido" id="apecoor" name="apecoor" value="<?php echo $APECOOR; ?>">
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
                <!-- Fin de Modal -->