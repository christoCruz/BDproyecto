<script type="text/javascript">
    $(window).on('load', function() {
        $('#modificar').modal('show');
    });
</script>

<div class="modal fade bd-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Grupos </h5>
        </div>
        <form action="<?php echo base_url(); ?>tablas/actualizar_grupos/<?php echo $IDGRUPOS; ?>" method="post" role="form" >
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4 pr-1">
                <div class="form-group">
                  <label>Id materia</label>
                  <input type="text" class="form-control" placeholder="id materia" id="idmateria" name="idmateria" value="<?php echo $IDMATERIA; ?>">
                </div>
              </div>
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Id coordinador</label>
                  <input type="text" class="form-control" placeholder="id coordinador" id="idcoordinador" name="idcoordinador" value="<?php echo $IDCOORDINADOR; ?>">
                </div>
              </div>
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>canttidad de cupos</label>
                  <input type="text" class="form-control" placeholder="cantidad de cupos" id="cantcupos" name="cantcupos" value="<?php echo $CANTCUPOS; ?>">
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Num de grupo</label>
                  <input type="text" class="form-control" placeholder="Num de grupo" id="numgrupo" name="numgrupo" value="<?php echo $NUMGRUPO; ?>">
                </div>
              </div>
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Ciclo del grupo</label>
                  <input type="text" class="form-control" placeholder="Ciclo grupo" id="ciclogrupo" name="ciclogrupo" value="<?php echo $CICLOGRUPO; ?>">
                </div>
              </div>
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Año</label>
                  <input type="text" class="form-control" placeholder="año" id="aniogrupo" name="aniogrupo" value="<?php echo $ANIOGRUPO; ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Estado</label>
                  <input type="text" class="form-control" placeholder="Estado" id="estgrupo" name="estgrupo" value="<?php echo $ESTGRUPO; ?>">
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