<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class horassociales extends CI_Controller {
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
				'horassociales' => 'active'); 

				$this->load->view('menuestudiante',$data);
				$this->load->view('horassociales');
				$this->load->view('footer');
			}
			
		  }else{
			redirect('Login');
		  }
	}
}