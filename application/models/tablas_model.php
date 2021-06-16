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

    }
?>