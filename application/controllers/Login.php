<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('session');
        
    }//end
     
	public function index()
	{
       $cont=0;
        if(isset($_SESSION["IDUSUARIO"])){
            if($_SESSION["TIPOUSUAIRO"] == 'ADMIN'){
                redirect('tablas');
            }
            elseif($_SESSION["TIPOUSUAIRO"] == 'JEFE'){
                redirect('planificaciones');
            }
            elseif($_SESSION["TIPOUSUAIRO"] == 'COORDINADOR'){
                redirect('planeacion');
            }
            elseif($_SESSION["TIPOUSUAIRO"] == 'DOCENTE'){
                redirect('registronotas');
            }
            elseif($_SESSION["TIPOUSUAIRO"] == 'ESTUDIANTE'){
                redirect('inscripcion');
            }
        }
        if(isset($_POST['contra'])){
            $contra= sha1($_POST['contra']);
            if($this->login_model->login($_POST['usuario'],$contra)){
                $obtenciondatos = $this->login_model->obtener($_POST['usuario']);
                $this->session->Nombre= $obtenciondatos->USUARIO;
                $this->session->IdUsuario= $obtenciondatos->IDUSUARIO;
                if($this->session->IdUsuario= $obtenciondatos->ESTADOUSUARIO == 'A')
                {
                    if($this->session->IdUsuario= $obtenciondatos->TIPOUSUAIRO == 'ADMIN'){
                        redirect('tablas');
                    }
                    elseif($this->session->IdUsuario= $obtenciondatos->TIPOUSUAIRO == 'JEFE'){
                        redirect('planificaciones');
                    }
                    elseif($this->session->IdUsuario= $obtenciondatos->TIPOUSUAIRO == 'COORDINADOR'){
                        redirect('planeacion');
                    }
                    elseif($this->session->IdUsuario= $obtenciondatos->TIPOUSUAIRO == 'DOCENTE'){
                        redirect('registronotas');
                    }
                    elseif($this->session->IdUsuario= $obtenciondatos->TIPOUSUAIRO == 'ESTUDIANTE'){
                        redirect('inscripcion');
                    }
                }
            }else{
                $cont++;
                if($cont =3){
                    if($this->login_model->errordecontra($_POST['usuario'])){
                        $this->login_model->update($_POST['usuario']);
                    }
                }
                redirect('login');                
            }
        }   
		$this->load->view('login');
    }

    public function salir(){
        session_destroy();
        redirect('Login');
    }
    
}
?>
