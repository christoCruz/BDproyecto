<?php defined('BASEPATH') OR exit('No direct script access allowed');
   
   class tablas_model extends CI_Model{

        function __construct()
        {
           parent::__construct(); 
           $this->load->database();
        }

        //consulta ingresoo de usuario
        function agregar($data){ 
        //hora y fecha    
        //$parametro=array('consulta'=>"insert into probrar (nombre, apellido) values ('".$data["nombre"]."','".$data["apellido"]."')");
        
        $parametro=array(array('name'=>':nombres','value'=>$data['nombre'],'length'=>-1,'type'=>SQLT_CHR),
                         array('name'=>':apellidos','value'=>$data['apellido'],'length'=>-1,'type'=>SQLT_CHR));



        //$this->db->query("execute ejemplo('insert into probar (nombre, apellido) values (''".$data["nombre"]."'',''".$data["apellido"]."'')')");
        //$this->db->stored_procedure('','ejemplo',"'insert into probar (nombre, apellido) values (''".$data["nombre"]."'',''".$data["apellido"]."'')'");
        //$this->db->stored_procedure('','ejemplo','insert into probrar (nombre, apellido) values ('.$data["nombre"].','.$data["apellido"].')');
        
        $this->db->stored_procedure('package','pr',$parametro);



        //$parametro=array(array('name'=>':parametro','value'=>'insert into probrar (nombre, apellido) values (\'mm\',\'kk\')','length'=>-1,'type'=>SQLT_CHR));
        //$this->db->stored_procedure('paquete','procedimiento',$parametro);



        //$this->db->insert("PROBAR",array("NOMBRE"=>$data["nombre"],
        //    "APELLIDO"=>$data["apellido"]));

        }

        
        
        function mostrar(){/*
           $query = $this->db->get("empleados");
           if($query->num_rows() > 0) return $query;
           else return $query;*/
           
           //$variables[0] = array("parameter" => "p1", "value" => 'n', "size" => 100);
           //$resultados = $this->OracleModel->readCursor("package.getData(:p1)", $variables);
           //return $resultados;
            //return $this->readCursor("myschema.mypackage.getData(:p1, :p2)", $variables);


           //$parametro=array(array('name'=>':tabla','value'=>'tabla','length'=>-1,'type'=>SQLT_CHR));
           
            //$resultados = $this->db->stored_procedure('package','mostrar',$parametro);
           $this->db->select("*");
           $this->db->from("PROBAR");
           $this->db->order_by("IDP ASC");
           $resultados =$this->db->get();
           return $resultados->result();
        }
        
        function seleccionar($id){
           $this->db->select("*");
           $this->db->from("PROBAR");
           $this->db->where("IDP",$id);
           $resultados =$this->db->get();
           return $resultados->row();
        }

        function actualizar($data,$id){
         $parametro=array(array('name'=>':vnombre','value'=>$data['nombre'],'length'=>-1,'type'=>SQLT_CHR),
         array('name'=>':vapellido','value'=>$data['apellido'],'length'=>-1,'type'=>SQLT_CHR),
         array('name'=>':vid','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));

         $this->db->stored_procedure('package','editar',$parametro);

         //$this->db->where("IDP",$id);
         //$this->db->update("PROBAR",$data);
        }

        function eliminar($id){
         $parametro=array(array('name'=>':vid','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));

         $this->db->stored_procedure('package','eli',$parametro);

         //$this->db->where("IDP",$id);
         //$this->db->delete("PROBAR");
        }


      //FUNCIONES PARA CARGAR EN EL INDEX MOSTRAR DATOS************
      //******************************************************* */
        function mostrar_aulas(){
         $this->db->select("*");
         $this->db->from("AULAS");
         $this->db->order_by("IDAULA ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }

        function mostrar_carrera(){
         $this->db->select("*");
         $this->db->from("CARRERA");
         $this->db->order_by("IDCARRERA ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }

        function mostrar_coordinador(){
         $this->db->select("*");
         $this->db->from("COORDINADOR");
         $this->db->order_by("IDCOORDINADOR ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }

        function mostrar_departamento(){
         $this->db->select("*");
         $this->db->from("DEPARTAMENTO");
         $this->db->order_by("IDDEPTO ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }

        function mostrar_docente(){
         $this->db->select("*");
         $this->db->from("DOCENTE");
         $this->db->order_by("IDDOCENTE ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }

        function mostrar_estudiantes(){
         $this->db->select("*");
         $this->db->from("ESTUDIANTES");
         $this->db->order_by("IDESTUDIANTE ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }
        function mostrar_grupos(){
         $this->db->select("*");
         $this->db->from("GRUPOS");
         $this->db->order_by("IDGRUPOS ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }

        function mostrar_horarios_grupos(){
         $this->db->select("*");
         $this->db->from("HORARIOS_GRUPOS");
         $this->db->order_by("IDHORARIO_GRU ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }

        function mostrar_horas_sociales(){
         $this->db->select("*");
         $this->db->from("HORAS_SOCIALES");
         $this->db->order_by("IDHORASSOCIALES ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }
        function mostrar_inscripcion(){
         $this->db->select("*");
         $this->db->from("INSCRIPCION");
         $this->db->order_by("IDINCRIPCION ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }
        function mostrar_jefe(){
         $this->db->select("*");
         $this->db->from("JEFE");
         $this->db->order_by("IDJEFE ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }
        function mostrar_materias(){
         $this->db->select("*");
         $this->db->from("MATERIAS");
         $this->db->order_by("IDMATERIA ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }
        function mostrar_preinscripcion(){
         $this->db->select("*");
         $this->db->from("PREINSCRIPCION");
         $this->db->order_by("IDPREINSCRIPCION ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }
        function mostrar_registro_estudiante(){
         $this->db->select("*");
         $this->db->from("REGISTRO_ESTUDIANTE");
         $this->db->order_by("IDREGISTROESTU ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }
        function mostrar_reportechoque(){
         $this->db->select("*");
         $this->db->from("REPORTECHOQUE");
         $this->db->order_by("IDCHOQUE ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }
        function mostrar_usuario(){
         $this->db->select("*");
         $this->db->from("USUARIO");
         $this->db->order_by("IDUSUARIO ASC");
         $resultados =$this->db->get();
         return $resultados->result();
        }


    }
?>