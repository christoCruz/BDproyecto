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
    //carga los datos a las tablas
    $mostrar = array('tablas'=>$this->tablas_model->mostrar(),
    'aulas'=>$this->tablas_model->mostrar_aulas(),
    'carrera'=>$this->tablas_model->mostrar_carrera(),
    'coordinador'=>$this->tablas_model->mostrar_coordinador(),
    'departamento'=>$this->tablas_model->mostrar_departamento(),
    'docentes'=>$this->tablas_model->mostrar_docente(),
    'estudiantes'=>$this->tablas_model->mostrar_estudiantes(),
    'grupo'=>$this->tablas_model->mostrar_grupos(),
    'horarios'=>$this->tablas_model->mostrar_horarios_grupos(),
    'sociales'=>$this->tablas_model->mostrar_horas_sociales(),
    'inscripcion'=>$this->tablas_model->mostrar_inscripcion(),
    'jefe'=>$this->tablas_model->mostrar_jefe(),
    'materia'=>$this->tablas_model->mostrar_materias(),
    'preinscripcion'=>$this->tablas_model->mostrar_preinscripcion(),
    'registroestudiante'=>$this->tablas_model->mostrar_registro_estudiante(),
    'reportechoque'=>$this->tablas_model->mostrar_reportechoque(),
    'tablas'=>$this->tablas_model->mostrar_usuario());

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
    $mos = array('tabl'=>$this->tablas_model->mostrar());
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
    redirect(base_url()."tablas/#aula");
  }

  public function seleccion_aulas($dato){
    $valor=$this->tablas->seleccion_aulas($dato);
    $mostrar = array('aulas'=>$this->tablas->mostrar_aulas());
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
    redirect(base_url()."tablas/#aula");
  }

  function eliminar_aulas($id){
    $this->tablas->eliminar_aulas($id);
    redirect(base_url()."tablas/#aula");
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
    redirect(base_url()."tablas/#carrera");
  }

  public function seleccion_carrera($dato){
    $valor=$this->tablas->seleccion_carrera($dato);
    $mostrar = array('carrera'=>$this->tablas->mostrar_carrera());
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
    redirect(base_url()."tablas/#carrera");
  }

  function eliminar_carrera($id){
    $this->tablas->eliminar_carrera($id);
    redirect(base_url()."tablas/#carrera");
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
    redirect(base_url()."tablas/#coordinador");
  }

  public function seleccion_coordinador($dato){
    $valor=$this->tablas->seleccion_coordinador($dato);
    $mostrar = array('coordinador'=>$this->tablas->mostrar_coordinador());
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
    redirect(base_url()."tablas/#coordinador");
  }

  function eliminar_coordinador($id){
    $this->tablas->eliminar_coordinador($id);
    redirect(base_url()."tablas/#coordinador");
  }

  ////////////
  //crud departamento
  ////////////

  public function agregar_departamento(){
    $datos = array(
      "nombredepto" =>$this->input->post("nombredepto"),
      "idjefe" =>$this->input->post("idjefe"),
    );
    $this->tablas->agregar_departamento($datos);
    redirect(base_url()."tablas/#departamento");
  }

  public function seleccion_departamento($dato){
    $valor=$this->tablas->seleccion_departamento($dato);
    $mostrar = array('departamento'=>$this->tablas->mostrar_departamento());
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
    redirect(base_url()."tablas/#departamento");
  }

  function eliminar_departamento($id){
    $this->tablas->eliminar_departamento($id);
    redirect(base_url()."tablas/#departamento");
  }

  ////////////
  //crud docente
  ////////////

  public function agregar_docente(){
    $datos = array(
      "idusuario" =>$this->input->post("idusuario"),
      "iddepto" =>$this->input->post("iddepto"),
      "nomdocente" =>$this->input->post("nomdocente"),
      "apedocente" =>$this->input->post("apedocente"),
      "profdocente" =>$this->input->post("profdocente"),
      "estdocente" =>$this->input->post("estdocente"),
      "tipocontrato" =>$this->input->post("tipocontrato"),
      "correodocente" =>$this->input->post("correodocente"),
    
    );
    $this->tablas->agregar_docente($datos);
    redirect(base_url()."tablas/#docente");
  }

  public function seleccion_docente($dato){
    $valor=$this->tablas->seleccion_docente($dato);
    $mostrar = array('docentes'=>$this->tablas->mostrar_docente());
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
      "tipocontrato" =>$this->input->post("tipocontrato")
      
    );
    $this->tablas->actualizar_docente($datos,$id);
    redirect(base_url()."tablas/#docente");
  }

  function eliminar_docente($id){
    $this->tablas->eliminar_docente($id);
    redirect(base_url()."tablas/#docente");
  }

  ////////////
  //crud estudiantes
  ////////////

  public function agregar_estudiantes(){
    $datos = array(
     
      "idcarrera" =>$this->input->post("idcarrera"),
      "nomestudiante" =>$this->input->post("nomestudiante"),
      "apelestudiante" =>$this->input->post("apelestudiante"),
      "carnetestu" =>$this->input->post("carnetestu"),
      "correoestu" =>$this->input->post("correoestu"),
      "telestudiante" =>$this->input->post("telestudiante")
    );
    $this->tablas->agregar_estudiantes($datos);
    redirect(base_url()."tablas/#estudiantes");
  }

  public function seleccion_estudiantes($dato){
    $valor=$this->tablas->seleccion_estudiantes($dato);
    $mostrar = array('estudiantes'=>$this->tablas->mostrar_estudiantes());
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$mostrar);
    $this->load->view('editar_estudiantes',$valor);
		$this->load->view('footer');
	}

  public function actualizar_estudiantes($id){
    $datos = array(
      "idcarrera" =>$this->input->post("idcarrera"),
      "nomestudiante" =>$this->input->post("nomestudiante"),
      "apelestudiante" =>$this->input->post("apelestudiante"),
      "carnetestu" =>$this->input->post("carnetestu"),
      "correoestu" =>$this->input->post("correoestu"),
      "telestudiante" =>$this->input->post("telestudiante")
    );
    $this->tablas->actualizar_estudiantes($datos,$id);
    redirect(base_url()."tablas/#estudiantes");
  }

  function eliminar_estudiantes($id){
    $this->tablas->eliminar_estudiantes($id);
    redirect(base_url()."tablas/#estudiantes");
  }

  ////////////
  //crud grupos
  ////////////

  public function agregar_grupos(){
    $datos = array(
      "idmateria" =>$this->input->post("idmateria"),
      "idcoordinador" =>$this->input->post("idcoordinador"),
      "cantcupos" =>$this->input->post("cantcupos"),
      "numgrupo" =>$this->input->post("numgrupo"),
      "ciclogrupo" =>$this->input->post("ciclogrupo"),
      "aniogrupo" =>$this->input->post("aniogrupo"),
      "estgrupo" =>$this->input->post("estgrupo")

    );
    $this->tablas->agregar_grupos($datos);
    redirect(base_url()."tablas/#grupo");
  }

  public function seleccion_grupos($dato){
    $valor=$this->tablas->seleccion_grupos($dato);
    $mostrar = array('grupo'=>$this->tablas->mostrar_grupos());
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
    redirect(base_url()."tablas/#grupo");
  }

  function eliminar_grupos($id){
    $this->tablas->eliminar_grupos($id);
    redirect(base_url()."tablas/#grupo");
  }

  ////////////
  //crud horarios_grupos
  ////////////

  public function agregar_horarios_grupos(){
    $datos = array(
      "idgrupos" =>$this->input->post("idgrupos"),
      "idaula" =>$this->input->post("idaula"),
      "diahorario" =>$this->input->post("diahorario"),
      "horashorario" =>$this->input->post("horashorario")
    );
    $this->tablas->agregar_horarios_grupos($datos);
    redirect(base_url()."tablas/#horariosgrupos");
  }

  public function seleccion_horarios_grupos($dato){
    $valor=$this->tablas->seleccion_horarios_grupos($dato);
    $mostrar = array('horarios'=>$this->tablas->mostrar_horarios_grupos());
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
    redirect(base_url()."tablas/#horariosgrupos");
  }

  function eliminar_horarios_grupos($id){
    $this->tablas->eliminar_horarios_grupos($id);
    redirect(base_url()."tablas/#horariosgrupos");
  }

  ////////////
  //crud horas_sociales
  ////////////

  public function agregar_horas_sociales(){
    $datos = array(
      "idestudiante" =>$this->input->post("idestudiante"),
      "iddocente" =>$this->input->post("iddocente"),
      "nomproyecto" =>$this->input->post("nomproyecto"),
      "duracionproyec" =>$this->input->post("duracionproyec"),
      "estadoproyecto" =>$this->input->post("estadoproyecto"),
      "anteproyecto" =>$this->input->post("anteproyecto"),
      "estadoanteproyecto" =>$this->input->post("estadoanteproyecto"),
      "comentariopro" =>$this->input->post("comentariopro")
    );
    $this->tablas->agregar_horas_sociales($datos);
    redirect(base_url()."tablas/#horassociales");
  }

  public function seleccion_horas_sociales($dato){
    $valor=$this->tablas->seleccion_horas_sociales($dato);
    $mostrar = array('sociales'=>$this->tablas->mostrar_horas_sociales());
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
    redirect(base_url()."tablas/#horassociales");
  }

  function eliminar_horas_sociales($id){
    $this->tablas->eliminar_horas_sociales($id);
    redirect(base_url()."tablas/#horassociales");
  }

  ////////////
  //crud inscripcion
  ////////////

  public function agregar_inscripcion(){
    $datos = array(
      "idestudiante" =>$this->input->post("idestudiante"),
      "idgrupos" =>$this->input->post("idgrupos")
     
    );
    $this->tablas->agregar_inscripcion($datos);
    redirect(base_url()."tablas/#inscripcion");
  }

  public function seleccion_inscripcion($dato){
    $valor=$this->tablas->seleccion_inscripcion($dato);
    $mostrar = array('inscripcion'=>$this->tablas->mostrar_inscripcion());
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
    redirect(base_url()."tablas/#inscripcion");
  }

  function eliminar_inscripcion($id){
    $this->tablas->eliminar_inscripcion($id);
    redirect(base_url()."tablas/#inscripcion");
  }

   ////////////
  //crud jefe
  ////////////

  public function agregar_jefe(){
    $datos = array(
      "correojefe" =>$this->input->post("correojefe"),
      "nomjefe" =>$this->input->post("nomjefe"),
      "apejefe" =>$this->input->post("apejefe")
    );
    $this->tablas->agregar_jefe($datos);
    redirect(base_url()."tablas/#jefe");
  }

  public function seleccion_jefe($dato){
    $valor=$this->tablas->seleccion_jefe($dato);
    $mostrar = array('jefe'=>$this->tablas->mostrar_jefe());
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
    redirect(base_url()."tablas/#jefe");
  }

  function eliminar_jefe($id){
    $this->tablas->eliminar_jefe($id);
    redirect(base_url()."tablas/#jefe");
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
    redirect(base_url()."tablas/#materias");
  }

  public function seleccion_materias($dato){
    $valor=$this->tablas->seleccion_materias($dato);
    $mostrar = array('materia'=>$this->tablas->mostrar_materias());
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
    redirect(base_url()."tablas/#materia");
  }

  function eliminar_materias($id){
    $this->tablas->eliminar_materias($id);
    redirect(base_url()."tablas/#materias");
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
    redirect(base_url()."tablas/#preinscripcion");
  }

  public function seleccion_preinscripcion($dato){
    $valor=$this->tablas->seleccion_preinscripcion($dato);
    $mostrar = array('preinscripcion'=>$this->tablas->mostrar_preinscripcion());
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
    redirect(base_url()."tablas/#preinscripcion");
  }

  function eliminar_preinscripcion($id){
    $this->tablas->eliminar_preinscripcion($id);
    redirect(base_url()."tablas/#preinscripcion");
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
    redirect(base_url()."tablas/#registroestudiante");
  }

  public function seleccion_registro_estudiante($dato){
    $valor=$this->tablas->seleccion_registro_estudiante($dato);
    $mostrar = array('registroestudiante'=>$this->tablas->mostrar_registro_estudiante());
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
    redirect(base_url()."tablas/#registroestudiante");
  }

  function eliminar_registro_estudiante($id){
    $this->tablas->eliminar_registro_estudiante($id);
    redirect(base_url()."tablas/#registroestudiante");
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
    redirect(base_url()."tablas/#reportechoque");
  }

  public function seleccion_reportechoque($dato){
    $valor=$this->tablas->seleccion_reportechoque($dato);
    $mostrar = array('reportechoque'=>$this->tablas->mostrar_reportechoque());
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
    redirect(base_url()."tablas/#reportechoque");
  }

  function eliminar_reportechoque($id){
    $this->tablas->eliminar_reportechoque($id);
    redirect(base_url()."tablas/#reportechoque");
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