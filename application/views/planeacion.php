
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Planeacion de horarios</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
              <a class="btn btn-danger btn-round" href="<?php echo base_url('Login/salir'); ?>">Cerrar sesion</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <style>
      #scroll {
          overflow:scroll;
          height:27em;
          width:100%;
        } 
      </style>
      <style>
      .btn-file {
        position: relative;
        overflow: hidden;
      }
      .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
      }</style>

<script language="javascript">
        function doSearch(nombre,apellido)
        {
            const tableReg = document.getElementById(nombre);
            const searchText = document.getElementById(apellido).value.toLowerCase();
            let total = 0;
 
            // Recorremos todas las filas con contenido de la tabla
            for (let i = 1; i < tableReg.rows.length; i++) {
                // Si el td tiene la clase "noSearch" no se busca en su cntenido
                if (tableReg.rows[i].classList.contains("noSearch")) {
                    continue;
                }
 
                let found = false;
                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                // Recorremos todas las celdas
                for (let j = 0; j < cellsOfRow.length && !found; j++) {
                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    // Buscamos el texto en el contenido de la celda
                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                        found = true;
                        total++;
                    }
                }
                if (found) {
                    tableReg.rows[i].style.display = '';
                } else {
                    // si no ha encontrado ninguna coincidencia, esconde la
                    // fila de la tabla
                    tableReg.rows[i].style.display = 'none';
                }
            }
 
            // mostramos las coincidencias
            const lastTR=tableReg.rows[tableReg.rows.length-1];
            const td=lastTR.querySelector("td");
            lastTR.classList.remove("hide", "red");
            if (searchText == "") {
                lastTR.classList.add("hide");
            } else if (total) {
                td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");
            } else {
                lastTR.classList.add("red");
                td.innerHTML="No se han encontrado coincidencias";
            }
        }
    </script>
 
    <style>
        #datos {border:1px solid #ccc;padding:10px;font-size:1em;}
        #datos tr:nth-child(even) {background:#ccc;}
        #datos td {padding:5px;}
        #datos tr.noSearch {background:White;font-size:0.8em;}
        #datos tr.noSearch td {padding-top:10px;text-align:right;}
        .hide {display:none;}
        .red {color:Red;}
    </style>
      <!-- End Navbar -->

      <div class="content">
