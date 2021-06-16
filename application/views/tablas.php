
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

      

      