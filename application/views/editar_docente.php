<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>
<!-- Modal de Agregar -->
<div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Docente </h5>
        </div>
        <form action="<?php echo base_url(); ?>tablas/actualizar_docente/<?php echo $IDDOCENTE; ?>" method="post" role="form" >
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Nombre del docente</label>
                  <input value="<?php echo $NOMDOCENTE; ?>" type="text" class="form-control" placeholder="Nombre del docente" id="nomdocente" name="nomdocente">
                </div>
              </div>
              <div class="col-md-4 ">
                <div class="form-group">
                  <label>Apellido del docente</label>
                  <input value="<?php echo $APEDOCENTE; ?>" type="text" class="form-control" placeholder="Apellido del docente" id="apedocente" name="apedocente">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 pr-1">
                <div class="form-group">
                  <label>proefesion del docente</label>
                  <input value="<?php echo $PROFDOCENTE; ?>" type="text" class="form-control" placeholder="profesion" id="profdocente" name="profdocente">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Tipo de contrato</label>
                  <select id="tipocontrato" name="tipocontrato" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Tipo--</option>
                                    <?php
                                    
                                      $tipo = array(
                                        1=> "HORAS CLASE",
                                        2=> "PLAZA"
                                      );

                                      foreach($tipo as $key => $d) { ?>
                                        <option d="<?php echo $key ?>" <?php if($TIPOCONTRATO==$d){  echo 'selected="selected"';} ?>><?php echo $d ?></option>
                                      <?php }
                                        
                                    ?>  
                                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 pr-1">
                <div class="form-group">
                  <label>Correo</label>
                  <input value="<?php echo $CORREODOCENTE; ?>" type="email" pattern=".+@ues\.edu\.sv" class="form-control" placeholder="correo" id="correodocente" name="correodocente">
                </div>
              </div>
              <div class="col-md-4 ">
                <div class="form-group">
                  <label>Id departamento</label>
                  <input value="<?php echo $IDDEPTO; ?>" type="text" class="form-control" placeholder="Id departamento" id="iddepto" name="iddepto">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="update ml-auto mr-auto">
            <button type="submit" class="btn btn-primary btn-round">Editar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>