
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
                <section id="accion" class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                      <h4 class="card-title">Materias a Preinscribir </h4>
                          

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
      $number=1;
      
      $fechaactual = date('m');
      if(intval($fechaactual)<7){
        
      }
          $idestudiante=$_SESSION['Nombre'];
          $queryidestudiante= $this->db->query("SELECT * FROM ESTUDIANTES WHERE CORREOESTU='".$idestudiante."'");
          foreach ($queryidestudiante->result() as $estudiante){

            if(intval($fechaactual)<7){
            $queryidconsulta= $this->db->query("select nommateria,idmateria from materias natural join carrera natural join estudiantes where estudiantes.idestudiante=".$estudiante->IDESTUDIANTE." and materias.idmateria not in (select idmateria from preinscripcion where estudiantes.idestudiante=".$estudiante->IDESTUDIANTE." and mod(materia.nivelmateria,2) = 0)
            union
            select nommateria,idmateria from materias natural join grupos natural join inscripcion where inscripcion.idincripcion in (select idincripcion from registro_estudiante where registro_estudiante.estadomateria='R' ) and inscripcion.idestudiante=".$estudiante->IDESTUDIANTE."
            union 
            select nommateria,idmateria from materias where materias.requisito like  (select nommateria,idmateria from materias natural join grupos natural join inscripcion where inscripcion.idincripcion in  (select idincripcion from registro_estudiante where registro_estudiante.estadomateria='A' ) and inscripcion.idestudiante=".$estudiante->IDESTUDIANTE.")");
            }else{
              $queryidconsulta= $this->db->query("select nommateria,idmateria from materias natural join carrera natural join estudiantes where estudiantes.idestudiante=".$estudiante->IDESTUDIANTE." and materias.idmateria not in (select idmateria from preinscripcion where estudiantes.idestudiante=".$estudiante->IDESTUDIANTE."and mod(materia.nivelmateria,2) <> 0)
            union
            select nommateria,idmateria from materias natural join grupos natural join inscripcion where inscripcion.idincripcion in (select idincripcion from registro_estudiante where registro_estudiante.estadomateria='R' ) and inscripcion.idestudiante=".$estudiante->IDESTUDIANTE." 
            union
            select nommateria,idmateria from materias where materias.requisito like  (select nommateria,idmateria from materias natural join grupos natural join inscripcion where inscripcion.idincripcion in  (select idincripcion from registro_estudiante where registro_estudiante.estadomateria='A' ) and inscripcion.idestudiante=".$estudiante->IDESTUDIANTE.")");

            }
            foreach ($queryidconsulta->result() as $consulta){

            

           // $queryidcarrera= $this->db->query("SELECT * FROM CARRERA WHERE IDCARRERA='".$estudiante->IDCARRERA."'");
           // foreach ($queryidcarrera->result() as $carrera){

             // $queryidmateria= $this->db->query("SELECT * FROM MATERIAS WHERE IDCARRERA='".$carrera->IDCARRERA."'");
             // foreach ($queryidmateria->result() as $materia){

              //  $queryidpre= $this->db->query("SELECT  *  FROM PREINSCRIPCION WHERE IDMATERIA='".$materia->IDMATERIA."'");
                   // foreach ($queryidpre->result() as $pre){

                //  $queryidinscripcion= $this->db->query("SELECT * FROM INSCRIPCION WHERE IDESTUDIANTE='".$estudiante->IDCARRERA."'");
                //  foreach ($queryidinscripcion->result() as $inscripcion){

                    

                   // $queryidregistro= $this->db->query("SELECT * FROM REGISTRO_ESTUDIANTE WHERE IDINCRIPCION='".$inscripcion->IDINCRIPCION."'");
                    //foreach ($queryidregistro->result() as $registro){

                      //if($queryidregistro->num_rows=0){
                        
                        //  if($queryidpre->num_rows=0){

                          //  if($materia->NIVELMATERIA=1){
              

    ?>

              
    <?php

                //if($queryidregistro->num_rows=0){

                  

                     // $queryidpre= $this->db->query("SELECT * FROM PREINSCRIPCION WHERE IDESTUDIANTE='".$estudiante->IDESTUDIANTE."' AND IDMATERIA=".$materia->IDMATERIA);
                      

                        //if($queryidpre->num_rows=0){

                        

?>
                    <tr>
                    <th scope="row"><?php echo $number++; ?></th>
                    <td><?php echo $consulta->NOMMATERIA; ?></td>
                    <td class="text-right"><a href="<?php echo base_url(); ?>tablas/preinscripcion_agregar/<?php echo $consulta->IDMATERIA; ?>" class="btn btn-info btn-round btn-icon " ><i class="fa fa-check"></i></a>
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

      <section id="accion" class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            <h4 class="card-title">Materias preinscritas</h4>
                

                </form>
              <div  class="card-body">
                <div id="scroll" class="table-responsive">
                
                  <table class="table" id="yecto">
                    <thead class=" text-primary">
                      <th>#</th>
                      <th>MATERIA</th>
                      <th>FECHA DE PREINSCRIPCION</th>
                    </thead>
                    <tbody>
  
  <?php

                 $queryidpre= $this->db->query("SELECT  *  FROM PREINSCRIPCION WHERE IDESTUDIANTE='".$estudiante->IDESTUDIANTE."'");
                foreach ($queryidpre->result() as $pre){ 
                     
                    $queryidmateria= $this->db->query("SELECT * FROM MATERIAS WHERE IDMATERIA='".$pre->IDMATERIA."'");
                    foreach ($queryidmateria->result() as $materia){

                      ?>

                    <th scope="row"><?php echo $number++; ?></th>
                    <td><?php echo $materia->NOMMATERIA; ?></td>
                    <td><?php echo $pre->FECHAPREINCRIPCION; ?></td>


<?php



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