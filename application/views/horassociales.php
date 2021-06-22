
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
            <a class="navbar-brand" href="javascript:;">Horas sociales</a>
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
      <div class="content">
      <section id="accion" class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarhora">Agregar proyecto social</button>
                <?php echo form_open_multipart('Excel_import/import_doc');?>
                

                </form>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                
                  <table class="table" id="yecto">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>NOMBRE PROYECTO</th>
                      <th>DURACION</th>
                      <th>ANTEPROYECTO</th>
                      <th>ESTADO</th>
                      <th>FECHA</th>
                      <th>COMENTARIOS</th>
                      <th class="text-right">ACCION</th>
                    </thead>
                    <tbody>

      <?php

          $number=1;
          $idestudiante=$_SESSION['Nombre'];
          $queryidestudiante= $this->db->query("SELECT * FROM ESTUDIANTES WHERE CORREOESTU='".$idestudiante."'");
          foreach ($queryidestudiante->result() as $estudiante){

            $queryidhoras= $this->db->query("SELECT * FROM HORAS_SOCIALES WHERE IDESTUDIANTE='".$estudiante->IDESTUDIANTE."'");
            foreach ($queryidhoras->result() as $horas){

?>
<tr>
                  <th scope="row"><?php echo $number++; ?></th>
                    <td><?php echo $horas->NOMPROYECTO; ?></td>
                    <td><?php echo $horas->DURACIONPROYEC;?></td>
                    <td><?php echo $horas->ANTEPROYECTO;?></td>
                    <td><?php echo $horas->ESTADOPROYECTO; ?></td>
                    <td><?php echo $horas->FECHASOCIALES; ?></td>
                    <td><?php echo $horas->COMENTARIOPRO; ?></td>
                    <td class="text-right"><a href="<?php echo base_url(); ?>tablas/horas_seleccion/<?php echo $horas->IDHORASSOCIALES; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                    

<?php

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
    <div class="modal fade bd-example-modal-lg" id="agregarhora" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Agregar Proyecto </h5>
            </div>
            <?php echo form_open("tablas/horas_agregar")?>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12 pr-1">
                    <div class="form-group">
                      <label>Nombre Proyecto</label>
                      <input type="text" class="form-control" placeholder="Nombre del pryecto" id="nomproyecto" name="nomproyecto">
                    </div>
                  </div>
                </div>

                <div class="row">
                <div class="col-md-6 px-1">
                    <div class="form-group">
                      <label>Duracion</label>
                      <input type="text" class="form-control" placeholder="Duracion" id="duracionproyec" name="duracionproyec">
                    </div>
                  </div>
                  <div class="col-md-6 px-1">
                    <div class="form-group">
                      <span class="btn  btn-warning btn-file">
                        Subir Anteproyecto<input  type="file" name="file"  />
                        </span>
                    </div>
                  </div>
                </div>
                

                <div class="row">
                  <div class="col-md-6 px-1">
                    <div class="form-group">
                      <label>Tutor</label>
                      <select id="iddocente" name="iddocente" class="form-control  " aria-label="Default select example">
                        <option disabled selected>-- Seleccionar Docente --</option>
                        <?php

                                $querydoc= $this->db->query("SELECT * FROM DOCENTE ");
                                foreach ($querydoc->result() as $doc){

                                echo "<option class='' value='".$doc->IDDOCENTE."'>" .$doc->NOMDOCENTE." ".$doc->APEDOCENTE."</option>";  // displaying data in option menu
                                }
                                
                            
                        ?>  
                      </select>
                    </div>
                  </div>
                </div>
                
                <?php
                
                    $queryidestudiante= $this->db->query("SELECT * FROM ESTUDIANTES WHERE CORREOESTU='".$idestudiante."'");
                    foreach ($queryidestudiante->result() as $estudiante){
                      echo"<input type='hidden' class='form-control'  id='idestudiante' name='idestudiante' value='".$estudiante->IDESTUDIANTE."'>";
                    }
                ?>
                
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