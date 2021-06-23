
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
            <a class="navbar-brand" href="javascript:;">Mi cuenta</a>
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

      <style>
    .center-block {
        text-align: center;
}
</style>

<script language="javascript" type="text/javascript">
		function validar_form()
		{
            const button = document.getElementById('buttonn');
			var contrasenna = document.getElementById('password').value;
			if(validar_clave(contrasenna) == true)
			{
				
                button.disabled = false;
			}
			else
			{
				button.disabled = true;
			}
		}
		function validar_clave(contrasenna)
		{
			if(contrasenna.length >= 8)
			{		
				var mayuscula = false;
				var minuscula = false;
				var numero = false;
				var caracter_raro = false;
				
				for(var i = 0;i<contrasenna.length;i++)
				{
					if(contrasenna.charCodeAt(i) >= 65 && contrasenna.charCodeAt(i) <= 90)
					{
						mayuscula = true;
					}
					else if(contrasenna.charCodeAt(i) >= 97 && contrasenna.charCodeAt(i) <= 122)
					{
						minuscula = true;
					}
					else if(contrasenna.charCodeAt(i) >= 48 && contrasenna.charCodeAt(i) <= 57)
					{
						numero = true;
					}
					else
					{
						caracter_raro = true;
					}
				}
				if(mayuscula == true && minuscula == true && caracter_raro == true && numero == true)
				{
					return true;
				}
			}
			return false;
		}
		</script>
      <!-- End Navbar -->

      <?php
    
      $number=1;
      $usuario=$_SESSION['Nombre'];
      $tipo=$_SESSION['TipoUsuario'];
      $estado=$_SESSION['EstadooUsuario'];
      $idusuario=$_SESSION['IdUsuario'];
      
      $queryidusuario= $this->db->query("SELECT * FROM USUARIO WHERE USUARIO='".$usuario."'");
      foreach ($queryidusuario->result() as $usu){

      }

      ?>

      
      <div class="content">
        <div class="container">
          <div class="ccol-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card ">
              <div class="card-header ">
                <h4 class="card-title center-block"><?php echo $usuario; ?></h4>
              </div>
              <form action="<?php echo base_url(); ?>usuarios/usuario_actualizar/<?php echo $idusuario; ?>" method="post" role="form" >
                <div class="card-body ">
              
                  <label>Contraseña anterior</label>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="" id="oldpassword" name="oldpassword">
                  </div>
                  <label>Nueva contraseña</label>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="" id="password" name="password" onkeyup="javascript:validar_form();">
                    
                    <input type="hidden" class="form-control" placeholder="" id="usuario" name="usuario" value="<?php echo $usuario; ?>">
                    <input type="hidden" class="form-control" placeholder="" id="tipousuairo" name="tipousuairo" value="<?php echo $tipo; ?>">
                    <input type="hidden" class="form-control" placeholder="" id="estadousuario" name="estadousuario" value="<?php echo $estado; ?>">
                  </div>
                </div>
                  <div class="card-footer center-block">
                        <button type="submit" class="btn btn-info btn-round" id="buttonn" disabled="True">Cambiar contraseña</button>
                  </div>
              </form>
              
              
            </div>
          </div>
        </div>
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
            title: 'Felicidades',
            text: '<?php echo $this->session->flashdata("success"); ?>',
            showConfirmButton: false,
            timer: 3000
    });
    <?php endif;
     ?>
</script>



