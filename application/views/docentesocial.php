
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
            <a class="navbar-brand" href="javascript:;">Proyectos de Horas Sociales</a>
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
      <!-- End Navbar -->

      <?php
      $iddocente=$_SESSION['Nombre'];
      $queryiddocente= $this->db->query("SELECT * FROM DOCENTE WHERE CORREODOCENTE='".$iddocente."'");
      foreach ($queryiddocente->result() as $docente){

        $queryidhoras= $this->db->query("SELECT * FROM HORAS_SOCIALES WHERE IDDOCENTE='".$docente->IDDOCENTE."'");
        foreach ($queryidhoras->result() as $horas){

            $queryidestudiante= $this->db->query("SELECT * FROM ESTUDIANTES WHERE IDESTUDIANTE='".$horas->IDESTUDIANTE."'");
            foreach ($queryidestudiante->result() as $estudiante){
                $number =1;
                if($horas->ESTADOPROYECTO=='A'){

    ?>
    
            <div class="content">
                  <section id="accion" class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title"><?php echo ($estudiante->NOMESTUDIANTE." - ".$estudiante->APELESTUDIANTE); ?></h4>
                          <div  class="card-body">
                            <div id="scroll" class="table-responsive">
                            <form>
                                <input class="form-control" id="reg" type="text" onkeyup="doSearch('data_table','reg')"  placeholder="Buscar"/>
                                <br>
                            </form>
                            
                              <table class="table" id="data_table">
                                <thead class=" text-primary">
                                  <th>#</th>
                                  <th>PROYECTO</th>
                                  <th>DURACION</th>
                                  <th>ANTEPROYECTO</th>
                                  <th>ESTADO</th>
                                  <th>FECHA</th>
                                  <th class="text-right">ACCION</th>
                                </thead>
                                <tbody>
                                  
                                    <tr>
                                    <th scope="row"><?php echo $number++; ?></th>
                                      <td><?php echo $horas->NOMPROYECTO; ?></td>
                                      <td><?php echo $horas->DURACIONPROYEC;?></td>
                                      <td ><?php echo $horas->ANTEPROYECTO; ?></td>
                                      <td><?php echo $horas->ESTADOANTEPROYECTO; ?></td>
                                      <td><?php echo $horas->FECHASOCIALES; ?></td>
                                      <td class="text-right"><a href="<?php echo base_url(); ?>tablas/seleccion_re/<?php echo $horas->IDHORASSOCIALES; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>
                                      <a href="<?php echo base_url(); ?>tablas/seleccion_re/<?php echo $horas->IDHORASSOCIALES; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a></td>

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

      ?>

    