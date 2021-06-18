<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model("tablas_estras");
    }//end
    
	public function index()
	{
		$data = array('tablas' => '',
        'usuarios' => 'active'); 
		$mostrar = array('usuario'=>$this->tablas_estras->mostrar_usuario());

		$this->load->view('menuadmin',$data);
		$this->load->view('usuarios',$mostrar);
		$this->load->view('footer');
	}

	////////////
  //crud usuario
  ////////////

  public function agregar_usuario(){
    $datos = array(
      "usuario" =>$this->input->post("usuario"),
      "password" =>$this->input->post("password"),
      "tipousuairo" =>$this->input->post("tipousuairo"),
      "estadousuario" =>$this->input->post("estadousuario")
    );
    $this->tablas_estras->agregar_usuario($datos);
    redirect(base_url()."usuarios");
  }

  public function seleccion_usuario($dato){
    $valor=$this->tablas_estras->seleccion_usuario($dato);
	$mostrar = array('usuario'=>$this->tablas_estras->mostrar_usuario());
    $data = array('tablas' => '',
        'usuarios' => 'active'); 

		$this->load->view('menuadmin',$data);
		$this->load->view('usuarios',$mostrar);
    $this->load->view('editar_usuario',$valor);
		$this->load->view('footer');
	}

  public function actualizar_usuario($id){
    $datos = array(
      "usuario" =>$this->input->post("usuario"),
      "password" =>$this->input->post("password"),
      "tipousuairo" =>$this->input->post("tipousuairo"),
      "estadousuario" =>$this->input->post("estadousuario")
    );
    $this->tablas_estras->actualizar_usuario($datos,$id);
    redirect(base_url()."usuarios");
  }

  function eliminar_usuario($id){
    $this->tablas_estras->eliminar_usuario($id);
    redirect(base_url()."usuarios");
  }
}