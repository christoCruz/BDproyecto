<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registronotas extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->library('session');
    }//end
    
	public function index()
	{
		
		if(isset($_SESSION['IdUsuario'])){
			if($_SESSION['TipoUsuario'] == 'DOCENTE'){
				$data = array('registronotas' => 'active',
				'horariotrabajo' => ''); 

				$this->load->view('menudocente',$data);
				$this->load->view('registronotas');
				$this->load->view('footer');
			}
			
		  }else{
			redirect('Login');
		  }
	}
}