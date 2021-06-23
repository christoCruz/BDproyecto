<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>

<div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Grupos </h5>
        </div>
        <form action="<?php echo base_url(); ?>tablas/actualizar_grupos/<?php echo $IDGRUPOS; ?>" method="post" role="form" >
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4 pr-1">
                <div class="form-group">
                  <label>Id materia</label>
                  <select  id="idmateria" name="idmateria" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Materia --</option>
                                    <?php
                                       $querymg= $this->db->query("SELECT * FROM MATERIAS ");
                                            foreach ($querymg->result() as $mg){
                                                ?>
                                        <option value="<?php echo $mg->IDMATERIA ?>"  <?php if($IDMATERIA==$mg->IDMATERIA){  echo 'selected="selected"';} ?>><?php echo $mg->NOMMATERIA?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
                </div>
              </div>
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Id coordinador</label>
                  <select  id="idcoordinador" name="idcoordinador" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Coordinador --</option>
                                    <?php
                                       $querycg= $this->db->query("SELECT * FROM COORDINADOR ");
                                            foreach ($querycg->result() as $cg){
                                                ?>
                                        <option value="<?php echo $cg->IDCOORDINADOR ?>" <?php if($IDCOORDINADOR==$cg->IDCOORDINADOR){  echo 'selected="selected"';} ?> ><?php echo $cg->NOMCOOR." ".$cg->APECOOR?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
                </div>
              </div>
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>canttidad de cupos</label>
                  <input type="text" class="form-control" placeholder="cantidad de cupos" id="cantcupos" name="cantcupos" value="<?php echo $CANTCUPOS; ?>">
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Num de grupo</label>
                  <input type="text" class="form-control" placeholder="Num de grupo" id="numgrupo" name="numgrupo" value="<?php echo $NUMGRUPO; ?>">
                </div>
              </div>
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Ciclo del grupo</label>
                  <select id="ciclogrupo" name="ciclogrupo" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Ciclo--</option>
                                    <?php
                                    
                                      $ci = array(
                                        1=> "CICLO 1",
                                        2=> "CICLO 2"
                                      );

                                      foreach($ci as $key => $d) { ?>
                                        <option d="<?php echo $key ?>" <?php if($CICLOGRUPO==$d){  echo 'selected="selected"';} ?>><?php echo $d ?></option>
                                      <?php }
                                        
                                    ?>  
                                  </select>
                </div>
              </div>
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Año</label>
                  <input type="text" class="form-control" placeholder="año" id="aniogrupo" name="aniogrupo" value="<?php echo $ANIOGRUPO; ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Estado</label>
                  <select id="estgrupo" name="estgrupo" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Estado--</option>
                                    <?php
                                    
                                      $est = array(
                                        1=> "HABILITADO",
                                        2=> "DESHABILITADO"
                                      );

                                      foreach($est as $key => $d) { ?>
                                        <option d="<?php echo $key ?>"<?php if($ESTGRUPO==$d){  echo 'selected="selected"';} ?>><?php echo $d ?></option>
                                      <?php }
                                        
                                    ?>  
                                  </select>
                </div>
              </div>
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Id Docente</label>
                  <select  id="iddocente" name="iddocente" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Docente --</option>
                                    <?php
                                       $querydg= $this->db->query("SELECT * FROM DOCENTE ");
                                            foreach ($querydg->result() as $dg){
                                                ?>
                                        <option value="<?php echo $dg->IDDOCENTE ?>" <?php if($IDDOCENTE==$dg->IDDOCENTE){  echo 'selected="selected"';} ?> ><?php echo $dg->NOMDOCENTE." ".$dg->APEDOCENTE?></option>
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