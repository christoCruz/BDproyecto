
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
            <a class="navbar-brand" href="javascript:;">Mi Pensum</a>
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
              
                  

    <?php
      $number=1;
      $idestudiante=$_SESSION['Nombre'];
      $tipo=$_SESSION['TipoUsuario'];

      if($tipo=='ESTUDIANTE'){

        $queryidestudiante= $this->db->query("SELECT * FROM ESTUDIANTES WHERE CORREOESTU='".$idestudiante."'");
        foreach ($queryidestudiante->result() as $estudiante){

            $queryidcarrera= $this->db->query("SELECT * FROM CARRERA WHERE IDCARRERA='".$estudiante->IDCARRERA."'");
            foreach ($queryidcarrera->result() as $carrera){

                ?>
                <h4 class="card-title"><?php echo $carrera->NOMCARRERA?> </h4>  
                </div>
                <div  class="card-body">
                    <div id="scroll" class="table-responsive">
                    
                      <table class="table" >
                        <thead class=" text-primary">
                          <th>#</th>
                          <th>CODIGO</th>
                          <th>NOMBRE</th>
                          <th>CICLO</th>
                          <th>REQUISITOS</th>
                        </thead>
                        <tbody>

                <?php

                $queryidcarrera= $this->db->query("SELECT * FROM MATERIAS WHERE IDCARRERA='".$carrera->IDCARRERA."' ORDER BY NIVELMATERIA ASC");
                foreach ($queryidcarrera->result() as $materia){
?>

<tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $materia->CODMATERIA;?></td>
                          <td><?php echo $materia->NOMMATERIA; ?></td>
                          <td><?php echo $materia->NIVELMATERIA; ?></td>
                          <td><?php echo $materia->REQUISITO; ?></td>
                          </tr>

<?php


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
                <?php

            }

        }
    }
    if($tipo=='COORDINADOR'){

        $queryidcoor= $this->db->query("SELECT * FROM COORDINADOR WHERE CORREOCOOR='".$idestudiante."'");
        foreach ($queryidcoor->result() as $coor){

            $queryidcarrera= $this->db->query("SELECT * FROM CARRERA WHERE IDCARRERA='".$coor->IDCARRERA."'");
            foreach ($queryidcarrera->result() as $carrera){

                ?>
                <h4 class="card-title"><?php echo $carrera->NOMCARRERA?> </h4>  
                </div>
                <div  class="card-body">
                    <div id="scroll" class="table-responsive">
                    
                      <table class="table" >
                        <thead class=" text-primary">
                          <th>#</th>
                          <th>CODIGO</th>
                          <th>NOMBRE</th>
                          <th>CICLO</th>
                          <th>REQUISITOS</th>
                        </thead>
                        <tbody>

                <?php

                $queryidcarrera= $this->db->query("SELECT * FROM MATERIAS WHERE IDCARRERA='".$carrera->IDCARRERA."' ORDER BY NIVELMATERIA ASC");
                foreach ($queryidcarrera->result() as $materia){
?>

<tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $materia->CODMATERIA;?></td>
                          <td><?php echo $materia->NOMMATERIA; ?></td>
                          <td><?php echo $materia->NIVELMATERIA; ?></td>
                          <td><?php echo $materia->REQUISITO; ?></td>
                          </tr>

<?php


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
                <?php

            }

        }




    }

    ?>
