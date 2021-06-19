
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
            <a class="navbar-brand" href="javascript:;">Usuarios</a>
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
      <script language="javascript">
        function doSearch2(nombre)
        {
            const tableReg = document.getElementById(nombre);
            const searchText = document.getElementById('searchTermv').value.toLowerCase();
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
        <!-- **************************************************
        ************** TABLA USUARIO *************************
        *******************************************************-->

        <section id="usuario" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabla Usuario </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_registro">Agregar usuario</button>
                <!-- Modal de Agregar -->
                <div class="modal fade bd-example-modal-lg" id="agregar_registro" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar usuario </h5>
                        </div>
                        <?php echo form_open("tablas/agregar_usuario")?>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4 pr-1">
                                <div class="form-group">
                                  <label>Usuario</label>
                                  <input type="text" class="form-control" placeholder="usuario" id="usuario" name="usuario">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Contraseña</label>
                                  <input type="text" class="form-control" placeholder="contraseña" id="password" name="password">
                                </div>
                              </div>
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>tipo de usuario</label>
                                  <input type="text" class="form-control" placeholder="tipo usuario" id="tipousuairo" name="tipousuairo">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4 px-1">
                                <div class="form-group">
                                  <label>Estado de usuario</label>
                                  <input type="text" class="form-control" placeholder="estado de usuario" id="estadousuario" name="estadousuario">
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
                    <input class="form-control" id="searchTermv" type="text" onkeyup="doSearch2('usuarioc')"  placeholder="Buscar"/>
                    <br>
                </form>
                  <table class="table" id="usuarioc">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>ID USUARIO</th>
                      <th>USUARIO</th>
                      <th>PASSWORD</th>
                      <th>TIPO DE USUARIO</th>
                      <th>ESTADO DE USUARIO</th>
                      <th class="text-right"> ACCIONES</th>
                    </thead>
                    <tbody>
                      <?php $number =1; foreach ($usuario as $key => $usuario) {?>
                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $usuario->IDUSUARIO;?></td>
                          <td><?php echo $usuario->USUARIO;?></td>
                          <td><?php echo $usuario->PASSWORD; ?></td>
                          <td><?php echo $usuario->TIPOUSUAIRO; ?></td>
                          <td><?php echo $usuario->ESTADOUSUARIO; ?></td>
                          <td class="text-right"><a href="<?php echo base_url(); ?>usuarios/seleccion_usuario/<?php echo $usuario->IDUSUARIO; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                          
                          <a href="<?php echo base_url(); ?>usuarios/eliminar_usuario/<?php echo $usuario->IDUSUARIO; ?>" class="btn btn-danger btn-round btn-icon" ><i class="fa fa-trash"></i></a> </td>
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
      </div>