<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>

<!-- Modal Modificar -->
<div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Carrera </h5>
            </div>
            <form action="<?php echo base_url(); ?>tablas/actualizar_carrera/<?php echo $IDCARRERA; ?>" method="post" role="form" >
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Id departamento</label>
                        <select  id="iddepto" name="iddepto" class="form-control  " aria-label="Default select example">
                                    <option disabled selected>-- Seleccionar Departamento --</option>
                                    <?php
                                            $querydc= $this->db->query("SELECT * FROM DEPARTAMENTO ");
                                            foreach ($querydc->result() as $dc){
                                                ?>
                                        <option value="<?php echo $dc->IDDEPTO ?>" <?php if($IDDEPTO==$dc->IDDEPTO){  echo 'selected="selected"';} ?>  ><?php echo $dc->NOMBREDEPTO?></option>
                                        <?php
                                            }
                                    ?>  
                                  </select>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Codigo de carrera</label>
                        <input type="text" value="<?php echo $CODCARRERA; ?>"class="form-control" placeholder="Codigo de carrera" id="codcarrera" name="codcarrera">
                      </div>
                    </div>
                    <div class="col-md-4 ">
                      <div class="form-group">
                        <label>Materias</label>
                        <input type="text" value="<?php echo $MATERIAS; ?>"class="form-control" placeholder="Num materias" id="materias" name="materias">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Nombre de carrera</label>
                        <input type="text" value="<?php echo $NOMCARRERA; ?>"class="form-control" placeholder="Nombre de carrera" id="nomcarrera" name="nomcarrera">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Editar</button>
                    </div>
                  </div>
                </div>
            </form>
        </div>
    </div>
</div>