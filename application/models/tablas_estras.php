<?php defined('BASEPATH') OR exit('No direct script access allowed');
   
   class tablas_estras extends CI_Model{

        function __construct()
        {
           parent::__construct(); 
           $this->load->database();
        }
        
        
        function agregar($data){ 
        $parametro=array(array('name'=>':nombres','value'=>$data['nombre'],'length'=>-1,'type'=>SQLT_CHR),
                         array('name'=>':apellidos','value'=>$data['apellido'],'length'=>-1,'type'=>SQLT_CHR));

        $this->db->stored_procedure('package1','pr',$parametro);
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

         $this->db->stored_procedure('package1','editar',$parametro);
        }

        function eliminar($id){
         $parametro=array(array('name'=>':vid','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));

         $this->db->stored_procedure('package1','eli',$parametro);
        }

        ////////////
        //crud accion
        ////////////

        function agregar_accion($data){ 
            $parametro=array(
                array('name'=>':vfechainicio','value'=>date('d-m-y',$data['fechainicio']),'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vfechafinal','value'=>date('d-m-y',$data['fechafinal']),'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_accion',$parametro);
        }
        
        function mostrar_accion(){
            $this->db->select("*");
            $this->db->from("ACCION");
            $this->db->order_by("IDACCION ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_accion($id){
            $this->db->select("*");
            $this->db->from("ACCION");
            $this->db->where("IDACCION",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_accion($data,$id){
            $parametro=array(
                array('name'=>':viaccion','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vfechainicio','value'=>$data['fechainicio'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vfechafinal','value'=>$data['fechafinal'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','actualizar_accion',$parametro);
        }
    
        function eliminar_accion($id){
            $parametro=array(array('name'=>':vidaccion','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_accion',$parametro);
        }

        ////////////
        //crud aulas
        ////////////

        function agregar_aulas($data){ 
            $parametro=array(
                array('name'=>':vnumaula','value'=>$data['numaula'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_aulas',$parametro);
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
            $this->db->stored_procedure('package1','actualizar_aulas',$parametro);
        }
    
        function eliminar_aulas($id){
            $parametro=array(array('name'=>':vidaula','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_aulas',$parametro);
        }

        ////////////
        //crud carrera
        ////////////

        function agregar_carrera($data){ 
            $parametro=array(
                array('name'=>':viddepto','value'=>$data['iddepto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcodcarrera','value'=>$data['codcarrera'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vmaterias','value'=>$data['materias'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomcarrera','value'=>$data['nomcarrera'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_carrera',$parametro);
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
                array('name'=>':vmaterias','value'=>$data['materias'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomcarrera','value'=>$data['nomcarrera'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','actualizar_carrera',$parametro);
        }
    
        function eliminar_carrera($id){
            $parametro=array(array('name'=>':vidcarrera','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_carrera',$parametro);
        }

        ////////////
        //crud coordinador
        ////////////

        function agregar_coordinador($data){ 
            $id = sha1('ues'.date("Y"));
    
            $parametro=array(
                array('name'=>':vidcarrera','value'=>$data['idcarrera'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcorreocoor','value'=>$data['correocoor'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomcoor','value'=>$data['nomcoor'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vapecoor','value'=>$data['apecoor'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vpassword','value'=>$id,'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_coordinador',$parametro);
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
                array('name'=>':vidcarrera','value'=>$data['idcarrera'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcorreocoor','value'=>$data['correocoor'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomcoor','value'=>$data['nomcoor'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vapecoor','value'=>$data['apecoor'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','actualizar_coordinador',$parametro);
        }
    
        function eliminar_coordinador($id){
            $parametro=array(array('name'=>':vidcoordinador','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_coordinador',$parametro);
        }

        ////////////
        //crud departamento
        ////////////

        function agregar_departamento($data){ 
            $parametro=array(
                array('name'=>':vnombredepto','value'=>$data['nombredepto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidjefe','value'=>$data['idjefe'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_departamento',$parametro);
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
                array('name'=>':vnombredepto','value'=>$data['nombredepto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidjefe','value'=>$data['idjefe'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','actualizar_departamento',$parametro);
        }
    
        function eliminar_departamentor($id){
            $parametro=array(array('name'=>':videpto','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_departamento',$parametro);
        }

        ////////////
        //crud docente
        ////////////

        function agregar_docente($data){ 
            $id = sha1('ues'.date("Y"));
         
            $parametro=array(
                array('name'=>':viddepto','value'=>$data['iddepto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomdocente','value'=>$data['nomdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vapedocente','value'=>$data['apedocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vprofdocente','value'=>$data['profdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vtipocontrato','value'=>$data['tipocontrato'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcorreodocente','value'=>$data['correodocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vpassword','value'=>$id,'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_docente',$parametro);
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
                array('name'=>':viddepto','value'=>$data['iddepto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomdocente','value'=>$data['nomdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vapedocente','value'=>$data['apedocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vprofdocente','value'=>$data['profdocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vtipocontrato','value'=>$data['tipocontrato'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcorreodocente','value'=>$data['correodocente'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','actualizar_docente',$parametro);
        }
    
        function eliminar_docente($id){
            $parametro=array(array('name'=>':viddocente','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_docente',$parametro);
        }

        ////////////
        //crud estudiantes
        ////////////

        function agregar_estudiantes($data){ 
            $id = sha1('ues'.date("Y"));
            
            $parametro=array(
                array('name'=>':vidcarrera','value'=>$data['idcarrera'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomestudiante','value'=>$data['nomestudiante'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vapelestudiante','value'=>$data['apelestudiante'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcarnetestu','value'=>$data['carnetestu'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcorreoestu','value'=>$data['correoestu'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vtelestudiante','value'=>$data['telestudiante'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vpassword','value'=>$id,'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_estudiantes',$parametro);
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
                array('name'=>':vidcarrera','value'=>$data['idcarrera'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomestudiante','value'=>$data['nomestudiante'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vapelestudiante','value'=>$data['apelestudiante'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcarnetestu','value'=>$data['carnetestu'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcorreoestu','value'=>$data['correoestu'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vtelestudiante','value'=>$data['telestudiante'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','actualizar_estudiantes',$parametro);
        }
    
        function eliminar_estudiantes($id){
            $parametro=array(array('name'=>':videstudiante','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_estudiantes',$parametro);
        }

        ////////////
        //crud grupos
        ////////////

        function agregar_grupos($data){ 
            $parametro=array(
                array('name'=>':vidmateria','value'=>$data['idmateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidcoordinador','value'=>$data['idcoordinador'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcantcupos','value'=>$data['cantcupos'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnumgrupo','value'=>$data['numgrupo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vciclogrupo','value'=>$data['ciclogrupo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vaniogrupo','value'=>$data['aniogrupo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestgrupo','value'=>$data['estgrupo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':viddocente','value'=>$data['iddocente'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_grupos',$parametro);
        }

        function grupos_agregar($data){ 
            $parametro=array(
                array('name'=>':vidmateria','value'=>$data['idmateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidcoordinador','value'=>$data['idcoordinador'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcantcupos','value'=>$data['cantcupos'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnumgrupo','value'=>$data['numgrupo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vciclogrupo','value'=>$data['ciclogrupo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vaniogrupo','value'=>$data['aniogrupo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestgrupo','value'=>'HABILITADO','length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':viddocente','value'=>$data['iddocente'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_grupos',$parametro);
           
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
                array('name'=>':vnumgrupo','value'=>$data['numgrupo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vciclogrupo','value'=>$data['ciclogrupo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vaniogrupo','value'=>$data['aniogrupo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestgrupo','value'=>$data['estgrupo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':viddocente','value'=>$data['iddocente'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','actualizar_grupos',$parametro);
        }

        function grupos_actualizar($data,$id){
            $parametro=array(
                array('name'=>':vidgrupos','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidmateria','value'=>$data['idmateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidcoordinador','value'=>$data['idcoordinador'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcantcupos','value'=>$data['cantcupos'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnumgrupo','value'=>$data['numgrupo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vciclogrupo','value'=>$data['ciclogrupo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vaniogrupo','value'=>$data['aniogrupo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestgrupo','value'=>$data['estgrupo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':viddocente','value'=>$data['iddocente'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','actualizar_grupos',$parametro);
        }
    
        function eliminar_grupos($id){
            $parametro=array(array('name'=>':vidgrupos','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_grupos',$parametro);
        }

        ////////////
        //crud horarios_grupos
        ////////////

        function agregar_horarios_grupos($data){ 


            $parametro=array(
                array('name'=>':vidgrupos','value'=>$data['idgrupos'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidaula','value'=>$data['idaula'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vdiahorario','value'=>$data['diahorario'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vhorashorario','value'=>$data['horashorario'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_horarios_grupos',$parametro);
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
                array('name'=>':vidaula','value'=>$data['idaula'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vdiahorario','value'=>$data['diahorario'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vhorashorario','value'=>$data['horashorario'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','editar_horarios_grupos',$parametro);
        }
    
        function eliminar_horarios_grupos($id){
            $parametro=array(array('name'=>':vidhorario_gru','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_horarios_grupos',$parametro);
        }

        ////////////
        //crud horas_sociales
        ////////////

        function agregar_horas_sociales($data){ 
            $parametro=array(
                array('name'=>':videstudiante','value'=>$data['idestudiante'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':viddocente','value'=>$data['iddocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomproyecto','value'=>$data['nomproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vduracionproyec','value'=>$data['duracionproyec'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestadoproyecto','value'=>$data['estadoproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vanteproyecto','value'=>$data['anteproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestadoanteproyecto','value'=>$data['estadoanteproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcomentariopro','value'=>$data['comentariopro'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_horas_sociales',$parametro);
        }
        
        function mostrar_horas_sociales(){
            $this->db->select("*");
            $this->db->from("HORAS_SOCIALES");
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
                array('name'=>':videstudiante','value'=>$data['idestudiante'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':viddocente','value'=>$data['iddocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomproyecto','value'=>$data['nomproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vduracionproyec','value'=>$data['duracionproyec'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestadoproyecto','value'=>$data['estadoproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vanteproyecto','value'=>$data['anteproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestadoanteproyecto','value'=>$data['estadoanteproyecto'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcomentariopro','value'=>$data['comentariopro'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','actualizar_horas_sociales',$parametro);
        }
    
        function eliminar_horas_sociales($id){
            $parametro=array(array('name'=>':vidhorassociales','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_horas_sociales',$parametro);
        }

        ////////////
        //crud inscripcion
        ////////////

        function agregar_inscripcion($data){ 
            $parametro=array(
                array('name'=>':videstudiante','value'=>$data['idestudiante'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidgrupos','value'=>$data['idgrupos'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_inscripcion',$parametro);
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
                array('name'=>':videstudiante','value'=>$data['idestudiante'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidgrupos','value'=>$data['idgrupos'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','actualizar_inscripcion',$parametro);
        }
    
        function eliminar_inscripcion($id){
            $parametro=array(array('name'=>':vidincripcion','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_inscripcion',$parametro);
        }

        ////////////
        //crud jefe
        ////////////

        function agregar_jefe($data){ 
            $id = sha1('ues'.date("Y"));
           
            $parametro=array(
                array('name'=>':vnomjefe','value'=>$data['nomjefe'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vapejefe','value'=>$data['apejefe'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcorreojefe','value'=>$data['correojefe'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vpassword','value'=>$id,'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_jefe',$parametro);
        }
        
        function mostrar_jefe(){
            $es='A';
            $this->db->select("*");
            $this->db->from("JEFE");
            $this->db->where("ESTADOJEFE",$es);
            $this->db->order_by("IDJEFE ASC");
            $resultados =$this->db->get();
            return $resultados->result();
        }
            
        function seleccion_jefe($id){
            $this->db->select("*");
            $this->db->from("JEFE");
            $this->db->where("IDJEFE",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }
    
        function actualizar_jefe($data,$id){
            $parametro=array(
                array('name'=>':vidjefe','value'=>$id,'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnomjefe','value'=>$data['nomjefe'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vapejefe','value'=>$data['apejefe'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcorreojefe','value'=>$data['correojefe'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','actualizar_jefe',$parametro);
        }
    
        function eliminar_jefe($id){
            $parametro=array(array('name'=>':vidjefe','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_jefe',$parametro);
        }

        ////////////
        //crud materias
        ////////////

        function agregar_materias($data){ 
            $parametro=array(
                array('name'=>':vidcarrera','value'=>$data['idcarrera'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcodmateria','value'=>$data['codmateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnivelmateria','value'=>$data['nivelmateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnommateria','value'=>$data['nommateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vrequisito','value'=>$data['requisito'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_materias',$parametro);
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
                array('name'=>':vidcarrera','value'=>$data['idcarrera'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcodmateria','value'=>$data['codmateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnivelmateria','value'=>$data['nivelmateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vnommateria','value'=>$data['nommateria'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vrequisito','value'=>$data['requisito'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','actualizar_materias',$parametro);
        }
    
        function eliminar_materias($id){
            $parametro=array(array('name'=>':vidmateria','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_materias',$parametro);
        }

        ////////////
        //crud preinscripcion
        ////////////

        function agregar_preinscripcion($data){ 
            $parametro=array(
                array('name'=>':videstudiante','value'=>$data['idestudiante'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidmateria','value'=>$data['idmateria'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_preinscripcion',$parametro);
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
                array('name'=>':videstudiante','value'=>$data['idestudiante'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vidmateria','value'=>$data['idmateria'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','actualizar_preinscripcion',$parametro);
        }
    
        function eliminar_preinscripcion($id){
            $parametro=array(array('name'=>':vidpreinscripcion','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_preinscripcion',$parametro);
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
            $this->db->stored_procedure('package1','agregar_registro_estudiante',$parametro);
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
            $this->db->stored_procedure('package1','actualizar_registro_estudiante',$parametro);
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
                array('name'=>':vidcoordinador','value'=>$data['iddocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':videstudiante','value'=>$data['idestudiante'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcomentariochoque','value'=>$data['comentariochoque'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_reportechoque',$parametro);
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
                array('name'=>':vidcoodinador','value'=>$data['iddocente'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':videstudiante','value'=>$data['idestudiante'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vcomentariochoque','value'=>$data['comentariochoque'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','actualizar_reportechoque',$parametro);
        }
    
        function eliminar_reportechoque($id){
            $parametro=array(array('name'=>':vidchoque','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_reportechoque',$parametro);
        }

        ////////////
        //crud usuario
        ////////////

        function agregar_usuario($data){ 
            $parametro=array(
                array('name'=>':vusuario','value'=>$data['usuario'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vpassword','value'=>sha1($data['password']),'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vtipousuairo','value'=>$data['tipousuairo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestadousuario','value'=>$data['estadousuario'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','agregar_usuario',$parametro);
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
                array('name'=>':vpassword','value'=>sha1($data['password']),'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vtipousuairo','value'=>$data['tipousuairo'],'length'=>-1,'type'=>SQLT_CHR),
                array('name'=>':vestadousuario','value'=>$data['estadousuario'],'length'=>-1,'type'=>SQLT_CHR)
            );
            $this->db->stored_procedure('package1','actualizar_usuario',$parametro);
        }
    
        function eliminar_usuario($id){
            $parametro=array(array('name'=>':vidusuario','value'=>$id,'length'=>-1,'type'=>SQLT_CHR));
            $this->db->stored_procedure('package1','eliminar_usuario',$parametro);
        }

        function seleccion_re($id){
            $this->db->select("*");
            $this->db->from("REGISTRO_ESTUDIANTE");
            $this->db->where("IDREGISTROESTU",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }

        function actualizar_re($data,$id){
            $estado;
            if($data['notamateria']>=6){
                $estado='A';
            }else{
                $estado='R';
            }
            $this->db->query("UPDATE REGISTRO_ESTUDIANTE SET NOTAMATERIA=".$data['notamateria'].", ESTADOMATERIA='".$estado."' WHERE IDREGISTROESTU=".$id);
        }

        function docente_comentario($id){
            $this->db->select("*");
            $this->db->from("HORAS_SOCIALES");
            $this->db->where("IDHORASSOCIALES",$id);
            $resultados =$this->db->get();
            return $resultados->row();
        }

        function actualizar_comentario($data,$id){
            
            $this->db->query("UPDATE HORAS_SOCIALES SET COMENTARIOPRO='".$data['comentario']."'WHERE IDHORASSOCIALES=".$id);
        }

        function estado_anteproyecto($id){
            $this->db->query("UPDATE HORAS_SOCIALES SET ESTADOANTEPROYECTO= 'A' WHERE IDHORASSOCIALES=".$id);
        }

        function estado_proyecto($id){
            $this->db->query("UPDATE HORAS_SOCIALES SET ESTADOPROYECTO= 'A' WHERE IDHORASSOCIALES=".$id);
        }

    }
?>