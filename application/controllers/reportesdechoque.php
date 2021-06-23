<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reportesdechoque extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->library('session');
    }//end
    
	public function index()
	{
		
		if(isset($_SESSION['IdUsuario'])){
			if($_SESSION['TipoUsuario'] == 'COORDINADOR'){
				$data = array('planeacion' => '',
				'historialplaneacion' => '',
				'proyectohorassociales' => '',
                'reportesdechoque'=>'active',
				'micuenta' => ''); 

				$this->load->view('menucoordinador',$data);
				$this->load->view('reportesdechoque');
				$this->load->view('footer');
			}
			
		  }else{
			redirect('Login');
		  }
	}
}