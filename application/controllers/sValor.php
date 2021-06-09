<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sValor extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model("probar"); 
    }//end
	public function index()
	{
		$this->load->view('examples/valor');
	}

	public function prueba()
	{
		$nombre = $this->input->post("nombre");
		$apellito = $this->input->post("apellido");

		$datos = array(
			"nombre" => $nombre,
			"apellido" => $apellito,	
		);
		$this->probar->registrar($datos);
		redirect(base_url().'Welcome'); 
	}
}