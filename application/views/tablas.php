
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
        ************** TABLA PROBAR *************************
        *******************************************************-->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Probar</h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar">Agregar Prueba</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar Prueba </h5>
                        </div>
                        <?php echo form_open("tablas/agregar")?>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>NOMBRE</label>
                                  <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>APELLIDO</label>
                                  <input type="text" class="form-control" placeholder="Apellido" id="apellido" name="apellido">
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
                    <input class="form-control" id="datoss" type="text" onkeyup="doSearch('datos','datoss')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="datos">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>IDAULA</th>
                      <th>NOMBRE</th>
                      <th>APELLIDO</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($tablas as $key => $tabla) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $tabla->IDP; $idd=$tabla->IDP;?></td>
                          <td><?php echo $tabla->NOMBRE; ?></td>
                          <td><?php echo $tabla->APELLIDO; ?></td>
                          
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion/<?php echo $tabla->IDP; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar/<?php echo $tabla->IDP; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
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
        </div>



        <!-- **************************************************
        ************** TABLA ACCION *************************
        *******************************************************-->

        <section id="accion" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Acciones</h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_accion">Agregar Accion</button>
                <!-- Modal de Agregar -->
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
                <div id="scroll" class="table-responsive">
                <form>
                    <input class="form-control" id="accionessv" type="text" onkeyup="doSearch('accionesv','accionessv')"  placeholder="Buscar"/>
                    <br>
                </form>
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
                          <a href="<?php echo base_url(); ?>tablas/eliminar_accion/<?php echo $acc->IDACCION; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
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
                                  <input type="text" class="form-control" placeholder="id departamento" id="iddepto" name="iddepto">
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
                                  <input type="text" class="form-control" placeholder="id carrera" id="idcarrera" name="idcarrera">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Correo</label>
                                  <input type="text" class="form-control" placeholder="correo" id="correocoor" name="correocoor">
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
                                  <input type="text" class="form-control" placeholder="Id jefe" id="idjefe" name="idjefe">
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
                                  <label>proefesion del docente</label>
                                  <input type="text" class="form-control" placeholder="profesion" id="profdocente" name="profdocente">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Tipo de contrato</label>
                                  <input type="text" class="form-control" placeholder="tipo de contrato" id="tipocontrato" name="tipocontrato">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Fecha de infreso del docente</label>
                                  <input type="text" class="form-control" placeholder="Fecha" id="ingredocente" name="ingredocente">
                                </div>
                              </div>
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Correo</label>
                                  <input type="text" class="form-control" placeholder="correo" id="correodocente" name="correodocente">
                                </div>
                              </div>
                              <div class="col-md-4 ">
                                <div class="form-group">
                                  <label>Id departamento</label>
                                  <input type="text" class="form-control" placeholder="Id departamento" id="iddepto" name="iddepto">
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
                                  <input type="text" class="form-control" placeholder="id carrera" id="idcarrera" name="idcarrera">
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
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Carnet</label>
                                  <input type="text" class="form-control" placeholder="carnet" id="carnetestu" name="carnetestu">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Correo del estudiante</label>
                                  <input type="text" class="form-control" placeholder="correo" id="correoestu" name="correoestu">
                                </div>
                              </div>
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
                                  <input type="text" class="form-control" placeholder="id materia" id="idmateria" name="idmateria">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Id coordinador</label>
                                  <input type="text" class="form-control" placeholder="id coordinador" id="idcoordinador" name="idcoordinador">
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
                                  <input type="text" class="form-control" placeholder="Ciclo grupo" id="ciclogrupo" name="ciclogrupo">
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
                                  <input type="text" class="form-control" placeholder="Estado" id="estgrupo" name="estgrupo">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Id Docente</label>
                                  <input type="text" class="form-control" placeholder="Id docente" id="iddocente" name="iddocente">
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
                                  <input type="text" class="form-control" placeholder="Id de grupo" id="idgrupos" name="idgrupos">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Dia</label>
                                  <input type="text" class="form-control" placeholder="dia" id="diahorario" name="diahorario">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Hora</label>
                                  <input type="text" class="form-control" placeholder="Hora" id="horashorario" name="horashorario">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Id aula</label>
                                  <input type="text" class="form-control" placeholder="Id Aula" id="idaula" name="idaula">
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
                                  <input type="text" class="form-control" placeholder="id estudiante" id="idestudiante" name="idestudiante">
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
                                  <input type="text" class="form-control" placeholder="Estado del proyeto" id="estadoproyecto" name="estadoproyecto">
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
                                  <input type="text" class="form-control" placeholder="Estado ante-proyecto" id="estadoanteproyecto" name="estadoanteproyecto">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Comentario</label>
                                  <input type="text" class="form-control" placeholder="Comentario" id="comentariopro" name="comentariopro">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Id docente</label>
                                  <input type="text" class="form-control" placeholder="Id docente" id="iddocente" name="iddocente">
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
                                  <input type="text" class="form-control" placeholder="id estudiante" id="idestudiante" name="idestudiante">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Id grupos</label>
                                  <input type="text" class="form-control" placeholder="Id grupo" id="idgrupos" name="idgrupos">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Fecha de inscripcion</label>
                                  <input type="text" class="form-control" placeholder="Fecha" id="fechainscrip" name="fechainscrip">
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
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Correo</label>
                                  <input type="text" class="form-control" placeholder="Correo" id="correojefe" name="correojefe">
                                </div>
                              </div>
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
                                  <input type="text" class="form-control" placeholder="id carrera" id="idcarrera" name="idcarrera">
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
                                  <input type="text" class="form-control" placeholder="id estudiante" id="idestudiante" name="idestudiante">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Id materia</label>
                                  <input type="text" class="form-control" placeholder="id materia" id="idmateria" name="idmateria">
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
                                  <input type="text" class="form-control" placeholder="id inscripcion" id="idincripcion" name="idincripcion">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>estado de materia</label>
                                  <input type="text" class="form-control" placeholder="estado de materia" id="estadomateria" name="estadomateria">
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
                                  <label>Id docente</label>
                                  <input type="text" class="form-control" placeholder="id docente" id="iddocente" name="iddocente">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Id estudiante</label>
                                  <input type="text" class="form-control" placeholder="Id estudiante" id="idestudiante" name="idestudiante">
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
                      <th>IDDOCENTE</th>
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
                          <td><?php echo $reportechoque->IDDOCENTE; ?></td>
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