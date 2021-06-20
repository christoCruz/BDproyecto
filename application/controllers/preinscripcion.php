<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class preinscripcion extends CI_Controller {
	function __construct(){
        parent::__construct();
    }//end
    
	public function index()
	{
		
		if(isset($_SESSION['IdUsuario'])){
			if($_SESSION['TipoUsuario'] == 'ESTUDIANTE'){
				$data = array('inscripcion' => '',
				'notas' => '',
				'preinscripcion' => 'active',
				'horassociales' => ''); 

				$this->load->view('menuestudiante',$data);
				$this->load->view('preinscripcion');
				$this->load->view('footer');
			}
			
		  }else{
			redirect('Login');
		  }
	}
}