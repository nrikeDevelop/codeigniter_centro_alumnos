<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main_view
 *
 * @author a021697152x
 */
class Main_view extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('cursos');
        
        // load form and url helpers
         $this->load->helper(array('form', 'url'));

         // load form_validation library
         $this->load->library('form_validation');
        
    }
    
    public function loadHeader(){       
        //check sql if nesesari
        $this->load->view('includes/head', null);
        $this->load->view('includes/header', null);
    }
    
    public function loadView($view,$data){
        $this->loadHeader();
        $this->load->view($view, $data);
        $this->load->view('includes/footer',null);
    }
    
    public function index(){
        $this->loadView('main_view', null);
    }
    
    public function loadHome(){
        $this->loadView('home_view', null);
    }
    
    //VIEWS
    
    public function loadGrupos(){
        $data['title'] = "Cursos";
        $data['grupos'] = $this->cursos->get_grupos();
        
        $this->loadView('grupos_view',$data);
    }
    
    public function loadGruposAlumnos($codigo_grupo){
        $data['title'] = "Alumnos perteneciente al Curso";
        $data['alumnos'] = $this->cursos->get_grupos_alumnos($codigo_grupo);
        
        $this->loadView('grupos_alumnos_view',$data);        
    }
    
    public function loadGruposAsignaturas($codigo_grupo){
        $data['title'] = "Asignaturas";
        $data['asignaturas'] = $this->cursos->get_grupos_asignaturas($codigo_grupo);
        
        $this->loadView('grupos_asignaturas_view',$data);        
    }
    
    public function loadAlumnos(){
        $data['title']="Alumnos";
        $data['alumnos'] = $this->cursos->get_alumnos();
        
        $this->loadView('alumnos_view', $data);
                
    }
    
    public function getValueEvaluacion($id_alumno,$id_asignatura,$num_evaluacion){
        $evaluacion = $this->cursos->get_alumnos_asignaturas_evaluacion($id_alumno ,$id_asignatura,$num_evaluacion); 
        foreach ($evaluacion as $value) {
            return $value->nota;
        }         
    }
    
    public function loadAlumnosAsignaturas($id_alumno){
        /*Generamos un nuevo array de asignaturas junto sus evaluaciones 
          Por cada asignatura se añade el valor de sus evaluaciones */
        
        $data['asignaturas'] = $this->cursos->get_alumnos_asignaturas($id_alumno);
        
        $evaluaciones = array();     
        foreach ($data['asignaturas'] as $value) {

            $data['title'] = $value->nombre_alumno;
            $data['id_alumno'] = $value->id_alumno;
            
            $array_asignatura = array(
                    "asignatura" => $value->nombre,
                    "id_asignatura" => $value->id_asignatura,
                    "id_alumno" => $value -> id_alumno,
                    "nombre_alumno" => $value -> nombre_alumno,
                    "notas"=> array(
                        "eva1" => $this->getValueEvaluacion($value->id_alumno,  $value->id_asignatura, 1),
                        "eva2" => $this->getValueEvaluacion($value->id_alumno,  $value->id_asignatura, 2),
                        "eva3" => $this->getValueEvaluacion($value->id_alumno,  $value->id_asignatura, 3)
                        )
            );            
            array_push($evaluaciones, $array_asignatura);
        
        }
       
        $data['alert_state']="alert alert-warning alert-dismissible show";
        $data['evaluaciones']=$evaluaciones;
           
        $this->loadView('alumnos_asignaturas_view', $data);
    }
    
   
    public function form_notas($id_alumno){
        
        if($this->input->post('nota')>10 or $this->input->post('nota')<0 ){
            
            //Error
            
        }
        
        $evaluacion = $this->getValueEvaluacion($id_alumno, $this->input->post('asign'), $this->input->post('eval'));      
        if (empty($evaluacion)){
            //insertar datos
            $this->cursos->set_alumnos_asignaturas_evaluacion($id_alumno, $this->input->post('asign'), $this->input->post('eval'),$this->input->post('nota'));

        }else{
            //preguntar y cambiar
            

        }

   
        
        //Una vez optenidos los datos, volvemos a cargar la vista
        $this->loadAlumnosAsignaturas($id_alumno);
        
      
    }
    
}
