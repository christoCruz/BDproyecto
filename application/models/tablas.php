<?php defined('BASEPATH') OR exit('No direct script access allowed');
   
   class tablas extends CI_Model{

        function __construct()
        {
           parent::__construct(); 
           $this->load->database();
        }
        
        
        function agregar($data){ 
        $parametro=array(array('name'=>':nombres','value'=>$data['nombre'],'length'=>-1,'type'=>SQLT_CHR),
                         array('name'=>':apellidos','value'=>$data['apellido'],'length'=>-1,'type'=>SQLT_CHR));

        $this->db->stored_procedure('package','pr',$parametro);
        }
        function mostrar(){
           $this->db->select("*");
           $this->db->from("PROBAR");
           $this->db->order_by("IDP ASC");
           $resultados =$this->db->get();
           return $resultados->result();
        }
        
        function seleccionar($id){
           $this->db->select("*");
           $this->db->from("PROBAR");
           $this->db->where("IDP",$id);
           $resultados =$this->db->get();
           return $resultados->row();
        }

        function actualizar($data,$id){
         $parametro=array(array('name'=>':vnombre','value'=>$data['nombre'],'length'=>-1,'type'=>SQLT_CHR),
         array('name'=>':vapellido','value'=>$data['apellido'],'length'=>-1,'type'=>SQLT_CHR),
         array('name'=>':vid','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));

         $this->db->stored_procedure('package','editar',$parametro);
        }

        function eliminar($id){
         $parametro=array(array('name'=>':vid','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));

         $this->db->stored_procedure('package','eli',$parametro);
        }

        ////////////
        //crud aulas
        ////////////

        function agregar_aulas($data){ 
            $parametro=array(
                array('name'=>':vnumaula','value'=>$data['numaula'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_aulas',$parametro);
        }
        
        function mostrar_aulas(){
            $this->db->select("*");
            $this->db->from("AULAS");
            $this->db->order_by("IDAULA ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_aulas($id){
            $this->db->select("*");
            $this->db->from("AULAS");
            $this->db->where("IDAULA",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_aulas($data,$id){
            $parametro=array(
                array('name'=>':vidaula','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnumaula','value'=>$data['numaula'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_aulas',$parametro);
        }
    
        function eliminar_aulas($id){
            $parametro=array(array('name'=>':vidaula','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_aulas',$parametro);
        }

        ////////////
        //crud carrera
        ////////////

        function agregar_carrera($data){ 
            $parametro=array(
                array('name'=>':viddepto','value'=>$data['iddepto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcodcarrera','value'=>$data['codcarrera'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vmaterias','value'=>$data['materias'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_carrera',$parametro);
        }
        
        function mostrar_carrera(){
            $this->db->select("*");
            $this->db->from("CARRERA");
            $this->db->order_by("IDCARRERA ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_carrera($id){
            $this->db->select("*");
            $this->db->from("CARRERA");
            $this->db->where("IDCARRERA",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_carrera($data,$id){
            $parametro=array(
                array('name'=>':vidcarrera','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':viddepto','value'=>$data['iddepto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcodcarrera','value'=>$data['codcarrera'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vmaterias','value'=>$data['materias'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_carrera',$parametro);
        }
    
        function eliminar_carrera($id){
            $parametro=array(array('name'=>':vidcarrera','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_carrera',$parametro);
        }

        ////////////
        //crud coordinador
        ////////////

        function agregar_coordinador($data){ 
            $parametro=array(
                array('name'=>':viddocente','value'=>$data['iddocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidusuario','value'=>$data['idusuario'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidcarrera','value'=>$data['idcarrera'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_coordinador',$parametro);
        }
        
        function mostrar_coordinador(){
            $this->db->select("*");
            $this->db->from("COORDINADOR");
            $this->db->order_by("IDCOORDINADOR ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_coordinador($id){
            $this->db->select("*");
            $this->db->from("COORDINADOR");
            $this->db->where("IDCOORDINADOR",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_coordinador($data,$id){
            $parametro=array(
                array('name'=>':vidcoordinador','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':viddepto','value'=>$data['iddepto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcodcarrera','value'=>$data['codcarrera'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vmaterias','value'=>$data['materias'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_coordinador',$parametro);
        }
    
        function eliminar_coordinador($id){
            $parametro=array(array('name'=>':vidcoordinador','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_coordinador',$parametro);
        }

        ////////////
        //crud departamento
        ////////////

        function agregar_departamento($data){ 
            $parametro=array(
                array('name'=>':vnombredepto','value'=>$data['nombredepto'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_departamento',$parametro);
        }
        
        function mostrar_departamento(){
            $this->db->select("*");
            $this->db->from("DEPARTAMENTO");
            $this->db->order_by("IDDEPTO ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_departamento($id){
            $this->db->select("*");
            $this->db->from("DEPARTAMENTO");
            $this->db->where("IDDEPTO",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_departamento($data,$id){
            $parametro=array(
                array('name'=>':videpto','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnombredepto','value'=>$data['nombredepto'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_departamento',$parametro);
        }
    
        function eliminar_departamentor($id){
            $parametro=array(array('name'=>':videpto','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_departamento',$parametro);
        }

        ////////////
        //crud docente
        ////////////

        function agregar_docente($data){ 
            $parametro=array(
                array('name'=>':vidusuario','value'=>$data['idusuario'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomdocente','value'=>$data['nomdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vapedocente','value'=>$data['apedocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vprofdocente','value'=>$data['profdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestdocente','value'=>$data['estdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vtipocontrato','value'=>$data['tipocontrato'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vingredocente','value'=>$data['ingredocente'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_docente',$parametro);
        }
        
        function mostrar_docente(){
            $this->db->select("*");
            $this->db->from("DOCENTE");
            $this->db->order_by("IDDOCENTE ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_docente($id){
            $this->db->select("*");
            $this->db->from("DOCENTE");
            $this->db->where("IDDOCENTE",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_docente($data,$id){
            $parametro=array(
                array('name'=>':viddocente','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidusuario','value'=>$data['idusuario'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomdocente','value'=>$data['nomdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vapedocente','value'=>$data['apedocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vprofdocente','value'=>$data['profdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestdocente','value'=>$data['estdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vtipocontrato','value'=>$data['tipocontrato'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vingredocente','value'=>$data['ingredocente'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_docente',$parametro);
        }
    
        function eliminar_docente($id){
            $parametro=array(array('name'=>':viddocente','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_docente',$parametro);
        }

        ////////////
        //crud estudiantes
        ////////////

        function agregar_estudiantes($data){ 
            $parametro=array(
                array('name'=>':vidusuario','value'=>$data['idusuario'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomdocente','value'=>$data['nomdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vapedocente','value'=>$data['apedocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vprofdocente','value'=>$data['profdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestdocente','value'=>$data['estdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vtipocontrato','value'=>$data['tipocontrato'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vingredocente','value'=>$data['ingredocente'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_estudiantes',$parametro);
        }
        
        function mostrar_estudiantes(){
            $this->db->select("*");
            $this->db->from("ESTUDIANTES");
            $this->db->order_by("IDESTUDIANTE ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_estudiantes($id){
            $this->db->select("*");
            $this->db->from("ESTUDIANTES");
            $this->db->where("IDESTUDIANTE",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_estudiantes($data,$id){
            $parametro=array(
                array('name'=>':videstudiante','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidusuario','value'=>$data['idusuario'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomdocente','value'=>$data['nomdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vapedocente','value'=>$data['apedocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vprofdocente','value'=>$data['profdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestdocente','value'=>$data['estdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vtipocontrato','value'=>$data['tipocontrato'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vingredocente','value'=>$data['ingredocente'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_estudiantes',$parametro);
        }
    
        function eliminar_estudiantes($id){
            $parametro=array(array('name'=>':videstudiante','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_estudiantes',$parametro);
        }

        ////////////
        //crud grupos
        ////////////

        function agregar_grupos($data){ 
            $parametro=array(
                array('name'=>':vidmateria','value'=>$data['idmateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidcoordinador','value'=>$data['idcoordinador'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcantcupos','value'=>$data['cantcupos'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnumgrupo','value'=>$data['numgrupo'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_grupos',$parametro);
        }
        
        function mostrar_grupos(){
            $this->db->select("*");
            $this->db->from("GRUPOS");
            $this->db->order_by("IDGRUPOS ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_grupos($id){
            $this->db->select("*");
            $this->db->from("GRUPOS");
            $this->db->where("IDGRUPOS",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_grupos($data,$id){
            $parametro=array(
                array('name'=>':vidgrupos','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidmateria','value'=>$data['idmateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidcoordinador','value'=>$data['idcoordinador'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcantcupos','value'=>$data['cantcupos'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnumgrupo','value'=>$data['numgrupo'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_grupos',$parametro);
        }
    
        function eliminar_grupos($id){
            $parametro=array(array('name'=>':vidgrupos','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_grupos',$parametro);
        }

        ////////////
        //crud historial_planificacion
        ////////////

        function agregar_historial_planifica($data){ 
            $parametro=array(
                array('name'=>':vciclo','value'=>$data['ciclo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vanio','value'=>$data['anio'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_historial_planifica',$parametro);
        }
        
        function mostrar_historial_planifica(){
            $this->db->select("*");
            $this->db->from("HISTORIAL_PLANIFICACION");
            $this->db->order_by("IDHISOTIAL_PLAN ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_historial_planifica($id){
            $this->db->select("*");
            $this->db->from("HISTORIAL_PLANIFICACION");
            $this->db->where("IDHISOTIAL_PLAN",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_historial_planifica($data,$id){
            $parametro=array(
                array('name'=>':vidhisotial_plan','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vciclo','value'=>$data['ciclo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vanio','value'=>$data['anio'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_historial_planifica',$parametro);
        }
    
        function eliminar_historial_planifica($id){
            $parametro=array(array('name'=>':vidhisotial_plan','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_historial_planifica',$parametro);
        }

        ////////////
        //crud horarios_grupos
        ////////////

        function agregar_horarios_grupos($data){ 
            $parametro=array(
                array('name'=>':vidgrupos','value'=>$data['idgrupos'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vdiahorario','value'=>$data['diahorario'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vhorashorario','value'=>$data['horashorario'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_horarios_grupos',$parametro);
        }
        
        function mostrar_horarios_grupos(){
            $this->db->select("*");
            $this->db->from("HORARIOS_GRUPOS");
            $this->db->order_by("IDHORARIO_GRU ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_horarios_grupos($id){
            $this->db->select("*");
            $this->db->from("HORARIOS_GRUPOS");
            $this->db->where("IDHORARIO_GRU",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_horarios_grupos($data,$id){
            $parametro=array(
                array('name'=>':vidhorario_gru','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidgrupos','value'=>$data['idgrupos'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vdiahorario','value'=>$data['diahorario'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vhorashorario','value'=>$data['horashorario'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_horarios_grupos',$parametro);
        }
    
        function eliminar_horarios_grupos($id){
            $parametro=array(array('name'=>':vidhorario_gru','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_horarios_grupos',$parametro);
        }

        ////////////
        //crud horas_sociales
        ////////////

        function agregar_horas_sociales($data){ 
            $parametro=array(
                array('name'=>':vnomproyecto','value'=>$data['nomproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vduracionproyec','value'=>$data['duracionproyec'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestadoproyecto','value'=>$data['estadoproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vanteproyecto','value'=>$data['anteproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestadoanteproyecto','value'=>$data['estadoanteproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcomentariopro','value'=>$data['comentariopro'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_horas_sociales',$parametro);
        }
        
        function mostrar_horas_sociales(){
            $this->db->select("*");
            $this->db->from("HORARIOS_GRUPOS");
            $this->db->order_by("IDHORASSOCIALES ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_horas_sociales($id){
            $this->db->select("*");
            $this->db->from("HORAS_SOCIALES");
            $this->db->where("IDHORASSOCIALES",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_horas_sociales($data,$id){
            $parametro=array(
                array('name'=>':vidhorassociales','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomproyecto','value'=>$data['nomproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vduracionproyec','value'=>$data['duracionproyec'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestadoproyecto','value'=>$data['estadoproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vanteproyecto','value'=>$data['anteproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestadoanteproyecto','value'=>$data['estadoanteproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcomentariopro','value'=>$data['comentariopro'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_horas_sociales',$parametro);
        }
    
        function eliminar_horas_sociales($id){
            $parametro=array(array('name'=>':vidhorassociales','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_horas_sociales',$parametro);
        }

        ////////////
        //crud inscripcion
        ////////////

        function agregar_inscripcion($data){ 
            $parametro=array(
                array('name'=>':vidgrupos','value'=>$data['idgrupos'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_inscripcion',$parametro);
        }
        
        function mostrar_inscripcion(){
            $this->db->select("*");
            $this->db->from("INSCRIPCION");
            $this->db->order_by("IDINCRIPCION ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_inscripcion($id){
            $this->db->select("*");
            $this->db->from("INSCRIPCION");
            $this->db->where("IDINCRIPCION",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_inscripcion($data,$id){
            $parametro=array(
                array('name'=>':vidincripcion','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidgrupos','value'=>$data['idgrupos'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_inscripcion',$parametro);
        }
    
        function eliminar_inscripcion($id){
            $parametro=array(array('name'=>':vidincripcion','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_inscripcion',$parametro);
        }

        ////////////
        //crud materias
        ////////////

        function agregar_materias($data){ 
            $parametro=array(
                array('name'=>':vcodmateria','value'=>$data['codmateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnivelmateria','value'=>$data['nivelmateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnommateria','value'=>$data['nommateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vrequisito','value'=>$data['requisito'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_materias',$parametro);
        }
        
        function mostrar_materias(){
            $this->db->select("*");
            $this->db->from("MATERIAS");
            $this->db->order_by("IDMATERIA ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_materias($id){
            $this->db->select("*");
            $this->db->from("MATERIAS");
            $this->db->where("IDMATERIA",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_materias($data,$id){
            $parametro=array(
                array('name'=>':vidmateria','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcodmateria','value'=>$data['codmateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnivelmateria','value'=>$data['nivelmateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnommateria','value'=>$data['nommateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vrequisito','value'=>$data['requisito'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_materias',$parametro);
        }
    
        function eliminar_materias($id){
            $parametro=array(array('name'=>':vidmateria','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_materias',$parametro);
        }

        ////////////
        //crud plan_estudio
        ////////////

        function agregar_plan_estudio($data){ 
            $parametro=array(
                array('name'=>':vidcarrera','value'=>$data['idcarrera'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vduracionplan','value'=>$data['duracionplan'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vdescripcionplan','value'=>$data['descripcionplan'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_plan_estudio',$parametro);
        }
        
        function mostrar_plan_estudio(){
            $this->db->select("*");
            $this->db->from("PLAN_ESTUDIO");
            $this->db->order_by("IDPLAN ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_plan_estudio($id){
            $this->db->select("*");
            $this->db->from("PLAN_ESTUDIO");
            $this->db->where("IDPLAN",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_plan_estudio($data,$id){
            $parametro=array(
                array('name'=>':vidplan','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidcarrera','value'=>$data['idcarrera'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vduracionplan','value'=>$data['duracionplan'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vdescripcionplan','value'=>$data['descripcionplan'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_plan_estudio',$parametro);
        }
    
        function eliminar_plan_estudio($id){
            $parametro=array(array('name'=>':vidplan','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_plan_estudio',$parametro);
        }

        ////////////
        //crud preinscripcion
        ////////////

        function agregar_preinscripcion($data){ 
            $parametro=array(
                array('name'=>':vidmateria','value'=>$data['idmateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':videstudiante','value'=>$data['idestudiante'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_preinscripcion',$parametro);
        }
        
        function mostrar_preinscripcion(){
            $this->db->select("*");
            $this->db->from("PREINSCRIPCION");
            $this->db->order_by("IDPREINSCRIPCION ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_preinscripcion($id){
            $this->db->select("*");
            $this->db->from("PREINSCRIPCION");
            $this->db->where("IDPREINSCRIPCION",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_preinscripcion($data,$id){
            $parametro=array(
                array('name'=>':vidpreinscripcion','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidmateria','value'=>$data['idmateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':videstudiante','value'=>$data['idestudiante'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_preinscripcion',$parametro);
        }
    
        function eliminar_preinscripcion($id){
            $parametro=array(array('name'=>':vidpreinscripcion','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_preinscripcion',$parametro);
        }

        ////////////
        //crud registro_estudiante
        ////////////

        function agregar_registro_estudiante($data){ 
            $parametro=array(
                array('name'=>':vidincripcion','value'=>$data['idincripcion'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestadomateria','value'=>$data['estadomateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnotamateria','value'=>$data['notamateria'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_registro_estudiante',$parametro);
        }
        
        function mostrar_registro_estudiante(){
            $this->db->select("*");
            $this->db->from("REGISTRO_ESTUDIANTE");
            $this->db->order_by("IDREGISTROESTU ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_registro_estudiante($id){
            $this->db->select("*");
            $this->db->from("REGISTRO_ESTUDIANTE");
            $this->db->where("IDREGISTROESTU",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_registro_estudiante($data,$id){
            $parametro=array(
                array('name'=>':vidregistroestu','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidincripcion','value'=>$data['idincripcion'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestadomateria','value'=>$data['estadomateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnotamateria','value'=>$data['notamateria'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_registro_estudiante',$parametro);
        }
    
        function eliminar_registro_estudiante($id){
            $parametro=array(array('name'=>':vidregistroestu','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_registro_estudiante',$parametro);
        }

        ////////////
        //crud reportechoque
        ////////////

        function agregar_reportechoque($data){ 
            $parametro=array(
                array('name'=>':viddocente','value'=>$data['iddocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':videstudiante','value'=>$data['idestudiante'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcomentariochoque','value'=>$data['comentariochoque'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_reportechoque',$parametro);
        }
        
        function mostrar_reportechoque(){
            $this->db->select("*");
            $this->db->from("REPORTECHOQUE");
            $this->db->order_by("IDCHOQUE ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_reportechoque($id){
            $this->db->select("*");
            $this->db->from("REPORTECHOQUE");
            $this->db->where("IDCHOQUE",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_reportechoque($data,$id){
            $parametro=array(
                array('name'=>':vidchoque','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':viddocente','value'=>$data['iddocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':videstudiante','value'=>$data['idestudiante'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcomentariochoque','value'=>$data['comentariochoque'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_reportechoque',$parametro);
        }
    
        function eliminar_reportechoque($id){
            $parametro=array(array('name'=>':vidchoque','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_reportechoque',$parametro);
        }

        ////////////
        //crud roles
        ////////////

        function agregar_roles($data){ 
            $parametro=array(
                array('name'=>':vtiporol','value'=>$data['tiporol'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_roles',$parametro);
        }
        
        function mostrar_roles(){
            $this->db->select("*");
            $this->db->from("ROLES");
            $this->db->order_by("IDROL ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_roles($id){
            $this->db->select("*");
            $this->db->from("ROLES");
            $this->db->where("IDROL",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_roles($data,$id){
            $parametro=array(
                array('name'=>':vidrol','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vtiporol','value'=>$data['tiporol'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_roles',$parametro);
        }
    
        function eliminar_roles($id){
            $parametro=array(array('name'=>':vidrol','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_roles',$parametro);
        }

        ////////////
        //crud usuario
        ////////////

        function agregar_usuario($data){ 
            $parametro=array(
                array('name'=>':vusuario','value'=>$data['usuario'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vpassword','value'=>$data['password'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vtipousuairo','value'=>$data['tipousuairo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestadousuario','value'=>$data['estadousuario'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','agregar_usuario',$parametro);
        }
        
        function mostrar_usuario(){
            $this->db->select("*");
            $this->db->from("USUARIO");
            $this->db->order_by("IDUSUARIO ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_usuario($id){
            $this->db->select("*");
            $this->db->from("USUARIO");
            $this->db->where("IDUSUARIO",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_usuario($data,$id){
            $parametro=array(
                array('name'=>':vidusuario','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vusuario','value'=>$data['usuario'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vpassword','value'=>$data['password'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vtipousuairo','value'=>$data['tipousuairo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestadousuario','value'=>$data['estadousuario'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package','actualizar_usuario',$parametro);
        }
    
        function eliminar_usuario($id){
            $parametro=array(array('name'=>':vidusuario','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package','eliminar_usuario',$parametro);
        }

    }
?>