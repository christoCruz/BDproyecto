
      <?php 
      $var1=1;
      $var2=100;
      $correo=$_SESSION['Nombre'];
      $valoresY=array();//cantidad
      $valoresX=array();//carrera
      $queryid= $this->db->query("SELECT IDJEFE FROM JEFE WHERE CORREOJEFE='".$correo."'");
      foreach ($queryid->result() as $jefe){

            $querydepartamento= $this->db->query("SELECT * FROM DEPARTAMENTO WHERE IDJEFE=".$jefe->IDJEFE."");
            foreach ($querydepartamento->result() as $depto){

                

                $querycarrera= $this->db->query("SELECT * FROM CARRERA WHERE IDDEPTO=".$depto->IDDEPTO."");
                foreach ($querycarrera->result() as $carrera){

                    $contador=0;
                    $valoresX[]=$carrera->NOMCARRERA;

                    $queryestudiante= $this->db->query("SELECT * FROM ESTUDIANTES WHERE IDCARRERA=".$carrera->IDCARRERA."");
                    foreach ($queryestudiante->result() as $estudiante){

                        $queryehoras= $this->db->query("SELECT * FROM HORAS_SOCIALES WHERE IDESTUDIANTE=".$estudiante->IDESTUDIANTE." AND ESTADOPROYECTO='P'");
                        foreach ($queryehoras->result() as $horas){
                            $contador++;

                                }

                        }
                    $valoresY[]=$contador;

                }
                    

              
       
              }

            }

            $datosX=json_encode($valoresX);
	                $datosY=json_encode($valoresY);
              
              ?>  <h1><?php $datosX ?><h1>
                    <div id="graficaBarras"></div>

                    <script type="text/javascript">
                        function crearCadenaBarras(json){
                            var parsed = JSON.parse(json);
                            var arr = [];
                            for(var x in parsed){
                                arr.push(parsed[x]);
                            }
                            return arr;
                        }
                    </script>

                    <script type="text/javascript">

                        datosX=crearCadenaBarras('<?php echo $datosX ?>');
                        datosY=crearCadenaBarras('<?php echo $datosY ?>');

                        var data = [
                            {
                                x: datosX,
                                y: datosY,
                                type: 'bar'
                            }
                        ];

                        Plotly.newPlot('graficaBarras', data);
                    </script>

              <?php
      
       
       ?>
                    
