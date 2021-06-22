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
              <h5 class="modal-title">Agregar Proyecto </h5>
            </div>
            <form action="<?php echo base_url(); ?>tablas/social_editar/<?php echo $IDHORASSOCIALES; ?>" method="post" role="form" >
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12 pr-1">
                    <div class="form-group">
                      <label>Nombre Proyecto</label>
                      <input readonly type="text" class="form-control" placeholder="Nombre del pryecto" id="nomproyecto" name="nomproyecto" value="<?php echo $NOMPROYECTO; ?>">
                    </div>
                  </div>
                </div>

                <div class="row">
                <div class="col-md-6 px-1">
                    <div class="form-group">
                      <label>Duracion</label>
                      <input readonly type="text" class="form-control" placeholder="Duracion" id="duracionproyec" name="duracionproyec" value="<?php echo $DURACIONPROYEC; ?>">
                    </div>
                  </div>
                  <div class="col-md-6 px-1">
                    <div class="form-group">
                      <span class="btn  btn-warning btn-file">
                        Subir Anteproyecto<input  type="file" name="file" value="<?php echo $ANTEPROYECTO; ?>" />
                        </span>
                    </div>
                  </div>
                </div>
                

                <div class="row">
                  <div class="col-md-6 px-1">
                    <div class="form-group">
                      <label>Tutor</label>
                      <select  id="iddocente" name="iddocente" class="form-control  " aria-label="Default select example">
                        <option disabled selected>-- Seleccionar Docente --</option>
                        <?php

                                $querydoc= $this->db->query("SELECT * FROM DOCENTE ");
                                foreach ($querydoc->result() as $doc){
                                    ?>
                            <option value="<?php echo $doc->IDDOCENTE ?>" <?php if($IDDOCENTE==$doc->IDDOCENTE){  echo 'selected="selected"';} ?> ><?php echo $doc->NOMDOCENTE." ".$doc->APEDOCENTE?></option>
                            <?php

                                //echo "<option class='' value='".$doc->IDDOCENTE."'>" .$doc->NOMDOCENTE." ".$doc->APEDOCENTE."</option>";  // displaying data in option menu
                                }
                                
                            
                        ?>  
                      </select>
                    </div>
                  </div>
                </div>
                
                <?php
                    $idestudiante=$_SESSION['Nombre'];
                    $queryidestudiante= $this->db->query("SELECT * FROM ESTUDIANTES WHERE CORREOESTU='".$idestudiante."'");
                    foreach ($queryidestudiante->result() as $estudiante){
                      echo"<input type='hidden' class='form-control'  id='idestudiante' name='idestudiante' value='".$estudiante->IDESTUDIANTE."'>";
                    }
                ?>
                
              </div>
              <div class="modal-footer">
                <div class="update ml-auto mr-auto">
                  <input class="btn btn-primary btn-round" type="submit" name="btnAdd" id="btnAdd" value="Agregar"></input>
                </div>
              </div>

              
              </form>
          </div>
        </div>
    </div>
    <!-- Fin de Modal -->