<?php 
$var1=1;
$var2=100;
?>


      <section class="row" id="grupo">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <h4 class="card-title">GRUPOS </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_grupo">Agregar grupos</button>
                </div>
                  <div  class="card-body">
                    <div id="scroll" class="table-responsive">
                    <form>
                        <input class="form-control" id="<?php echo $var2?>" type="text" onkeyup="doSearch(''+ <?php echo $var1 ?>+'',''+<?php echo $var2 ?> +'')"  placeholder="Buscar"/>
                        <br>
                    </form>
                    
                      <table class="table" id="<?php echo $var1?>">
                        <thead class=" text-primary">
                          <th>#</th>
                          <th>MATERIA</th>
                          <th># GRUPO</th>
                          <th>CUPOS</th>
                          <th>DOCENTE</th>
                          <th>CICLO</th>
                          <th class="text-right"> ACCIONES</th>
                        </thead>
                        <tbody>

    <?php
    
      $number=1;
      $iddocente=$_SESSION['Nombre'];
      $queryidcoor= $this->db->query("SELECT * FROM COORDINADOR WHERE CORREOCOOR='".$iddocente."'");
      foreach ($queryidcoor->result() as $coordinador){

        $queryidgrupo= $this->db->query("SELECT * FROM GRUPOS WHERE IDCOORDINADOR='".$coordinador->IDCOORDINADOR."'");
        foreach ($queryidgrupo->result() as $grupo){

          $queryidmateria= $this->db->query("SELECT * FROM MATERIAS WHERE IDMATERIA='".$grupo->IDMATERIA."'");
          foreach ($queryidmateria->result() as $materia){

            $queryidocente= $this->db->query("SELECT * FROM DOCENTE WHERE IDDOCENTE='".$grupo->IDDOCENTE."'");
            foreach ($queryidocente->result() as $docente){

              if($grupo->ESTADOGRUPO!='I' && $grupo->ESTGRUPO!='DESHABILITADO'){


?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $materia->NOMMATERIA;?></td>
                          <td><?php echo $grupo->NUMGRUPO; ?></td>
                          <td><?php echo $grupo->CANTCUPOS; ?></td>
                          <td><?php echo $docente->NOMDOCENTE." ".$docente->APEDOCENTE; ?></td>
                          <td><?php echo $grupo->CICLOGRUPO." - ".$grupo->ANIOGRUPO; ?></td>
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/grupos_seleccion/<?php echo $grupo->IDGRUPOS; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/grupos_eliminar/<?php echo $grupo->IDGRUPOS; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>

<?php

$var1++;
  $var2++;

              }

            }


          }

        }


      }



    ?>
      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>

       <!-- Modal de Agregar -->
       <div class="modal fade bd-example-modal-lg" id="agregar_grupo" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar Grupos </h5>
                        </div>
                        <?php echo form_open("tablas/grupos_agregar")?>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-3 pr-1">
                                <div class="form-group">
                                  <label># de grupo</label>
                                  <input type="text" class="form-control" placeholder="# de grupo" id="numgrupo" name="numgrupo">
                                </div>
                              </div>
                              <div class="col-md-3 px-1">
                                <div class="form-group">
                                  <label>Cantidad de cupos</label>
                                  <input type="text" class="form-control" placeholder="Cantidad de cupos" id="cantcupos" name="cantcupos">
                                </div>
                              </div>
                              <div class="col-md-3 px-1">
                                <div class="form-group">
                                  <label>Ciclo</label>
                                  <input type="text" class="form-control" placeholder="Ciclo" id="ciclogrupo" name="ciclogrupo">
                                </div>
                              </div>
                              <div class="col-md-3 px-1">
                                <div class="form-group">
                                  <label>Año</label>
                                  <input type="text" class="form-control" placeholder="Año" id="aniogrupo" name="aniogrupo">
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6 px-1">
                                <div class="form-group">
                                  <label>Materia</label>
                                  <select id="idmateria" name="idmateria" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Materia --</option>
                                    <?php

                                      $queryidcoor= $this->db->query("SELECT * FROM COORDINADOR WHERE CORREOCOOR='".$iddocente."'");
                                      foreach ($queryidcoor->result() as $coor){

                                        $querycarrera= $this->db->query("SELECT * FROM CARRERA WHERE IDCARRERA='".$coor->IDCARRERA."'");
                                        foreach ($querycarrera->result() as $carre){

                                          $querymate= $this->db->query("SELECT * FROM MATERIAS WHERE IDCARRERA='".$carre->IDCARRERA."'");
                                          foreach ($querymate->result() as $mate){
                                            

                                            echo "<option class='' value='".$mate->IDMATERIA."'>" .$mate->NOMMATERIA."</option>";  // displaying data in option menu
                                            
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
                                  <select id="iddocente" name="iddocente" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Docente --</option>
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

                                            echo "<option class='' value='".$doc->IDDOCENTE."'>" .$doc->NOMDOCENTE." ".$doc->APEDOCENTE."</option>";  // displaying data in option menu
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
                              <input class="btn btn-primary btn-round" type="submit" name="btnAdd" id="btnAdd" value="Agregar"></input>
                            </div>
                          </div>
                        <?php echo form_close()?>
                      </div>
                    </div>
                </div>
                <!-- Fin de Modal -->





                <section class="row" id="grupo">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                      <h4 class="card-title">HORARIOS </h4>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_hora">Agregar horario</button>
                        </div>
                          <div  class="card-body">
                            <div id="scroll" class="table-responsive">
                            <form>
                                <input class="form-control" id="<?php echo $var2?>" type="text" onkeyup="doSearch(''+ <?php echo $var1 ?>+'',''+<?php echo $var2 ?> +'')"  placeholder="Buscar"/>
                                <br>
                            </form>
                            
                              <table class="table" id="<?php echo $var1?>">
                                <thead class=" text-primary">
                                  <th>#</th>
                                  <th>MATERIA</th>
                                  <th># GRUPO</th>
                                  <th>AULA</th>
                                  <th>HORARIO</th>
                                  <th class="text-right"> ACCIONES</th>
                                </thead>
                                <tbody>

            <?php
            $var3=1;
            $var4=100;
              $number=1;
              $iddocente=$_SESSION['Nombre'];
              $queryidcoor= $this->db->query("SELECT * FROM COORDINADOR WHERE CORREOCOOR='".$iddocente."'");
              foreach ($queryidcoor->result() as $coordinador){

                $queryidgrupo= $this->db->query("SELECT * FROM GRUPOS WHERE IDCOORDINADOR='".$coordinador->IDCOORDINADOR."'");
                foreach ($queryidgrupo->result() as $grupo){

                  $queryidmateria= $this->db->query("SELECT * FROM MATERIAS WHERE IDMATERIA='".$grupo->IDMATERIA."'");
                  foreach ($queryidmateria->result() as $materia){

                    $queryidocente= $this->db->query("SELECT * FROM DOCENTE WHERE IDDOCENTE='".$grupo->IDDOCENTE."'");
                    foreach ($queryidocente->result() as $docente){

                      $queryidhorario= $this->db->query("SELECT * FROM HORARIOS_GRUPOS WHERE IDGRUPOS='".$grupo->IDGRUPOS."'");
                      foreach ($queryidhorario->result() as $horario){

                        $queryidaula= $this->db->query("SELECT * FROM AULAS WHERE IDAULA='".$horario->IDAULA."'");
                        foreach ($queryidaula->result() as $aula){

                          if($grupo->ESTADOGRUPO!='I' && $grupo->ESTGRUPO!='DESHABILITADO'){



        ?>
                                <tr>
                                  <th scope="row"><?php echo $number++; ?></th>
                                  <td><?php echo $materia->NOMMATERIA;?></td>
                                  <td><?php echo $grupo->NUMGRUPO; ?></td>
                                  <td><?php echo $aula->NUMAULA; ?></td>
                                  <td><?php echo $horario->DIAHORARIO." - ".$horario->HORASHORARIO; ?></td>
                                  <td class="text-right"><a href="<?php echo base_url(); ?>tablas/horario_seleccion/<?php echo $horario->IDHORARIO_GRU; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                                  
                                  <a href="<?php echo base_url(); ?>tablas/horario_eliminar/<?php echo $horario->IDHORARIO_GRU; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                                </tr>
                                <tr class='noSearch hide'>
                                    <td colspan="5"></td>
                                </tr>

        <?php
        $var3++;
        $var4++;

                          }
                        }

                      }

                    }


                  }

                }


              }



            ?>
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>









                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_hora" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar horario </h5>
                        </div>
                        <?php echo form_open("tablas/horario_agregar")?>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12 pr-1">
                                <div class="form-group">
                                  <label>Grupo</label>
                                  <select id="idgrupos" name="idgrupos" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar grupo --</option>
                                    <?php

                                      $queryidcoor= $this->db->query("SELECT * FROM COORDINADOR WHERE CORREOCOOR='".$iddocente."'");
                                      foreach ($queryidcoor->result() as $coor){

                                        $querygrupo= $this->db->query("SELECT * FROM GRUPOS WHERE IDCOORDINADOR='".$coor->IDCOORDINADOR."'");
                                        foreach ($querygrupo->result() as $grupo){

                                          $querymate= $this->db->query("SELECT * FROM MATERIAS WHERE IDMATERIA='".$grupo->IDMATERIA."'");
                                          foreach ($querymate->result() as $mate){

                                            if($grupo->ESTADOGRUPO!='I' && $grupo->ESTGRUPO!='DESHABILITADO'){

                                            echo "<option class='' value='".$grupo->IDGRUPOS."'>" .$mate->NOMMATERIA." #".$grupo->NUMGRUPO."</option>";  // displaying data in option menu
                                            }
                                          }
                                        }
                                      }
                                        
                                    ?>  
                                  </select>
                                </div>
                              </div>
                            </div>

                            <?php

                                      $queryidcoor= $this->db->query("SELECT * FROM COORDINADOR WHERE CORREOCOOR='".$iddocente."'");
                                      foreach ($queryidcoor->result() as $coor){

                                        $querygrupo= $this->db->query("SELECT * FROM GRUPOS WHERE IDCOORDINADOR='".$coor->IDCOORDINADOR."'");
                                        foreach ($querygrupo->result() as $grupo){

                                          $querymate= $this->db->query("SELECT * FROM MATERIAS WHERE IDMATERIA='".$grupo->IDMATERIA."'");
                                          foreach ($querymate->result() as $mate){


                                            echo"<input type='hidden' class='form-control'  id='nivel' name='nivel' value='".$mate->NIVELMATERIA."'>";

                                          }
                                        }
                                      }
                                        
                                    ?>

                            <div class="row">
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Aula</label>
                                  <select id="idaula" name="idaula" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Aula --</option>
                                    <?php
                                      $queryaula= $this->db->query("SELECT * FROM AULAS");
                                      foreach ($queryaula->result() as $aula){

                                        echo "<option class='' value='".$aula->IDAULA."'>" .$aula->NUMAULA." </option>";  // displaying data in option menu
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
                                        <option d="<?php echo $key ?>"><?php echo $d ?></option>
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
                                        <option h="<?php echo $key ?>"><?php echo $h ?></option>
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
                        <?php echo form_close()?>
                      </div>
                    </div>
                </div>
                <!-- Fin de Modal -->

                <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

<?php if($this->session->flashdata("success")): ?>  
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?php echo $this->session->flashdata("success"); ?>',
            showConfirmButton: false,
            timer: 5000
    });
    <?php endif; ?>
</script>

