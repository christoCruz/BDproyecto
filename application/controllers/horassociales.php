<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class horassociales extends CI_Controller {
	function __construct(){
        parent::__construct();
    }//end
    
	public function index()
	{
		$data = array('inscripcion' => '',
        'notas' => '',
        'preinscripcion' => '',
        'horassociales' => 'active'); 

		$this->load->view('menuestudiante',$data);
		$this->load->view('horassociales');
		$this->load->view('footer');
	}
}