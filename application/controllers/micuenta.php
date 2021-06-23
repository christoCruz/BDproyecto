<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class micuenta extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->library('session');
    }//end
    
	public function index()
	{
		
		if(isset($_SESSION['IdUsuario'])){
			if($_SESSION['TipoUsuario'] == 'ESTUDIANTE'){
				$data = array('inscripcion' => '',
				'notas' => '',
				'preinscripcion' => '',
				'horassociales' => '',
				'pensum' => '',
				'micuenta' => 'active'); 

				$this->load->view('menuestudiante',$data);
				$this->load->view('micuenta');
				$this->load->view('footer');
			}
            if($_SESSION['TipoUsuario'] == 'COORDINADOR'){
				$data = array('planeacion' => '',
				'historialplaneacion' => '',
				'proyectohorassociales' => '',
                'reportesdechoque'=>'',
				'pensum' => '',
				'micuenta' => 'active'); 
		
				$this->load->view('menucoordinador',$data);
				$this->load->view('micuenta');
				$this->load->view('footer');
			}
            if($_SESSION['TipoUsuario'] == 'DOCENTE'){
				$data = array('registronotas' => '',
				'horariotrabajo' => '',
				'docentesocial' => '',
				'micuenta' => 'active');  

				$this->load->view('menudocente',$data);
				$this->load->view('micuenta');
				$this->load->view('footer');
			}
            if($_SESSION['TipoUsuario'] == 'JEFE'){
				$data = array('planificaciones' => '',
				'micuenta' => 'active'); 

				$this->load->view('menujefe',$data);
				$this->load->view('micuenta');
				$this->load->view('footer');
			}
			
		  }else{
			redirect('Login');
		  }
	}
}