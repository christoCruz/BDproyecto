<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pensum extends CI_Controller {
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
                'pensum'=>'active',
				'micuenta' => ''); 

				$this->load->view('menuestudiante',$data);
				$this->load->view('pensum');
				$this->load->view('footer');
			}
            if($_SESSION['TipoUsuario'] == 'COORDINADOR'){
				$data = array('planeacion' => '',
				'historialplaneacion' => '',
				'proyectohorassociales' => '',
                'reportesdechoque'=>'',
                'pensum'=>'active',
				'micuenta' => ''); 
		
				$this->load->view('menucoordinador',$data);
				$this->load->view('pensum');
				$this->load->view('footer');
			}
            
			
		  }else{
			redirect('Login');
		  }
	}
}