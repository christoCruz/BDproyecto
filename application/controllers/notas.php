<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notas extends CI_Controller {
	function __construct(){
        parent::__construct();
    }//end
    
	public function index()
	{
		$data = array('inscripcion' => '',
        'notas' => 'active',
        'preinscripcion' => '',
        'horassociales' => ''); 

		$this->load->view('menuestudiante',$data);
		$this->load->view('notas');
		$this->load->view('footer');
	}
}