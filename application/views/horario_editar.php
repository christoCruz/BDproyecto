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
                <h5 class="modal-title">Modificar horario </h5>
            </div>
            <form action="<?php echo base_url(); ?>tablas/horario_editar/<?php echo $IDHORARIO_GRU; ?>" method="post" role="form" >
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 pr-1">
                    <div class="form-group">
                        <label>Grupo</label>
                        <select id="idgrupos" name="idgrupos" class="form-control  " aria-label="Default select example">
                        <option disabled selected>-- Seleccionar grupo --</option>
                        <?php
                            $iddocente=$_SESSION['Nombre'];
                            $queryidcoor= $this->db->query("SELECT * FROM COORDINADOR WHERE CORREOCOOR='".$iddocente."'");
                            foreach ($queryidcoor->result() as $coor){

                                $querygrupo= $this->db->query("SELECT * FROM GRUPOS WHERE IDCOORDINADOR='".$coor->IDCOORDINADOR."'");
                                foreach ($querygrupo->result() as $grupo){

                                    $querymate= $this->db->query("SELECT * FROM MATERIAS WHERE IDMATERIA='".$grupo->IDMATERIA."'");
                                    foreach ($querymate->result() as $mate){
                                        if($grupo->ESTADOGRUPO!='I' && $grupo->ESTGRUPO!='DESHABILITADO'){
                                    ?>
                                    <option value="<?php echo $grupo->IDGRUPOS ?>" <?php if($IDGRUPOS==$grupo->IDGRUPOS){  echo 'selected="selected"';} ?> ><?php echo $mate->NOMMATERIA." #".$grupo->NUMGRUPO?></option>
                                    <?php
                                //echo "<option class='' value='".$grupo->IDGRUPOS."'>" .$mate->NOMMATERIA." #".$grupo->NUMGRUPO."</option>";  // displaying data in option menu
                                        }
                                }
                            }
                            }
                            
                        ?>  
                        </select>
                    </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4 px-1">
                    <div class="form-group">
                        <label>Aula</label>
                        <select id="idaula" name="idaula" class="form-control  " aria-label="Default select example">
                        <option disabled selected>-- Seleccionar Aula --</option>
                        <?php
                            $queryaula= $this->db->query("SELECT * FROM AULAS");
                            foreach ($queryaula->result() as $aula){
                                ?>
                                <option value="<?php echo $aula->IDAULA ?>" <?php if($IDAULA==$aula->IDAULA){  echo 'selected="selected"';} ?> ><?php echo $aula->NUMAULA?></option>
                                <?php
                            //echo "<option class='' value='".$aula->IDAULA."'>" .$aula->NUMAULA." </option>";  // displaying data in option menu
                            }
                            
                        ?>  
                        </select>
                    </div>
                    </div>
                    <div class="col-md-4 px-1">
                    <div class="form-group">
                        <label>Dia</label>
                        <select id="diahorario" name="diahorario" class="form-control  " aria-label="Default select example">
                        <option disabled selected>-- Seleccionar Dia--</option>
                        <?php
                        
                            $dia = array(
                            1=> "L",
                            2=> "M",
                            3=> "X",
                            4=> "J",
                            5=> "V"
                            );

                            
                            

                            foreach($dia as $key => $d) { ?>
                                <option d="<?php echo $key ?>" <?php if($DIAHORARIO==$d){  echo 'selected="selected"';} ?> ><?php echo $d ?></option>
                                <?php }
    
                                
                            
                        ?>  
                        </select>
                    </div>
                    </div>
                    <div class="col-md-4 px-1">
                    <div class="form-group">
                        <label>Hora</label>
                        <select id="horashorario" name="horashorario" class="form-control  " aria-label="Default select example">
                        <option disabled selected>-- Seleccionar Hora --</option>
                        <?php
                        
                            $horas = array(
                            1=> "07:00 - 08:00",
                            2=> "08:00 - 09:00",
                            3=> "09:00 - 10:00",
                            4=> "10:00 - 11:00",
                            5=> "11:00 - 12:00",
                            6=> "13:00 - 14:00",
                            7=> "14:00 - 15:00",
                            8=> "15:00 - 16:00",
                            9=> "16:00 - 17:00",
                            10=> "17:00 - 18:00"
                            );
                            foreach($horas as $key => $h) { ?>
                                <option h="<?php echo $key ?>" <?php if($HORASHORARIO==$h){  echo 'selected="selected"';} ?> ><?php echo $h ?></option>
                                <?php }
                            
                        ?>  
                        </select>
                    </div>
                    </div>
                </div>
                
                
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