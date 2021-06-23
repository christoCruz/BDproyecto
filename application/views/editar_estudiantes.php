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
                          <h5 class="modal-title">Editar estudiante </h5>
                        </div>
                        <form action="<?php echo base_url(); ?>tablas/actualizar_estudiantes/<?php echo $IDESTUDIANTE; ?>" method="post" role="form" >
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id carrera</label>
                                  <select  id="idcarrera" name="idcarrera" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Carrera --</option>
                                    <?php
                                       $queryce= $this->db->query("SELECT * FROM CARRERA ");
                                            foreach ($queryce->result() as $cc){
                                                ?>
                                        <option value="<?php echo $cc->IDCARRERA ?>" <?php if($IDCARRERA==$cc->IDCARRERA){  echo 'selected="selected"';} ?> ><?php echo $cc->NOMCARRERA?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Nombre del estudiante</label>
                                  <input type="text" class="form-control" placeholder="Nombre" id="nomestudiante" name="nomestudiante" value="<?php echo $NOMESTUDIANTE; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Apellido</label>
                                  <input type="text" class="form-control" placeholder="Apellido" id="apelestudiante" name="apelestudiante" value="<?php echo $APELESTUDIANTE; ?>">
                                </div>
                              </div>
                            </div>
                          </div>
                            <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Carnet</label>
                                  <input type="text" class="form-control" placeholder="carnet" id="carnetestu" name="carnetestu" value="<?php echo $CARNETESTU; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Correo del estudiante</label>
                                  <input type="text" class="form-control" placeholder="correo" id="correoestu" name="correoestu" value="<?php echo $CORREOESTU; ?>">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Telefono del estudiante</label>
                                  <input type="text" class="form-control" placeholder="Telefono" id="telestudiante" name="telestudiante" value="<?php echo $TELESTUDIANTE; ?>">
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