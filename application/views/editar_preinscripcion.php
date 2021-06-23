<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>

<div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Editar preinscripcion </h5>
                        </div>
                        <form action="<?php echo base_url(); ?>tablas/actualizar_preinscripcion/<?php echo $IDPREINSCRIPCION; ?>" method="post" role="form" >
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id estudiante</label>
                                  <select  id="idestudiante" name="idestudiante" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Estudiante --</option>
                                    <?php
                                       $querype= $this->db->query("SELECT * FROM ESTUDIANTES ");
                                            foreach ($querype->result() as $pe){
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
                                  <label>Id materia</label>
                                  <select  id="idmateria" name="idmateria" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Materia --</option>
                                    <?php
                                       $querypm= $this->db->query("SELECT * FROM MATERIAS ");
                                            foreach ($querypm->result() as $pm){
                                                ?>
                                        <option value="<?php echo $pm->IDMATERIA ?>" <?php if($IDMATERIA==$pm->IDMATERIA){  echo 'selected="selected"';} ?> ><?php echo $pm->NOMMATERIA?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
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