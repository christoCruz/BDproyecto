<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class planificaciones extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->library('session');
    }//end
    
	public function index()
	{
		
		if(isset($_SESSION['IdUsuario'])){
			if($_SESSION['TipoUsuario'] == 'JEFE'){
				$data = array('planificaciones' => 'active',
				'micuenta' => ''); 

				$this->load->view('menujefe',$data);
				$this->load->view('planificaciones');
				$this->load->view('footer');
			}
			
		  }else{
			redirect('Login');
		  }
	}
}