
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
            <a class="navbar-brand" href="javascript:;">Notas</a>
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

    <div class="content">
      <section class="row" id="grupo">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <h4 class="card-title">NOTAS </h4>
                </div>
                  <div  class="card-body">
                    <div id="scroll" class="table-responsive">
                    
                      <table class="table" >
                        <thead class=" text-primary">
                          <th>#</th>
                          <th>MATERIA</th>
                          <th>NOTA</th>
                          <th>ESTADO</th>
                          <th>CICLO</th>
                        </thead>
                        <tbody>


      <?php
    
      $number=1;
      $idestudiante=$_SESSION['Nombre'];
      $queryidestudiante= $this->db->query("SELECT * FROM ESTUDIANTES WHERE CORREOESTU='".$idestudiante."'");
      foreach ($queryidestudiante->result() as $estudiante){

        $queryidinscripcion= $this->db->query("SELECT * FROM INSCRIPCION WHERE IDESTUDIANTE='".$estudiante->IDESTUDIANTE."'");
        foreach ($queryidinscripcion->result() as $inscripcion){

          $queryidgrupo=$this->db->query("SELECT * FROM GRUPOS WHERE IDGRUPOS='".$inscripcion->IDGRUPOS."'");
          foreach ($queryidgrupo->result() as $grupo){

            $queryidmateria= $this->db->query("SELECT * FROM MATERIAS WHERE IDMATERIA='".$grupo->IDMATERIA."' ORDER BY NIVELMATERIA DESC");
            foreach ($queryidmateria->result() as $materia){

              $queryidregistro= $this->db->query("SELECT * FROM REGISTRO_ESTUDIANTE WHERE IDINCRIPCION='".$inscripcion->IDINCRIPCION."'");
              foreach ($queryidregistro->result() as $registro){

                ?>

                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $materia->NOMMATERIA;?></td>
                          <td><?php echo $registro->NOTAMATERIA; ?></td>
                          <td><?php echo $registro->ESTADOMATERIA; ?></td>
                          <td><?php echo $materia->NIVELMATERIA; ?></td>
                        </tr>

                <?php

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