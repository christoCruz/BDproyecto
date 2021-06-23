<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>

 <div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Editar reporte </h5>
                        </div>
                        <form action="<?php echo base_url(); ?>tablas/actualizar_reportechoque/<?php echo $IDCHOQUE; ?>" method="post" role="form" >
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id Coordinador</label>
                                  <select  id="iddocente" name="iddocente" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Coordinador --</option>
                                    <?php
                                       $querycch= $this->db->query("SELECT * FROM COORDINADOR ");
                                            foreach ($querycch->result() as $cch){
                                                ?>
                                        <option value="<?php echo $cch->IDCOORDINADOR ?>" <?php if($IDCOORDINADOR==$cch->IDCOORDINADOR){  echo 'selected="selected"';} ?> ><?php echo $cch->NOMCOOR." ".$cch->APECOOR?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Id estudiante</label>
                                  <select  id="idestudiante" name="idestudiante" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Estudiante --</option>
                                    <?php
                                       $querypes= $this->db->query("SELECT * FROM ESTUDIANTES ");
                                            foreach ($querypes->result() as $pe){
                                                ?>
                                        <option value="<?php echo $pe->IDESTUDIANTE ?>" <?php if($IDESTUDIANTE==$pe->IDESTUDIANTE){  echo 'selected="selected"';} ?> ><?php echo $pe->NOMESTUDIANTE." ".$pe->APELESTUDIANTE?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Comentario</label>
                                  <input type="text" class="form-control" placeholder="comentario" id="comentariochoque" name="comentariochoque" value="<?php echo $COMENTARIOCHOQUE; ?>">
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