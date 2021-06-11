<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class horariotrabajo extends CI_Controller {
	function __construct(){
        parent::__construct();
    }//end
    
	public function index()
	{
		$data = array('registronotas' => '',
        'horariotrabajo' => 'active'); 

		$this->load->view('menudocente',$data);
		$this->load->view('horariotrabajo');
		$this->load->view('footer');
	}
}