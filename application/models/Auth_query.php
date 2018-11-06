<?php

class Auth_query extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    public function is_admin($user_id){
        $sql = <<< SQL
        SELECT *
        FROM users_groups ug, users u, groups g
        where ug.group_id = g.id and 
        ug.user_id = u.id and 
        ug.group_id = 1 and ug.user_id = $user_id
SQL;
        $response = $this->db->query($sql);
        return $response->result(); 
    }
}