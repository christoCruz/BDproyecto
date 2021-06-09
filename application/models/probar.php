<?php defined('BASEPATH') OR exit('No direct script access allowed');

class probar extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function registrar($datos){
      
            $this->db->insert("PROBAR",array("NOMBRE"=>$datos["nombre"],
            "APELLIDO"=>$datos["apellido"]));
                
        }
        
}
?>