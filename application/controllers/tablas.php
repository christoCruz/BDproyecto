<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tablas extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper("form"); 
        $this->load->model("tablas_model");
        //$this->load->model("tablas");
		
    }//end
    
	public function index()
	{
    $mostrar = array('tablas'=>$this->tablas_model->mostrar());
		$data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
		$this->load->view('footer');
	}

	public function agregar(){
    $datos = array(
      "nombre" =>$this->input->post("nombre"),
      "apellido" =>$this->input->post("apellido")
    );

    $this->tablas_model->agregar($datos);
    
    //$this->session->set_flashdata("success","se guardo los datos correctamente");
    redirect(base_url()."tablas");
  }

  public function seleccion($dato){
    $valor=$this->tablas_model->seleccionar($dato);
    $mos = array('tablas'=>$this->tablas_model->mostrar());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mos);
    $this->load->view('modaltabla',$valor);
		$this->load->view('footer');
    //$this->session->set_flashdata("success","se guardo los datos correctamente");
    //redirect(base_url()."tablas");
	}
    
  public function actualizar($id){
    $data = array(
      "nombre" =>$this->input->post("nombre"),
      "apellido" =>$this->input->post("apellido"));

    $this->tablas_model->actualizar($data,$id);
    //$this->session->set_flashdata("success","Has actualizado tu mascota");
    redirect(base_url()."index.php/tablas");
  }

  function eliminar($id){
    $this->tablas_model->eliminar($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud aulas
  ////////////

  public function agregar_aulas(){
    //agregar lo de la imagen********************
    $datos = array(
      "numaula" =>$this->input->post("numaula")
    );
    $this->tablas->agregar_aulas($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_aulas($dato){
    $valor=$this->tablas->seleccion_aulas($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_aulas());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_aulas',$valor);
		$this->load->view('footer');
	}

  public function actualizar_aulas($id){
    $datos = array(
      "numaula" =>$this->input->post("numaula")
    );
    $this->tablas->actualizar_aulas($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_aulas($id){
    $this->tablas->eliminar_aulas($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud carrera
  ////////////

  public function agregar_carrera(){
    $datos = array(
      "iddepto" =>$this->input->post("iddepto"),
      "codcarrera" =>$this->input->post("codcarrera"),
      "materias" =>$this->input->post("materias")
    );
    $this->tablas->agregar_carrera($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_carrera($dato){
    $valor=$this->tablas->seleccion_carrera($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_carrera());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_carrera',$valor);
		$this->load->view('footer');
	}

  public function actualizar_carrera($id){
    $datos = array(
      "iddepto" =>$this->input->post("iddepto"),
      "codcarrera" =>$this->input->post("codcarrera"),
      "materias" =>$this->input->post("materias")
    );
    $this->tablas->actualizar_carrera($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_carrera($id){
    $this->tablas->eliminar_carrera($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud coordinador
  ////////////

  public function agregar_coordinador(){
    $datos = array(
      "iddocente" =>$this->input->post("correocoor"),
      "idusuario" =>$this->input->post("nomcoor"),
      "idusuario" =>$this->input->post("apecoor"),
      "idcarrera" =>$this->input->post("idcarrera")
    );
    $this->tablas->agregar_coordinador($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_coordinador($dato){
    $valor=$this->tablas->seleccion_coordinador($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_coordinador());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_coordinador',$valor);
		$this->load->view('footer');
	}

  public function actualizar_coordinador($id){
    $datos = array(
      "iddocente" =>$this->input->post("iddocente"),
      "idusuario" =>$this->input->post("idusuario"),
      "idcarrera" =>$this->input->post("idcarrera")
    );
    $this->tablas->actualizar_coordinador($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_coordinador($id){
    $this->tablas->eliminar_coordinador($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud departamento
  ////////////

  public function agregar_departamento(){
    $datos = array(
      "nombredepto" =>$this->input->post("nombredepto")
    );
    $this->tablas->agregar_departamento($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_departamento($dato){
    $valor=$this->tablas->seleccion_departamento($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_departamento());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_departamento',$valor);
		$this->load->view('footer');
	}

  public function actualizar_departamento($id){
    $datos = array(
      "nombredepto" =>$this->input->post("nombredepto")
    );
    $this->tablas->actualizar_departamento($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_departamento($id){
    $this->tablas->eliminar_departamento($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud docente
  ////////////

  public function agregar_docente(){
    $datos = array(
      "idusuario" =>$this->input->post("idusuario"),
      "nomdocente" =>$this->input->post("nomdocente"),
      "apedocente" =>$this->input->post("apedocente"),
      "profdocente" =>$this->input->post("profdocente"),
      "estdocente" =>$this->input->post("estdocente"),
      "tipocontrato" =>$this->input->post("tipocontrato"),
      "correodocente" =>$this->input->post("correodocente"),
      "ingredocente" =>$this->input->post("ingredocente") //agregado
    );
    $this->tablas->agregar_docente($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_docente($dato){
    $valor=$this->tablas->seleccion_docente($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_docente());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_docente',$valor);
		$this->load->view('footer');
	}

  public function actualizar_docente($id){
    $datos = array(
      "idusuario" =>$this->input->post("idusuario"),
      "nomdocente" =>$this->input->post("nomdocente"),
      "apedocente" =>$this->input->post("apedocente"),
      "profdocente" =>$this->input->post("profdocente"),
      "estdocente" =>$this->input->post("estdocente"),
      "tipocontrato" =>$this->input->post("tipocontrato"),
      "ingredocente" =>$this->input->post("ingredocente")
    );
    $this->tablas->actualizar_docente($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_docente($id){
    $this->tablas->eliminar_docente($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud estudiantes
  ////////////

  public function agregar_estudiantes(){
    $datos = array(
      //"idpreinscripcion" =>$this->input->post("idpreinscripcion"),
      //"idhorassociales" =>$this->input->post("idhorassociales"),
      "idcarrera" =>$this->input->post("idcarrera"),
      //"idincripcion" =>$this->input->post("idincripcion"),
      "idusuario" =>$this->input->post("idusuario"),
      "nomestudiante" =>$this->input->post("nomestudiante"),
      "apelestudiante" =>$this->input->post("apelestudiante"),
      "carnetestu" =>$this->input->post("carnetestu"),
      "correoestu" =>$this->input->post("correoestu"),
      "telestudiante" =>$this->input->post("telestudiante")
    );
    $this->tablas->agregar_estudiantes($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_estudiantes($dato){
    $valor=$this->tablas->seleccion_estudiantes($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_estudiantes());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_estudiantes',$valor);
		$this->load->view('footer');
	}

  public function actualizar_estudiantes($id){
    $datos = array(
      "idpreinscripcion" =>$this->input->post("idpreinscripcion"),
      "idhorassociales" =>$this->input->post("idhorassociales"),
      "idcarrera" =>$this->input->post("idcarrera"),
      "idincripcion" =>$this->input->post("idincripcion"),
      "idusuario" =>$this->input->post("idusuario"),
      "nomestudiante" =>$this->input->post("nomestudiante"),
      "apelestudiante" =>$this->input->post("apelestudiante"),
      "carnetestu" =>$this->input->post("carnetestu"),
      "correoestu" =>$this->input->post("correoestu"),
      "telestudiante" =>$this->input->post("telestudiante")
    );
    $this->tablas->actualizar_estudiantes($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_estudiantes($id){
    $this->tablas->eliminar_estudiantes($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud grupos
  ////////////

  public function agregar_grupos(){
    $datos = array(
      "idmateria" =>$this->input->post("idmateria"),
      "idcoordinador" =>$this->input->post("idcoordinador"),
      "cantcupos" =>$this->input->post("cantcupos"),//fecha
      "numgrupo" =>$this->input->post("numgrupo")
    );
    $this->tablas->agregar_grupos($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_grupos($dato){
    $valor=$this->tablas->seleccion_grupos($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_grupos());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_grupos',$valor);
		$this->load->view('footer');
	}

  public function actualizar_grupos($id){
    $datos = array(
      "idmateria" =>$this->input->post("idmateria"),
      "idcoordinador" =>$this->input->post("idcoordinador"),
      "cantcupos" =>$this->input->post("cantcupos"),
      "numgrupo" =>$this->input->post("numgrupo")
    );
    $this->tablas->actualizar_grupos($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_grupos($id){
    $this->tablas->eliminar_grupos($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud historial_planifica
  ////////////

  public function agregar_historial_planifica(){
    $datos = array(
      "idplan" =>$this->input->post("idplan"),
      "ciclo" =>$this->input->post("ciclo"),
      "anio" =>$this->input->post("anio")
    );
    $this->tablas->agregar_historial_planifica($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_historial_planifica($dato){
    $valor=$this->tablas->seleccion_historial_planifica($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_historial_planifica());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_historial_planifica',$valor);
		$this->load->view('footer');
	}

  public function actualizar_historial_planifica($id){
    $datos = array(
      "ciclo" =>$this->input->post("ciclo"),
      "anio" =>$this->input->post("anio")
    );
    $this->tablas->actualizar_historial_planifica($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_historial_planifica($id){
    $this->tablas->eliminar_historial_planifica($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud horarios_grupos
  ////////////

  public function agregar_horarios_grupos(){
    $datos = array(
      "idgrupos" =>$this->input->post("idgrupos"),
      "diahorario" =>$this->input->post("diahorario"),
      "horashorario" =>$this->input->post("horashorario")
    );
    $this->tablas->agregar_horarios_grupos($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_horarios_grupos($dato){
    $valor=$this->tablas->seleccion_horarios_grupos($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_horarios_grupos());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_horarios_grupos',$valor);
		$this->load->view('footer');
	}

  public function actualizar_horarios_grupos($id){
    $datos = array(
      "idgrupos" =>$this->input->post("idgrupos"),
      "diahorario" =>$this->input->post("diahorario"),
      "horashorario" =>$this->input->post("horashorario")
    );
    $this->tablas->actualizar_horarios_grupos($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_horarios_grupos($id){
    $this->tablas->eliminar_horarios_grupos($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud horas_sociales
  ////////////

  public function agregar_horas_sociales(){
    $datos = array(
      "idestudiante" =>$this->input->post("idestudiante"),
      "nomproyecto" =>$this->input->post("nomproyecto"),
      "duracionproyec" =>$this->input->post("duracionproyec"),
      "estadoproyecto" =>$this->input->post("estadoproyecto"),
      "anteproyecto" =>$this->input->post("anteproyecto"),
      "estadoanteproyecto" =>$this->input->post("estadoanteproyecto"),
      "comentariopro" =>$this->input->post("comentariopro")
    );
    $this->tablas->agregar_horas_sociales($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_horas_sociales($dato){
    $valor=$this->tablas->seleccion_horas_sociales($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_horas_sociales());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_horas_sociales',$valor);
		$this->load->view('footer');
	}

  public function actualizar_horas_sociales($id){
    $datos = array(
      "nomproyecto" =>$this->input->post("nomproyecto"),
      "duracionproyec" =>$this->input->post("duracionproyec"),
      "estadoproyecto" =>$this->input->post("estadoproyecto"),
      "anteproyecto" =>$this->input->post("anteproyecto"),
      "estadoanteproyecto" =>$this->input->post("estadoanteproyecto"),
      "comentariopro" =>$this->input->post("comentariopro")
    );
    $this->tablas->actualizar_horas_sociales($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_horas_sociales($id){
    $this->tablas->eliminar_horas_sociales($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud inscripcion
  ////////////

  public function agregar_inscripcion(){
    $datos = array(
      "idestudiante" =>$this->input->post("idestudiante"),
      "idgrupos" =>$this->input->post("idgrupos"),
      "fechainscrip" =>$this->input->post("fechainscrip")//queda tentativa
    );
    $this->tablas->agregar_inscripcion($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_inscripcion($dato){
    $valor=$this->tablas->seleccion_inscripcion($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_inscripcion());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_inscripcion',$valor);
		$this->load->view('footer');
	}

  public function actualizar_inscripcion($id){
    $datos = array(
      "idgrupos" =>$this->input->post("idgrupos")
    );
    $this->tablas->actualizar_inscripcion($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_inscripcion($id){
    $this->tablas->eliminar_inscripcion($id);
    redirect(base_url()."index.php/tablas");
  }

   ////////////
  //crud jefe
  ////////////

  public function agregar_jefe(){
    $datos = array(
      "idestudiante" =>$this->input->post("correojefe"),
      "idgrupos" =>$this->input->post("nomjefe"),
      "fechainscrip" =>$this->input->post("apejefe")//queda tentativa
    );
    $this->tablas->agregar_jefe($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_jefe($dato){
    $valor=$this->tablas->seleccion_jefe($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_jefe());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_inscripcion',$valor);
		$this->load->view('footer');
	}

  public function actualizar_jefe($id){
    $datos = array(
      "idgrupos" =>$this->input->post("idgrupos")
    );
    $this->tablas->actualizar_inscripcion($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_jefe($id){
    $this->tablas->eliminar_jefe($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud materias
  ////////////

  public function agregar_materias(){
    $datos = array(
      "idcarrera" =>$this->input->post("idcarrera"),
      "codmateria" =>$this->input->post("codmateria"),
      "nivelmateria" =>$this->input->post("nivelmateria"),
      "nommateria" =>$this->input->post("nommateria"),
      "requisito" =>$this->input->post("requisito")
    );
    $this->tablas->agregar_materias($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_materias($dato){
    $valor=$this->tablas->seleccion_materias($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_materias());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_materias',$valor);
		$this->load->view('footer');
	}

  public function actualizar_materias($id){
    $datos = array(
      "codmateria" =>$this->input->post("codmateria"),
      "nivelmateria" =>$this->input->post("nivelmateria"),
      "nommateria" =>$this->input->post("nommateria"),
      "requisito" =>$this->input->post("requisito")
    );
    $this->tablas->actualizar_materias($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_materias($id){
    $this->tablas->eliminar_materias($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud plan_estudio
  ////////////

  public function agregar_plan_estudio(){
    $datos = array(
      "idcarrera" =>$this->input->post("idcarrera"),
      "duracionplan" =>$this->input->post("duracionplan"),
      "descripcionplan" =>$this->input->post("descripcionplan")
    );
    $this->tablas->agregar_plan_estudio($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_plan_estudio($dato){
    $valor=$this->tablas->seleccion_plan_estudio($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_plan_estudio());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_plan_estudio',$valor);
		$this->load->view('footer');
	}

  public function actualizar_plan_estudio($id){
    $datos = array(
      "idcarrera" =>$this->input->post("idcarrera"),
      "duracionplan" =>$this->input->post("duracionplan"),
      "descripcionplan" =>$this->input->post("descripcionplan")
    );
    $this->tablas->actualizar_plan_estudio($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_plan_estudio($id){
    $this->tablas->eliminar_plan_estudio($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud preinscripcion
  ////////////

  public function agregar_preinscripcion(){
    $datos = array(
      "idmateria" =>$this->input->post("idmateria"),
      "idestudiante" =>$this->input->post("idestudiante")
    );
    $this->tablas->agregar_preinscripcion($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_preinscripcion($dato){
    $valor=$this->tablas->seleccion_preinscripcion($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_preinscripcion());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_preinscripcion',$valor);
		$this->load->view('footer');
	}

  public function actualizar_preinscripcion($id){
    $datos = array(
      "idmateria" =>$this->input->post("idmateria"),
      "idestudiante" =>$this->input->post("idestudiante")
    );
    $this->tablas->actualizar_preinscripcion($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_preinscripcion($id){
    $this->tablas->eliminar_preinscripcion($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud registro_estudiante
  ////////////

  public function agregar_registro_estudiante(){
    $datos = array(
      "idincripcion" =>$this->input->post("idincripcion"),
      "estadomateria" =>$this->input->post("estadomateria"),
      "notamateria" =>$this->input->post("notamateria")
    );
    $this->tablas->agregar_registro_estudiante($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_registro_estudiante($dato){
    $valor=$this->tablas->seleccion_registro_estudiante($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_registro_estudiante());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_registro_estudiante',$valor);
		$this->load->view('footer');
	}

  public function actualizar_registro_estudiante($id){
    $datos = array(
      "idincripcion" =>$this->input->post("idincripcion"),
      "estadomateria" =>$this->input->post("estadomateria"),
      "notamateria" =>$this->input->post("notamateria")
    );
    $this->tablas->actualizar_registro_estudiante($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_registro_estudiante($id){
    $this->tablas->eliminar_registro_estudiante($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud reportechoque
  ////////////

  public function agregar_reportechoque(){
    $datos = array(
      "iddocente" =>$this->input->post("iddocente"),
      "idestudiante" =>$this->input->post("idestudiante"),
      "comentariochoque" =>$this->input->post("comentariochoque")
    );
    $this->tablas->agregar_reportechoque($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_reportechoque($dato){
    $valor=$this->tablas->seleccion_reportechoque($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_reportechoque());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_reportechoque',$valor);
		$this->load->view('footer');
	}

  public function actualizar_reportechoque($id){
    $datos = array(
      "iddocente" =>$this->input->post("iddocente"),
      "idestudiante" =>$this->input->post("idestudiante"),
      "comentariochoque" =>$this->input->post("comentariochoque")
    );
    $this->tablas->actualizar_reportechoque($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_reportechoque($id){
    $this->tablas->eliminar_reportechoque($id);
    redirect(base_url()."index.php/tablas");
  }

  ////////////
  //crud roles
  ////////////

  public function agregar_roles(){
    $datos = array(
      "tiporol" =>$this->input->post("tiporol")
    );
    $this->tablas->agregar_roles($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_roles($dato){
    $valor=$this->tablas->seleccion_roles($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_roles());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_roles',$valor);
		$this->load->view('footer');
	}

  public function actualizar_roles($id){
    $datos = array(
      "tiporol" =>$this->input->post("tiporol")
    );
    $this->tablas->actualizar_roles($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_roles($id){
    $this->tablas->eliminar_roles($id);
    redirect(base_url()."index.php/tablas");
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
    $this->tablas->agregar_usuario($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_usuario($dato){
    $valor=$this->tablas->seleccion_usuario($dato);
    $mostrar = array('tablas'=>$this->tablas->mostrar_usuario());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
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
    $this->tablas->actualizar_usuario($datos,$id);
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_usuario($id){
    $this->tablas->eliminar_usuario($id);
    redirect(base_url()."index.php/tablas");
  }


}