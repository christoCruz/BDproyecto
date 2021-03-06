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
        if( array_key_exists( 'intentos', $_SESSION ) ){
            $_SESSION['intentos'] = $_SESSION['intentos'] + 1;
        } else {
            $_SESSION['intentos'] = 0;
        }
        
       
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
                $this->session->TipoUsuario= $obtenciondatos->TIPOUSUAIRO;
                $this->session->EstadooUsuario= $obtenciondatos->ESTADOUSUARIO;
                if($this->session->EstadooUsuario=='A')
                {
                    $_SESSION['intentos'] = $_SESSION['intentos']; 

                    if($this->session->TipoUsuario == 'ADMIN'){
                        redirect('tablas');
                    }
                    elseif($this->session->TipoUsuario == 'JEFE'){
                        redirect('planificaciones');
                    }
                    elseif($this->session->TipoUsuario  == 'COORDINADOR'){
                        redirect('planeacion');
                    }
                    elseif($this->session->TipoUsuario  == 'DOCENTE'){
                        redirect('registronotas');
                    }
                    elseif($this->session->TipoUsuario  == 'ESTUDIANTE'){
                        redirect('inscripcion');
                    }
                }else{
                    $this->session->set_flashdata("error","Su cuenta esta inhabilitada por intentos fallidos");
                    redirect('Login');
                }
            }$this->session->set_flashdata("error","Datos incorectos");
        }   
		$this->load->view('login');
    }

    public function salir(){
        session_destroy();
        redirect('Login');
    }
    
}
?>
