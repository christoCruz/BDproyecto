
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
            <a class="navbar-brand" >Estadisticas de horas sociales</a>
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
    .chart-wrap {
        --chart-width:420px;
        --grid-color:#aaa;
        --bar-color:#F16335;
        --bar-thickness:40px;
        --bar-rounded: 3px;
        --bar-spacing:10px;
 
        font-family:sans-serif;
        width:var(--chart-width);
    }
 
    .chart-wrap .title{
        font-weight:bold;
        padding:1.8em 0;
        text-align:center;
        white-space:nowrap;
    }
 
    /* cuando definimos el gráfico en horizontal, lo giramos 90 grados */
    .chart-wrap.horizontal .grid{
        transform:rotate(-90deg);
    }
 
    .chart-wrap.horizontal .bar::after{
        /* giramos las letras para horizontal*/
        transform: rotate(45deg);
        padding-top:0px;
        display: block;
    }
 
    .chart-wrap .grid{
        margin-left:50px;
        position:relative;
        padding:5px 0 5px 0;
        height:100%;
        width:100%;
        border-left:2px solid var(--grid-color);
    }
 
    /* posicionamos el % del gráfico*/
    .chart-wrap .grid::before{
        font-size:0.8em;
        font-weight:bold;
        content:'0%';
        position:absolute;
        left:-0.5em;
        top:-1.5em;
    }
    .chart-wrap .grid::after{
        font-size:0.8em;
        font-weight:bold;
        content:'100%';
        position:absolute;
        right:-1.5em;
        top:-1.5em;
    }
 
    /* giramos las valores de 0% y 100% para horizontal */
    .chart-wrap.horizontal .grid::before, .chart-wrap.horizontal .grid::after {
        transform: rotate(90deg);
    }
 
    .chart-wrap .bar {
        width: var(--bar-value);
        height:var(--bar-thickness);
        margin:var(--bar-spacing) 0;
        background-color:var(--bar-color);
        border-radius:0 var(--bar-rounded) var(--bar-rounded) 0;
    }
 
    .chart-wrap .bar:hover{
        opacity:0.7;
    }
 
    .chart-wrap .bar::after{
        content:attr(data-name);
        margin-left:100%;
        padding:10px;
        display:inline-block;
        white-space:nowrap;
    }
 
    </style>

<div class="content">
        <div class="container">
          <div class="ccol-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card ">
              <div class="card-header ">
                <h4 class="card-title center-block">Estudiantes con horas sociales activas</h4>
              </div>
              <div class="card-body ">
                      <br>
                      <br>
                      <br>

    <?php 
      $var1=1;
      $var2=100;
      $correo=$_SESSION['Nombre'];
      $valoresY;
      $valoresX;
      $queryid= $this->db->query("SELECT IDJEFE FROM JEFE WHERE CORREOJEFE='".$correo."'");
      foreach ($queryid->result() as $jefe){

            $querydepartamento= $this->db->query("SELECT * FROM DEPARTAMENTO WHERE IDJEFE=".$jefe->IDJEFE."");
            foreach ($querydepartamento->result() as $depto){

                ?>

<div class="chart-wrap "> <!-- quitar el estilo "horizontal" para visualizar verticalmente -->
 
  <div class="grid">
                <?php

                $querycarrera= $this->db->query("SELECT * FROM CARRERA WHERE IDDEPTO=".$depto->IDDEPTO."");
                foreach ($querycarrera->result() as $carrera){

                    $contador=0;
                    $cantest=0;
                    $valoresX=$carrera->NOMCARRERA;

                    $queryestudiante= $this->db->query("SELECT * FROM ESTUDIANTES WHERE IDCARRERA=".$carrera->IDCARRERA."");
                    foreach ($queryestudiante->result() as $estudiante){

                        $cantest++;

                        $queryehoras= $this->db->query("SELECT * FROM HORAS_SOCIALES WHERE IDESTUDIANTE=".$estudiante->IDESTUDIANTE." AND ESTADOPROYECTO='A'");
                        foreach ($queryehoras->result() as $horas){
                            $contador++;

                                }

                        }
                        if($contador>0){
                        $porcentaje=((float)$contador*100)/$cantest;
                        $porcentaje = round($porcentaje, 0); 
                        $valoresY=$contador;

                        ?>



      <div class="bar" data-toggle="modal" data-target="#GSCCModal" style='<?php echo strval('--bar-value:'.$porcentaje.'%;')?>' data-name="<?php echo $valoresX?>" title="<?php echo $porcentaje.'%'?>"></div>
      <div id="GSCCModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><?php echo $valoresX ?></h4>
            </div>
            <div class="modal-body">
                <h5>De los <?php echo $cantest ?> estudiantes que cursan la materia, solo <?php echo $contador ?> 
             tienen sus proyectos de horas sociales activos, representando asi el <?php echo $porcentaje ?>%</h5>
            </div>
            </div>
        </div>
       </div>
 

                        <?php
                        }
                }
                    
?>
  </div>
</div>
<br>
<br>
<br>
        </div>

        </div>
          </div>
        </div>
      </section>
      </div>
<?php
              
       
              }

            }
?>

