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
                <h5 class="modal-title">Editar Prueba </h5>
            </div>
            <form action="<?php echo base_url(); ?>tablas/actualizar/<?php echo $IDP; ?>" method="post" role="form" >
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>NOMBRE</label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo $NOMBRE; ?>">
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>APELLIDO</label>
                                <input type="text" class="form-control" name="apellido" value="<?php echo $APELLIDO; ?>">
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
