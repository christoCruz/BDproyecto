<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>

<div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Editar Inscripcion </h5>
                        </div>
                        <form action="<?php echo base_url(); ?>tablas/actualizar_inscripcion/<?php echo $IDINCRIPCION; ?>" method="post" role="form" >
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id estudiante</label>
                                  <select  id="idestudiante" name="idestudiante" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Estudiante --</option>
                                    <?php
                                       $queryie= $this->db->query("SELECT * FROM ESTUDIANTES ");
                                            foreach ($queryie->result() as $ie){
                                                ?>
                                        <option value="<?php echo $ie->IDESTUDIANTE ?>" <?php if($IDESTUDIANTE==$ie->IDESTUDIANTE){  echo 'selected="selected"';} ?> ><?php echo $ie->NOMESTUDIANTE." ".$ie->APELESTUDIANTE?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Id grupos</label>
                                  <select  id="idgrupos" name="idgrupos" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Grupo --</option>
                                    <?php
                                       $queryig= $this->db->query("SELECT * FROM GRUPOS ");
                                            foreach ($queryig->result() as $ig){
                                                ?>
                                        <option value="<?php echo $ig->IDGRUPOS ?>"<?php if($IDGRUPOS==$ig->IDGRUPOS){  echo 'selected="selected"';} ?>  ><?php echo $ig->NUMGRUPO?></option>
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