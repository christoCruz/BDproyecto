<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tablas extends CI_Controller {
	function __construct(){
        parent::__construct();
    }//end
    
	public function index()
	{
		$data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas');
		$this->load->view('footer');
	}
}