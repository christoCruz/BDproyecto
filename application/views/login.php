<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    LOGIN
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url(); ?>assets/demo/demo.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<style>
    .center-block {
        text-align: center;
}
</style>
<body style="background-color:#f4f3ef;">
    <div class="wrapper wrapper-full-page ">
    

    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    <div class="content">
        <div class="container">
          <div class="card"></div>
          <div class="card"></div>
          <div class="card"></div>
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <form method="post" action="<?php echo base_url();?>Login" enctype="multipart/form-data">
              <div class="card card-login">
                <div class="card-header ">
                  <div class="card-header ">
                    <h3 class="header text-center">Login</h3>
                    <h4 class="header text-center">Univeridad de El Salvador</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-single-02"></i>
                      </span>
                    </div>
                    <input type="email" name="usuario" pattern=".+@ues\.edu\.sv" class="form-control" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-key-25"></i>
                      </span>
                    </div>
                    <input type="Password" name="contra" class="form-control" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                  <br>
                <div class="card-footer center-block ">
                <input type="submit" class="btn btn-danger btn-round" value="Ingresar">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
     </div>
  </div>
    
</body>

<script src="<?php echo base_url(); ?>assets/extra/assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/extra/assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/extra/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/extra/assets/js/script.js"></script>
<script>
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

     ?>
</script>


</html>