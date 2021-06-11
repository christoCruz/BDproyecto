<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registronotas extends CI_Controller {
	function __construct(){
        parent::__construct();
    }//end
    
	public function index()
	{
		$data = array('registronotas' => 'active',
        'horariotrabajo' => ''); 

		$this->load->view('menudocente',$data);
		$this->load->view('registronotas');
		$this->load->view('footer');
	}
}