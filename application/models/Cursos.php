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
        select id,codigo,nombre 
            from grupos
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
        SELECT cont.nombre_cas as nombre,
                gru.nombre as nombre_grupo,
                gru.id as id_grupo,
                cur.abreviatura as abreviatura_curso,
                cont.id as id_contenido
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
    
    public function get_asignaturas($nia_alumno){
        $sql=<<< SQL
        SELECT concat (a.nombre,' ',a.apellido1,' ',a.apellido2) as nombre_alumno,
        n.nota as nota,
        n.contenido as id_cont,
        c.nombre_cas as nombre_contenido
        FROM alumnos a , matricula m, notas n , contenidos c
        where a.NIA = m.NIA and n.NIA = m.NIA and n.contenido = c.id
        and a.NIA = "$nia_alumno"         
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

    
    public function get_grupos_asignaturas_evaluar ($id_contenido,$id_grupo){
           
        $sql= <<< SQL
        /*
        SELECT
        contenidos.id as id_contenido,
        contenidos.nombre_cas as nombre_contenido,
        cursos.abreviatura as abreviatura_curso,
        alumnos.NIA as nia_alumno,
        CONCAT(alumnos.nombre,' ',alumnos.apellido1,' ',alumnos.apellido2) as nombre_alumno,
        notas.nota as nota
        FROM contenidos
        LEFT JOIN cursos on cursos.codigo = contenidos.curso
        LEFT JOIN cursos_grupos on cursos_grupos.curso = cursos.codigo
        LEFT JOIN grupos on grupos.id = cursos_grupos.id_grupo
        LEFT JOIN matricula on matricula.id_grupo = grupos.id
        LEFT JOIN alumnos on alumnos.NIA = matricula.NIA
        LEFT JOIN notas on notas.NIA = matricula.NIA
        where contenidos.id="$id_contenido" and grupos.id="$id_grupo"       
        */
        SELECT co.id as id_contenido,
        co.nombre_cas as nombre_contenido,
        c.abreviatura as abreviatura_curso,
        a.NIA as nia_alumno,
        CONCAT(a.nombre,' ',a.apellido1,' ',a.apellido2) as nombre_alumno
        from matricula m , alumnos a, grupos g, cursos_grupos cg, cursos c, contenidos co
        where m.NIA = a .NIA and m.id_grupo = g.id and
        g.id = cg.id_grupo and cg.curso = c.codigo and
        co.curso = c.codigo
        and g.id = $id_grupo and co.id = $id_contenido
        
SQL;

        $response = $this->db->query($sql);
        return $response->result();
    }
    

    public function update_grupos_asignaturas_evaluar($nia_alumno,$id_grupo,$id_contenido,$nota,$descripcion){
        $data = array(
                'NIA' => $nia_alumno,
                'grupo'  => $id_grupo,
                'contenido'  => $id_contenido,
                'nota'  => $nota,
                'descripcion' => $descripcion

        );
        
        $this->db->replace('notas', $data);
    }

    //COMMON
    public function get_info_alumno($nia){
        $sql=<<<SQL
        SELECT NIA as nia,
        CONCAT (nombre,' ',apellido1,' ',apellido2) as nombre_alumno,
        fecha_nac as fecha_nacimiento,
        nif,
        email
        FROM alumnos
        where alumnos.NIA = $nia
SQL;
        $response = $this->db->query($sql);
        return $response->result();
    }

    public function get_info_alumno_nota($nia_alumno,$id_grupo,$id_contenido){
        $sql=<<<SQL
        SELECT c.nombre_cas as nombre_contenido,
        CONCAT(a.nombre,' ',a.apellido1,' ',a.apellido2) as nombre_alumno,
        g.nombre as nombre_grupo,
        n.descripcion as descripcion,
        n.nota as nota
        from notas n, alumnos a, contenidos c, grupos g
        WHERE n.NIA = a.NIA and 
        n.contenido = c.id and
        n.grupo = g.id and
        a.NIA = $nia_alumno and
        n.contenido = $id_contenido and
        n.grupo = $id_grupo
SQL;

        $response = $this->db->query($sql);
        return $response->result();
    }
   
    public function get_calificaciones_alumno($nif_alumno){
        $sql=<<< SQL
        SELECT CONCAT(a.nombre,' ',a.apellido1,' ',a.apellido2) as nombre_alumno,
        a.NIA as nia_alumno,
        a.nif as nif_alumno,
        c.nombre_cas as nombre_contenido,
        n.nota as nota
        FROM contenidos c, notas n, matricula m, alumnos a
        where c.id = n.contenido AND
	n.NIA = m.NIA AND
	a.NIA = m.NIA AND
	a.nif= "$nif_alumno"
SQL;
        
        $response = $this->db->query($sql);
        return $response->result();
    }
}
