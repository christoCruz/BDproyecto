<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class horariotrabajo extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->library('session');
    }//end
    
	public function index()
	{
		

		if(isset($_SESSION['IdUsuario'])){
			if($_SESSION['TipoUsuario'] == 'DOCENTE'){
				$data = array('registronotas' => '',
				'horariotrabajo' => 'active'); 

				$this->load->view('menudocente',$data);
				$this->load->view('horariotrabajo');
				$this->load->view('footer');
			}
			
		  }else{
			redirect('Login');
		  }
	}
}