<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tablas extends CI_Controller {
	function __construct(){
        parent::__construct();
		    $this->load->helper("form"); 
        $this->load->model("tablas_model");
        $this->load->model("tablas_estras");
        
		
    }//end
    
   
	public function index()
	{
    
		$data = array('tablas' => 'active',
        'usuarios' => ''); 
        //$mostrar = array('tablas'=>$this->tablas_model->mostrar());
		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this-> retornoprueba());
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
		$this->load->view('tablas',$this->retornoprueba());
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
  //crud accion
  ////////////

  public function agregar_accion(){
    $datos = array(
      "fechainicio" =>$this->input->post("fechainicio"),
      "fechafinal" =>$this->input->post("fechafinal")
    );
    $this->tablas_estras->agregar_accion($datos);
    redirect(base_url()."tablas/#accion");
  }

  public function seleccion_accion($dato){
    $valor=$this->tablas_estras->seleccion_accion($dato);
  
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas', $this->retornoprueba());
    $this->load->view('editar_accion',$valor);
		$this->load->view('footer');
	}

  public function actualizar_accion($id){
    $datos = array(
      "fechainicio" =>$this->input->post("fechainicio"),
      "fechafinal" =>$this->input->post("fechafinal")
    );
    $this->tablas_estras->actualizar_accion($datos,$id);
    redirect(base_url()."tablas/#accion");
  }

  function eliminar_accion($id){
    $this->tablas_estras->eliminar_accion($id);
    redirect(base_url()."tablas/#accion");
  }

  ////////////
  //crud aulas
  ////////////

  public function agregar_aulas(){
    //agregar lo de la imagen********************
    $datos = array(
      "numaula" =>$this->input->post("numaula")
    );
    $this->tablas_estras->agregar_aulas($datos);
    redirect(base_url()."tablas/#aula");
  }

  public function seleccion_aulas($dato){
    $valor=$this->tablas_estras->seleccion_aulas($dato);
  
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas', $this->retornoprueba());
    $this->load->view('editar_aulas',$valor);
		$this->load->view('footer');
	}

  public function actualizar_aulas($id){
    $datos = array(
      "numaula" =>$this->input->post("numaula")
    );
    $this->tablas_estras->actualizar_aulas($datos,$id);
    redirect(base_url()."tablas/#aula");
  }

  function eliminar_aulas($id){
    $this->tablas_estras->eliminar_aulas($id);
    redirect(base_url()."tablas/#aula");
  }

  ////////////
  //crud carrera
  ////////////

  public function agregar_carrera(){
    $datos = array(
      "iddepto" =>$this->input->post("iddepto"),
      "codcarrera" =>$this->input->post("codcarrera"),
      "materias" =>$this->input->post("materias"),
      "nomcarrera" =>$this->input->post("nomcarrera")
    );
    $this->tablas_estras->agregar_carrera($datos);
    redirect(base_url()."tablas/#carrera");
  }

  public function seleccion_carrera($dato){
    $valor=$this->tablas_estras->seleccion_carrera($dato);
  
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this->retornoprueba());
    $this->load->view('editar_carrera',$valor);
		$this->load->view('footer');
	}

  public function actualizar_carrera($id){
    $datos = array(
      "iddepto" =>$this->input->post("iddepto"),
      "codcarrera" =>$this->input->post("codcarrera"),
      "materias" =>$this->input->post("materias"),
      "nomcarrera" =>$this->input->post("nomcarrera")
    );
    $this->tablas_estras->actualizar_carrera($datos,$id);
    redirect(base_url()."tablas/#carrera");
  }

  function eliminar_carrera($id){
    $this->tablas_estras->eliminar_carrera($id);
    redirect(base_url()."tablas/#carrera");
  }

  ////////////
  //crud coordinador
  ////////////

  public function agregar_coordinador(){
    $datos = array(
      "correocoor" =>$this->input->post("correocoor"),
      "nomcoor" =>$this->input->post("nomcoor"),
      "apecoor" =>$this->input->post("apecoor"),
      "idcarrera" =>$this->input->post("idcarrera")
    );
    $this->tablas_estras->agregar_coordinador($datos);
    redirect(base_url()."tablas/#coordinador");
  }

  public function seleccion_coordinador($dato){
    $valor=$this->tablas_estras->seleccion_coordinador($dato);
  
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this->retornoprueba());
    $this->load->view('editar_coordinador',$valor);
		$this->load->view('footer');
	}

  public function actualizar_coordinador($id){
    $datos = array(
      "correocoor" =>$this->input->post("correocoor"),
      "nomcoor" =>$this->input->post("nomcoor"),
      "apecoor" =>$this->input->post("apecoor"),
      "idcarrera" =>$this->input->post("idcarrera")
    );
    $this->tablas_estras->actualizar_coordinador($datos,$id);
    redirect(base_url()."tablas/#coordinador");
  }

  function eliminar_coordinador($id){
    $this->tablas_estras->eliminar_coordinador($id);
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
    $this->tablas_estras->agregar_departamento($datos);
    redirect(base_url()."tablas/#departamento");
  }

  public function seleccion_departamento($dato){
    $valor=$this->tablas_estras->seleccion_departamento($dato);
    
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this->retornoprueba());
    $this->load->view('editar_departamento',$valor);
		$this->load->view('footer');
	}

  public function actualizar_departamento($id){
    $datos = array(
      "nombredepto" =>$this->input->post("nombredepto"),
      "idjefe" =>$this->input->post("idjefe"),
    );
    $this->tablas_estras->actualizar_departamento($datos,$id);
    redirect(base_url()."tablas/#departamento");
  }

  function eliminar_departamento($id){
    $this->tablas_estras->eliminar_departamento($id);
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
    $valor=$this->tablas_estras->seleccion_docente($dato);
   
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this->retornoprueba());
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
    $this->tablas_estras->actualizar_docente($datos,$id);
    redirect(base_url()."tablas/#docente");
  }

  function eliminar_docente($id){
    $this->tablas_estras->eliminar_docente($id);
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
    $this->tablas_estras->agregar_estudiantes($datos);
    redirect(base_url()."tablas/#estudiantes");
  }

  public function seleccion_estudiantes($dato){
    $valor=$this->tablas_estras->seleccion_estudiantes($dato);
   
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this->retornoprueba());
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
    $this->tablas_estras->actualizar_estudiantes($datos,$id);
    redirect(base_url()."tablas/#estudiantes");
  }

  function eliminar_estudiantes($id){
    $this->tablas_estras->eliminar_estudiantes($id);
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
    $this->tablas_estras->agregar_grupos($datos);
    redirect(base_url()."tablas/#grupo");
  }

  public function seleccion_grupos($dato){
    $valor=$this->tablas_estras->seleccion_grupos($dato);
  
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this->retornoprueba());
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
    $this->tablas_estras->actualizar_grupos($datos,$id);
    redirect(base_url()."tablas/#grupo");
  }

  function eliminar_grupos($id){
    $this->tablas_estras->eliminar_grupos($id);
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
    $this->tablas_estras->agregar_horarios_grupos($datos);
    redirect(base_url()."tablas/#horariosgrupos");
  }

  public function seleccion_horarios_grupos($dato){
    $valor=$this->tablas_estras->seleccion_horarios_grupos($dato);
    
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this->retornoprueba());
    $this->load->view('editar_horarios_grupos',$valor);
		$this->load->view('footer');
	}

  public function actualizar_horarios_grupos($id){
    $datos = array(
      "idgrupos" =>$this->input->post("idgrupos"),
      "diahorario" =>$this->input->post("diahorario"),
      "horashorario" =>$this->input->post("horashorario")
    );
    $this->tablas_estras->actualizar_horarios_grupos($datos,$id);
    redirect(base_url()."tablas/#horariosgrupos");
  }

  function eliminar_horarios_grupos($id){
    $this->tablas_estras->eliminar_horarios_grupos($id);
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
    $this->tablas_estras->agregar_horas_sociales($datos);
    redirect(base_url()."tablas/#horassociales");
  }

  public function seleccion_horas_sociales($dato){
    $valor=$this->tablas_estras->seleccion_horas_sociales($dato);
   
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this->retornoprueba());
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
    $this->tablas_estras->actualizar_horas_sociales($datos,$id);
    redirect(base_url()."tablas/#horassociales");
  }

  function eliminar_horas_sociales($id){
    $this->tablas_estras->eliminar_horas_sociales($id);
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
    $this->tablas_estras->agregar_inscripcion($datos);
    redirect(base_url()."tablas/#inscripcion");
  }

  public function seleccion_inscripcion($dato){
    $valor=$this->tablas_estras->seleccion_inscripcion($dato);
   
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this->retornoprueba());
    $this->load->view('editar_inscripcion',$valor);
		$this->load->view('footer');
	}

  public function actualizar_inscripcion($id){
    $datos = array(
      "idgrupos" =>$this->input->post("idgrupos")
    );
    $this->tablas_estras->actualizar_inscripcion($datos,$id);
    redirect(base_url()."tablas/#inscripcion");
  }

  function eliminar_inscripcion($id){
    $this->tablas_estras->eliminar_inscripcion($id);
    redirect(base_url()."tablas/#inscripcion");
  }

   ////////////
  //crud jefe
  ////////////
