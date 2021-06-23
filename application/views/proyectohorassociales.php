
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

      
      <!-- End Navbar -->
      <div class="content">
<?php
      $iddocente=$_SESSION['Nombre'];
      $queryidcoor= $this->db->query("SELECT * FROM COORDINADOR WHERE CORREOCOOR='".$iddocente."'");
      foreach ($queryidcoor->result() as $coordinador){

        $queryidcarrera= $this->db->query("SELECT * FROM CARRERA WHERE IDCARRERA='".$coordinador->IDCARRERA."'");
        foreach ($queryidcarrera->result() as $carrera){

          $queryidetudiante= $this->db->query("SELECT * FROM ESTUDIANTES WHERE IDCARRERA='".$carrera->IDCARRERA."'");
          foreach ($queryidetudiante->result() as $estudiante){

            $queryidhoras= $this->db->query("SELECT * FROM HORAS_SOCIALES WHERE IDESTUDIANTE='".$estudiante->IDESTUDIANTE."'");
            foreach ($queryidhoras->result() as $horas){
              $number =1;
              if($horas->ESTADOPROYECTO=='P' && $horas->ESTADOANTEPROYECTO=='P'){
?>

                
                  <section id="accion" class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title"><?php echo ($estudiante->NOMESTUDIANTE." ".$estudiante->APELESTUDIANTE); ?></h4>
                          <div  class="card-body">
                            <div id="scroll" class="table-responsive">
                            
                              <table class="table" id="yecto">
                                <thead class=" text-primary">
                                  <th>#</th>
                                  <th>NOMBRE PROYECTO</th>
                                  <th>DURACION</th>
                                  <th>PROYECTO</th>
                                  <th>ESTADO</th>
                                  <th>FECHA</th>
                                  <th class="text-right">ACCION</th>
                                </thead>
                                <tbody>
                                  
                                    <tr>
                                    <th scope="row"><?php echo $number++; ?></th>
                                      <td><?php echo $horas->NOMPROYECTO; ?></td>
                                      <td><?php echo $horas->DURACIONPROYEC;?></td>
                                      <td><a class="btn btn-info btn-round btn-icon " title="Descargar Archivo" href="<?php echo base_url(); ?>uploads/<?php echo $horas->ANTEPROYECTO; ?>" download="<?php echo $horas->ANTEPROYECTO; ?>" ><i class="fa fa-download"></i> </a></td>
                                      
                                      <td><?php echo $horas->ESTADOPROYECTO; ?></td>
                                      <td><?php echo $horas->FECHASOCIALES; ?></td>
                                      <td class="text-right"><a href="<?php echo base_url(); ?>tablas/coordinador_comentario/<?php echo $horas->IDHORASSOCIALES; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-comment"></i></a>
                                      <a href="<?php echo base_url(); ?>tablas/estado_proyecto/<?php echo $horas->IDHORASSOCIALES; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-check"></i></a></td>

                                  
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

?> 
 </div>       
 <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
<?php if($this->session->flashdata("error")): ?>  
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?php echo $this->session->flashdata("error"); ?>',
            showConfirmButton: false,
            timer: 3000
    });
    <?php endif;

 if($this->session->flashdata("success")): ?>  
  Swal.fire({
      icon: 'success',
      title: 'Bien hecho!',
      text: '<?php echo $this->session->flashdata("success"); ?>',
      showConfirmButton: false,
      timer: 3000
});
<?php endif;

     ?>
</script>