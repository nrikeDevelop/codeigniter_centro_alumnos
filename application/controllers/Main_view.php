<?php

/**
 * Description of Main_view
 *
 * @author a021697152x
 */
class Main_view extends CI_Controller{
    
    public function __construct() {
        parent::__construct();


        $this->load->helper('url');
        $this->load->helper('html');

        $this->load->model('cursos');
        $this->load->model('auth_query');
        
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');  
        
        
        $this->load->library('Ion_auth');

       
    }
    /*
     * Metodos para cargar las vistas. loadSingleView, carga las vistas sin menú, mientras que loadView carga la vista
     * con menú para ello se especifican los métodos header ( para cargar menu junto con css ) o loadHead ( solamente carga
     * css)
     */

    public function loadHeader(){       
        //check sql if nesesari
        $data['admin']=FALSE;

        $user_id = $this->ion_auth->user()->row()->id; 
        $user_info = $this->auth_query->is_admin($user_id);
        foreach($user_info as $info){
            if ($info->group_id == 1){
                $data['admin']=TRUE;
            }
        }

        $this->load->view('includes/head', $data);
        $this->load->view('includes/header', $data);
    }
    
    public function loadHead(){
        $data['admin']=FALSE;
        $user_id = $this->ion_auth->user()->row()->id; 
        $user_info = $this->auth_query->is_admin($user_id);
        foreach($user_info as $info){
            if ($info->group_id == 1){
                $data['admin']=TRUE;
            }
        }
        $this->load->view('includes/head', $data);
    }
    
    public function loadView($view,$data){
        $this->loadHeader();
        $this->load->view($view, $data);
        $this->load->view('includes/footer',null);
    }
    
    public function loadSingleView($view,$data){
        $this->loadHead();
        $this->load->view($view, $data);
    }
    
    /*Funcion que se ejecuta con la llamada del controlador*/
    
    public function index(){
        $this->loadView('main_view', null);
    }

    /*Función que llama a los cursos*/
    public function loadGrupos(){
        $data['title'] = "Cursos";
        $data['grupos'] = $this->cursos->get_grupos();
        
        $this->loadView('grupos_view',$data);
    }
    
    /*Dentro de la vista cursos esta función carga los alumnos*/
    public function loadGruposAlumnos($codigo_grupo){
        $data['title'] = "Alumnos perteneciente al Curso";
        $data['alumnos'] = $this->cursos->get_grupos_alumnos($codigo_grupo);
        
        $this->loadView('grupos_alumnos_view',$data);        
    }
    
    /*Dentro de la vista cursos esta función carga las asignaturas*/
    public function loadGruposAsignaturas($codigo_grupo){
        $data['title'] = "Asignaturas";
        $data['asignaturas'] = $this->cursos->get_grupos_asignaturas($codigo_grupo);
        
        $this->loadView('grupos_asignaturas_view',$data);        
    }
    
    
    //APARTADO ALUMNOS
    
    /*Función que carga los alumnos*/
    public function loadAlumnos(){
        $data['title']="Alumnos";
        $data['alumnos'] = $this->cursos->get_alumnos();
        
        $this->loadView('alumnos_view', $data);
                
    }
    /*Funcion que recoge el valor de las evaluaciones*/
    public function getValueEvaluacion($id_alumno,$id_asignatura,$num_evaluacion){
        $evaluacion = $this->cursos->get_alumnos_asignaturas_evaluacion($id_alumno ,$id_asignatura,$num_evaluacion); 
        foreach ($evaluacion as $value) {
            return $value->nota;
        }         
    }
    
    /*Funcion que cargará por alumno, sus evaluaciones*/
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
       
        $data['evaluaciones']=$evaluaciones;       
        $this->loadView('alumnos_asignaturas_view', $data);
    }
    
    /*Función que se encarga de manejar el formulario donde se añaden las notas del alumno*/
    public function form_notas($id_alumno){

        //get post
        $postData = $this->input->post();
        
        $nota = $postData['nota'];
        $asignatura = $postData['asign'];
        $evaluacion = $postData['eval'];

        $this->form_validation->set_rules('nota','Nota','required|greater_than_equal_to[0]|less_than_equal_to[10]');
       
        if ($this->form_validation->run() == FALSE){
            //ERROR En caso de error debe de volver a la misma vista
            $this-> loadAlumnosAsignaturas($id_alumno);        
        }else{
            //SUCCESS   
            $evaluacion_vaule = $this->getValueEvaluacion($id_alumno, $asignatura, $evaluacion); 

            if($evaluacion_vaule!=""){             
                //Existe un valor > actualizamos
                
                //$this->cursos->update_alumnos_asignaturas_evaluacion($id_alumno,$asignatura,$evaluacion,$nota);
                //$this-> loadAlumnosAsignaturas($id_alumno);
                
                $data['title']="test";
                $data['id_alumno']=$id_alumno;
                $data['id_asignatura']=$asignatura;
                $data['evaluacion']=$evaluacion;
                $data['nota']=$nota;
                              
                $this->loadSingleView('alumnos_asignaturas_grupos_view_form_replace', $data);
                
            }else{
                //No existe valor > insertamos valor
                $this->cursos->set_alumnos_asignaturas_evaluacion($id_alumno,$asignatura,$evaluacion,$nota);     
                $this-> loadAlumnosAsignaturas($id_alumno);
            }                   
        }     
    }
    
    public function updateAlumnosAsignaturas($id_alumno,$asignatura,$evaluacion,$nota){
        $this->cursos->update_alumnos_asignaturas_evaluacion($id_alumno,$asignatura,$evaluacion,$nota);
        $this-> loadAlumnosAsignaturas($id_alumno);
    }
    
    //historial
    
    public function loadAlumnosAsignaturasHistorial(){
        $this->loadView('alumnos_asignaturas_historial_view', null);
    }
    
    
    
/**VERSION2**/
    
    public function loadGruposEvaluar($codigo_grupo){
        
        $data['asignaturas'] = $this->cursos->get_grupos_asignaturas($codigo_grupo);        
        foreach ($data['asignaturas'] as $asignatura){
            $data['titulo'] = $asignatura->nombre_grupo;
            break;
        }
        
        $this->loadView('grupos_evaluar_view', $data);
    }
    
    public function loadGruposEvaluarAlumnos($id_contenido,$id_grupo){

        $data['alumnos']= $this->cursos->get_grupos_asignaturas_evaluar($id_contenido,$id_grupo);
        
        foreach ($data['alumnos'] as $value) {
            $data['titulo']=$value->nombre_contenido;
            break;
        }
        
        
        $this->loadView('grupos_evaluar_alumnos_view',$data);
    }
    
}
