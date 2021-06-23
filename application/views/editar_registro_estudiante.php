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
                                  <select  id="idincripcion" name="idincripcion" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Inscripcion --</option>
                                    <?php
                                       $queryri= $this->db->query("SELECT * FROM INSCRIPCION ");
                                            foreach ($queryri->result() as $ri){
                                                ?>
                                        <option value="<?php echo $ri->IDINCRIPCION ?>"  <?php if($IDINCRIPCION==$ri->IDINCRIPCION){  echo 'selected="selected"';} ?>><?php echo $ri->IDINCRIPCION?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>estado de materia</label>
                                  <select id="estadomateria" name="estadomateria" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Estado --</option>
                                    <?php
                                    
                                      $esm = array(
                                        1=> "A",
                                        2=> "C",
                                        3=> "R"
                                      );
                                      foreach($esm as $key => $h) { ?>
                                        <option h="<?php echo $key ?>" <?php if($ESTADOMATERIA==$h){  echo 'selected="selected"';} ?>><?php echo $h ?></option>
                                      <?php }
                                        
                                    ?>  
                                  </select>
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