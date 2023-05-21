<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model {
    public function getAllMenu() {
        
        $query = $this->db->get('t_menu');
        return $query->result();
    }
    
    public function insert_data_menu($data) {
        $this->db->insert('t_menu',$data);
    }
    
}