
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
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
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
      <!-- End Navbar -->

      

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
                  <table class="table">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>IDP</th>
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
                      <?php }?>   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- FIN TABLAS -->
      </div>

      <div class="content">

        <!-- **************************************************
        ************** TABLA AULA *************************
        *******************************************************-->

        <div class="row">
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
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Foto de Aula</label>
                                  <input type="img" class="form-control" placeholder="imagen" id="fotoaula" name="fotoaula">
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
                  <table class="table">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>IDP</th>
                      <th>Numero de aula</th>
                      <th>Foto de la Aula</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                     <!-- <?php $number =1; foreach ($tablas as $key => $tabla) {?>
                        <tr>
                         <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $tabla->IDP; $idd=$tabla->IDP;?></td>
                          <td><?php echo $tabla->NOMBRE; ?></td>
                          <td><?php echo $tabla->APELLIDO; ?></td>
                          
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_aulas/<?php echo $tabla->IDP; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_aulas/<?php echo $tabla->IDP; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                      <?php }?>-->   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- FIN TABLAS -->
      </div>

      <div class="content">

        <!-- **************************************************
        ************** TABLA AULAS DE CARRERA *************************
        *******************************************************-->

        <div class="row">
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
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Materias</label>
                                  <input type="text" class="form-control" placeholder="Num materias" id="materias" name="materias">
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
                  <table class="table">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>IDCARRERA</th>
                      <th>ID DEPTO</th>
                      <th>COD DE CARRERA</th>
                      <th>MATERERIAS</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <!--<?php $number =1; foreach ($tablas as $key => $tabla) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $tabla->IDP; $idd=$tabla->IDP;?></td>
                          <td><?php echo $tabla->NOMBRE; ?></td>
                          <td><?php echo $tabla->APELLIDO; ?></td>
                          
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_carrera/<?php echo $tabla->IDP; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_carrera/<?php echo $tabla->IDP; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                      <?php }?>   -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- FIN TABLAS -->
      </div>

      <div class="content">

        <!-- **************************************************
        ************** TABLA AULAS DE COORDINADOR *************************
        *******************************************************-->

        <div class="row">
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
                                  <label>Id usuario</label>
                                  <input type="text" class="form-control" placeholder="id usuario" id="idusuario" name="idusuario">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Id docente</label>
                                  <input type="text" class="form-control" placeholder="id docente" id="iddocente" name="iddocente">
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
                  <table class="table">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID COORDINADOR</th>
                      <th>ID CARRERA</th>
                      <th>ID USUARIO</th>
                      <th>ID DOCENTE</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <!--<?php $number =1; foreach ($tablas as $key => $tabla) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $tabla->IDP; $idd=$tabla->IDP;?></td>
                          <td><?php echo $tabla->NOMBRE; ?></td>
                          <td><?php echo $tabla->APELLIDO; ?></td>
                          
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_coordinador/<?php echo $tabla->IDP; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_coordinador/<?php echo $tabla->IDP; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                      <?php }?>   -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- FIN TABLAS -->
      </div>


      <div class="content">

        <!-- **************************************************
        ************** TABLA AULAS DE DEPARTAMENTO *************************
        *******************************************************-->

        <div class="row">
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
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Nombre de departamento</label>
                                  <input type="text" class="form-control" placeholder="Nombre de departamento" id="nombredepto" name="nombredepto">
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
                  <table class="table">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID DEPTO</th>
                      <th>NOMBRE DE DEPARTAMENTO</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <!--<?php $number =1; foreach ($tablas as $key => $tabla) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $tabla->IDP; $idd=$tabla->IDP;?></td>
                          <td><?php echo $tabla->NOMBRE; ?></td>
                          <td><?php echo $tabla->APELLIDO; ?></td>
                          
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_departamento/<?php echo $tabla->IDP; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_departamento/<?php echo $tabla->IDP; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                      <?php }?>   -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- FIN TABLAS -->
      </div>
      

      <div class="content">

        <!-- **************************************************
        ************** TABLA AULAS DE DOCENTE *************************
        *******************************************************-->

        <div class="row">
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
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Id usuario</label>
                                  <input type="text" class="form-control" placeholder="id usuario" id="idusuario" name="idusuario">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Nombre del docente</label>
                                  <input type="text" class="form-control" placeholder="Nombre del docente" id="nomdocente" name="nomdocente">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Apellido del docente</label>
                                  <input type="text" class="form-control" placeholder="Apellido del docente" id="apedocente" name="apedocente">
                                </div>
                              </div>
                            </div>
                          </div>
                            <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>proefesion del docente</label>
                                  <input type="text" class="form-control" placeholder="profesion" id="profdocente" name="profdocente">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Estado de docente</label>
                                  <input type="text" class="form-control" placeholder="Estado" id="estdocente" name="estdocente">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Tipo de contrato</label>
                                  <input type="text" class="form-control" placeholder="tipo de contrato" id="tipocontrato" name="tipocontrato">
                                </div>
                              </div>
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Fecha de infreso del docente</label>
                                  <input type="text" class="form-control" placeholder="Fecha" id="ingredocente" name="ingredocente">
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
                  <table class="table">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID DOCENTE</th>
                      <th>ID USUARIO</th>
                      <th>NOMBRE DEL DOCENTE</th>
                      <th>APELLIDO</th>
                      <th>PROFESION</th>
                      <th>ESTADO</th>
                      <th>TIPO DE CONTRATO</th>
                      <th>FEHCA DE INGRESO</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <!--<?php $number =1; foreach ($tablas as $key => $tabla) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $tabla->IDP; $idd=$tabla->IDP;?></td>
                          <td><?php echo $tabla->NOMBRE; ?></td>
                          <td><?php echo $tabla->APELLIDO; ?></td>
                          
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_docente/<?php echo $tabla->IDP; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_docente/<?php echo $tabla->IDP; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                      <?php }?>   -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- FIN TABLAS -->
      </div>
      

       <div class="content">

        <!-- **************************************************
        ************** TABLA AULAS DE ESTUDIANTES *************************
        *******************************************************-->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Estudiante </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_estudiante">Agregar estudiante</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_estudiante" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar estudiante </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_estudiante")?>
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
                                  <label>Id usuario</label>
                                  <input type="text" class="form-control" placeholder="Id usuario" id="idusuario" name="idusuario">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Nombre del estudiante</label>
                                  <input type="text" class="form-control" placeholder="Nombre" id="nomestudiante" name="nomestudiante">
                                </div>
                              </div>
                            </div>
                          </div>
                            <div class="modal-body">
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
                  <table class="table">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID ESTUDIANTE</th>
                      <th>ID CARRERA</th>
                      <th>ID USUARIO</th>
                      <th>NOMBRE DEL ESTUDIANTE</th>
                      <th>APELLIDO</th>
                      <th>CARNET</th>
                      <th>CORREO</th>
                      <th>TELEFONO</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <!--<?php $number =1; foreach ($tablas as $key => $tabla) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $tabla->IDP; $idd=$tabla->IDP;?></td>
                          <td><?php echo $tabla->NOMBRE; ?></td>
                          <td><?php echo $tabla->APELLIDO; ?></td>
                          
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_estudiantes/<?php echo $tabla->IDP; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_estudiantes/<?php echo $tabla->IDP; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                      <?php }?>   -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- FIN TABLAS -->
      </div>                 



      <div class="content">

        <!-- **************************************************
        ************** TABLA AULAS DE GRUPOS *************************
        *******************************************************-->

        <div class="row">
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
                                  <label>canttidad de cupos</label>
                                  <input type="text" class="form-control" placeholder="cantidad de cupos" id="cantcupos" name="cantcupos">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Num de grupo</label>
                                  <input type="text" class="form-control" placeholder="Num de grupo" id="numgrupo" name="numgrupo">
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
                  <table class="table">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID GRUPOS</th>
                      <th>ID COORDINADOR</th>
                      <th>CANTIDAD CUPOS</th>
                      <th>FECHA CREACION</th>
                      <th>NUM GRUPOS</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <!--<?php $number =1; foreach ($tablas as $key => $tabla) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $tabla->IDP; $idd=$tabla->IDP;?></td>
                          <td><?php echo $tabla->NOMBRE; ?></td>
                          <td><?php echo $tabla->APELLIDO; ?></td>
                          
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_grupos/<?php echo $tabla->IDP; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>tablas/eliminar_coordinador/grupos<?php echo $tabla->IDP; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                      <?php }?>   -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- FIN TABLAS -->
      </div>