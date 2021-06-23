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
          <h5 class="modal-title">Editar Departamento </h5>
        </div>
        <form action="<?php echo base_url(); ?>tablas/actualizar_departamento/<?php echo $IDDEPTO; ?>" method="post" role="form" >
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8 pr-1">
                <div class="form-group">
                  <label>Nombre de departamento</label>
                  <input type="text" class="form-control" placeholder="Nombre de departamento" id="nombredepto" name="nombredepto" value="<?php echo $NOMBREDEPTO; ?>">
                </div>
              </div>
              <div class="col-md-4 ">
                <div class="form-group">
                  <label>Id jefe</label>
                  <select  id="idjefe" name="idjefe" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Jefe --</option>
                                    <?php
                                       $querydj= $this->db->query("SELECT * FROM JEFE ");
                                            foreach ($querydj->result() as $dj){
                                                ?>
                                        <option value="<?php echo $dj->IDJEFE ?>"  <?php if($IDJEFE==$dj->IDJEFE){  echo 'selected="selected"';} ?>><?php echo $dj->NOMJEFE." ".$dj->APEJEFE?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
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