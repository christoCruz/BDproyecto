
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
            <a class="navbar-brand" href="javascript:;">Inscripcion de materias</a>
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

$queryidfecha= $this->db->query("SELECT * FROM ACCION ");
foreach ($queryidfecha->result() as $fecha){

  $fechaactual = date('Y-m-d');
  $fechaactual=date('Y-m-d', strtotime($fechaactual));
  $inscripcioninicio = date('Y-m-d', strtotime($fecha->FECHAINICIO));
  $inscripcionfinal = date('Y-m-d', strtotime($fecha->FECHAFINAL));
      
  if (($fechaactual >= $inscripcioninicio) && ($fechaactual <= $inscripcionfinal)){
    

      ?>

      <div class="content">
                <section id="accion" class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                      <h4 class="card-title">Materias a Inscribir</h4>
                          

                          </form>
                        <div  class="card-body">
                          <div id="scroll" class="table-responsive">
                          
                            <table class="table" id="yecto">
                              <thead class=" text-primary">
                                <th>#</th>
                                <th>MATERIA</th>
                                <th>GRUPO</th>
                                <th>HORARIO</th>
                                <th class="text-right">ACCION</th>
                              </thead>
                              <tbody>

      <?php

      $number=1;
      $idestudiante=$_SESSION['Nombre'];

      

        $queryidestudiante= $this->db->query("SELECT * FROM ESTUDIANTES WHERE CORREOESTU='".$idestudiante."'");
        foreach ($queryidestudiante->result() as $estudiante){

          $queryidpre= $this->db->query("SELECT * FROM PREINSCRIPCION WHERE IDESTUDIANTE='".$estudiante->IDESTUDIANTE."'");
          foreach ($queryidpre->result() as $pre){

            $queryidmateria= $this->db->query("SELECT * FROM MATERIAS WHERE IDMATERIA='".$pre->IDMATERIA."'");
            foreach ($queryidmateria->result() as $materia){

              $queryidgrupo= $this->db->query("SELECT * FROM GRUPOS WHERE IDMATERIA='".$materia->IDMATERIA."' AND ESTGRUPO='HABILITADO'");
              foreach ($queryidgrupo->result() as $grupo){

                $queryidhorario= $this->db->query("SELECT * FROM HORARIOS_GRUPOS WHERE IDGRUPOS='".$grupo->IDGRUPOS."'");
                foreach ($queryidhorario->result() as $horario){

                  $queryidaula= $this->db->query("SELECT * FROM AULAS WHERE IDAULA='".$horario->IDAULA."'");
                  foreach ($queryidaula->result() as $aula){

                  ?>

                        <tr>
                          <th scope="row"><?php echo $number++; ?></th>
                          <td><?php echo $materia->NOMMATERIA;?></td>
                          <td><?php echo $grupo->NUMGRUPO; ?></td>
                          <td><?php echo $horario->DIAHORARIO." - ".$horario->HORASHORARIO." - Aula: ".$aula->NUMAULA; ?></td>
                          <td><?php echo $materia->NIVELMATERIA; ?></td>
                          <td class="text-right"><a href="<?php echo base_url(); ?>tablas/inscripcion_agregar/<?php echo $grupo->IDGRUPOS; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-check"></i></a>
                          <a href="<?php echo base_url(); ?>tablas/reportechoque_agregar/<?php echo $grupo->IDGRUPOS; ?>" class="btn btn-danger btn-round btn-icon " ><i class="fa fa-thumbs-down"></i></a>
                        </tr>

                  <?php
                }

                }

              }

            }

          }

        }
      
    }else{
      ?>
    <div class="content">
    <div class="row">
      <div class="col-md-12">
    <h3 class="description">El periodo de inscripcion no esta habilitado</h3>
    </div>
        </div>
      </div>
    <?php


    }
  }
        ?>
