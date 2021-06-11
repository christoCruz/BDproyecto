<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios extends CI_Controller {
	function __construct(){
        parent::__construct();
    }//end
    
	public function index()
	{
		$data = array('tablas' => '',
        'usuarios' => 'active'); 

		$this->load->view('menuadmin',$data);
		$this->load->view('usuarios');
		$this->load->view('footer');
	}
}