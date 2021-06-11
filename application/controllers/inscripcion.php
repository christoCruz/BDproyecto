<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inscripcion extends CI_Controller {
	function __construct(){
        parent::__construct();
    }//end

	public function index()
	{
		$data = array('inscripcion' => 'active',
        'notas' => '',
        'preinscripcion' => '',
        'horassociales' => ''); 

		$this->load->view('menuestudiante',$data);
		$this->load->view('inscripcion');
		$this->load->view('footer');
	}
}