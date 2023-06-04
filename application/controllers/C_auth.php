<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_auth extends CI_Controller {
    public function __construct(){
		parent::__construct();		
		$this->load->model('M_menu');
        $this->load->helper('url');
	}

    public function index() {
        $data['t_menu'] = $this->M_menu->tampil_data_menu()->result();

        $this->load->view('burgerin/v_index_burgerin', $data);
    }
    public function cekLogin()
    {
        $user = '';
        $pass = '';

        $user = $_POST['user'];
        $pass = $_POST['pass'];
    
        // cek
        if ($user == "admin" && $pass == "admin123") {
            $this->crud_usr();
        } 
        else if($user == "user1" && $pass == "user1"){
            $this->index();
        }
        else {
            $this->index();
        }
        
    }
    public function register() {
        $this->load->view('auth/register');
    }
    public function login()
    {
        $this->load->view('auth/login');
    }

    public function crud_usr(){
        $data_user = $this->M_user->getAllUsers();
        $temp['data'] = $data_user;
        $this->load->view('admin/v_adm_usr',$temp);
    }
    

    public function insert_user_action(){
        $nama_user = $this->input->post('nama_user');
        $email_user = $this->input->post('email_user');
        $password_user = $this->input->post('password_user');
        
        $insert_data_user = array (
            'nama_user' =>  $nama_user,
            'email_user' =>  $email_user,
            'password_user' =>  $password_user
        );
        
        $this->M_user->insert_data_user($insert_data_user);
        redirect(base_url('C_auth/crud_usr'));
	}
    
    public function edit_user($id_user){
        $queryUserDetail = $this->M_user->getDataUserDetail($id_user);
        $data = array('queryUsrDetail' => $queryUserDetail); 
        $this->load->view('admin/v_adm_usr_edit', $data);
    }

    public function edit_user_action(){
        $id_user = $this->input->post('id_user');
		$nama_user = $this->input->post('nama_user');
		$email_user = $this->input->post('email_user');
		$password_user = $this->input->post('password_user');

		$updateaction = array(
			'id_user' => $id_user,
			'nama_user' => $nama_user,
			'email_user' => $email_user,
			'password_user' => $password_user
		);

		$M_user = $this->load->model('M_user');
		$this->M_Mitra->editMitra($updateaction, $id_user);
		redirect (base_url('/index.php/C_auth/crud_usr'));
    }
    public function delete_user_action($id_user){
        $M_User = $this->load->model('M_user');
        $this->M_user->deleteDataUserDetail($id_user);
        redirect(base_url('/index.php/C_auth/crud_usr'));
	}
    
    public function crud_menu(){
        $data_menu = $this->M_menu->getAllMenu();
        $temp['data'] = $data_menu;
        $this->load->view('admin/v_adm_menu',$temp);
    }

    public function insert_menu_action(){
        $nama_menu = $this->input->post('nama_menu');
        $harga_menu = $this->input->post('harga_menu');
        $deskripsi_menu = $this->input->post('deskripsi_menu');
        $foto_menu = $this->input->post('foto_menu');
        
        $insert_data_menu = array (
            'nama_menu' =>  $nama_menu,
            'harga_menu' =>  $harga_menu,
            'deskripsi_menu' =>  $deskripsi_menu,
            'foto_menu' =>  $foto_menu
        );
        
        $this->M_menu->insert_data_menu($insert_data_menu);
        redirect(base_url('C_auth/crud_usr'));
	}

    public function restaurant_menu()
    {
        $data['t_menu'] = $this->M_menu->tampil_data_menu()->result();
        
        $this->load->view('burgerin/v_menu_burgerin', $data);
    }

    public function restaurant_book()
    {
        $this->load->view('burgerin/v_book_burgerin');
    }
}