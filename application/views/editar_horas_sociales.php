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
                                  <select  id="idestudiante" name="idestudiante" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Estudiante --</option>
                                    <?php
                                       $queryhe= $this->db->query("SELECT * FROM ESTUDIANTES ");
                                            foreach ($queryhe->result() as $he){
                                                ?>
                                        <option value="<?php echo $he->IDESTUDIANTE ?>" <?php if($IDESTUDIANTE==$he->IDESTUDIANTE){  echo 'selected="selected"';} ?> ><?php echo $he->NOMESTUDIANTE." ".$he->APELESTUDIANTE?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
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
                                  <select id="estadoproyecto" name="estadoproyecto" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>--  Estado Proyecto  --</option>
                                    <?php
                                    
                                      $estp = array(
                                        1=> "P",
                                        2=> "A"
                                      );
                                      foreach($estp as $key => $h) { ?>
                                        <option h="<?php echo $key ?>"<?php if($ESTADOPROYECTO==$h){  echo 'selected="selected"';} ?>><?php echo $h ?></option>
                                      <?php }
                                        
                                    ?>  
                                  </select>
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
                                  <select id="estadoanteproyecto" name="estadoanteproyecto" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>--  Estado Anteproyecto  --</option>
                                    <?php
                                    
                                      $estap = array(
                                        1=> "P",
                                        2=> "A"
                                      );
                                      foreach($estap as $key => $h) { ?>
                                        <option h="<?php echo $key ?>"<?php if($ESTADOANTEPROYECTO==$h){  echo 'selected="selected"';} ?>><?php echo $h ?></option>
                                      <?php }
                                        
                                    ?>  
                                  </select>
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