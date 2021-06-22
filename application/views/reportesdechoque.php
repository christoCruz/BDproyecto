
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
            <a class="navbar-brand" href="javascript:;">Proyectos de horas sociales</a>
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
<div class="content">
      <section id="accion" class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title">Reportes</h4>
                          <div  class="card-body">
                            <div id="scroll" class="table-responsive">
                            <table class="table" id="yecto">
                                <thead class=" text-primary">
                                  <th>#</th>
                                  <th>COMENTARIO</th>
                                  <th>FECHA</th>
                                </thead>
                                <tbody>

      <?php
      $number=1;
      $iddocente=$_SESSION['Nombre'];
      $queryidcoor= $this->db->query("SELECT * FROM COORDINADOR WHERE CORREOCOOR='".$iddocente."'");
      foreach ($queryidcoor->result() as $coordinador){

            $queryidreporte= $this->db->query("SELECT * FROM REPORTECHOQUE WHERE IDCOORDINADOR='".$coordinador->IDCOORDINADOR."'");
            foreach ($queryidreporte->result() as $reporte){

            ?>

                
                            
                              
                                  
                                    <tr>
                                    <th scope="row"><?php echo $number++; ?></th>
                                      <td><?php echo $reporte->COMENTARIOCHOQUE; ?></td>
                                      <td><?php echo $reporte->FECHACHOQUE;?></td>
                                      

                                  
                                


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