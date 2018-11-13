<?php

class Alumnos extends CI_Controller
{
    public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->model('cursos');
            $this->load->model('auth_query');

            $this->load->library(array('ion_auth', 'form_validation'));
            $this->load->helper(array('url', 'language','form'));
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
            $this->lang->load('auth');
    }

    public function index(){          
        $data['title']="Alumnos";
        $data['alumnos'] = $this->cursos->get_alumnos();
        $this->_render_page('alumnos_view',$data);
    }

    public function get_notas_alumnos($nia_alumno){
        $data['asignaturas'] = $this->cursos->get_asignaturas($nia_alumno);
        foreach ($data['asignaturas'] as $value){
            $data['titulo']=$value->nombre_alumno;
            break;
        }

        $this->_render_page('alumnos_asignaturas_view',$data);
    }

    public function is_admin(){        
        $user_id = $this->ion_auth->user()->row()->id;
        $user_info = $this->auth_query->is_admin($user_id);
        foreach ($user_info as $info) {
            if ($info->group_id == 1) {
                $data['admin'] = TRUE;
            }else{
                redirect(base_url().'index.php');
            }
            return $data['admin'];
        }
    }

    public function _render_page($view, $data = NULL){
        $data['admin']=$this->is_admin();
        $this->load->view('includes/head', $data);
        $this->load->view('includes/header', $data);
        $this->load->view($view,$data);
        $this->load->view('includes/footer', $data);

    }

}