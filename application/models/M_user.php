<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function getAllUsers() {
        
        $query = $this->db->get('t_user');
        return $query->result();
    }


    public function insert_data_user($data) {
        $this->db->insert('t_user',$data);
    }

    public function getDataUserDetail($id_user) {
        $this->db->where('id_user',$id_user);
        $query = $this->db->get('t_user');
        return $query->row();
    }

    function get_user_by_id($userID){
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->where('id_user', $userID);
        $query=$this->db->get();
        return $query->result_array();
    }


    public function updateDataUserDetail($postData) {
        $oldData = $this->get_user_by_id($postData['id_user']);
    
        if($oldData[0]['email_user'] == $postData['email_user'])
                $validate = true;
            else
                $validate = $this->validate_email($postData);
    
            if($validate){
                $data = array(
                    'nama_user' => $postData['nama_user'],
                    'email_user' => $postData['email_user'],
                    'password_user' => $postData['password_user'],
                );
                $this->db->where('id_user', $postData['id_user']);
                $this->db->update('t_user', $data);
    
                $record = "(".$oldData[0]['nama_user']." to ".$postData['nama_user'].", ".$oldData[0]['email_user']." to ".$postData['email_user'].",".$oldData[0]['password_user']." to ".$postData['password_user'].")";
    
                return array('status' => 'success', 'message' => $record);
            }else{
                return array('status' => 'exist', 'message' => '');
            }        
    
    }

    public function deleteDataUserDetail($id_user) {
        $this->db->where('id_user',$id_user);
		$this->db->delete('t_user');
    }

    
}