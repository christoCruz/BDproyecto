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
        <form action="<?php echo base_url(); ?>tablas/grupos_actualizar/<?php echo $IDGRUPOS; ?>" method="post" role="form" >
          <div class="modal-body">
          <div class="row">
                <div class="col-md-3 pr-1">
                    <div class="form-group">
                        <label># de grupo</label>
                        <input type="text" class="form-control" placeholder="# de grupo" id="numgrupo" name="numgrupo" value="<?php echo $IDGRUPOS; ?>">
                    </div>
                </div>
                <div class="col-md-3 px-1">
                <div class="form-group">
                    <label>Cantidad de cupos</label>
                    <input type="text" class="form-control" placeholder="Cantidad de cupos" id="cantcupos" name="cantcupos" value="<?php echo $CANTCUPOS; ?>">
                </div>
                </div>
                <div class="col-md-3 px-1">
                <div class="form-group">
                    <label>Ciclo</label>
                    <input type="text" class="form-control" placeholder="Ciclo" id="ciclogrupo" name="ciclogrupo" value="<?php echo $CICLOGRUPO; ?>">
                </div>
                </div>
                <div class="col-md-3 px-1">
                <div class="form-group">
                    <label>Año</label>
                    <input type="text" class="form-control" placeholder="Año" id="aniogrupo" name="aniogrupo" value="<?php echo $ANIOGRUPO; ?>">
                </div>
                </div>
            </div>

            <div class="row">
            <div class="col-md-3 pr-1">
                    <div class="form-group">
                        <label>Estado de grupo</label>
                        <select class="form-control"  name='estgrupo' id='estgrupo'>
                            
                                <option value="HABILITADO"<?php if($ESTGRUPO=="HABILITADO") echo 'selected="selected"'; ?> >HABILITADO</option>
                                <option value="DESHABILITADO"<?php if($ESTGRUPO=="DESHABILITADO") echo 'selected="selected"'; ?> >DESHABILITADO</option>
                                <option value="LLENO"<?php if($ESTGRUPO=="LLENO") echo 'selected="selected"'; ?> >LLENO</option>
                        </select>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 px-1">
                <div class="form-group">
                    <label>Materia</label>
                    <select id="idmateria" name="idmateria" class="form-control  " >
                    
                    <?php
                        $iddocente=$_SESSION['Nombre'];
                        $queryidcoor= $this->db->query("SELECT * FROM COORDINADOR WHERE CORREOCOOR='".$iddocente."'");
                        foreach ($queryidcoor->result() as $coor){

                        $querycarrera= $this->db->query("SELECT * FROM CARRERA WHERE IDCARRERA='".$coor->IDCARRERA."'");
                        foreach ($querycarrera->result() as $carre){

                            $querymate= $this->db->query("SELECT * FROM MATERIAS WHERE IDCARRERA='".$carre->IDCARRERA."'");
                            foreach ($querymate->result() as $mate){
                                if($grupo->ESTADOGRUPO!='I' && $grupo->ESTGRUPO!='DESHABILITADO'){
                                ?>
                            <option value="<?php echo $mate->IDMATERIA ?>" <?php if($IDMATERIA==$mate->IDMATERIA){  echo 'selected="selected"';} ?> ><?php echo $mate->NOMMATERIA?></option>
                            <?php
                            //echo "<option class='' value='".$mate->IDMATERIA."' selected>" .$mate->NOMMATERIA."</option>";  // displaying data in option menu
                                }
                            }
                        }
                    }
                        
                    ?>  
                    </select>
                </div>
                </div>
                <div class="col-md-6 px-1">
                <div class="form-group">
                    <label>Docente</label>
                    <select id="iddocente" name="iddocente" class="form-control">
                    
                    <?php

                        $queryidcoor= $this->db->query("SELECT * FROM COORDINADOR WHERE CORREOCOOR='".$iddocente."'");
                        foreach ($queryidcoor->result() as $coor){
                        // echo"<input type='hidden' class='form-control'  id='idcoordinador' name='dcoordinador' value='".$coor->IDCOORDINADOR."'>";

                        $querycarrera= $this->db->query("SELECT * FROM CARRERA WHERE IDCARRERA='".$coor->IDCARRERA."'");
                        foreach ($querycarrera->result() as $carre){

                            $querydep= $this->db->query("SELECT * FROM DEPARTAMENTO WHERE IDDEPTO='".$carre->IDDEPTO."'");
                            foreach ($querydep->result() as $dep){

                            $querydoc= $this->db->query("SELECT * FROM DOCENTE WHERE IDDEPTO='".$dep->IDDEPTO."'");
                            foreach ($querydoc->result() as $doc){
                            ?>
                                <option value="<?php echo $doc->IDDOCENTE ?>" <?php if($IDDOCENTE==$doc->IDDOCENTE){  echo 'selected="selected"';} ?> ><?php echo $doc->NOMDOCENTE." ".$doc->APEDOCENTE?></option>
                            <?php
                            //echo "<option class='' value='".$doc->IDDOCENTE."' selected>" .$doc->NOMDOCENTE." ".$doc->APEDOCENTE."</option>";  // displaying data in option menu
                            
                        }
                            }
                        }
                        }
                        
                    ?>  
                    </select>
                    <?php 
                    $queryidcoord= $this->db->query("SELECT * FROM COORDINADOR WHERE CORREOCOOR='".$iddocente."'");
                    foreach ($queryidcoord->result() as $coord){
                    echo"<input type='hidden' class='form-control'  id='idcoordinador' name='idcoordinador' value='".$coord->IDCOORDINADOR."'>";
                    }
                    
                    ?>
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