<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class docentesocial extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->library('session');
    }//end
    
	public function index()
	{
		

		if(isset($_SESSION['IdUsuario'])){
			if($_SESSION['TipoUsuario'] == 'DOCENTE'){
				$data = array('registronotas' => '',
				'horariotrabajo' => '',
				'docentesocial' => 'active',
				'micuenta' => ''); 

				$this->load->view('menudocente',$data);
				$this->load->view('docentesocial');
				$this->load->view('footer');
			}
			
		  }else{
			redirect('Login');
		  }
	}
}