
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
            <a class="navbar-brand" href="javascript:;">Pre-inscripcion de materias</a>
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
              <a class="btn btn-danger btn-round" href="<?php echo base_url('Login/salir'); ?>">Cerrar sesion</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
<?php
      $number=1;
          $idestudiante=$_SESSION['Nombre'];
          $queryidestudiante= $this->db->query("SELECT * FROM ESTUDIANTES WHERE CORREOESTU='".$idestudiante."'");
          foreach ($queryidestudiante->result() as $estudiante){

            $queryidcarrera= $this->db->query("SELECT * FROM CARRERA WHERE IDCARRERA='".$estudiante->IDCARRERA."'");
            foreach ($queryidcarrera->result() as $carrera){

              $queryidmateria= $this->db->query("SELECT * FROM MATERIAS WHERE IDCARRERA='".$carrera->IDCARRERA."'");
              foreach ($queryidmateria->result() as $materia){

                $queryidpre= $this->db->query("SELECT  *  FROM PREINSCRIPCION WHERE IDMATERIA='".$materia->IDMATERIA."'");
                   // foreach ($queryidpre->result() as $pre){

                  $queryidinscripcion= $this->db->query("SELECT * FROM INSCRIPCION WHERE IDESTUDIANTE='".$estudiante->IDCARRERA."'");
                  foreach ($queryidinscripcion->result() as $inscripcion){

                    

                    $queryidregistro= $this->db->query("SELECT * FROM REGISTRO_ESTUDIANTE WHERE IDINCRIPCION='".$inscripcion->IDINCRIPCION."'");
                    //foreach ($queryidregistro->result() as $registro){

                      if($queryidregistro->num_rows=0){
                        
                          if($queryidpre->num_rows=0){

                            if($materia->NIVELMATERIA=1){
              

    ?>

              <div class="content">
                <section id="accion" class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h2><?php echo $materia->IDMATERIA?></h2>
                      
                          

                          </form>
                        <div  class="card-body">
                          <div id="scroll" class="table-responsive">
                          
                            <table class="table" id="yecto">
                              <thead class=" text-primary">
                                <th>#</th>
                                <th>MATERIA</th>
                                <th class="text-right">ACCION</th>
                              </thead>
                              <tbody>
    <?php

                //if($queryidregistro->num_rows=0){

                  

                      $queryidpre= $this->db->query("SELECT * FROM PREINSCRIPCION WHERE IDESTUDIANTE='".$estudiante->IDESTUDIANTE."' AND IDMATERIA=".$materia->IDMATERIA);
                      

                        if($queryidpre->num_rows=0){

                        

?>
                    <th scope="row"><?php echo $number++; ?></th>
                    <td><?php echo $materia->NOMMATERIA; ?></td>
                    <td class="text-right"><a href="<?php echo base_url(); ?>tablas/horas_seleccion/<?php echo $horas->IDHORASSOCIALES; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-edit"></i></a>


<?php
                        
                      //}
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
  <?php

              

              }}

            }



          }

?>

      