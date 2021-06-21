<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="jquery.tabledit.js"></script>
<script type="text/javascript" src="custom_table_edit.js"></script>
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
            <a class="navbar-brand" href="javascript:;">Registro de notas</a>
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
      <!-- End Navbar -->

      
      <?php
      $iddocente=$_SESSION['Nombre'];
      $queryiddocente= $this->db->query("SELECT * FROM DOCENTE WHERE CORREODOCENTE='".$iddocente."'");
      foreach ($queryiddocente->result() as $docente){

        $queryidgrupo= $this->db->query("SELECT * FROM GRUPOS WHERE IDDOCENTE='".$docente->IDDOCENTE."'");
        foreach ($queryidgrupo->result() as $grupo){

          $queryidmateria= $this->db->query("SELECT * FROM MATERIAS WHERE IDMATERIA='".$grupo->IDMATERIA."'");
          foreach ($queryidmateria->result() as $materia){

            $queryidinscripcion= $this->db->query("SELECT * FROM INSCRIPCION WHERE IDGRUPOS='".$grupo->IDGRUPOS."'");
            foreach ($queryidinscripcion->result() as $inscripcion){

              $queryidestudiante= $this->db->query("SELECT * FROM ESTUDIANTES WHERE IDESTUDIANTE='".$inscripcion->IDESTUDIANTE."'");
              foreach ($queryidestudiante->result() as $estudiante){

                $queryidregistro= $this->db->query("SELECT * FROM REGISTRO_ESTUDIANTE WHERE IDINCRIPCION='".$inscripcion->IDINCRIPCION."'");
                foreach ($queryidregistro->result() as $registro){

                  $number =1;
      ?>
            <div class="content">
                <div class="row">
                  <div class="col-md-12">
                    <h3 class="description"><?php echo $materia->CODMATERIA." - ".$materia->NOMMATERIA?></h3>
                  </div>
                </div>
              </div>
                  <section id="accion" class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title"><?php echo ($grupo->CICLOGRUPO." - ".$grupo->ANIOGRUPO." - #".$grupo->NUMGRUPO); ?></h4>
                          <div  class="card-body">
                            <div id="scroll" class="table-responsive">
                            <form>
                                <input class="form-control" id="reg" type="text" onkeyup="doSearch('data_table','reg')"  placeholder="Buscar"/>
                                <br>
                            </form>
                            
                              <table class="table" id="data_table">
                                <thead class=" text-primary">
                                  <th>#</th>
                                  <th>CARNET</th>
                                  <th>ESTUDIANTE</th>
                                  <th>ESTADO</th>
                                  <th>NOTA</th>
                                  <th class="text-right">ACCION</th>
                                </thead>
                                <tbody>
                                  
                                    <tr>
                                    <th scope="row"><?php echo $number++; ?></th>
                                      <td><?php echo $estudiante->CARNETESTU; ?></td>
                                      <td><?php echo $estudiante->NOMESTUDIANTE." ".$estudiante->APELESTUDIANTE;?></td>
                                      <td ><?php echo $registro->ESTADOMATERIA; ?></td>
                                      <td><?php echo $registro->NOTAMATERIA; ?></td>
                                      <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_re/<?php echo $registro->IDREGISTROESTU; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a></td>

                                    <tr class='noSearch hide'>
                                        <td colspan="5"></td>
                                    </tr>
                                  
                                </tbody>
                              </table>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>

      <?php
      
                }
            }

          }

        }


        }
      }
      ?>