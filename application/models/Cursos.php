<?php


/**
 * Description of Cursos
 *
 * @author a021697152x
 */

/*CONSULTAS SQL*/
/*La funcionalidad la podemos definir por su nombre*/

class Cursos extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }
           
    public function get_grupos(){
        $sql = <<< SQL
        select codigo,nombre from grupos
SQL;
        $response = $this->db->query($sql);
        return $response->result();              
    }
    
    public function get_grupos_alumnos($codigo_grupo){
        $sql = <<< SQL
        SELECT al.NIA, 
                CONCAT(al.nombre,' ',al.apellido1,' ',al.apellido2) as nombre,
                gru.codigo
        from alumnos al,
                matricula ma, 
                grupos gru
        WHERE al.NIA = ma.NIA and
                ma.id_grupo = gru.id AND
                gru.codigo = "$codigo_grupo"
SQL;
        $response = $this->db->query($sql);
        return $response->result();
    }
    
    public function get_grupos_asignaturas($codigo_grupo){
        $sql = <<< SQL
        SELECT cont.nombre_cas as nombre
        FROM grupos gru, cursos_grupos cugru, cursos cur,contenidos cont
        where gru.id = cugru.id_grupo AND
                cugru.curso = cur.codigo AND
                cur.codigo = cont.curso AND
                gru.codigo = "$codigo_grupo"
SQL;
        $response = $this->db->query($sql);
        return $response->result();        
    }
    
    public function get_alumnos(){
        $sql = <<< SQL
        SELECt al.NIA as nia, 
	al.nif as nif,
        al.id as id,
	CONCAT(al.nombre,' ',al.apellido1,' ',al.apellido2) as nombre,
	al.email as email,
	gru.codigo as curso
        from alumnos al, matricula ma, grupos gru
        where al.NIA = ma.NIA and gru.id = ma.id_grupo
SQL;
        $response = $this->db->query($sql);
        return $response->result();  
    }
    
    public function get_alumnos_asignaturas($id_alumno){
        $sql = <<< SQL
        SELECT 
        cont.id as id_asignatura,
        cont.nombre_cas as nombre,
        al.id as id_alumno,
        CONCAT(al.nombre,' ',al.apellido1,' ',al.apellido2) as nombre_alumno
        FROM alumnos al,
                matricula ma,	
                grupos gru,
                cursos_grupos curgru,
                cursos cur,
                contenidos cont
        WHERE al.NIA = ma.NIA AND
                ma.id_grupo = gru.id AND
                gru.id = curgru.id_grupo AND
                curgru.curso = cur.codigo AND
                cur.codigo = cont.curso
                AND al.id = $id_alumno             
SQL;
        $response = $this->db->query($sql);
        return $response->result();      
    }
    
    public function get_alumnos_asignaturas_evaluacion($id_alumno,$id_contenido,$evaluacion){
        $sql = <<< SQL
        SELECT al.id,CONCAT(al.nombre,' ',al.apellido1,' ',al.apellido2) as nombre, cont.id,cont.nombre_cas as nombre_asignatura, eva.num_evaluacion,eva.nota
        FROM	evaluacion eva, alumnos al, contenidos cont
        WHERE eva.id_alumno = al.id and cont.id = eva.id_contenido AND
        al.id = $id_alumno AND cont.id = $id_contenido AND eva.num_evaluacion = $evaluacion       
SQL;
        $response = $this->db->query($sql);
        return $response->result();
    }
    
    public function set_alumnos_asignaturas_evaluacion($id_alumno,$id_contenido,$evaluacion,$nota){
        $this->db->set('id_alumno', $id_alumno);
        $this->db->set('id_contenido', $id_contenido);
        $this->db->set('num_evaluacion', $evaluacion);
        $this->db->set('nota', $nota);
        $this->db->insert('evaluacion');
    }
    

    public function delete_alumnos_asignaturas_evaluacion($id_alumno,$id_contenido,$evaluacion,$nota){
        $sql = <<< SQL
        delete from evaluacion   
        WHERE id_alumno = $id_alumno AND id_contenido=$id_contenido AND num_evaluacion = $evaluacion 
SQL;
        
        $this->db->query($sql);
    }
    
    
    public function update_alumnos_asignaturas_evaluacion($id_alumno,$id_contenido,$evaluacion,$nota){
        $sql= <<< SQL
        UPDATE evaluacion
        set nota = $nota
        WHERE id_alumno = $id_alumno and id_contenido = $id_contenido
        and num_evaluacion = $evaluacion        
SQL;
        $this->db->query($sql);
       
    }
   
}