//crear las funciones respectivas en los modales tabla_estas
  public function agregar_jefe(){
    $datos = array(
      "correojefe" =>$this->input->post("correojefe"),
      "nomjefe" =>$this->input->post("nomjefe"),
      "apejefe" =>$this->input->post("apejefe")
    );
    $this->tablas_estras->agregar_jefe($datos);
    redirect(base_url()."tablas/#jefe");
  }

  public function seleccion_jefe($dato){
    $valor=$this->tablas_estras->seleccion_jefe($dato);

    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this->retornoprueba());
    $this->load->view('editar_jefe',$valor);
		$this->load->view('footer');
	}

  public function actualizar_jefe($id){
    $datos = array(
      "idgrupos" =>$this->input->post("idgrupos")
    );
    $this->tablas_estras->actualizar_jefe($datos,$id);
    redirect(base_url()."tablas/#jefe");
  }

  function eliminar_jefe($id){
    $this->tablas_estras->eliminar_jefe($id);
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
    $this->tablas_estras->agregar_materias($datos);
    redirect(base_url()."tablas/#materias");
  }

  public function seleccion_materias($dato){
    $valor=$this->tablas_estras->seleccion_materias($dato);
 
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this->retornoprueba());
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
    $this->tablas_estras->actualizar_materias($datos,$id);
    redirect(base_url()."tablas/#materia");
  }

  function eliminar_materias($id){
    $this->tablas_estras->eliminar_materias($id);
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
    $this->tablas_estras->agregar_preinscripcion($datos);
    redirect(base_url()."tablas/#preinscripcion");
  }

  public function seleccion_preinscripcion($dato){
    $valor=$this->tablas_estras->seleccion_preinscripcion($dato);
    
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this->retornoprueba());
    $this->load->view('editar_preinscripcion',$valor);
		$this->load->view('footer');
	}

  public function actualizar_preinscripcion($id){
    $datos = array(
      "idmateria" =>$this->input->post("idmateria"),
      "idestudiante" =>$this->input->post("idestudiante")
    );
    $this->tablas_estras->actualizar_preinscripcion($datos,$id);
    redirect(base_url()."tablas/#preinscripcion");
  }

  function eliminar_preinscripcion($id){
    $this->tablas_estras->eliminar_preinscripcion($id);
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
    $this->tablas_estras->agregar_registro_estudiante($datos);
    redirect(base_url()."tablas/#registroestudiante");
  }

  public function seleccion_registro_estudiante($dato){
    $valor=$this->tablas_estras->seleccion_registro_estudiante($dato);
   
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this->retornoprueba());
    $this->load->view('editar_registro_estudiante',$valor);
		$this->load->view('footer');
	}

  public function actualizar_registro_estudiante($id){
    $datos = array(
      "idincripcion" =>$this->input->post("idincripcion"),
      "estadomateria" =>$this->input->post("estadomateria"),
      "notamateria" =>$this->input->post("notamateria")
    );
    $this->tablas_estras->actualizar_registro_estudiante($datos,$id);
    redirect(base_url()."tablas/#registroestudiante");
  }

  function eliminar_registro_estudiante($id){
    $this->tablas_estras->eliminar_registro_estudiante($id);
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
    $this->tablas_estras->agregar_reportechoque($datos);
    redirect(base_url()."tablas/#reportechoque");
  }

  public function seleccion_reportechoque($dato){
    $valor=$this->tablas_estras->seleccion_reportechoque($dato);
   
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this->retornoprueba());
    $this->load->view('editar_reportechoque',$valor);
		$this->load->view('footer');
	}

  public function actualizar_reportechoque($id){
    $datos = array(
      "iddocente" =>$this->input->post("iddocente"),
      "idestudiante" =>$this->input->post("idestudiante"),
      "comentariochoque" =>$this->input->post("comentariochoque")
    );
    $this->tablas_estras->actualizar_reportechoque($datos,$id);
    redirect(base_url()."tablas/#reportechoque");
  }

  function eliminar_reportechoque($id){
    $this->tablas_estras->eliminar_reportechoque($id);
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
    $this->tablas_estras->agregar_usuario($datos);
    redirect(base_url()."tablas");
  }

  public function seleccion_usuario($dato){
    $valor=$this->tablas_estras->seleccion_usuario($dato);
  
    $data = array('tablas' => 'active',
        'usuarios' => ''); 

		$this->load->view('menuadmin',$data);
		$this->load->view('tablas',$this->retornoprueba());
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
    redirect(base_url()."index.php/tablas");
  }

  function eliminar_usuario($id){
    $this->tablas_estras->eliminar_usuario($id);
    redirect(base_url()."index.php/tablas");
  }


  public function retornoprueba(){
    $mostrar = array('tablas'=>$this->tablas_model->mostrar(),
    'accion'=>$this->tablas_model->mostrar_accion(),
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
    'usuario'=>$this->tablas_estas->seleccion_usuario());
    return $mostrar;
    }
}
