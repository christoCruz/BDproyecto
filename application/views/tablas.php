
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
            <a class="navbar-brand" href="javascript:;">Tablas</a>
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
          overflow:auto;
          max-height:27em;
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
      }
      #scrolll {
          overflow:auto;
          width:100%;
        } </style>
      <!-- End Navbar -->


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
      

      <div class="content">





        <!-- **************************************************
        ************** TABLA ACCION *************************
        *******************************************************-->

        <section id="accion" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Acciones</h4>
                <!--<button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_accion"  >Agregar Accion</button>
                 Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_accion" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar Accion </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_accion")?>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Fecha de inicio</label>
                                  <input type="date" value="<?php echo date('d-m-y'); ?>" class="form-control datepicker" placeholder="Num. aula" id="fechainicio" name="fechainicio">
                                </div>
                              </div>
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Fecha de fin</label>
                                  <input type="date" value="<?php echo date('d-m-y'); ?>" class="form-control datepicker" placeholder="Num. aula" id="fechafinal" name="fechafinal">
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
              </div>
              <div  class="card-body">
                <div  id="scrolll" class="table-responsive">
                  <table class="table" id="accionesv">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>IDACCION</th>
                      <th>Fecha de inicio</th>
                      <th>Fecha de fin</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($accion as $key => $acc) {?>
                        <tr>
                         <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $acc->IDACCION;?></td>
                          <td><?php echo $acc->FECHAINICIO; ?></td>
                          <td><?php echo $acc->FECHAFINAL; ?></td>
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_accion/<?php echo $acc->IDACCION; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          <!--<a href="<?php echo base_url(); ?>tablas/eliminar_accion/<?php echo $acc->IDACCION; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a>--> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?>  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>



      

        <!-- **************************************************
        ************** TABLA AULA *************************
        *******************************************************-->

        <section id="aula" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Aula</h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_aula">Agregar aula</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_aula" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar Aula </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_aulas")?>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>NUMERO DE AULA</label>
                                  <input type="text" class="form-control" placeholder="Num. aula" id="numaula" name="numaula">
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
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="aulass" type="text" onkeyup="doSearch('aulas','aulass')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="aulas">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>IDAULA</th>
                      <th>Numero de aula</th>
                  
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($aulas as $key => $aula) {?>
                        <tr>
                         <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $aula->IDAULA;?></td>
                          <td><?php echo $aula->NUMAULA; ?></td>
                         
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_aulas/<?php echo $aula->IDAULA; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          <a href="<?php echo base_url(); ?>tablas/eliminar_aulas/<?php echo $aula->IDAULA; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?>  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>



      

        <!-- **************************************************
        ************** TABLA CARRERA  *************************
        *******************************************************-->

        <section id="carrera" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Carrera </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_carrera">Agregar Carrera</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_carrera" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar Carrera </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_carrera")?>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id departamento</label>
                                  <select  id="iddepto" name="iddepto" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Departamento --</option>
                                    <?php
                                            $querydc= $this->db->query("SELECT * FROM DEPARTAMENTO ");
                                            foreach ($querydc->result() as $dc){
                                                ?>
                                        <option value="<?php echo $dc->IDDEPTO ?>"  ><?php echo $dc->NOMBREDEPTO?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
                                  
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Codigo de carrera</label>
                                  <input type="text" class="form-control" placeholder="Codigo de carrera" id="codcarrera" name="codcarrera">
                                </div>
                              </div>
                              <div class="col-md-4 ">
                                <div class="form-group">
                                  <label>Materias</label>
                                  <input type="text" class="form-control" placeholder="Num materias" id="materias" name="materias">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12 ">
                                <div class="form-group">
                                  <label>Nombre de carrera</label>
                                  <input type="text" class="form-control" placeholder="Nombre de carrera" id="nomcarrera" name="nomcarrera">
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
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="carrerass" type="text" onkeyup="doSearch('carrerav','carrerass')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="carrerav">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>IDCARRERA</th>
                      <th>ID DEPTO</th>
                      <th>COD DE CARRERA</th>
                      <th>MATERERIAS</th>
                      <th>NOMBRE</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($carrera as $key => $carrera) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $carrera->IDCARRERA;?></td>
                          <td><?php echo $carrera->IDDEPTO; ?></td>
                          <td><?php echo $carrera->CODCARRERA; ?></td>
                          <td><?php echo $carrera->MATERIAS; ?></td>
                          <td><?php echo $carrera->NOMCARRERA; ?></td>
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_carrera/<?php echo $carrera->IDCARRERA;?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_carrera/<?php echo $carrera->IDCARRERA; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>



      

        <!-- **************************************************
        ************** TABLA AULAS DE COORDINADOR *************************
        *******************************************************-->

        <section id="coordinador" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Coordinador </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_coordinador">Agregar coordinador</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_coordinador" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar Coordinador </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_coordinador")?>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id carrera</label>
                                  <select  id="idcarrera" name="idcarrera" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Carrera --</option>
                                    <?php
                                       $querycc= $this->db->query("SELECT * FROM CARRERA ");
                                            foreach ($querycc->result() as $cc){
                                                ?>
                                        <option value="<?php echo $cc->IDCARRERA ?>"  ><?php echo $cc->NOMCARRERA?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
                                  
                                </div>
                              </div>
                              <div class="col-md-4 ">
                                <div class="form-group">
                                  <label>Nombre coordinador</label>
                                  <input type="text" class="form-control" placeholder="Nombre del coordinador" id="nomcoor" name="nomcoor">
                                </div>
                              </div>
                              
                            </div>
                            <div class="row">
                            <div class="col-md-4 ">
                                <div class="form-group">
                                  <label>Apellido</label>
                                  <input type="text" class="form-control" placeholder="apellido" id="apecoor" name="apecoor">
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
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="coordinadors" type="text" onkeyup="doSearch('coordinadorv','coordinadors')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="coordinadorv">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID COORDINADOR</th>
                      <th>ID CARRERA</th>
                      <th>NOMBRE</th>
                      <th>APELLIDO</th>
                      <th>CORREO</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($coordinador as $key => $coordinador) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $coordinador->IDCOORDINADOR;?></td>
                          <td><?php echo $coordinador->IDCARRERA; ?></td>
                          <td><?php echo $coordinador->NOMCOOR; ?></td>
                          <td><?php echo $coordinador->APECOOR; ?></td>
                          <td><?php echo $coordinador->CORREOCOOR; ?></td>
                          
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_coordinador/<?php echo $coordinador->IDCOORDINADOR; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_coordinador/<?php echo $coordinador->IDCOORDINADOR; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>



      

        <!-- **************************************************
        ************** TABLA AULAS DE DEPARTAMENTO *************************
        *******************************************************-->

        <section id="departamento" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Departamento </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_departamento">Agregar departamento</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_departamento" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar Departamento </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_departamento")?>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-8 pr-1">
                                <div class="form-group">
                                  <label>Nombre de departamento</label>
                                  <input type="text" class="form-control" placeholder="Nombre de departamento" id="nombredepto" name="nombredepto">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Id jefe</label>
                                  <select  id="idjefe" name="idjefe" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Jefe --</option>
                                    <?php
                                       $querydj= $this->db->query("SELECT * FROM JEFE ");
                                            foreach ($querydj->result() as $dj){
                                                ?>
                                        <option value="<?php echo $dj->IDJEFE ?>"  ><?php echo $dj->NOMJEFE." ".$dj->APEJEFE?></option>
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
                              <input class="btn btn-primary btn-round" type="submit" name="btnAdd" id="btnAdd" value="Agregar"></input>
                            </div>
                          </div>
                        <?php echo form_close()?>
                      </div>
                    </div>
                </div>
                <!-- Fin de Modal -->
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="deptos" type="text" onkeyup="doSearch('depto','deptos')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="depto">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID DEPTO</th>
                      <th>ID JEFE</th>
                      <th>NOMBRE DE DEPARTAMENTO</th>
                      
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($departamento as $key => $departamento) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $departamento->IDDEPTO;?></td>
                          <td><?php echo $departamento->IDJEFE; ?></td>
                          <td><?php echo $departamento->NOMBREDEPTO; ?></td>
                          
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_departamento/<?php echo $departamento->IDDEPTO; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_departamento/<?php echo $departamento->IDDEPTO; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?> 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>



      

        <!-- **************************************************
        ************** TABLA AULAS DE DOCENTE *************************
        *******************************************************-->

        <section id="docente" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Docente </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_docente">Agregar docente</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_docente" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar Docente </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_docente")?>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Nombre del docente</label>
                                  <input type="text" class="form-control" placeholder="Nombre del docente" id="nomdocente" name="nomdocente">
                                </div>
                              </div>
                              <div class="col-md-4 ">
                                <div class="form-group">
                                  <label>Apellido del docente</label>
                                  <input type="text" class="form-control" placeholder="Apellido del docente" id="apedocente" name="apedocente">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Profesion del docente</label>
                                  <input type="text" class="form-control" placeholder="profesion" id="profdocente" name="profdocente">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Tipo de contrato</label>
                                  <select id="tipocontrato" name="tipocontrato" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Tipo--</option>
                                    <?php
                                    
                                      $tipo = array(
                                        1=> "HORAS CLASE",
                                        2=> "PLAZA"
                                      );

                                      foreach($tipo as $key => $d) { ?>
                                        <option d="<?php echo $key ?>"><?php echo $d ?></option>
                                      <?php }
                                        
                                    ?>  
                                  </select>
                                  
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4 ">
                                <div class="form-group">
                                  <label>Id departamento</label>
                                  <select  id="iddepto" name="iddepto" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Departamento --</option>
                                    <?php
                                            $querydc= $this->db->query("SELECT * FROM DEPARTAMENTO ");
                                            foreach ($querydc->result() as $dc){
                                                ?>
                                        <option value="<?php echo $dc->IDDEPTO ?>"  ><?php echo $dc->NOMBREDEPTO?></option>
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
                              <input class="btn btn-primary btn-round" type="submit" name="btnAdd" id="btnAdd" value="Agregar"></input>
                            </div>
                          </div>
                        <?php echo form_close()?>
                      </div>
                    </div>
                </div>
                <!-- Fin de Modal -->
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="docentesv" type="text" onkeyup="doSearch('docentev','docentesv')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="docentev">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID DOCENTE</th>
                      <th>ID DEPTO</th>
                      <th>NOMBRE DEL DOCENTE</th>
                      <th>APELLIDO</th>
                      <th>PROFESION</th>
                      <th>TIPO DE CONTRATO</th>
                      <th>FEHCA DE INGRESO</th>
                      <th>CORREO</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($docentes as $key => $docentes) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $docentes->IDDOCENTE;?></td>
                          <td><?php echo $docentes->IDDEPTO; ?></td>
                          <td><?php echo $docentes->NOMDOCENTE; ?></td>
                          <td><?php echo $docentes->APEDOCENTE; ?></td>
                          <td><?php echo $docentes->PROFDOCENTE; ?></td>
                          <td><?php echo $docentes->TIPOCONTRATO; ?></td>
                          <td><?php echo $docentes->INGREDOCENTE; ?></td>
                          <td><?php echo $docentes->CORREODOCENTE; ?></td>
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_docente/<?php echo $docentes->IDDOCENTE; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_docente/<?php echo $docentes->IDDOCENTE; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?> 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>



      
      

       

        <!-- **************************************************
        ************** TABLA AULAS DE ESTUDIANTES *************************
        *******************************************************-->

        <section id="estudiantes" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Estudiante </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_estudiantes">Agregar estudiante</button>
                <?php echo form_open_multipart('Excel_import/import_data');?>
                <span class="btn  btn-warning btn-file">
                Seleccion Excel<input  type="file" name="file"  />
                </span>
                

                <input class="btn btn-info" type="submit" value="Importar" />

                </form>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_estudiantes" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar estudiante </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_estudiantes")?>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id carrera</label>
                                  <select  id="idcarrera" name="idcarrera" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Carrera --</option>
                                    <?php
                                       $queryce= $this->db->query("SELECT * FROM CARRERA ");
                                            foreach ($queryce->result() as $cc){
                                                ?>
                                        <option value="<?php echo $cc->IDCARRERA ?>"  ><?php echo $cc->NOMCARRERA?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
                                  
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Nombre del estudiante</label>
                                  <input type="text" class="form-control" placeholder="Nombre" id="nomestudiante" name="nomestudiante">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Apellido</label>
                                  <input type="text" class="form-control" placeholder="Apellido" id="apelestudiante" name="apelestudiante">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Telefono del estudiante</label>
                                  <input type="text" class="form-control" placeholder="Telefono" id="telestudiante" name="telestudiante">
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
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="estudiantesv" type="text" onkeyup="doSearch('estudiantev','estudiantesv')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="estudiantev">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID ESTUDIANTE</th>
                      <th>ID CARRERA</th>
                      <th>NOMBRE DEL ESTUDIANTE</th>
                      <th>APELLIDO</th>
                      <th>CARNET</th>
                      <th>CORREO</th>
                      <th>TELEFONO</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($estudiantes as $key => $estudiantes) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $estudiantes->IDESTUDIANTE;?></td>
                          <td><?php echo $estudiantes->IDCARRERA; ?></td>
                          <td><?php echo $estudiantes->NOMESTUDIANTE; ?></td>
                          <td><?php echo $estudiantes->APELESTUDIANTE; ?></td>
                          <td><?php echo $estudiantes->CARNETESTU; ?></td>
                          <td><?php echo $estudiantes->CORREOESTU; ?></td>
                          <td><?php echo $estudiantes->TELESTUDIANTE; ?></td>
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_estudiantes/<?php echo $estudiantes->IDESTUDIANTE; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_estudiantes/<?php echo $estudiantes->IDESTUDIANTE; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>



      

        <!-- **************************************************
        ************** TABLA AULAS DE GRUPOS *************************
        ******************************************************* -->

        <section class="row" id="grupo">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Grupos </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_grupos">Agregar grupos</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_grupos" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar Grupos </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_grupos")?>
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
                                        <option value="<?php echo $mg->IDMATERIA ?>"  ><?php echo $mg->NOMMATERIA?></option>
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
                                        <option value="<?php echo $cg->IDCOORDINADOR ?>"  ><?php echo $cg->NOMCOOR." ".$cg->APECOOR?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
                                  
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Canttidad de cupos</label>
                                  <input type="text" class="form-control" placeholder="cantidad de cupos" id="cantcupos" name="cantcupos">
                                </div>
                              </div>
                              
                              
                            </div>
                            <div class="row">
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Num de grupo</label>
                                  <input type="text" class="form-control" placeholder="Num de grupo" id="numgrupo" name="numgrupo">
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
                                        <option d="<?php echo $key ?>"><?php echo $d ?></option>
                                      <?php }
                                        
                                    ?>  
                                  </select>
                                  
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Año</label>
                                  <input type="text" class="form-control" placeholder="año" id="aniogrupo" name="aniogrupo">
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
                                        <option d="<?php echo $key ?>"><?php echo $d ?></option>
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
                                        <option value="<?php echo $dg->IDDOCENTE ?>"  ><?php echo $dg->NOMDOCENTE." ".$dg->APEDOCENTE?></option>
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
                              <input class="btn btn-primary btn-round" type="submit" name="btnAdd" id="btnAdd" value="Agregar"></input>
                            </div>
                          </div>
                        <?php echo form_close()?>
                      </div>
                    </div>
                </div>
                <!-- Fin de Modal -->
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="gruposv" type="text" onkeyup="doSearch('grupov','gruposv')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="grupov">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID GRUPOS</th>
                      <th>ID COORDINADOR</th>
                      <th>ID MATERIA</th>
                      <th>CANTIDAD CUPOS</th>
                      <th>FECHA CREACION</th>
                      <th>NUM GRUPOS</th>
                      <th>CICLO</th>
                      <th>AÑO</th>
                      <th>ESTADO</th>
                      <th>ID DOCENTE</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($grupo as $key => $grupo) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $grupo->IDGRUPOS;?></td>
                          <td><?php echo $grupo->IDCOORDINADOR; ?></td>
                          <td><?php echo $grupo->IDMATERIA; ?></td>
                          <td><?php echo $grupo->CANTCUPOS; ?></td>
                          <td><?php echo $grupo->FECHACREACION; ?></td>
                          <td><?php echo $grupo->NUMGRUPO; ?></td>
                          <td><?php echo $grupo->CICLOGRUPO; ?></td>
                          <td><?php echo $grupo->ANIOGRUPO; ?></td>
                          <td><?php echo $grupo->ESTGRUPO; ?></td>
                          <td><?php echo $grupo->IDDOCENTE; ?></td>
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_grupos/<?php echo $grupo->IDGRUPOS; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_grupos/<?php echo $grupo->IDGRUPOS; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- **************************************************
        ************** TABLA AULAS DE GRUPOS *************************
        ******************************************************* -->

        <section class="row" id="grupocopia">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Copia de Grupos </h4>
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="gruposvn" type="text" onkeyup="doSearch('grupovn','gruposvn')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="grupovn">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID COPIA</th>
                      <th>ID GRUPO</th>
                      <th>CANTIDAD CUPOS</th>
                      <th>FECHA ACCION</th>
                      <th>NUM GRUPO</th>
                      <th>ACCION</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($grupoc as $key => $grupoc) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $grupoc->IDCOPIAGRUPO;?></td>
                          <td><?php echo $grupoc->IDGRUPOS; ?></td>
                          <td><?php echo $grupoc->COP_CANTICUPOS; ?></td>
                          <td><?php echo $grupoc->FECHAMODIGRUPO; ?></td>
                          <td><?php echo $grupoc->COP_NUMGRUPO; ?></td>
                          <td><?php echo $grupoc->ACCIONCOPIA; ?></td>
                          
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- **************************************************
        ************** TABLA HORARIO DE GRUPOS*************************
        *******************************************************-->

        <section id="horariosgrupos" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Horario de grupos </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_horario">Agregar horario</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_horario" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar horario </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_horarios_grupos")?>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id grupo</label>
                                  <select  id="idgrupos" name="idgrupos" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Grupo --</option>
                                    <?php
                                       $querygh= $this->db->query("SELECT * FROM GRUPOS ");
                                            foreach ($querygh->result() as $gh){
                                                ?>
                                        <option value="<?php echo $gh->IDGRUPOS ?>"  ><?php echo $gh->NUMGRUPO?></option>
                                        <?php
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
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Id aula</label>
                                  <select  id="idaula" name="idaula" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Aula --</option>
                                    <?php
                                       $queryga= $this->db->query("SELECT * FROM AULAS ");
                                            foreach ($queryga->result() as $ga){
                                                ?>
                                        <option value="<?php echo $ga->IDAULA ?>"  ><?php echo $ga->NUMAULA?></option>
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
                              <input class="btn btn-primary btn-round" type="submit" name="btnAdd" id="btnAdd" value="Agregar"></input>
                            </div>
                          </div>
                        <?php echo form_close()?>
                      </div>
                    </div>
                </div>
                <!-- Fin de Modal -->
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="horariossv" type="text" onkeyup="doSearch('horariosv','horariossv')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="horariosv">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID HORARIO DE GRUPO</th>
                      <th>ID GRUPO</th>
                      <th>ID AULA</th>
                      <th>DIA</th>
                      <th>HORA</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($horarios as $key => $horarios) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $horarios->IDHORARIO_GRU;?></td>
                          <td><?php echo $horarios->IDGRUPOS; ?></td>
                          <td><?php echo $horarios->IDAULA; ?></td>
                          <td><?php echo $horarios->DIAHORARIO; ?></td>
                          <td><?php echo $horarios->HORASHORARIO; ?></td>
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_horarios_grupos/<?php echo $horarios->IDHORARIO_GRU; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_horarios_grupos/<?php echo $horarios->IDHORARIO_GRU; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?>   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>





        <!-- **************************************************
        ************** TABLA HORAS SOCIALES *************************
        *******************************************************-->

        <section id="horassociales" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Horas sociales </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_horas_sociales">Agregar horas sociales</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_horas_sociales" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar horas sociales </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_horas_sociales")?>
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
                                        <option value="<?php echo $he->IDESTUDIANTE ?>"  ><?php echo $he->NOMESTUDIANTE." ".$he->APELESTUDIANTE?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Nombre del proyecto</label>
                                  <input type="text" class="form-control" placeholder="nombre del proyecto" id="nomproyecto" name="nomproyecto">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Duracion del proyecto</label>
                                  <input type="text" class="form-control" placeholder="Duracion" id="duracionproyec" name="duracionproyec">
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
                                        <option h="<?php echo $key ?>"><?php echo $h ?></option>
                                      <?php }
                                        
                                    ?>  
                                  </select>
                                  
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Ante-proyecto</label>
                                  <input type="text" class="form-control" placeholder="Ante-proyecto" id="anteproyecto" name="anteproyecto">
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
                                        <option h="<?php echo $key ?>"><?php echo $h ?></option>
                                      <?php }
                                        
                                    ?>  
                                  </select>
                                  
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-8 px-1">
                                <div class="form-group">
                                  <label>Comentario</label>
                                  <input type="text" class="form-control" placeholder="Comentario" id="comentariopro" name="comentariopro">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Id docente</label>
                                  <select  id="iddocente" name="iddocente" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Docente --</option>
                                    <?php
                                       $queryhd= $this->db->query("SELECT * FROM DOCENTE ");
                                            foreach ($queryhd->result() as $hd){
                                                ?>
                                        <option value="<?php echo $hd->IDDOCENTE ?>"  ><?php echo $hd->NOMDOCENTE." ".$hd->APEDOCENTE?></option>
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
                              <input class="btn btn-primary btn-round" type="submit" name="btnAdd" id="btnAdd" value="Agregar"></input>
                            </div>
                          </div>
                        <?php echo form_close()?>
                      </div>
                    </div>
                </div>
                <!-- Fin de Modal -->
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="socialess" type="text" onkeyup="doSearch('sociales','socialess')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="sociales">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>IDHORASSOCIALES</th>
                      <th>IDESTUDIANTE</th>
                      <th>IDDOCENTE</th>
                      <th>NOM. PROYECTO</th>
                      <th>DURACION</th>
                      <th>ESTADO</th>
                      <th>ANTE-PRO</th>
                      <th>EST. ANTE-PRO</th>
                      <th>FECHA</th>
                      <th>COMENTARIO</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($sociales as $key => $sociales) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $sociales->IDHORASSOCIALES;?></td>
                          <td><?php echo $sociales->IDESTUDIANTE; ?></td>
                          <td><?php echo $sociales->IDDOCENTE; ?></td>
                          <td><?php echo $sociales->NOMPROYECTO; ?></td>
                          <td><?php echo $sociales->DURACIONPROYEC; ?></td>
                          <td><?php echo $sociales->ESTADOPROYECTO; ?></td>
                          <td><?php echo $sociales->ANTEPROYECTO; ?></td>
                          <td><?php echo $sociales->ESTADOANTEPROYECTO; ?></td>
                          <td><?php echo $sociales->FECHASOCIALES; ?></td>
                          <td><?php echo $sociales->COMENTARIOPRO; ?></td>
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_horas_sociales/<?php echo $sociales->IDHORASSOCIALES; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_horas_sociales/<?php echo $sociales->IDHORASSOCIALES; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?>  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>





        <!-- **************************************************
        ************** TABLA INSCRIPCION *************************
        *******************************************************-->

        <section id="inscripcion" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Inscripcion </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_inscripcion">Agregar inscripcion</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_inscripcion" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar Inscripcion </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_inscripcion")?>
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
                                        <option value="<?php echo $ie->IDESTUDIANTE ?>"  ><?php echo $ie->NOMESTUDIANTE." ".$ie->APELESTUDIANTE?></option>
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
                                        <option value="<?php echo $ig->IDGRUPOS ?>"  ><?php echo $ig->NUMGRUPO?></option>
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
                              <input class="btn btn-primary btn-round" type="submit" name="btnAdd" id="btnAdd" value="Agregar"></input>
                            </div>
                          </div>
                        <?php echo form_close()?>
                      </div>
                    </div>
                </div>
                <!-- Fin de Modal -->
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="inscripcionsv" type="text" onkeyup="doSearch('inscripcionv','inscripcionsv')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="inscripcionv">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID INSCRIPCION</th>
                      <th>ID ESTUDIANTE</th>
                      <th>ID GRUPOS</th>
                      <th>FECHA DE INSCRIPCION</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($inscripcion as $key => $inscripcion) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $inscripcion->IDINCRIPCION;?></td>
                          <td><?php echo $inscripcion->IDESTUDIANTE; ?></td>
                          <td><?php echo $inscripcion->IDGRUPOS; ?></td>
                          <td><?php echo $inscripcion->FECHAINSCRIP; ?></td>
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_inscripcion/<?php echo $inscripcion->IDINCRIPCION;?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_inscripcion/<?php echo $inscripcion->IDINCRIPCION; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?> 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>





        <!-- **************************************************
        ************** TABLA JEFE *************************
        *******************************************************-->

        <section id="jefe" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Jefe </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_jefe">Agregar jefe</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_jefe" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar Jefe </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_jefe")?>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Nombre jefe</label>
                                  <input type="text" class="form-control" placeholder="Nombre jefe" id="nomjefe" name="nomjefe">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Apellido jefe</label>
                                  <input type="text" class="form-control" placeholder="Apellido" id="apejefe" name="apejefe">
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
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="jefesv" type="text" onkeyup="doSearch('jefev','jefesv')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="jefev">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID JEFE</th>
                      <th>CORREO</th>
                      <th>NOMBRE</th>
                      <th>APELLIDO</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($jefe as $key => $jefe) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $jefe->IDJEFE;?></td>
                          <td><?php echo $jefe->CORREOJEFE;?></td>
                          <td><?php echo $jefe->NOMJEFE; ?></td>
                          <td><?php echo $jefe->APEJEFE; ?></td>
                          
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_jefe/<?php echo $jefe->IDJEFE;?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_jefe/<?php echo $jefe->IDJEFE; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>





        <!-- **************************************************
        ************** TABLA MATERIAS *************************
        *******************************************************-->

        <section id="materias" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Materias </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_materias">Agregar Materia</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_materias" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar materia </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_materias")?>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Codigo materia</label>
                                  <input type="text" class="form-control" placeholder="codigo materia" id="codmateria" name="codmateria">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Nivel de materia</label>
                                  <input type="text" class="form-control" placeholder="Nivel de materia" id="nivelmateria" name="nivelmateria">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Nombre de materia</label>
                                  <input type="text" class="form-control" placeholder="Nombre de materia" id="nommateria" name="nommateria">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Requisito</label>
                                  <input type="text" class="form-control" placeholder="Requisito" id="requisito" name="requisito">
                                </div>
                              </div>
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id carrera</label>
                                  <select  id="idcarrera" name="idcarrera" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Carrera --</option>
                                    <?php
                                       $querycm= $this->db->query("SELECT * FROM CARRERA ");
                                            foreach ($querycm->result() as $cm){
                                                ?>
                                        <option value="<?php echo $cm->IDCARRERA ?>"  ><?php echo $cm->NOMCARRERA?></option>
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
                              <input class="btn btn-primary btn-round" type="submit" name="btnAdd" id="btnAdd" value="Agregar"></input>
                            </div>
                          </div>
                        <?php echo form_close()?>
                      </div>
                    </div>
                </div>
                <!-- Fin de Modal -->
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="materiasv" type="text" onkeyup="doSearch('materiav','materiasv')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="materiav">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID MATERIA</th>
                      <th>ID CARRERA</th>
                      <th>COD MATERIA</th>
                      <th>NIVEL</th>
                      <th>MATERIA</th>
                      <th>REQUISITO</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($materia as $key => $materia) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $materia->IDMATERIA;?></td>
                          <td><?php echo $materia->IDCARRERA; ?></td>
                          <td><?php echo $materia->CODMATERIA; ?></td>
                          <td><?php echo $materia->NIVELMATERIA; ?></td>
                          <td><?php echo $materia->NOMMATERIA; ?></td>
                          <td><?php echo $materia->REQUISITO; ?></td>
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_materias/<?php echo $materia->IDMATERIA; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_materias/<?php echo $materia->IDMATERIA; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?>   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>



        <!-- **************************************************
        ************** TABLA PREINSCRIPCION *************************
        *******************************************************-->

        <section id="preinscripcion" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Preinscripcion </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_preinscripcion">Agregar preinscripcion</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_preinscripcion" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar Preinscripcion </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_preinscripcion")?>
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
                                        <option value="<?php echo $pe->IDESTUDIANTE ?>"  ><?php echo $pe->NOMESTUDIANTE." ".$pe->APELESTUDIANTE?></option>
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
                                        <option value="<?php echo $pm->IDMATERIA ?>"  ><?php echo $pm->NOMMATERIA?></option>
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
                              <input class="btn btn-primary btn-round" type="submit" name="btnAdd" id="btnAdd" value="Agregar"></input>
                            </div>
                          </div>
                        <?php echo form_close()?>
                      </div>
                    </div>
                </div>
                <!-- Fin de Modal -->
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="preinscripcionsvv" type="text" onkeyup="doSearch('vpreinscripcionv','preinscripcionsvv')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="vpreinscripcionv">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID PREINSCRIPCION</th>
                      <th>ID ESTUDIANTE</th>
                      <th>ID MATERIA</th>
                      <th>FECHA</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($preinscripcion as $key => $preinscripcion) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $preinscripcion->IDPREINSCRIPCION;?></td>
                          <td><?php echo $preinscripcion->IDESTUDIANTE; ?></td>
                          <td><?php echo $preinscripcion->IDMATERIA; ?></td>
                          <td><?php echo $preinscripcion->FECHAPREINCRIPCION; ?></td>
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_preinscripcion/<?php echo $preinscripcion->IDPREINSCRIPCION; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_preinscripcion/<?php echo $preinscripcion->IDPREINSCRIPCION; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>





        <!-- **************************************************
        ************** TABLA REGISTRO DE ESTUDIANTE *************************
        *******************************************************-->

        <section id="registroestudiante" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Registro estudiante </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_registro">Agregar registrar nota</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_registro" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar registro de estudiante </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_registro_estudiante")?>
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
                                        <option value="<?php echo $ri->IDINCRIPCION ?>"  ><?php echo $ri->IDINCRIPCION?></option>
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
                                        <option h="<?php echo $key ?>"><?php echo $h ?></option>
                                      <?php }
                                        
                                    ?>  
                                  </select>
                                  
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>nota de materia</label>
                                  <input type="text" class="form-control" placeholder="nota" id="notamateria" name="notamateria">
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
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="registroestudiantesv" type="text" onkeyup="doSearch('registroestudiantev','registroestudiantesv')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="registroestudiantev">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID REGISTRO</th>
                      <th>ID INSCRIPCION</th>
                      <th>FECHA</th>
                      <th>ESTADO</th>
                      <th>NOTA</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($registroestudiante as $key => $registroestudiante) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $registroestudiante->IDREGISTROESTU;?></td>
                          <td><?php echo $registroestudiante->IDINCRIPCION; ?></td>
                          <td><?php echo $registroestudiante->FECHAREGIESTU; ?></td>
                          <td><?php echo $registroestudiante->ESTADOMATERIA; ?></td>
                          <td><?php echo $registroestudiante->NOTAMATERIA; ?></td>
                          
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_registro_estudiante/<?php echo $registroestudiante->IDREGISTROESTU; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_registro_estudiante/<?php echo $registroestudiante->IDREGISTROESTU; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?>   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>





        <!-- **************************************************
        ************** TABLA REPORTE DE CHOQUE *************************
        *******************************************************-->

        <section id="reportechoque" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Reporte de choque </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_reporte">Agregar reporte</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_reporte" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar reporte </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_reportechoque")?>
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
                                        <option value="<?php echo $cch->IDCOORDINADOR ?>"  ><?php echo $cch->NOMCOOR." ".$cch->APECOOR?></option>
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
                                        <option value="<?php echo $pe->IDESTUDIANTE ?>"  ><?php echo $pe->NOMESTUDIANTE." ".$pe->APELESTUDIANTE?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
                                  
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Comentario</label>
                                  <input type="text" class="form-control" placeholder="comentario" id="comentariochoque" name="comentariochoque">
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
              </div>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="reportechoquesv" type="text" onkeyup="doSearch('reportechoquev','reportechoquesv')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="reportechoquev">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID CHOQUE</th>
                      <th>ID ESTUDIANTE</th>
                      <th>ID COORDINADOR</th>
                      <th>FECHA</th>
                      <th>COMENTARIO</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($reportechoque as $key => $reportechoque) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $reportechoque->IDCHOQUE;?></td>
                          <td><?php echo $reportechoque->IDESTUDIANTE; ?></td>
                          <td><?php echo $reportechoque->IDCOORDINADOR; ?></td>
                          <td><?php echo $reportechoque->FECHACHOQUE; ?></td>
                          <td><?php echo $reportechoque->COMENTARIOCHOQUE; ?></td>
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_reportechoque/<?php echo $reportechoque->IDCHOQUE; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_reportechoque/<?php echo $reportechoque->IDCHOQUE; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <tr class='noSearch hide'>
                            <td colspan="5"></td>
                        </tr>
                      <?php }?> 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>


      <!-- FIN TABLAS -->
      </div>

      <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
<?php if($this->session->flashdata("error")): ?>  
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?php echo $this->session->flashdata("error"); ?>',
            showConfirmButton: false,
            timer: 3000
    });
    <?php endif;

 if($this->session->flashdata("success")): ?>  
  Swal.fire({
      icon: 'success',
      title: 'Bien hecho!',
      text: '<?php echo $this->session->flashdata("success"); ?>',
      showConfirmButton: false,
      timer: 3000
});
<?php endif;

     ?>
</script>