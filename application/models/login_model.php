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
            
            return true;
        }else{
            return false;
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
        $this->db->query("update USUARIO set ESTADOUSUARIO= 'I' WHERE USUARIO=".$id);
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