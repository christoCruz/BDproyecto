<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class historialplaneacion extends CI_Controller {
	function __construct(){
        parent::__construct();
    }//end
    
	public function index()
	{
		$data = array('planeacion' => '',
        'historialplaneacion' => 'active',
        'proyectohorassociales' => ''); 

		$this->load->view('menucoordinador',$data);
		$this->load->view('historialplaneacion');
		$this->load->view('footer');
	}
}