<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class planificaciones extends CI_Controller {
	function __construct(){
        parent::__construct();
    }//end
    
	public function index()
	{
		$data = array('planificaciones' => 'active'); 

		$this->load->view('menujefe',$data);
		$this->load->view('planificaciones');
		$this->load->view('footer');
	}
}