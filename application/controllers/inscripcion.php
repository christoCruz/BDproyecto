<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inscripcion extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->library('session');
    }//end

	public function index()
	{
		

		if(isset($_SESSION['IdUsuario'])){
			if($_SESSION['TipoUsuario'] == 'ESTUDIANTE'){
				$data = array('inscripcion' => 'active',
				'notas' => '',
				'preinscripcion' => '',
				'horassociales' => ''); 

				$this->load->view('menuestudiante',$data);
				$this->load->view('inscripcion');
				$this->load->view('footer');
			}
			
		  }else{
			redirect('Login');
		  }
	}
}