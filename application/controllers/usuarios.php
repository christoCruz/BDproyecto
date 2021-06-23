<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model("tablas_estras");
    $this->load->library('session');
    }//end
    
	public function index()
	{
		
    if(isset($_SESSION['IdUsuario'])){
			if($_SESSION['TipoUsuario'] == 'ADMIN'){
				$data = array('tablas' => '',
        'usuarios' => 'active'); 
          $mostrar = array('usuario'=>$this->tablas_estras->mostrar_usuario());

          $this->load->view('menuadmin',$data);
          $this->load->view('usuarios',$mostrar);
          $this->load->view('footer');
			}
			
		  }else{
			redirect('Login');
		  }
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
    $this->session->set_flashdata("success","se ejcuto correctamente la accion");
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
    $this->session->set_flashdata("success","se ejcuto correctamente la accion");
    redirect(base_url()."usuarios");
  }

  function eliminar_usuario($id){
    $this->tablas_estras->eliminar_usuario($id);
    $this->session->set_flashdata("success","se elimino correctamente");
    redirect(base_url()."usuarios");
  }

  public function usuario_actualizar($id){

    
    $datos = array(
      "usuario" =>$this->input->post("usuario"),
      "oldpassword" =>$this->input->post("oldpassword"),
      "password" =>$this->input->post("password"),
      "tipousuairo" =>$this->input->post("tipousuairo"),
      "estadousuario" =>$this->input->post("estadousuario")
    );

    $queryid= $this->db->query("SELECT * FROM USUARIO WHERE IDUSUARIO=".$id);
    $aux=0;
    foreach ($queryid->result() as $gr){

        if($gr->PASSWORD!=sha1($datos['oldpassword'] ))
        {
          $aux=1;
        }
    }
    if($aux==1){
      $this->session->set_flashdata("error","La contraseña anterior no coincide");
      redirect(base_url()."micuenta");
    }else{
      $this->tablas_estras->actualizar_usuario($datos,$id);
      $this->session->set_flashdata("success","La contraseña ha sido cambiada");
      redirect(base_url()."micuenta");

    }

    
  }
}