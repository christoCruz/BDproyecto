<?php defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function login($username,$passwor){
        $this->db->where('USUARIO',$username);
        $this->db->where('PASSWORD',$passwor);
        $q = $this->db->get('USUARIO');
        if($q->num_rows() > 0){
            $this->db->query("UPDATE USUARIO SET INTENTOS=0 WHERE USUARIO='".$username."'");
            return true;
        }else{
            $usuarioquery=$this->db->query("SELECT INTENTOS FROM USUARIO WHERE USUARIO='".$username."'");
            if($usuarioquery->num_rows()>0){
                foreach ($usuarioquery->result() as $intento){

                if($intento->INTENTOS==0){
                    $this->db->query("UPDATE USUARIO SET INTENTOS=1 WHERE USUARIO='".$username."'");
                    return false;
                }
                if($intento->INTENTOS==1){
                    $this->db->query("UPDATE USUARIO SET INTENTOS=2 WHERE USUARIO='".$username."'");
                    return false;
                }
                if($intento->INTENTOS==2){
                    $this->db->query("UPDATE USUARIO SET INTENTOS=3, ESTADOUSUARIO='I' WHERE USUARIO='".$username."'");
                    return false;
                }
            }
            }
            


        }
    }

    public function obtener($username){
        $this->db->select("IDUSUARIO,USUARIO,TIPOUSUAIRO,ESTADOUSUARIO");
            $this->db->from("USUARIO");
            $this->db->where("USUARIO",$username);
            $resultado = $this->db->get();
        if($resultado->num_rows() > 0){
            return $resultado->row();
        }else{
            return false;
        }
    }

    function update($id){
        $this->db->query("update USUARIO set ESTADOUSUARIO= 'I' WHERE USUARIO='".$id."'");
    }

    public function errordecontra($username){
        $this->db->where('USUARIO',$username);
        $q = $this->db->get('USUARIO');
        if($q->num_rows() > 0){
            
            return true;
        }else{
            return false;
        }
    }

}
?>